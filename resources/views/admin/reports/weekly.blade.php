@extends('layouts.main.app')

@section('title', 'Laporan Tempahan Mingguan')

@section('content')

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
    <!-- Breadcrumb -->
    <div class="breadcrumb-section mb-4">
        <h1 class="breadcrumb-title">Laporan</h1>
        <div class="breadcrumb-nav">
            <span>Laman Utama</span>
            <span class="mx-2">/</span>
            <span class="breadcrumb-active">Laporan Tempahan Mingguan</span>
        </div>
    </div>

    <!-- Main Report Card -->
    <div class="card shadow-sm border-0 p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0 font-weight-bold">Laporan Tempahan Mingguan</h4>
        </div>

        <!-- Summary -->
        <div class="row mb-4">
            <div class="col-md-6">
                <p><strong>Julat Tarikh:</strong>
                    {{ \Carbon\Carbon::parse($start)->format('d F Y') }} -
                    {{ \Carbon\Carbon::parse($end)->format('d F Y') }}
                </p>
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
                                <th>Nama Mesyuarat</th>
                                <th>Bahagian/Jabatan</th>
                                <th>Bilik</th>
                                <th>Masa Mula</th>
                                <th>Masa Tamat</th>
                                <th>Jangka Masa</th>
                                <th>Penerangan Penuh</th>
                                <th>Jenis</th>
                                <th>Nama Pemohon</th>
                                <th>Status</th>
                                <th>Kemaskini Pada</th>
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
                                    {{-- <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d F Y') }}</td> --}}
                                    <td>{{ $booking->meeting_name }}</td>
                                    <td>{{ $booking->user->section ?? $booking->user->department }}</td>
                                    <td>{{ $booking->room->room_name ?? '-' }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}
                                    </td>
                                    <td>{{ $totalHours }} Jam</td>
                                    <td>{{ $booking->description }}</td>
                                    <td>
                                        @if($booking->type === 'Interior')
                                            Dalaman
                                        @else
                                            Luaran
                                        @endif
                                    </td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>
                                        @if ($booking->status == 3)
                                            <span class="badge badge-success">Diluluskan</span>
                                        @else
                                            <span class="badge badge-secondary">{{ $booking->getStatusNameAttribute() }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($booking->updated_at)->format('h:i A - d F Y') }}</td>
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

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script>
    function exportToPDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l');

        doc.text("Laporan Tempahan Mingguan", 14, 15);
        doc.autoTable({
            html: '#booking-table',
            startY: 25,
            theme: 'striped',
        });

        doc.save('Laporan_Tempahan_Mingguan.pdf');
    }

    function exportToExcel() {
        let table = document.getElementById("booking-table");
        let wb = XLSX.utils.table_to_book(table, { sheet: "Laporan" });
        XLSX.writeFile(wb, "Laporan_Tempahan_Mingguan.xlsx");
    }

    function exportToWord() {
        let html = document.getElementById("booking-table").outerHTML;
        let blob = new Blob(['<html><head><meta charset="utf-8"><title>Laporan</title></head><body>' + html + '</body></html>'], {
            type: 'application/msword'
        });

        let link = document.createElement("a");
        link.href = URL.createObjectURL(blob);
        link.download = "Laporan_Tempahan_Mingguan.doc";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>

@endsection
