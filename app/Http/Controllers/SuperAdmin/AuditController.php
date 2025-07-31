<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display all user audits
     */
    public function index(Request $request)
    {
        $query = Audit::query()->with(['user' => function ($query) {
            $query->withTrashed();
        }]);

        // Filter by user if requested
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter by event type
        if ($request->has('event')) {
            $query->where('event', $request->event);
        }

        // Filter by date range
        if ($request->has('date_from')) {
            $query->where('created_at', '>=', $request->date_from);
        }
        if ($request->has('date_to')) {
            $query->where('created_at', '<=', $request->date_to . ' 23:59:59');
        }

        $audits = $query->latest()->paginate(25);

        $users = User::withTrashed()->pluck('name', 'id');

        return view('superadmin.audits.index', compact('audits', 'users'));
    }

    /**
     * Show specific audit details
     */
    public function show(Audit $audit)
    {
        $audit->load(['user' => function ($query) {
            $query->withTrashed();
        }]);

        return view('superadmin.audits.show', compact('audit'));
    }

    /**
     * Export audits to CSV
     */
    public function export(Request $request)
    {
        $audits = Audit::query()
            ->when($request->user_id, fn($q, $id) => $q->where('user_id', $id))
            ->when($request->event, fn($q, $event) => $q->where('event', $event))
            ->when($request->date_from, fn($q, $date) => $q->where('created_at', '>=', $date))
            ->when($request->date_to, fn($q, $date) => $q->where('created_at', '<=', $date . ' 23:59:59'))
            ->with('user')
            ->latest()
            ->get();

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=audit_log_" . now()->format('Y-m-d') . ".csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($audits) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, [
                'ID',
                'Event',
                'User',
                'User Type',
                'IP Address',
                'Old Values',
                'New Values',
                'Timestamp'
            ]);

            // CSV data
            foreach ($audits as $audit) {
                fputcsv($file, [
                    $audit->id,
                    $audit->event,
                    $audit->user?->name ?? 'Deleted User',
                    $audit->user_type,
                    $audit->ip_address,
                    json_encode($audit->old_values),
                    json_encode($audit->new_values),
                    $audit->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}