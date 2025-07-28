<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    /**
     * Display the user management page
     */
    public function pengurusanPengguna()
    {
        return view('super_admin.user-management.pengurusan_pengguna');
    }

    /**
     * Display the user information page
     */
    public function maklumatPengguna()
    {
        return view('super_admin.user-management.user-information.maklumat_pengguna');
    }

    /**
     * Display the user information edit page
     */
    public function maklumatPenggunaEdit()
    {
        return view('super_admin.user-management.user-information-edit.Maklumat_Pengguna2');
    }

    /**
     * Display the user registered success page
     */
    public function userRegisteredSuccess()
    {
        return view('super_admin.user-successfully-registered.Pengguna_berjaya_didaftarkan');
    }
} 