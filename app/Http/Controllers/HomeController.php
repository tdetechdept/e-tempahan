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
        if(auth()->user()->role == 'User') {
            // If the user is a regular user, redirect to the user home view

                $newBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 1)->get();
                $approvedBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 3)->get();
                $waitBookings = Booking::with('user', 'room')->where('user_id', auth()->id())->where('status', 2)->get();

            return view('user.home', compact('newBookings', 'approvedBookings', 'waitBookings'));
        }

        $totalUsers = User::count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $rooms = Room::latest()->take(5)->get(); 
        $users = User::latest()->take(5)->get(); 
        $bookings = Booking::with('user', 'room')->latest()->take(5)->get();
        return view('home',compact('totalUsers','totalRooms','totalBookings','rooms','users','bookings'));
    }
}
