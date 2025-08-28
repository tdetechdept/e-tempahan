@extends('layouts.main.app')

@section('title', 'Laporan Tempahan Harian')
@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Laporan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka </a>
            <span class="mx-2">/</span>
            <a href="{{ route('reports.index') }}" class="text-decoration-none text-dark">Laporan</a>
            <span class="mx-2">/</span>
            <a href="{{ route('reports.daily') }}" class="text-decoration-none breadcrumb-active">Laporan Tempahan Harian</a>
        </div>
    </div>
@endsection

@section('content')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Laporan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('reports.index') }}" class="text-decoration-none text-dark">Laporan</a>
            <span class="mx-2">/</span>
            <a href="{{ route('reports.daily') }}" class="text-decoration-none breadcrumb-active">Laporan Tempahan Harian</a>
        </div>
    </div>
@endsection

<style>
    .dropdown-menu::before {
    content: "";
    position: absolute;
    top: -10px;
    right: 20px;
    border-width: 0 10px 10px 10px;
    border-style: solid;
    border-color: transparent transparent #fff transparent;
}
</style>
    <main class="main-content">

        <!-- Main Report Card -->
        <div class="card shadow-sm border-0 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 font-weight-bold">Laporan Tempahan Harian</h4>
            </div>

            <!-- Summary -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <p><strong>Bahagian:</strong> {{ $organization->name ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Tarikh:</strong> {{ \Carbon\Carbon::parse($date)->format('d F Y') }}</p>
                    <p><strong>Status Permohonan:</strong> {{ $statusText }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Jumlah Tempahan:</strong> {{ $totalBookings }}</p>
                    <p><strong>Jumlah Masa Digunakan:</strong> {{ number_format($totalHours, 1) }} jam</p>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <h5 class="mb-3 font-weight-bold">Senarai Tempahan</h5>
                <div class="table-container">
                    <table id="booking-table" class="table mb-0 table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Bil</th>
                                <th>Tarikh Tempahana</th>
                                <th>Nama Mesyuarat</th>
                                <th>Bilik</th>
                                <th>Masa Mesyuarat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $index => $booking)
                                @php
                                    $totalMinutes = \Carbon\Carbon::parse($booking->start_time)->diffInMinutes(\Carbon\Carbon::parse($booking->end_time));
                                    $totalHours = number_format($totalMinutes / 60,2);
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d F Y') }}</td>
                                    <td>{{ $booking->meeting_name }}</td>
                                    <td>{{ $booking->room->room_name ?? '-' }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}
                                    </td>
                                    <td>
                                        @if ($booking->status == 3)
                                            <span class="badge badge-success">Diluluskan</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $booking->getStatusNameAttribute() }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center text-muted">Tiada tempahan dijumpai</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex justify-content-end mt-4">
                <button class="btn btn-outline-secondary mr-2">Cetak Butiran</button>

                <div class="dropdown">
                    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="exportDropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Eksport Butiran
                    </button>
                    <div class="dropdown-menu dropdown-menu-right shadow p-2" aria-labelledby="exportDropdown"
                        style="min-width: 180px; border-radius: 12px;">
                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="exportToPDF()">
                            <img src="{{ asset('img/pdf.png') }}" width="18" class="mr-2" />
                            Eksport PDF
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="exportToWord()">
                            <img src="{{ asset('img/word.png') }}" width="18" class="mr-2" />
                            Eksport Word
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#" onclick="exportToExcel()">
                            <img src="{{ asset('img/excel.png') }}" width="18" class="mr-2" />
                            Eksport Excel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        function exportToPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('l');

            doc.text("Laporan Tempahan Harian", 14, 15);
            doc.autoTable({
                html: '#booking-table',
                startY: 25,
                theme: 'striped',
            });

            doc.save('Laporan_Tempahan_Harian.pdf');
        }

        function exportToExcel() {
            let table = document.getElementById("booking-table");
            let wb = XLSX.utils.table_to_book(table, { sheet: "Laporan" });
            XLSX.writeFile(wb, "Laporan_Tempahan_Harian.xlsx");
        }

        function exportToWord() {
            let html = document.getElementById("booking-table").outerHTML;
            let blob = new Blob(['<html><head><meta charset="utf-8"><title>Laporan</title></head><body>' + html + '</body></html>'], {
                type: 'application/msword'
            });

            let link = document.createElement("a");
            link.href = URL.createObjectURL(blob);
            link.download = "Laporan_Tempahan_Harian.doc";
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>

    </script>
@endsection