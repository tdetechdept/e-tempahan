<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::role('User')->get();
    //     return view("admin.users.index")->with("users", $users);
    // }

    public function index(Request $request)
    {
        $filter = strtolower($request->get('filter', 'all'));
    
        $query = User::role('User');
    
        $statusMap = [
            'new' => 0,
            'pending' => 1,
            'approved' => 2,
            'rejected' => 3,
            'cancelled' => 4,
        ];
    
        if ($filter !== 'all' && isset($statusMap[$filter])) {
            $query->where('status', $statusMap[$filter]);
        }
    
        $users = $query->get();
    
        if ($request->ajax()) {
            return view('admin.users.partials.table', compact('users'))->render(); // <tbody> only
        }
    
        return view('admin.users.index', compact('users'));
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
        return view("admin.users.success-deactivate");
    }

    public function edit(string $id)
    {
        $user = User::role('User')->findOrFail($id);
        return view("admin.users.edit", compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name'           => 'required|string',
            'identity_card'  => 'nullable|string',
            'position'       => 'nullable|string',
            'grade'          => 'nullable|string',
            'section'        => 'nullable|string',
            'phone_office'   => 'nullable|string',
            'phone_mobile'   => 'nullable|string',
            'email'          => 'required|email|max:255|unique:users,email,' . $id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  
                ->withInput();         
        }
        
        $validated = $validator->validated();
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
