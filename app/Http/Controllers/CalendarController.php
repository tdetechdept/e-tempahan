<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class CalendarController extends Controller
{
    /**
     * Display the calendar page
     */
    public function index()
    {
        // Fetch all bookings with their related data
        $bookings = Booking::with(['user', 'room'])
            ->where('status', '!=', 5) // Exclude cancelled bookings
            ->get()
            ->map(function ($booking) {
                // Determine event type based on meeting name
                $eventType = $this->getEventType($booking->meeting_name);
                
                return [
                    'id' => $booking->id,
                    'title' => $eventType, // Use simplified title
                    'full_title' => $booking->meeting_name, // Keep full title for tooltip
                    'date' => $booking->start_date->format('Y-m-d'), // Format as YYYY-MM-DD
                    'time' => $booking->start_time->format('H:i'), // Format as HH:MM
                    'end_time' => $booking->end_time->format('H:i'), // Format as HH:MM
                    'type' => 'meeting',
                    'status' => $booking->status,
                    'room' => $booking->room->room_name ?? 'Unknown Room',
                    'user' => $booking->user->name ?? 'Unknown User',
                    'participants' => $booking->number_of_participants,
                    'description' => $booking->description,
                    'chairman' => $booking->chairman,
                    'department' => $booking->department ?? 'General',
                    'color' => $this->getEventColor($booking->status),
                    'url' => route('booking.show', $booking->id)
                ];
            });

        // Fetch special holidays
        $specialHolidays = \App\Models\SpecialHoliday::where('is_active', true)
            ->get()
            ->map(function ($holiday) {
                return [
                    'id' => 'holiday_' . $holiday->id,
                    'title' => 'CUTI KHAS',
                    'full_title' => $holiday->holiday_name,
                    'start_date' => $holiday->start_date->format('Y-m-d'),
                    'end_date' => $holiday->end_date->format('Y-m-d'),
                    'time' => '00:00',
                    'end_time' => '23:59',
                    'type' => 'holiday',
                    'status' => 'active',
                    'room' => 'N/A',
                    'user' => $holiday->createdBy->name ?? 'Admin',
                    'participants' => 0,
                    'description' => $holiday->notes,
                    'chairman' => 'N/A',
                    'department' => 'General',
                    'color' => '#dc3545', // Red color for holidays
                ];
            });

        // Combine bookings and holidays
        $allEvents = $bookings->merge($specialHolidays);

        return view('super_admin.calendar.Calendar', compact('allEvents'));
    }

    /**
     * Display the create special holiday page
     */
    public function createSpecialHoliday()
    {
        return view('super_admin.calendar.create-special-holiday.Calendar');
    }

    /**
     * Store special holiday
     */
    public function storeSpecialHoliday(Request $request)
    {
        $request->validate([
            'holiday_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'notes' => 'nullable|string',
        ]);

        try {
            // Create special holiday using the proper model
            $specialHoliday = new \App\Models\SpecialHoliday();
            $specialHoliday->holiday_name = $request->holiday_name;
            $specialHoliday->start_date = $request->start_date;
            $specialHoliday->end_date = $request->end_date;
            $specialHoliday->notes = $request->notes;
            $specialHoliday->created_by = auth()->id();
            $specialHoliday->is_active = true;

            $specialHoliday->save();

            return redirect()->route('calendar')->with('success', 'Cuti khas berjaya dicipta.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ralat semasa mencipta cuti khas. Sila cuba lagi.');
        }
    }



    /**
     * Display the create manual booking page
     */
    public function createManualBooking()
    {
        $rooms = \App\Models\Room::where('status', true)->get();
        return view('super_admin.calendar.create-manual-booking.Calendar', compact('rooms'));
    }

    /**
     * Get holidays for API
     */
    public function getHolidays(Request $request)
    {
        $year = $request->get('year', now()->year);
        $month = $request->get('month', now()->month);

        // Create start and end of the requested month
        $monthStart = \Carbon\Carbon::create($year, $month, 1)->startOfMonth();
        $monthEnd = \Carbon\Carbon::create($year, $month, 1)->endOfMonth();

        $holidays = \App\Models\SpecialHoliday::where('is_active', true)
            ->where(function($query) use ($monthStart, $monthEnd) {
                // Events that start in this month
                $query->whereBetween('start_date', [$monthStart, $monthEnd])
                      // Events that end in this month
                      ->orWhereBetween('end_date', [$monthStart, $monthEnd])
                      // Events that span across this month (start before and end after)
                      ->orWhere(function($q) use ($monthStart, $monthEnd) {
                          $q->where('start_date', '<=', $monthStart)
                            ->where('end_date', '>=', $monthEnd);
                      });
            })
            ->get()
            ->map(function ($holiday) {
                return [
                    'id' => $holiday->id,
                    'holiday_name' => $holiday->holiday_name,
                    'start_date' => $holiday->start_date->format('Y-m-d'),
                    'end_date' => $holiday->end_date->format('Y-m-d'),
                    'notes' => $holiday->notes
                ];
            });

        return response()->json($holidays);
    }

    /**
     * Store manual booking
     */
    public function storeManualBooking(Request $request)
    {
        $request->validate([
            'meeting_name' => 'required|string|max:255',
            'room_id' => 'required|exists:rooms,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'agenda_attachment' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        try {
            $booking = new \App\Models\Booking();
            $booking->user_id = auth()->id();
            $booking->meeting_name = $request->meeting_name;
            $booking->room_id = $request->room_id;
            $booking->start_date = $request->start_date;
            $booking->end_date = $request->end_date;
            $booking->start_time = $request->start_time;
            $booking->end_time = $request->end_time;
            $booking->status = 3; // Approved status for manual bookings
            $booking->type = 'manual';
            $booking->description = 'Manual booking created by admin';
            
            // Set required fields that might be null
            $booking->chairman = 'Admin';
            $booking->number_of_participants = 0;
            $booking->room_plan = 'N/A';
            $booking->secretariat_name = 'Admin';
            $booking->secretariat_mobile_phone = 'N/A';
            $booking->secretariat_email = 'admin@example.com';

            // Handle file upload if provided
            if ($request->hasFile('agenda_attachment')) {
                $file = $request->file('agenda_attachment');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/agendas'), $fileName);
                $booking->agenda_attachment = $fileName;
            }

            $booking->save();

            return redirect()->route('calendar')->with('success', 'Tempahan manual berjaya dicipta.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ralat semasa mencipta tempahan. Sila cuba lagi.');
        }
    }

    /**
     * Get event type based on meeting name
     */
    private function getEventType($meetingName)
    {
        $lowerName = strtolower($meetingName);
        
        // Check for interview/temuduga keywords
        if (str_contains($lowerName, 'temuduga') || 
            str_contains($lowerName, 'interview') || 
            str_contains($lowerName, 'ujian')) {
            return 'TEMUDUGA';
        }
        
        // Check for meeting/mesyuarat keywords
        if (str_contains($lowerName, 'mesyuarat') || 
            str_contains($lowerName, 'meeting') || 
            str_contains($lowerName, 'perbincangan') ||
            str_contains($lowerName, 'latihan')) {
            return 'MESYUARAT';
        }
        
        // Default to meeting
        return 'MESYUARAT';
    }

    /**
     * Get event color based on booking status
     */
    private function getEventColor($status)
    {
        switch ($status) {
            case 1: // New
                return '#007bff'; // Blue
            case 2: // Pending
                return '#ffc107'; // Yellow
            case 3: // Approved
                return '#28a745'; // Green
            case 4: // Rejected
                return '#dc3545'; // Red
            default:
                return '#6c757d'; // Gray
        }
    }
} 