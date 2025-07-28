@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / Kalendar / <span>Cipta Cuti Khas</span></p>
        <div class="Laporan_content">
            <div class=" mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white pb-0">
                                <h6 class="mb-0">Tarikh Mula</h6>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" data-calendar-id="calendar1" placeholder="Pilih Tarikh">
                                </div>
        
                                <div class="datepicker-inline-container" id="calendarContainer1">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <button class="btn btn-link p-0 text-dark prev-month-btn"><i class="fas fa-chevron-left"></i></button>
                                        <h5 class="mb-0 month-display"></h5>
                                        <button class="btn btn-link p-0 text-dark next-month-btn"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <table class="table table-borderless text-center calendar-table">
                                        <thead>
                                            <tr>
                                                <th class="text-info">Su</th>
                                                <th class="text-info">Mo</th>
                                                <th class="text-info">Tu</th>
                                                <th class="text-info">We</th>
                                                <th class="text-info">Th</th>
                                                <th class="text-info">Fr</th>
                                                <th class="text-info">Sa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-white pb-0">
                                <h6 class="mb-0">Tarikh Tamat</h6>
                            </div>
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control datepicker" data-calendar-id="calendar2" placeholder="Pilih Tarikh">
                                </div>
        
                                <div class="datepicker-inline-container" id="calendarContainer2">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <button class="btn btn-link p-0 text-dark prev-month-btn"><i class="fas fa-chevron-left"></i></button>
                                        <h5 class="mb-0 month-display"></h5>
                                        <button class="btn btn-link p-0 text-dark next-month-btn"><i class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <table class="table table-borderless text-center calendar-table">
                                        <thead>
                                            <tr>
                                                <th class="text-info">Su</th>
                                                <th class="text-info">Mo</th>
                                                <th class="text-info">Tu</th>
                                                <th class="text-info">We</th>
                                                <th class="text-info">Th</th>
                                                <th class="text-info">Fr</th>
                                                <th class="text-info">Sa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
    @endsection
