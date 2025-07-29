<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        // Logic to show user profile
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        // Logic to update user profile
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'id_number' => 'required',
            'position' => 'required',
            'grade' => 'required',
            'section' => 'required',
            'department' => 'required',
            'office_number' => 'required',
            'phone_number' => 'required',
            // Add other fields as necessary
        ]);

        auth()->user()->update($data);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully.');
    }
    public function changePassword(Request $request)
    {
        // Logic to change user password
        $data = $request->validate([
            // 'current_password' => 'required|string',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // if (!auth()->attempt(['email' => auth()->user()->email, 'password' => $data['current_password']])) {
        //     return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        // }

        auth()->user()->update(['password' =>  Hash::make($data['password'])]);

        return redirect()->route('profile.index')->with('success', 'Password changed successfully.');
    }
}
