<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::role('User')->get();
        return view("admin.users.index")->with("users", $users);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $user = User::role('User')->find($id);
        return view("admin.users.show")->with("user", $user);
    }
    public function deactivate(string $id)
    {
        $user = User::role('User')->find($id);
        if ($user) {
            $user->status = '5';
            $user->save();
            return redirect()->route('users.deactivate.success')->with('success', 'User deactivated successfully.');
        }
        return redirect()->route('users.deactivate.success')->with('error', 'User not found.');
    }

    public function deactivateSuccess()
    {
        return view("admin.users.status");
    }

    public function edit(string $id)
    {
        $user = User::role('User')->findOrFail($id);
        return view("admin.users.edit", compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'           => 'max:255',
            'identity_card'  => 'max:50',
            'position'       => 'max:100',
            'grade'          => 'max:50',
            'section'        => 'max:100',
            'phone_office'   => 'max:20',
            'phone_mobile'   => 'max:20',
            'email'          => 'max:255',
        ]);

        $user = User::role('User')->findOrFail($id);

        $user->update([
            'name'            => $validated['name'],
            'id_number'       => $validated['identity_card'],
            'position'        => $validated['position'],
            'grade'           => $validated['grade'],
            'section'         => $validated['section'],
            'office_number'    => $validated['phone_office'],
            'phone_number'    => $validated['phone_mobile'],
            'email'           => $validated['email'],
        ]);

       return view('admin.users.success-update');
    }

    public function destroy(string $id)
    {
        //
    }
}
