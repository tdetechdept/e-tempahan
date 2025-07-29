<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    
        $users = $query->latest()->get();
    
        if ($request->ajax()) {
            return view('admin.users.partials.table', compact('users'))->render();
        }
    
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'position' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'office_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        
        // Generate a random password
        $password = Str::random(12);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        // Create user with default status as 'new' (0)
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($password),
            'position' => $data['position'] ?? null,
            'grade' => $data['grade'] ?? null,
            'section' => $data['section'] ?? null,
            'department' => $data['department'] ?? null,
            'office_number' => $data['office_number'] ?? null,
            'phone_number' => $data['phone_number'] ?? null,
            'image' => $data['image'] ?? null,
            'status' => 0, // New status
        ]);

        // Assign User role
        $user->assignRole('User');

        // Add custom audit message
        $user->auditEvent = 'user_registered_by_admin';
        $user->isCustomEvent = true;
        $user->save();

        // Send registration success email
        $this->sendRegistrationEmail($user, $password, true);

        return redirect()->route('admin.users.register.success')
            ->with('success', 'Pengguna berjaya didaftarkan dan emel notifikasi telah dihantar.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::role('User')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::role('User')->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::role('User')->findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'position' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'office_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
                unlink(public_path('uploads/users/' . $user->image));
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        // Update user
        $user->update($data);

        // Add custom audit message
        $user->auditEvent = 'user_updated_by_admin';
        $user->isCustomEvent = true;
        $user->save();

        return redirect()->route('admin.users.update.success')
            ->with('success', 'Maklumat pengguna berjaya dikemaskini.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::role('User')->findOrFail($id);
        
        // Soft delete or deactivate user
        $user->status = 5; // Deactivated
        $user->save();

        // Add custom audit message
        $user->auditEvent = 'user_deactivated_by_admin';
        $user->isCustomEvent = true;
        $user->save();

        return redirect()->route('admin.users.deactivate.success')
            ->with('success', 'Pengguna berjaya dinyahaktifkan.');
    }

    /**
     * Update user status (approve/reject)
     */
    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:1,2,3,5'
        ]);

        $oldStatus = $user->status;
        $user->status = $request->status;
        $user->save();

        // Add custom audit message
        $user->auditEvent = 'user_status_updated_by_admin';
        $user->isCustomEvent = true;
        $user->save();

        // Send appropriate email based on status
        switch ($user->status) {
            case 2: // Approved
                $this->sendRegistrationEmail($user, null, true);
                return redirect()->route('admin.users.register.success')
                    ->with('success', 'Pengguna diluluskan dan emel notifikasi telah dihantar.');
            
            case 3: // Rejected
                $this->sendRegistrationEmail($user, null, false);
                return redirect()->route('admin.users.register.unsuccess')
                    ->with('error', 'Pendaftaran pengguna ditolak dan emel notifikasi telah dihantar.');
            
            case 5: // Deactivated
                return redirect()->route('admin.users.deactivate.success')
                    ->with('success', 'Pengguna berjaya dinyahaktifkan.');
            
            default:
                return redirect()->back()
                    ->with('success', 'Status pengguna berjaya dikemaskini.');
        }
    }

    /**
     * Show registration success page
     */
    public function registerSuccess()
    {
        return view('admin.users.register-success');
    }

    /**
     * Show registration unsuccess page
     */
    public function registerUnsuccess()
    {
        return view('admin.users.register-unsuccess');
    }

    /**
     * Show update success page
     */
    public function updateSuccess()
    {
        return view('admin.users.success-update');
    }

    /**
     * Show deactivate success page
     */
    public function deactivateSuccess()
    {
        return view('admin.users.success-deactivate');
    }

    /**
     * Send registration email to user
     */
    private function sendRegistrationEmail(User $user, $password = null, $isSuccess = true)
    {
        $subject = $isSuccess ? 'Pendaftaran Berjaya - Sistem Tempahan Bilik' : 'Pendaftaran Tidak Berjaya - Sistem Tempahan Bilik';
        
        $data = [
            'user' => $user,
            'password' => $password,
            'isSuccess' => $isSuccess,
        ];

        // You can create email templates in resources/views/emails/
        // For now, we'll use a simple text email
        Mail::send('emails.user-registration', $data, function($message) use ($user, $subject) {
            $message->to($user->email)
                    ->subject($subject);
        });
    }


} 