@extends('layouts.super_admin.app')

@section('title', 'Daftar Pengguna Baharu')

@section('content')
<div class="pengurusan_pengguna_page">
    <h2 class="page_title">Pengurusan Pengguna</h2>
    <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Daftar Pengguna Baharu</span></p>

    <div class="registration-form-container">
        <div class="form-header">
            <h3 class="form-title">Pendaftaran Pengguna</h3>
            <p class="form-subtitle">Sila lengakapkan borang pendaftaran dibawah.</p>
        </div>

        <form action="{{ route('super_admin.users.store') }}" method="POST" enctype="multipart/form-data" class="registration-form">
            @csrf
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nama Pegawai <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           class="form-control @error('name') is-invalid @enderror" 
                           placeholder="Contoh : Nama Pegawai"
                           value="{{ old('name') }}" 
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="id_number">No. Kad Pengenalan <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="id_number" 
                           name="id_number" 
                           class="form-control formattedInputICWithoutDash @error('id_number') is-invalid @enderror" 
                           placeholder="Contoh : 123456109012"
                           value="{{ old('id_number') }}" 
                           required>
                    <div class="form-text">Sila masukkan No. Kad Pengenalan tanpa '-'.</div>
                    <div class="form-text">No. Kad Pengenalan ini akan digunakan sebagai ID pengguna anda.</div>
                    @error('id_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="position">Jawatan <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="position" 
                           name="position" 
                           class="form-control @error('position') is-invalid @enderror" 
                           placeholder="Contoh : Penolong Pegawai Teknologi Maklumat"
                           value="{{ old('position') }}" 
                           required>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="grade">Gred <span class="text-danger">*</span></label>
                    <select class="form-select @error('grade') is-invalid @enderror" id="grade" name="grade" aria-label="Default select example">
                        <option value="">Pilih Gred</option>
                        <option value="FA31" {{ old('grade') == 'FA31' ? 'selected' : '' }}>FA31</option>
                        <option value="FA32" {{ old('grade') == 'FA32' ? 'selected' : '' }}>FA32</option>
                        <option value="FA33" {{ old('grade') == 'FA33' ? 'selected' : '' }}>FA33</option>
                    </select>
                    @error('grade')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="section">Bahagian <span class="text-danger">*</span></label>
                    <select class="form-select @error('section') is-invalid @enderror" id="section" name="section">
                        <option value="">Pilih Bahagian</option>
                        <option value="Bahagian A" {{ old('section') == 'Bahagian A' ? 'selected' : '' }}>Bahagian A</option>
                        <option value="Bahagian B" {{ old('section') == 'Bahagian B' ? 'selected' : '' }}>Bahagian B</option>
                        <option value="Bahagian C" {{ old('section') == 'Bahagian C' ? 'selected' : '' }}>Bahagian C</option>
                    </select>
                    @error('section')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="department">Jabatan / Agensi <span class="text-danger">*</span></label>
                    <select class="form-select @error('department') is-invalid @enderror" id="department" name="department">
                        <option value="">Pilih Jabatan / Agensi</option>
                        <option value="Jabatan A" {{ old('department') == 'Jabatan A' ? 'selected' : '' }}>Jabatan A</option>
                        <option value="Jabatan B" {{ old('department') == 'Jabatan B' ? 'selected' : '' }}>Jabatan B</option>
                        <option value="Jabatan C" {{ old('department') == 'Jabatan C' ? 'selected' : '' }}>Jabatan C</option>
                    </select>
                    @error('department')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="office_number">No. Telefon Pejabat <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="office_number" 
                           name="office_number" 
                           class="form-control @error('office_number') is-invalid @enderror" 
                           placeholder="Contoh : 03-1234XXXX"
                           value="{{ old('office_number') }}" 
                           required>
                    @error('office_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="phone_number">No. Telefon Bimbit <span class="text-danger">*</span></label>
                    <input type="text" 
                           id="phone_number" 
                           name="phone_number" 
                           class="form-control @error('phone_number') is-invalid @enderror" 
                           placeholder="Contoh : 0123467XXX"
                           value="{{ old('phone_number') }}" 
                           required>
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Emel <span class="text-danger">*</span></label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           placeholder="Contoh : email@example.com"
                           value="{{ old('email') }}" 
                           required>
                    <div class="form-text">Sila masukkan alamat emel yang sah. Gunakan alamat emel pejabat untuk penggunaan notis sistem</div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Kata Laluan <span class="text-danger">*</span></label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Kata Laluan"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="password_confirmation">Sahkan Kata Laluan <span class="text-danger">*</span></label>
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           class="form-control" 
                           placeholder="Sahkan Kata Laluan"
                           required>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('pengurusan_pengguna') }}" class="btn btn-secondary cancle_btn">
                    Kembali
                </a>
                <button type="submit" class="btn btn-primary add_btn">
                     Daftar
                </button>
            </div>
        </form>
    </div>
</div>

@push('css')
<style>
    .registration-form-container {
        background: white;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .form-header {
        text-align: left;
        margin-bottom: 30px;
        padding-bottom: 20px;
        /* border-bottom: 2px solid #e9ecef; */
    }

    .form-title {
        color: #495057;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .form-subtitle {
        color: #6c757d;
        font-size: 1rem;
        margin: 0;
    }

    .registration-form {
        /* max-width: 800px; */
        margin: 0 auto;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -10px;
        margin-left: -10px;
    }

    .form-group {
        padding-right: 10px;
        padding-left: 10px;
        margin-bottom: 20px;
    }

    .col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        /* font-weight: 600; */
        color: #495057;
    }

    .form-group label .text-danger {
        color: #dc3545;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: 22px 16px;
        font-size: 14px;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #20c997;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(32, 201, 151, 0.25);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-select {
        --bs-form-select-bg-img: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
        display: block;
        width: 100%;
        padding: 12px 16px;
        font-size: 14px;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    

    .form-select:focus {
        color: #495057;
        background-color: #fff;
        border-color: #20c997;
        outline: none;
    }

    .form-select.is-invalid {
        border-color: #dc3545;
    }

    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 5px;
        font-size: 12px;
        color: #dc3545;
    }

    .form-text {
        margin-top: 5px;
        font-size: 12px;
        color: #6c757d;
    }

    .form-actions {
        display: flex;
        justify-content: right;
        gap: 10px;
        align-items: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px solid #e9ecef;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        border: 2px solid transparent;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 120px;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(108, 117, 125, 0.3);
    }

    .btn-primary {
        background-color: #20c997;
        color: white;
        border-color: #20c997;
    }

    .btn-primary:hover {
        background-color: #1ba085;
        border-color: #1ba085;
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(32, 201, 151, 0.3);
    }
    .cancle_btn{
        border: 1px solid #299D91!important;
        display: inline;
        background-color: #ffffff;
        color: #299D91;
        font-weight: 400!important;
    }

    .cancle_btn:hover{
        background-color:#299D91;
    }

    .add_btn{
        background-color:#299D91;
         display: inline;
         font-weight: 400!important;
    }
    .add_btn:hover{
        border: 1px solid #299D91!important;
        background-color:#ffffff;
         display: inline;
         color: #299D91;
         
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .col-md-6 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .form-actions {
            flex-direction: column;
            gap: 15px;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush
@endsection 