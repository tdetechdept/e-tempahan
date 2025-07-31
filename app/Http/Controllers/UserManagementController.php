<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserManagementController extends Controller
{
    /**
     * Display the user management page
     */
    public function pengurusanPengguna(Request $request)
    {
        $filter = strtolower($request->get('filter', 'semua'));
        $search = $request->get('search', '');
        $statusFilter = $request->get('status', 'semua');
        
        $query = User::role('User');
        
        // Apply search filter
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone_number', 'like', '%' . $search . '%')
                  ->orWhere('department', 'like', '%' . $search . '%')
                  ->orWhere('section', 'like', '%' . $search . '%');
            });
        }
        
        // Apply status filter
        $statusMap = [
            'aktif' => 2,
            'baharu' => 0,
            'diluluskan' => 2,
            'ditolak' => 3,
            'dibatalkan' => 4,
            'nyahaktif' => 5,
        ];
        
        if ($statusFilter !== 'semua' && isset($statusMap[$statusFilter])) {
            $query->where('status', $statusMap[$statusFilter]);
        }
        
        // Apply tab filter
        $tabMap = [
            'semua' => null,
            'baharu' => 0,
            'diluluskan' => 2,
            'ditolak' => 3,
            'dibatalkan' => 4,
        ];
        
        if ($filter !== 'semua' && isset($tabMap[$filter])) {
            $query->where('status', $tabMap[$filter]);
        }
        
        $users = $query->latest()->paginate(10);
        
        if ($request->ajax()) {
            return view('super_admin.user-management.partials.user-table', compact('users'))->render();
        }
        
        return view('super_admin.user-management.pengurusan_pengguna', compact('users', 'filter', 'search', 'statusFilter'));
    }

    /**
     * Display the user information page
     */
    public function maklumatPengguna($id = null)
    {
        if ($id) {
            $user = User::role('User')->findOrFail($id);
            return view('super_admin.user-management.user-information.maklumat_pengguna', compact('user'));
        }
        
        return view('super_admin.user-management.user-information.maklumat_pengguna');
    }

    /**
     * Display the user information edit page
     */
    public function maklumatPenggunaEdit($id = null)
    {
        if ($id) {
            $user = User::role('User')->findOrFail($id);
            return view('super_admin.user-management.user-information-edit.Maklumat_Pengguna2', compact('user'));
        }
        
        return view('super_admin.user-management.user-information-edit.Maklumat_Pengguna2');
    }

    /**
     * Display the user registration form
     */
    public function create()
    {
        return view('super_admin.user-management.create');
    }

    /**
     * Store new user
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:users,id_number',
            'email' => 'required|email|unique:users,email',
            'position' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'office_number' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        try {
            // Create user with default status as 'new' (0)
            $user = User::create([
                'name' => $data['name'],
                'id_number' => $data['id_number'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'position' => $data['position'],
                'grade' => $data['grade'],
                'section' => $data['section'],
                'department' => $data['department'],
                'office_number' => $data['office_number'],
                'phone_number' => $data['phone_number'],
                'image' => $data['image'] ?? null,
                'status' => 0, // New status
            ]);

            // Assign User role
            $user->assignRole('User');

            // Send registration success email with credentials
            $emailSent = $this->sendRegistrationEmail($user, $data['password'], true);

            if ($emailSent) {
                return redirect()->route('user_registered')
                    ->with('success', 'Pengguna berjaya didaftarkan dan emel notifikasi dengan maklumat log masuk telah dihantar.');
            } else {
                return redirect()->route('user_registered')
                    ->with('warning', 'Pengguna berjaya didaftarkan tetapi emel notifikasi tidak dapat dihantar. Sila hubungi pentadbir sistem.');
            }

        } catch (\Exception $e) {
            \Log::error('User creation failed: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ralat berlaku semasa mendaftarkan pengguna. Sila cuba lagi.')
                ->withInput();
        }
    }

    /**
     * Update user status
     */
    public function updateStatus(Request $request, User $user)
    {
        $request->validate([
            'status' => 'required|in:1,2,3,5'
        ]);

        $user->status = $request->status;
        $user->save();

        switch ($user->status) {
            case 2: // Approved
                $this->sendRegistrationEmail($user, null, true);
                return redirect()->route('pengurusan_pengguna')
                    ->with('success', 'Pengguna diluluskan dan emel notifikasi telah dihantar.');
            
            case 3: // Rejected
                $this->sendRegistrationEmail($user, null, false);
                return redirect()->route('pengurusan_pengguna')
                    ->with('error', 'Pendaftaran pengguna ditolak dan emel notifikasi telah dihantar.');
            
            case 5: // Deactivated
                return redirect()->route('pengurusan_pengguna')
                    ->with('success', 'Pengguna berjaya dinyahaktifkan.');
            
            default:
                return redirect()->route('pengurusan_pengguna')
                    ->with('success', 'Status pengguna berjaya dikemaskini.');
        }
    }

    /**
     * Update user details
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:users,id_number,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'position' => 'required|string|max:255',
            'grade' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'office_number' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/users'), $imageName);
            $data['image'] = $imageName;
        }

        try {
            $user->update($data);
            
            return redirect()->route('pengurusan_pengguna')
                ->with('success', 'Maklumat pengguna berjaya dikemaskini.');

        } catch (\Exception $e) {
            \Log::error('User update failed: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Ralat berlaku semasa mengemaskini maklumat pengguna. Sila cuba lagi.')
                ->withInput();
        }
    }

    /**
     * Display the user registered success page
     */
    public function userRegisteredSuccess()
    {
        return view('super_admin.user-successfully-registered.Pengguna_berjaya_didaftarkan');
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

            Mail::send('emails.user-registration', $data, function($message) use ($user, $subject) {
                $message->to($user->email)
                        ->subject($subject);
            });

            \Log::info('Registration email sent successfully to: ' . $user->email);
            return true;

        } catch (\Exception $e) {
            \Log::error('Failed to send registration email to ' . $user->email . ': ' . $e->getMessage());
            return false;
        }
    }
} 