<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all(); // fetch all roles
        return view('admin.users.create', compact('roles'));
    }
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
            'deactivated' => 5,
        ];
    
        if ($filter !== 'all' && isset($statusMap[$filter])) {
            $query->where('status', $statusMap[$filter]);
        }
    
        $users = $query->get();
    
        // Define status labels for the view
        $statusLabels = [
            0 => 'BAHARU',
            1 => 'AKTIF', 
            2 => 'DILULUSKAN',
            3 => 'DITOLAK',
            4 => 'DIBATALKAN',
            5 => 'NYAHAKTIF',
        ];
    
        if ($request->ajax()) {
            return view('admin.users.partials.table', compact('users', 'statusLabels'))->render(); // <tbody> only
        }
    
        return view('admin.users.index', compact('users', 'statusLabels'));
    }
   

    public function store(Request $request)
    {
        // Validate required fields
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', 
            'role' => 'required|string|exists:roles,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'position' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'phone_office' => 'nullable|string|max:20',
            'phone_mobile' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        // Create user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'position' => $data['position'] ?? null,
            'grade' => $data['grade'] ?? null,
            'section' => $data['section'] ?? null,
            'department' => $data['department'] ?? null,
            'phone_number' => $data['phone_mobile'] ?? null,
            'office_number' => $data['phone_office'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => 0, // New status
        ]);

        // Assign role
        $user->assignRole($data['role']);

        return view("admin.users.register-success");
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

            // Update user - audit will be automatically logged here
            $user->update([
                'name' => $validated['name'],
                'id_number' => $validated['identity_card'] ?? $user->id_number,
                'position' => $validated['position'],
                'grade' => $validated['grade'],
                'section' => $validated['section'],
                'office_number' => $validated['phone_office'],
                'phone_number' => $validated['phone_mobile'],
                'email' => $validated['email'],
            ]);
            

       return view('admin.users.success-update');
    }

    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request, User $user)
    {
        
        $request->validate([
            'status' => 'required|in:1,2,3,5'
        ]);
        

        $user->status = $request->status;
        $user->save();

        switch ($user->status) {
            case 1:
                return view("admin.users.register-success");
            case 2:
                return redirect()->route('users.index')->with('success', 'Pengguna berjaya diaktifkan.');
            case 3:
               return view("admin.users.register-unsuccess");
            case 5:
                return redirect()->route('users.index')->with('success', 'Pengguna berjaya dinyahaktifkan.');
            default:
                return redirect()->route('users.index')->with('success', 'Status pengguna berjaya dikemaskini.');
        }
    }

}
