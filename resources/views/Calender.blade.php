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

                    <button class="dashboard-btn">Papan Pemuka</button>
                    <button class="dashboard-btn">Papan Pemuka</button>
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
  
    @endsection
