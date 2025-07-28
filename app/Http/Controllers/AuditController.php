<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display the audit page
     */
    public function index(Request $request)
    {
        $query = Audit::with('user')
            ->select('audits.*', 'users.name as user_name', 'users.department', 'users.section')
            ->leftJoin('users', 'audits.user_id', '=', 'users.id');

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('audits.created_at', $request->date);
        }

        // Filter by user name
        if ($request->filled('username')) {
            $query->where('users.name', 'like', '%' . $request->username . '%');
        }

        $audits = $query->orderBy('audits.created_at', 'desc')->paginate(15);

        return view('super_admin.audit.Audit', compact('audits'));
    }

    /**
     * Display the record user activity page
     */
    public function recordUserActivity($id)
    {
        $audit = Audit::with('user')->findOrFail($id);
        return view('super_admin.audit.record-user-activity.Log_Details_Information', compact('audit'));
    }
} 