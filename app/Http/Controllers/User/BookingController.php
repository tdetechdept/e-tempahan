<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function adHoc()
    {
        // Logic to show user's ad-hoc bookings
        return view('user.booking.adhoc.index');
    }
}
