@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / <span>Kalendar</span></p>

        <div class="Laporan_content">
            <div class="search-section">
                <h4 class="table_title">Laporan</h4>
                <div class="Calender_input_align">
                    <div class="position-relative search_input">
                        <i class="fas fa-search position-absolute"
                            style="left: 12px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                        <input type="text" class="form-control pl-5 rounded-1" placeholder="Carian">
                    </div>

                    <a href="{{ route('calendar.create_special_holiday') }}" class="dashboard-btn">Cipta Cuti Khas</a>
                    <a href="{{ route('calendar.create_manual_booking') }}" class="dashboard-btn">Tambah Tempahan Manual</a>
                </div>
            </div>
            <div class=" calendar-container2">

                <!-- Calendar Header -->
                <div class="d-flex justify-content-between align-items-center calendar-header2">
                    <div class="btn-group nav_button_group">
                        <button id="prevBtn" class="btn btn-outline-secondary">&lt;</button>
                        <button id="nextBtn" class="btn btn-outline-secondary ml-2">&gt;</button>
                    </div>
                    <button id="todayBtn" class="btn btn-outline-primary">Hari Ini</button>
                    <h4 id="currentMonthYear" class="mb-0"></h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label id="monthViewBtn" class="btn  active">
                            <input type="radio" name="options" autocomplete="off" checked> Bulan
                        </label>
                        <label id="weekViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Minggu
                        </label>
                        <label id="dayViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Hari
                        </label>
                        <label id="agendaViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Agenda
                        </label>
                    </div>
                </div>

                <!-- Days of the week header -->
                <div class="calendar-grid">
                    <div class="row no-gutters text-center day-names">
                        <div class="col">Isnin</div>
                        <div class="col">Selasa</div>
                        <div class="col">Rabu</div>
                        <div class="col">Khamis</div>
                        <div class="col">Jumaat</div>
                        <div class="col">Sabtu</div>
                        <div class="col">Ahad</div>
                    </div>

                    <!-- Calendar Grid -->
                    <div id="calendarGrid" class="calendar-grid">
                        <!-- Calendar content will be generated here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    @endsection

@push('css')
<style>


.dashboard-btn:hover{
        background-color: #299d91dc;
            color: #fff;
        text-decoration: none;
    }
    
    /* Calendar Grid Layout */
    .calendar-grid {
        border: 1px solid #dee2e6;
        border-radius: 4px;
        overflow: hidden;
    }

    .calendar-grid .row {
        margin: 0;
    }

    .calendar-grid .col {
        padding: 10px
    }

    /* Day Names Header */
    .day-names {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .day-names .col {
        padding: 10px 5px;
        border-right: 1px solid #dee2e6;
    }

    .day-names .col:last-child {
        border-right: none;
    }

    /* Day Cells */
    .day-cell {
        min-height: 120px;
        border-right: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        padding: 10px;
        position: relative;
        background-color: white;
        overflow: hidden;
    }

    .day-cell:last-child {
        border-right: none;
    }

    .day-number {
        font-weight: bold;
        font-size: 0.9rem;
        margin-bottom: 8px;
        color: #333;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        padding: 10px;
    }

    /* Other Month Days */
    .other-month-day {
        background-color: #f8f9fa;
        color: #6c757d;
    }

    .other-month-day .day-number {
        color: #6c757d;
    }

    /* Current Month Days */
    .current-month-day {
        background-color: white;
    }

    /* Today Highlight */
    .today-highlight {
        background-color: #e3f2fd !important;
        border: 2px solid #2196f3 !important;
    }

    .today-header-highlight {
        color: #2196f3 !important;
        font-weight: bold !important;
    }

    /* Event Styling */
    .calendar-grid .event {
        font-size: 0.75rem;
        padding: 6px 8px;
        border-radius: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        display: block;
        transition: all 0.2s ease;
        border: none;
        font-weight: 500;
        line-height: 1.2;
    }

    .calendar-grid .event:hover {
        transform: scale(1.02);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    /* Event Colors - Simplified */
    .event-temuduga {
        background-color: #e3f2fd !important;
        color: #1976d2 !important;
        padding: 10px 0px;
    }

    .event-mesyuarat {
        background-color: #e8f5e8 !important;
        color: #2e7d32 !important;
    }

    /* API-sourced event styling */
    .event-api {
        background-color: #fff3e0 !important;
        color: #f57c00 !important;
        border-left: 3px solid #ff9800 !important;
    }

    .api-indicator {
        color: #007bff;
        font-size: 0.8em;
        font-style: italic;
    }

    /* Status-based colors (fallback) */
    .status-new {
        background-color: #e3f2fd !important;
        color: #1976d2 !important;
    }

    .status-pending {
        background-color: #fff3e0 !important;
        color: #f57c00 !important;
    }

    .status-approved {
        background-color: #e8f5e8 !important;
        color: #2e7d32 !important;
    }

    .status-rejected {
        background-color: #ffebee !important;
        color: #c62828 !important;
    }

    .status-default {
        background-color: #f5f5f5 !important;
        color: #424242 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .day-cell {
            min-height: 100px;
            padding: 6px;
        }
        
        .calendar-grid .event {
            font-size: 0.7rem;
            padding: 4px 6px;
            margin: 3px 0;
        }
    }
</style>
@endpush

@push('js')
<script>
    // Pass PHP data to JavaScript
    window.calendarEvents = @json($allEvents);
</script>
<script src="{{ asset('admin2/js/Calender2.js') }}"></script>
@endpush
