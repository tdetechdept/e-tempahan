@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Kalendar</h2>
        <p class="breadcrumbs">Laman Utama / Kalendar / <span>Ketetapan</span></p>
        <div class="Laporan_content">
            <div class=" mt-5">
                <div class="card">
                    <div class="card-header bg-white pb-0">
                        <h3 class="mb-0">Cipta Maklumat Tempahan</h3>
                        <p class="text-muted mb-0">Sila lengkapkan maklumat tempahan dibawah.</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('calendar.store_manual_booking') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Nama Program / Majlis -->
                                <div class="col-md-6">
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
                                <div class="col-md-6">
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
                            </div>

                            <div class="row">
                                <!-- Mula -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_date">Mula <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
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
                                    </div>
                                </div>

                                <!-- Akhir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_date">Akhir <span class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-md-6">
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
                                            <div class="col-md-6">
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
        background-color: #299d91;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 6px 12px;
        margin-right: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .form-control[type="file"]::-webkit-file-upload-button:hover {
        background-color: #238a7f;
    }
    
    /* Date and Time Input Styling */
    input[type="date"], input[type="time"] {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 12px;
        transition: all 0.3s ease;
    }
    
    input[type="date"]:focus, input[type="time"]:focus {
        border-color: #299d91;
        box-shadow: 0 0 0 0.2rem rgba(41, 157, 145, 0.25);
    }
    
    /* Select Styling */
    select.form-control {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
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