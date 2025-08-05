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
        $totalMinutes = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->start_time)->diffInMinutes(Carbon::parse($booking->end_time));
        });

        $totalHours = $totalMinutes / 60;

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
        $status = $request->status;
        $start = $request->start_date;
        $end = $request->end_date;

        $bookings = Booking::whereBetween('start_date', [$start, $end])
            ->when($status, fn($q) => $q->where('status', $status))
            ->with('room')
            ->get();

        $totalBookings = $bookings->count();
        $totalMinutes = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->start_time)->diffInMinutes(Carbon::parse($booking->end_time));
        });

        $totalHours = $totalMinutes / 60;

        $statusLabels = [
            1 => 'Baru',
            2 => 'Belum Diproses',
            3 => 'Diluluskan',
            4 => 'Ditolak',
            5 => 'Dibatalkan',
        ];
        $statusText = $statusLabels[$status] ?? 'Semua Status';

        return view('admin.reports.weekly', compact(
            'bookings',
            'start',
            'end',
            'status',
            'statusText',
            'totalBookings',
            'totalHours'
        ));
    }

    public function monthlyReport(Request $request)
    {
        $status = $request->status;
        $month = $request->month; // Format: YYYY-MM


        if (!$month) {
            return back()->with('error', 'Sila pilih bulan terlebih dahulu.');
        }

        $startOfMonth = Carbon::parse($month)->startOfMonth();
        $endOfMonth = Carbon::parse($month)->endOfMonth();

        $bookings = Booking::whereBetween('start_date', [$startOfMonth, $endOfMonth])
            ->when($status, fn($q) => $q->where('status', $status))
            ->with('room')
            ->get();

        $totalBookings = $bookings->count();
        $totalMinutes = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->start_time)->diffInMinutes(Carbon::parse($booking->end_time));
        });

        $totalHours = $totalMinutes / 60;
        $statusLabels = [
            1 => 'Baru',
            2 => 'Belum Diproses',
            3 => 'Diluluskan',
            4 => 'Ditolak',
            5 => 'Dibatalkan',
        ];
        $statusText = $statusLabels[$status] ?? 'Semua Status';

        return view('admin.reports.monthly', compact(
            'bookings',
            'month',
            'status',
            'statusText',
            'totalBookings',
            'totalHours'
        ));
    }

    public function yearlyReport(Request $request)
    {
        $status = $request->status;
        $year = $request->year ?? now()->year;

        $bookings = Booking::whereYear('start_date', $year)
            ->when($status, fn($q) => $q->where('status', $status))
            ->with('room')
            ->get();

        $totalBookings = $bookings->count();
        $totalMinutes = $bookings->sum(function ($booking) {
            return Carbon::parse($booking->start_time)->diffInMinutes(Carbon::parse($booking->end_time));
        });

        $totalHours = $totalMinutes / 60;
        $statusLabels = [
            1 => 'Baru',
            2 => 'Belum Diproses',
            3 => 'Diluluskan',
            4 => 'Ditolak',
            5 => 'Dibatalkan',
        ];
        $statusText = $statusLabels[$status] ?? 'Semua Status';

        return view('admin.reports.yearly', compact(
            'bookings',
            'year',
            'statusText',
            'totalBookings',
            'totalHours'
        ));
    }

}
