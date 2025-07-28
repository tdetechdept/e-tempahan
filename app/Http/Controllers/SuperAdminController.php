<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class SuperAdminController extends Controller
{
    /**
     * Display the super admin dashboard
     */
    public function index()
    {
        try {
            // Fetch real data from database
            $totalUsers = User::count();
            $totalRooms = Room::count();
            $totalBookings = Booking::count();
            $users = User::latest()->take(5)->get();
            
            // Debug: Log the values
            \Log::info('SuperAdmin Dashboard Data:', [
                'totalUsers' => $totalUsers,
                'totalRooms' => $totalRooms,
                'totalBookings' => $totalBookings,
                'users_count' => $users->count()
            ]);
            
            return view('super_admin.super_admin', compact('totalUsers', 'totalRooms', 'totalBookings', 'users'));
        } catch (\Exception $e) {
            \Log::error('SuperAdmin Controller Error: ' . $e->getMessage());
            throw $e;
        }
    }
} 