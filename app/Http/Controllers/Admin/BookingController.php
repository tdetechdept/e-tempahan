<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
// use Barryvdh\DomPDF\Facade\Pdf;
use Symfony\Component\HttpFoundation\Response;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = strtolower($request->get('filter', 'all'));

        $query = Booking::with(['user', 'room']);

        if ($filter !== 'all') {
            $statusMap = [
                'new' => 1,
                'pending' => 2,
                'approved' => 3,
                'rejected' => 4,
                'cancelled' => 5,
            ];

            if (isset($statusMap[$filter])) {
                $query->where('status', $statusMap[$filter]);
            }
        }

        $bookings = $query->orderBy('start_date', 'desc')->get();

        // AJAX response
        if ($request->ajax()) {
            return view('admin.booking.partials.table', compact('bookings'))->render();
        }

        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with('user', 'room')->findOrFail($id); // Automatically throws 404 if not found
        return view('admin.booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        \Log::info('Update called', ['id' => $id, 'input' => $request->all()]);
        $booking = Booking::findOrFail($id);
        $request->validate([
            'update_info' => 'nullable|string|max:5000',
            'reviews' => 'nullable|string|max:5000',
        ]);
        $booking->update([
            'update_info' => $request->update_info,
            'reviews' => $request->reviews,
        ]);
        if ($request->action === 'reject') {
            $booking->status = 4; // Rejected
            $booking->save();
            return view('admin.booking.rejected', compact('booking'));
        } elseif ($request->action === 'pass') {
            $booking->status = 3; // Approved
            $booking->save();
            return view('admin.booking.approved', compact('booking'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /**
     * Cancel Booking start code.
     */
    public function cancelBookingindex(Request $request)
    {
        // Map string filters to status values
        $statusMap = [
            'new' => 1,
            'pending' => 2,
            'approved' => 3,
            'rejected' => 4,
            'cancelled' => 5,
        ];

        $query = Booking::with(['user', 'room']);

        // Filter by status if applicable
        if ($request->filled('filter') && strtolower($request->filter) !== 'all') {
            $filterKey = strtolower($request->filter);
            if (isset($statusMap[$filterKey])) {
                $query->where('status', $statusMap[$filterKey]);
            }
        }

        // Search by user name, email, or room name
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
                })->orWhereHas('room', function ($rq) use ($search) {
                    $rq->where('name', 'like', "%{$search}%");
                });
            });
        }

        $bookings = $query->orderBy('start_date', 'desc')->paginate(10)->withQueryString();

        // AJAX request: return only the table HTML
        if ($request->ajax()) {
            return view('admin.booking.cancel.partials.table', compact('bookings'))->render();
        }

        // Full view load
        $view = $request->get('view', 'admin.booking.cancel.index');
        return view($view, compact('bookings'));
    }
    public function cancelShowBooking(string $id)
    {
        $booking = Booking::with('user', 'room')->findOrFail($id);
        return view('admin.booking.cancel.show', compact('booking'));
    }
    public function cancel($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 5; // Cancelled
        $booking->save();
        return view('admin.booking.cancel.cancel', compact('booking'));
    }

    public function downloadPDF(Request $request, $id)
    {
        \Log::info('downloadPDF called', ['id' => $id, 'input' => $request->all()]);

        $booking = Booking::with(['user', 'room'])->findOrFail($id);

        if ($request->has('update_info')) {
            $booking->update_info = $request->update_info;
        }

        if ($request->has('reviews')) {
            $booking->reviews = $request->reviews;
        }

        if ($request->action === 'pass') {
            $booking->status = 3; // Approved
        }

        $booking->save();

        // Render HTML from view
        $html = View::make('pdf.approved', compact('booking'))->render();

        // Create mPDF instance
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);
        $fileName = "Application_{$id}_Approved.pdf";

        return response($mpdf->Output($fileName, 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "attachment; filename=\"$fileName\"");

        // if ($request->has('print')) {
        //     // 'I' = open in browser
        //     return response($mpdf->Output($fileName, 'I'), 200)
        //         ->header('Content-Type', 'application/pdf');
        // }
           
        // // 'D' = download
        // return response($mpdf->Output($fileName, 'D'), 200)
        //     ->header('Content-Type', 'application/pdf'); 
    }

    

    public function approved($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.approved', compact('booking'));
    }
}
