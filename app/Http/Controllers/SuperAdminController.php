<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;
use App\Models\SpecialHoliday;

class SuperAdminController extends Controller
{
    /**
     * Display the super admin dashboard
     */
    public function index()
    {
        try {
            // Fetch real data from database
            $rooms = Room::latest()->take(5)->get(); 
            $bookings = Booking::with('user', 'room')->latest()->take(5)->get();

            $totalUsers = User::count();
            $totalRooms = Room::count();
            $totalBookings = Booking::count();
            $users = User::latest()->take(5)->get();
            
            // Fetch all active special holidays (JavaScript will filter by month)
            $specialHolidays = SpecialHoliday::where('is_active', true)->get();
            
            // Debug: Log the values
            \Log::info('SuperAdmin Dashboard Data:', [
                'totalUsers' => $totalUsers,
                'totalRooms' => $totalRooms,
                'totalBookings' => $totalBookings,
                'users_count' => $users->count(),
                'special_holidays_count' => $specialHolidays->count()
            ]);
            
            return view('super_admin.super_admin', compact('totalUsers', 'totalRooms', 'totalBookings', 'users', 'specialHolidays', 'rooms', 'bookings'));
        } catch (\Exception $e) {
            \Log::error('SuperAdmin Controller Error: ' . $e->getMessage());
            throw $e;
        }
    }
} 