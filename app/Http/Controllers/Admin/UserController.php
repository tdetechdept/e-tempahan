<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use OwenIt\Auditing\Models\Audit;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = strtolower($request->get('filter', 'all'));

        // Base query: only statuses 0 and 1
        $query = User::role('User')->whereIn('status', [0, 1]);

        $statusMap = [
            'new' => 0,
            'active' => 1,
        ];

        // Apply filter only if specific (new/active)
        if (isset($statusMap[$filter])) {
            $query->where('status', $statusMap[$filter]);
        }

        $users = $query->get();

        // Labels for statuses
        $statusLabels = [
            0 => 'BAHARU',
            1 => 'AKTIF',
        ];

        if ($request->ajax()) {
            return view('admin.users.partials.table', compact('users', 'statusLabels'))->render();
        }

        return view('admin.users.index', compact('users', 'statusLabels'));
    }

     public function approve(User $user)
    {
        // Only approve if status is 0
        if ($user->status == 0) {
            $user->update(['status' => 1]);
        }

        return response()->json(['success' => true]);
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

        try {
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
            $user->auditEvent = 'user_created_by_admin';
            $user->isCustomEvent = true;
            $user->save();

            // Send registration success email with credentials
            $emailSent = $this->sendRegistrationEmail($user, $password, true);

            if ($emailSent) {
                return redirect()->route('admin.users.register.success')
                    ->with('success', 'Pengguna berjaya didaftarkan dan emel notifikasi dengan maklumat log masuk telah dihantar.');
            } else {
                return redirect()->route('admin.users.register.success')
                    ->with('warning', 'Pengguna berjaya didaftarkan tetapi emel notifikasi tidak dapat dihantar. Sila hubungi pentadbir sistem.');
            }

        } catch (\Exception $e) {
            \Log::error('Admin user creation failed: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ralat berlaku semasa mendaftarkan pengguna. Sila cuba lagi.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Fix: fetch all roles
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        // Debug: Log the request data
        \Log::info('User update request for ID: ' . $id);
        \Log::info('Request data: ' . json_encode($request->all()));
        \Log::info('Has file: ' . ($request->hasFile('image') ? 'Yes' : 'No'));

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'position' => 'nullable|string|max:255',
            'grade' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'office_number' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'role' => 'required|exists:roles,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $originalData = $user->toArray();

        // Handle image upload
        if ($request->hasFile('image')) {
            \Log::info('Processing image upload...');
            
            // Delete old image if exists
            if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
                unlink(public_path('uploads/users/' . $user->image));
                \Log::info('Deleted old image: ' . $user->image);
            }
            
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
            
            \Log::info('Image uploaded: ' . $imageName);
        } else {
            \Log::info('No image file in request');
        }

        // Update user
        $user->update(Arr::except($data, ['role']));

        // ✅ Update role using Spatie
        $user->syncRoles($data['role']);

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
        $user = User::findOrFail($id);
        
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

        // Add custom audit message based on status change
        switch ($user->status) {
            case 1: // Pending
                $user->auditEvent = 'user_status_changed_to_pending_by_admin';
                break;
            case 2: // Approved
                $user->auditEvent = 'user_status_changed_to_approved_by_admin';
                break;
            case 3: // Rejected
                $user->auditEvent = 'user_status_changed_to_rejected_by_admin';
                break;
            case 5: // Deactivated
                $user->auditEvent = 'user_status_changed_to_deactivated_by_admin';
                break;
            default:
                $user->auditEvent = 'user_status_updated_by_admin';
        }
        
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
        try {
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

            \Log::info('Admin registration email sent successfully to: ' . $user->email);
            return true;

        } catch (\Exception $e) {
            \Log::error('Failed to send admin registration email to ' . $user->email . ': ' . $e->getMessage());
            return false;
        }
    }
} 