<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Booking;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $organizations = Department::all(); 
        $reports = [];
        return view('admin.reports.index', compact('organizations', 'reports'));
    }

    public function dailyReport(Request $request)
    {
        $status = $request->status;
        $date = $request->hari ?? now()->toDateString();

        $bookings = Booking::whereDate('start_date', $date)
            ->when($status, fn($q) => $q->where('status', $status))
            ->with('room')
            ->get();

        $totalBookings = $bookings->count();
        $totalHours = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->end_time)->diffInHours(Carbon::parse($booking->start_time));
        });

        $statusLabels = [
            1 => 'Baru',
            2 => 'Belum Diproses',
            3 => 'Diluluskan',
            4 => 'Ditolak',
            5 => 'Dibatalkan',
        ];
        $statusText = $statusLabels[$status] ?? 'Semua Status';

        return view('admin.reports.daily', compact(
            'bookings',
            'date',
            'status',
            'statusText',
            'totalBookings',
            'totalHours'
        ));
    }

    public function weeklyReport(Request $request)
    {
        return $this->rangeBasedReport($request, 'weekly');
    }

    public function monthlyReport(Request $request)
    {
        return $this->rangeBasedReport($request, 'monthly');
    }

    public function yearlyReport(Request $request)
    {
        return $this->rangeBasedReport($request, 'yearly');
    }

    private function rangeBasedReport(Request $request, $type)
    {
        $status = $request->status;
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $bookings = Booking::whereDate('start_date', '>=', $startDate)
            ->whereDate('start_date', '<=', $endDate)
            ->when($status, fn($q) => $q->where('status', $status))
            ->with('room')
            ->get();

        $totalBookings = $bookings->count();
        $totalHours = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->end_time)->diffInHours(Carbon::parse($booking->start_time));
        });

        $statusLabels = [
            1 => 'Baru',
            2 => 'Belum Diproses',
            3 => 'Diluluskan',
            4 => 'Ditolak',
            5 => 'Dibatalkan',
        ];
        $statusText = $statusLabels[$status] ?? 'Semua Status';

        return view("admin.reports.$type", compact(
            'bookings',
            'startDate',
            'endDate',
            'status',
            'statusText',
            'totalBookings',
            'totalHours'
        ));
    }

    public function exportDailyPdf(Request $request)
    {
        $data = $this->getDailyReportData($request);
        return view('admin.reports.daily-pdf', $data);
    }
}
