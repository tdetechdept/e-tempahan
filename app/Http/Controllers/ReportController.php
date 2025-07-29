<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display the report page
     */
    public function index()
    {
        return view('super_admin.report.report');
    }
} 