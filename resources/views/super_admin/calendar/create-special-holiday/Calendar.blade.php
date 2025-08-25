@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        {{-- <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / Kalendar / <span>Cipta Cuti Khas</span></p> --}}

        <div class="breadcrumb-section mb-3">
            <h1 class="breadcrumb-title">Kalendar</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
                <span class="mx-2">/</span>
                <a href="{{ route('calendar') }}" class="text-decoration-none text-dark">Kalendar</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-decoration-none text-primary">Cipta Cuti Khas</a>
            </div>
        </div>

        <div class="">
            <div class="card">
                
                <div class="card-body">
                    <div class="  ">
                        <h3 class="mb-0 table_title mb-2">Cipta Cuti Khas</h3>
                        <p class="text-muted mb-0">Sila lengkapkan maklumat untuk cipta cuti khas dibawah</p>
                    </div>
                    <form class="form_padding" action="{{ route('calendar.store_special_holiday') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Nama Cuti -->
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="holiday_name" class="holiday_name">Nama Cuti </label>
                                    <input type="text" id="holiday_name" name="holiday_name"
                                        class="form-control @error('holiday_name') is-invalid @enderror"
                                        placeholder="Masukkan nama cuti khas" value="{{ old('holiday_name') }}" required>
                                    @error('holiday_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-0 calender_title_2">
                                    <h6 class="">Tarikh Mula</h6>
                                </div>
                                <div class="card calendar-card">

                                    <div class="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control datepicker @error('start_date') is-invalid @enderror"
                                                data-calendar-id="calendar1" name="start_date" placeholder="Tarikh Mula"
                                                value="{{ old('start_date') }}" required>
                                            @error('start_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="datepicker-inline-container" id="calendarContainer1">
                                            <div
                                                class="d-flex justify-content-between align-items-center mb-2 nav_and_date">
                                                <button class="btn btn-link p-0 text-dark prev-month-btn"><i
                                                        class="fas fa-chevron-left"></i></button>
                                                <h5 class="mb-0 month-display"></h5>
                                                <button class="btn btn-link p-0 text-dark next-month-btn"><i
                                                        class="fas fa-chevron-right"></i></button>
                                            </div>
                                            <table class="table table-borderless text-center calendar-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-primary">Su</th>
                                                        <th class="text-primary">Mo</th>
                                                        <th class="text-primary">Tu</th>
                                                        <th class="text-primary">We</th>
                                                        <th class="text-primary">Th</th>
                                                        <th class="text-primary">Fr</th>
                                                        <th class="text-primary">Sa</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-0 calender_title_2">
                                    <h6 class="">Tarikh Tamat</h6>
                                </div>
                                <div class="card calendar-card">

                                    <div class="">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text"
                                                class="form-control datepicker @error('end_date') is-invalid @enderror"
                                                data-calendar-id="calendar2" name="end_date" placeholder="Pilih Tarikh"
                                                value="{{ old('end_date') }}" required>
                                            @error('end_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="datepicker-inline-container" id="calendarContainer2">
                                            <div class="d-flex justify-content-between align-items-center mb-2 nav_and_date">
                                                <button class="btn btn-link p-0 text-dark prev-month-btn"><i
                                                        class="fas fa-chevron-left"></i></button>
                                                <h5 class="mb-0 month-display"></h5>
                                                <button class="btn btn-link p-0 text-dark next-month-btn"><i
                                                        class="fas fa-chevron-right"></i></button>
                                            </div>
                                            <table class="table table-borderless text-center calendar-table">
                                                <thead>
                                                    <tr>
                                                        <th class="text-primary">Su</th>
                                                        <th class="text-primary">Mo</th>
                                                        <th class="text-primary">Tu</th>
                                                        <th class="text-primary">We</th>
                                                        <th class="text-primary">Th</th>
                                                        <th class="text-primary">Fr</th>
                                                        <th class="text-primary">Sa</th>
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
                            <div class="col-md-12 mt-4">
                                <div class="form-group"> 
                                    <label for="notes" class="holiday_name mb-4">Catatan</label>
                                    <textarea id="notes" name="notes" class="form-control @error('notes') is-invalid @enderror" rows="4"
                                        placeholder="Sila nyatakan catatan / sebab cuti">{{ old('notes') }}</textarea>
                                    @error('notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('css')
    @push('css')
    <style>
        /* Form Styling */
        .form_padding{
            padding: 10px 20px;
            margin-top: 20px;
        }
        .card-header {
            border: none;
            border-radius: 8px s;
        }
        .form-group input,
        .form-group textarea {
            margin-bottom: 1.5rem;
            background-color: #F5FAFA !important;
            padding: 10px 12px;
        }
    
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 12px;
            transition: all 0.3s ease;
        }
    
        .form-control:focus {
            border-color: #285689;
            box-shadow: 0 0 0 0.2rem rgba(40, 86, 137, 0.25);
        }
    
        .input-group-text,
        .input-group input {
            background-color: #F5FAFA !important;
        }
    
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
    
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
    
        /* Buttons */
        .btn-primary {
            background-color: #285689;
            border-color: #285689;
            border-radius: 8px;
            padding: 12px 35px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
    
        .btn-primary:hover {
            background-color: #3c80cf;
            border-color: #3c80cf;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    
        /* Cards */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: none;
            transition: all 0.3s ease;
        }
    
        .card:hover {
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
        }
    
        .calendar-card {
            border: 2px solid #e9ecef;
            transition: all 0.3s ease;
        }
    
        /* Calendar Layout */
        .datepicker-inline-container {
            background: white;
            border-radius: 10px;
            padding: 15px;
        }
    
        .calendar-table {
            margin-bottom: 0;
            width: 100%;
            table-layout: fixed;
        }
    
        .calendar-table th {
            border: none;
            padding: 8px;
            font-weight: 600;
            color: #285689;
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
            color: #285689;
        }
    
        .calendar-table td.text-muted {
            color: #6c757d !important;
            opacity: 0.5;
        }
    
        .calendar-table td.text-info {
            background-color: #e3f2fd;
            color: #285689 !important;
            font-weight: bold;
        }
    
        .calendar-table td.highlighted-date {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
    
        .calendar-table td.highlighted-date p {
            background-color: #285689 !important;
            color: white !important;
            border-radius: 100%;
            height: 40px;
            width: 40px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    
        .table thead th {
            background-color: transparent;
            border-bottom: none;
            color: #285689;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            padding: 0.75rem 1.5rem;
        }
    
        .table tbody td {
            border-bottom: none;
            padding: 8px;
        }
    
        .table tbody td p {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 40px;
            border-radius: 100%;
            margin: 0;
        }
    
        .table tbody tr:hover,
        .calendar-table td:hover {
            background-color: transparent;
        }
    
        .month-display,
        .nav_and_date button i {
            color: #285689;
        }
    
        .month-display {
            font-weight: 600;
            margin: 0;
        }
    
        .holiday_name {
            color: #111624;
            font-weight: 500;
            font-size: 16px;
        }
    
        .calender_title_2 h6 {
            font-size: 1rem;
            font-weight: 600;
            color: #285689;
        }
    
        .prev-month-btn,
        .next-month-btn {
            color: #285689;
            transition: all 0.2s ease;
        }
    
        .prev-month-btn:hover,
        .next-month-btn:hover {
            color: #285689;
            transform: scale(1.1);
        }
    
        /* Responsive Fixes */
        @media (max-width: 768px) {
            .calendar-card {
                margin-bottom: 20px;
            }
            .form_padding{
            padding: 10px ;
            margin-top: 20px;
        }
            .btn-primary {
                width: 100%;
                margin-top: 10px;
            }
        }
    
        @media (max-width: 576px) {
            .form-control {
                padding: 8px 10px;
                font-size: 0.9rem;
            }
    
            .input-group-text {
                padding: 6px 8px;
                font-size: 0.9rem;
            }
    
            .input-group-text i,
            .input-group-prepend span i {
                font-size: 1rem;
            }
    
            .month-display {
                font-size: 0.9rem;
            }
    
           
    
            .calendar-table th,
            .calendar-table td {
                padding: 5px;
                font-size: 0.8rem;
            }
    
            .calendar-table td.highlighted-date p {
                height: 32px;
                width: 32px;
                font-size: 0.85rem;
            }
    
            .btn-primary {
                padding: 10px 20px;
                font-size: 1rem;
            }
    
            /* Prevent overflow on calendar */
            .datepicker-inline-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
    
            .calendar-table {
                min-width: 550px;
            }
        }
    </style>


    @endpush

    @push('js')
        <script src="{{ asset('admin2/js/Calender3.js') }}"></script>
    @endpush
