<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index($user_id)
    {
        // Fetch all bookings with their related data
        $bookings = Booking::with(['user', 'room'])
            ->where('user_id', $user_id) // all auth user bookings
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

        return view('user.calendar.index', compact('bookings'));
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
            case 5: // Rejected
                return '#dc3545'; // Red
            default:
                return '#6c757d'; // Gray
        }
    }
}
