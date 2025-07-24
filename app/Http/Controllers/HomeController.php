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
        $totalUsers = User::count();
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $rooms = Room::get();
        $users = User::get();
        $bookings = Booking::with('user', 'room')->get();
        return view('home',compact('totalUsers','totalRooms','totalBookings','rooms','users','bookings'));
    }
}
