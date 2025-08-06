<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Chairman;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($status)
    {
        // Logic to fetch bookings based on status
        if($status == 0) {
            $bookings = Booking::where('user_id', auth()->id())
                ->get();
        }else{
            $bookings = Booking::where('user_id', auth()->id())
                ->where('status', $status)
                ->get();
        }

        return view('user.booking.index', compact('bookings', 'status'));
    }
    
    public function search()
    {
        $rooms = Room::where('status', true)->get();
        return view('user.booking.search.index', compact('rooms'));
    }

    public function searchResult(Request $request)
    {
        $room = Room::query()
            ->where('status', true)
            ->where('room_capacity', '>=',  $request->participants )
            // ->orWhere('id', 'like', '%' . $request->roomName . '%')
            // ->orWhere('level', 'like', '%' . $request->roomLevel . '%')
            ->get();

            $details = [
                'date' => $request->date,
                'start' => $request->starttime,
                'end' => $request->endtime,
            ];

        return view('user.booking.search.roomlist', compact('room', 'details'));
    }

    /**
     * Display the specified resource.
     */
    public function searchView(string $id)
    {   
        $bookDate = request()->date;
        $startTime = request()->start;
        $endTime = request()->end;

        $status = true;

        function isTimeBetween(string $checkTime, string $startTime, string $endTime): bool {
            // Convert time strings to Unix timestamps.
            // Prepending a dummy date like '2000-01-01' ensures that strtotime()
            // correctly interprets the time without considering the actual date.
            $checkTimestamp = strtotime('2000-01-01 ' . $checkTime);
            $startTimestamp = strtotime('2000-01-01 ' . $startTime);
            $endTimestamp = strtotime('2000-01-01 ' . $endTime);

            // Handle cases where the time range crosses midnight (e.g., 22:00 to 06:00)
            if ($startTimestamp > $endTimestamp) {
                return ($checkTimestamp >= $startTimestamp || $checkTimestamp <= $endTimestamp);
            } else {
                return ($checkTimestamp >= $startTimestamp && $checkTimestamp <= $endTimestamp);
            }
        }


        // Logic to show the details of a specific room
        // This could include checking availability based on the date and time provided
        $bookings = Booking::where('room_id', $id)->where('start_date', $bookDate)->get();

        foreach($bookings as $book){
            $start = $book->start_time->format('H:i');
            $end = $book->end_time->format('H:i');

            if(isTimeBetween($startTime, $start, $end) || isTimeBetween($endTime, $start, $end)){
                $status = false;
                break;
            }

        }


        $room = Room::findOrFail($id);

        return view('user.booking.search.view', compact('room', 'status'));
    }

    public function newBooking($user, $room)
    {   
        $chairmans = Chairman::all();
        $allrooms = Room::where('status', true)->get();
        $room = Room::findOrFail($room);
        $user = User::findOrFail($user);

        return view('user.booking.book.create', compact('room', 'user', 'allrooms','chairmans'));
    }


    public function adHoc()
    {
        // Logic to show user's ad-hoc bookings
        return view('user.booking.adhoc.index');
    }

    public function store(Request $request)
    {

        // Handle image upload
        if ($request->hasFile('other_layout_plan')) {
            $image = $request->file('other_layout_plan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/bookings/layout'), $imageName);
            $data['other_layout_plan'] = $imageName;
        }
        // dd($request->equipment);
        // Logic to store a new booking
        $booking = new Booking();
        $booking->user_id = auth()->id();
        $booking->meeting_name = $request->meeting_name;
        $booking->chairman = $request->chairman;
        $booking->start_date = $request->start_date;
        $booking->end_date = $request->end_date;
        $booking->start_time = $request->start_time;
        $booking->end_time = $request->end_time;
        $booking->number_of_participants = $request->number_of_participants;
        $booking->description = $request->description;
        $booking->room_id = $request->room_id;
        $booking->type = $request->type;

        $booking->status = 1; // New status

        $booking->repetition_type = $request->repetition_type;
        $booking->repeat_date = $request->repeat_date;
        $booking->room_plan = $request->room_plan;
        $booking->other_layout_plan = $imageName ?? NULL;

        $booking->secretariat_name = $request->secretariat_name;
        $booking->secretariat_office_phone = $request->secretariat_office_phone;
        $booking->secretariat_mobile_phone = $request->secretariat_mobile_phone;
        $booking->secretariat_email = $request->secretariat_email;

        $booking->food = $request->food ? 1 : 0;
        $booking->catering_name = $request->catering_name ?? 'N/A';
        $booking->catering_phone = $request->catering_phone ?? 'N/A';
        $booking->car_number = $request->car_number ?? 'N/A';

        $booking->technical_services = $request->technical_services ? 1 : 0;
        $booking->ict_services = $request->ict_services ? 1 : 0;

        $booking->equipment = json_encode($request->equipment);
        $booking->save();

        return redirect()->route('user.booking.list', ['status' => 0])
            ->with('success', 'Booking created successfully.');
    }

    public function show(string $id)
    {
        $booking = Booking::with('user', 'room')->findOrFail($id); // Automatically throws 404 if not found
        return view('user.booking.view', compact('booking'));
    }

    public function edit(string $id)
    {
        $booking = Booking::with('user', 'room')->findOrFail($id); // Automatically throws 404 if not found
        $chairmans = Chairman::all();
        $allrooms = Room::where('status', true)->get();
        $room = Room::findOrFail($booking->room_id);
        $user = User::findOrFail($booking->user_id);
        return view('user.booking.book.edit', compact('booking', 'room', 'user', 'allrooms','chairmans'));
    }

    public function update(Request $request, string $id)
    {
        \Log::info('Update called', ['id' => $id, 'input' => $request->all()]);

        $booking = Booking::findOrFail($id); // Automatically throws 404 if not found

        $oldStatus = $booking->status;
        $oldChairman = $booking->chairman;
        $oldUpdatedFieldInfo = $booking->updated_field_info;
        $oldStartTime = $booking->start_time;
        $oldEndTime = $booking->end_time;


        if($booking->chairman !== $request->chairman && (($booking->start_time)->format('H:i') !== $request->start_time || ($booking->end_time)->format('H:i') !== $request->end_time)){
            $info = 'Chairman and Time change';
        }elseif($booking->chairman !== $request->chairman){
            $info = 'Chairman change';
        }elseif(($booking->start_time)->format('H:i') !== $request->start_time || ($booking->end_time)->format('H:i') !== $request->end_time){
            $info = 'Time change';
        }else{
            $info = 'UNKNOWN';
        }
        
        $booking->update([
            'updated_field_info' => $info,
            'chairman' => $request->chairman,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 6,
        ]);

        // Log update if no status change
        if ($oldChairman !== $request->chairman  || $oldUpdatedFieldInfo !== $info || $oldStartTime !== $request->start_time || $oldEndTime !== $request->end_time) {
            $booking->auditEvent = 'booking_updated_by_user';
            $booking->isCustomEvent = true;
            $booking->save();
        }

        return redirect()->back()->with('msg', 'Tempahan ada telah berjaya dikemaskini');
    }

    public function cancel(Request $request, string $id)
    {
        \Log::info('Update called', ['id' => $id, 'input' => $request->all()]);
        $booking = Booking::findOrFail($id);
        
        $request->validate([
            'update_info' => 'nullable|string|max:5000',
            'reviews' => 'nullable|string|max:5000',
        ]);
        
        $oldStatus = $booking->status;
        $oldUpdateInfo = $booking->update_info;
        $oldReviews = $booking->reviews;
        
        
        if ($request->action === 'reject') {
            $booking->status = 5; // Cancel by User
            $booking->reviews = $request->reviews;
            $booking->save();
            
            // Add custom audit event for rejection
            $booking->auditEvent = 'booking_cancel_by_user';
            $booking->isCustomEvent = true;
            $booking->save();
            
            return view('user.booking.rejected', compact('booking'));
        } 
        
        // Log update if no status change
        if ($oldUpdateInfo !== $request->update_info || $oldReviews !== $request->reviews) {
            $booking->auditEvent = 'booking_cancel_by_user';
            $booking->isCustomEvent = true;
            $booking->save();
        }
    }

    public function confirm(Request $request, string $id)
    {
        \Log::info('Update called', ['id' => $id, 'input' => $request->all()]);
        $booking = Booking::findOrFail($id);
        
        $oldStatus = $booking->status;
        
        $booking->status = 7; // Confirm by User
        $booking->save();
        
        // Add custom audit event for rejection
        $booking->auditEvent = 'booking_confirm_by_user';
        $booking->isCustomEvent = true;
        $booking->save();
        
        return view('user.booking.confirm', compact('booking'));
        
        // Log update if no status change
        if ($oldStatus !== $request->status) {
            $booking->auditEvent = 'booking_cancel_by_user';
            $booking->isCustomEvent = true;
            $booking->save();
        }
    }
}
