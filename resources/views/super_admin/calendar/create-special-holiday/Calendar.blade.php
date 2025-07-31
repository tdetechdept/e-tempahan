@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / Kalendar / <span>Cipta Cuti Khas</span></p>
        <div class="Laporan_content">
            <div class=" mt-5">
                <div class="card">
                    <div class="card-header bg-white pb-0">
                        <h3 class="mb-0">Cipta Cuti Khas</h3>
                        <p class="text-muted mb-0">Sila lengkapkan maklumat untuk cipta cuti khas dibawah</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('calendar.store_special_holiday') }}" method="POST">
                            @csrf
                            <div class="row">
                                <!-- Nama Cuti -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="holiday_name">Nama Cuti <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               id="holiday_name" 
                                               name="holiday_name" 
                                               class="form-control @error('holiday_name') is-invalid @enderror" 
                                               placeholder="Masukkan nama cuti khas"
                                               value="{{ old('holiday_name') }}" 
                                               required>
                                        @error('holiday_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card calendar-card">
                                        <div class="card-header bg-white pb-0">
                                            <h6 class="mb-0">Tarikh Mula</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" 
                                                       class="form-control datepicker @error('start_date') is-invalid @enderror" 
                                                       data-calendar-id="calendar1" 
                                                       name="start_date"
                                                       placeholder="Pilih Tarikh"
                                                       value="{{ old('start_date') }}"
                                                       required>
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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
                                    <div class="card calendar-card">
                                        <div class="card-header bg-white pb-0">
                                            <h6 class="mb-0">Tarikh Tamat</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" 
                                                       class="form-control datepicker @error('end_date') is-invalid @enderror" 
                                                       data-calendar-id="calendar2" 
                                                       name="end_date"
                                                       placeholder="Pilih Tarikh"
                                                       value="{{ old('end_date') }}"
                                                       required>
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
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

                            <div class="row">
                                <!-- Catatan -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="notes">Catatan</label>
                                        <textarea id="notes" 
                                                  name="notes" 
                                                  class="form-control @error('notes') is-invalid @enderror" 
                                                  rows="4"
                                                  placeholder="Sila nyatakan catatan / sebab cuti">{{ old('notes') }}</textarea>
                                        @error('notes')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 12px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #299d91;
        box-shadow: 0 0 0 0.2rem rgba(41, 157, 145, 0.25);
    }
    
    .btn-primary {
        background-color: #299d91;
        border-color: #299d91;
        border-radius: 8px;
        padding: 12px 35px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #238a7f;
        border-color: #238a7f;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        border: none;
        transition: all 0.3s ease;
    }
    
    .card:hover {
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
    }
    
    .card-header {
        border-bottom: 1px solid #e9ecef;
        border-radius: 15px 15px 0 0 !important;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .calendar-card {
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .calendar-card:hover {
        border-color: #299d91;
    }
    
    /* Calendar Styles */
    .datepicker-inline-container {
        background: white;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .calendar-table {
        margin-bottom: 0;
    }
    
    .calendar-table th {
        border: none;
        padding: 8px;
        font-weight: 600;
        color: #299d91;
        font-size: 0.9rem;
    }
    
    .calendar-table td {
        border: none;
        padding: 8px;
        cursor: pointer;
        border-radius: 50%;
        transition: all 0.2s ease;
        position: relative;
    }
    
    .calendar-table td:hover {
        background-color: #e3f2fd;
        color: #1976d2;
    }
    
    .calendar-table td.text-muted {
        color: #6c757d !important;
        opacity: 0.5;
    }
    
    .calendar-table td.text-info {
        background-color: #e3f2fd;
        color: #1976d2;
        font-weight: bold;
    }
    
    .calendar-table td.highlighted-date {
        background-color: #299d91 !important;
        color: white !important;
        font-weight: bold;
        box-shadow: 0 2px 4px rgba(41, 157, 145, 0.3);
    }
    
    .calendar-table td.highlighted-date:hover {
        background-color: #238a7f !important;
    }
    
    .month-display {
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    
    .prev-month-btn, .next-month-btn {
        color: #299d91;
        transition: all 0.2s ease;
    }
    
    .prev-month-btn:hover, .next-month-btn:hover {
        color: #238a7f;
        transform: scale(1.1);
    }
    
    /* Input Group Styles */
    .input-group-text {
        background-color: #f8f9fa;
        border-color: #ced4da;
        color: #6c757d;
    }
    
    .input-group .form-control {
        border-left: none;
    }
    
    .input-group .form-control:focus {
        border-left: none;
    }
    
    /* Textarea Styles */
    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .calendar-card {
            margin-bottom: 20px;
        }
        
        .btn-primary {
            width: 100%;
            margin-top: 10px;
        }
    }
</style>
@endpush

@push('js')
<script src="{{ asset('admin2/js/Calender3.js') }}"></script>
@endpush
