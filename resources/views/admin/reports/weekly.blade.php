@extends('layouts.main.app')

@section('title', 'Laporan Tempahan Mingguan')

@section('content')
<main class="main-content">
    <div class="content-card">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Laporan Tempahan Mingguan</h3>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6">
                <p><strong>Tarikh Mula:</strong> {{ \Carbon\Carbon::parse($startDate)->format('d F Y') }}</p>
                <p><strong>Tarikh Tamat:</strong> {{ \Carbon\Carbon::parse($endDate)->format('d F Y') }}</p>
                <p><strong>Status Permohonan:</strong> {{ $statusText }}</p>
            </div>
            <div class="col-sm-6">
                <p><strong>Jumlah Tempahan:</strong> {{ $totalBookings }}</p>
                <p><strong>Jumlah Masa Digunakan:</strong> {{ $totalHours }} jam</p>
            </div>
        </div>

        <h5 class="mb-3">Senarai Tempahan</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Bil</th>
                        <th>Tarikh Tempahan</th>
                        <th>Nama Mesyuarat</th>
                        <th>Bilik</th>
                        <th>Masa Mesyuarat</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d F Y') }}</td>
                            <td>{{ $booking->meeting_name }}</td>
                            <td>{{ $booking->room->room_name ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</td>
                            <td>{{ $booking->getStatusNameAttribute() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tiada tempahan dijumpai</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-right mt-4">
            <button class="btn btn-outline-secondary">Cetak Butiran</button>
            <button class="btn btn-outline-primary">Export Butiran</button>
        </div>
    </div>
</main>
@endsection
