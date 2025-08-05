<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Booking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if($user->role === 'SuperAdmin') {
            // If the user is a Super Admin, show the admin dashboard
            
            $users = User::latest()->take(5)->get(); 
            return redirect()->route('dashboard',compact('users'));
        }
        
        if($user->role === 'User') {
            // If the user is a regular user, redirect to the user home view

                $newBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 1)->get();
                $approvedBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 3)->get();
                $waitBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 2)->get();

                // COUNT
                $allBook = Booking::where('user_id', auth()->id())->count();
                $updateBook = Booking::where('user_id', auth()->id())->where('status', 6)->count();
                $cancelBook = Booking::where('user_id', auth()->id())->where('status', 5)->count();

            return view('user.home', compact('newBookings', 'approvedBookings', 'waitBookings', 'allBook', 'updateBook', 'cancelBook'));
        }

      
        if ($user->role === 'Admin') {
            // Admin-specific dashboard or summary
            $totalUsers = User::count();
            $totalRooms = Room::count();
            $totalBookings = Booking::count();
            $rooms = Room::latest()->take(5)->get(); 
            $users = User::latest()->take(5)->get(); 
            $bookings = Booking::with('user', 'room')->latest()->take(5)->get();
            $bookings = Booking::with('user', 'room')
                ->whereIn('status', [1, 2, 3])
                ->latest()
                ->take(5)
                ->get();
            return view('home', compact('totalUsers', 'totalRooms', 'totalBookings', 'rooms', 'users', 'bookings'));
        }

    }
}