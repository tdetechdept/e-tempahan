@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        {{-- <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / Kalendar / <span>Ketetapan</span></p> --}}

        <div class="breadcrumb-section mb-3">
            <h1 class="breadcrumb-title">Kalendar</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
                <span class="mx-2">/</span>
                <a href="{{ route('calendar') }}" class="text-decoration-none text-dark">Kalendar</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-decoration-none text-primary">Cipta Tempahan</a>
            </div>
        </div>

        <div class="Laporan_content">
            <div class="">
                <div class="">
                    <div class="mb-3">
                        <h3 class="mb-1">Cipta Maklumat Tempahan</h3>
                        <p class="text-muted mb-0">Sila lengkapkan maklumat tempahan dibawah.</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('calendar.store_manual_booking') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Nama Program / Majlis -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="meeting_name">Nama Program / Majlis <span class="text-danger">*</span></label>
                                        <input type="text" 
                                               id="meeting_name" 
                                               name="meeting_name" 
                                               class="form-control @error('meeting_name') is-invalid @enderror" 
                                               placeholder="Masukkan nama program atau majlis"
                                               value="{{ old('meeting_name') }}" 
                                               required>
                                        @error('meeting_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Nama Bilik -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="room_id">Nama Bilik <span class="text-danger">*</span></label>
                                        <select id="room_id" 
                                                name="room_id" 
                                                class="form-control @error('room_id') is-invalid @enderror" 
                                                required>
                                            <option value="">Pilih Bilik</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                    {{ $room->room_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('room_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                 <!-- Mula -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Mula <span class="text-danger">*</span></label>
                                                <input type="date" 
                                                       id="start_date" 
                                                       name="start_date" 
                                                       class="form-control @error('start_date') is-invalid @enderror" 
                                                       value="{{ old('start_date') }}" 
                                                       required>
                                                @error('start_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Mula <span class="text-danger">*</span></label>
                                                <input type="time" 
                                                       id="start_time" 
                                                       name="start_time" 
                                                       class="form-control @error('start_time') is-invalid @enderror" 
                                                       value="{{ old('start_time') }}" 
                                                       required>
                                                @error('start_time')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                    </div>
                                </div>
                                <!-- Akhir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Akhir <span class="text-danger">*</span></label>
                                                <input type="date" 
                                                       id="end_date" 
                                                       name="end_date" 
                                                       class="form-control @error('end_date') is-invalid @enderror" 
                                                       value="{{ old('end_date') }}" 
                                                       required>
                                                @error('end_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Akhir <span class="text-danger">*</span></label>
                                                   <input type="time" 
                                                    id="end_time" 
                                                    name="end_time" 
                                                    class="form-control @error('end_time') is-invalid @enderror" 
                                                    value="{{ old('end_time') }}" 
                                                    required>
                                            @error('end_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Lampiran Aturcara -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agenda_attachment">Lampiran Aturcara</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                                            </div>
                                            <input type="file" 
                                                   id="agenda_attachment" 
                                                   name="agenda_attachment" 
                                                   class="form-control @error('agenda_attachment') is-invalid @enderror" 
                                                   accept=".pdf,.doc,.docx">
                                            @error('agenda_attachment')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <small class="form-text text-muted">Format yang diterima: PDF, DOC, DOCX</small>
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
    </div>
@endsection

@push('css')
<style>
    .breadcrumbs {
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    #agenda_attachment{
            height: 50px;
    }
    
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 5px 12px;
        transition: all 0.3s ease;
        height: 45px;
    }
    
    .form-control:focus {
        border-color: #285689 !important;
        box-shadow: 0 0 0 0.2rem rgba(41, 157, 145, 0.25);
    }
    
    .btn-primary {
        background-color: #285689;
        border-color: #285689;
        border-radius: 8px;
        padding: 12px 60px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        background-color: #3c80cf;
        border-color: #3c80cf;
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
    
    /* File Input Styling */
    .form-control[type="file"] {
        padding: 8px 12px;
    }
    
    .form-control[type="file"]::-webkit-file-upload-button {
        background-color: #285689;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 6px 12px;
        margin-right: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .form-control[type="file"]::-webkit-file-upload-button:hover {
        background-color: #3c80cf;
    }
    
    /* Date and Time Input Styling */
    input[type="date"], input[type="time"] {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 12px;
        transition: all 0.3s ease;
    }
    
    input[type="date"]:focus, input[type="time"]:focus {
        border-color: #285689;
        box-shadow: 0 0 0 0.2rem rgba(41, 157, 145, 0.25);
    }
    
    /* Select Styling */
    select.form-control {
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
        .btn-primary {
            width: 100%;
            margin-top: 10px;
        }
        
        .row .col-md-6 {
            margin-bottom: 15px;
        }
    }
</style>
@endpush 