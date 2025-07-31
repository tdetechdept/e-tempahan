@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Kemaskini Maklumat Pengguna</h2>
        <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Kemaskini Maklumat Pengguna</span></p>

        <div class="pengurusan_pengguna_page">

            <div class=" Laporan_content_bg">
                <h4 class="table_title">Kemaskini Maklumat Pengguna</h4>
                <p>Sila mengemaskini maklumat pengguna dibawah</p>

                @if(isset($user))
                <form method="POST" action="{{ route('super_admin.users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="filter-block">
                        <div class="filter-row">
                            <label for="name">Nama Pegawai<span>*</span></label>
                            <input type="text" id="name" name="name" value="{{ $user->name ?? '' }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="id_number">No. Kad Pengenalan<span>*</span></label>
                            <input type="text" id="id_number" name="id_number" value="{{ $user->id_number ?? '' }}" required>
                            @error('id_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="position">Jawatan<span>*</span></label>
                            <input type="text" id="position" name="position" value="{{ $user->position ?? '' }}" required>
                            @error('position')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="grade">Gred<span>*</span></label>
                            <input type="text" id="grade" name="grade" value="{{ $user->grade ?? '' }}" required>
                            @error('grade')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="filter-row">
                            <label for="section">Bahagian<span>*</span></label>
                            <input type="text" id="section" name="section" value="{{ $user->section ?? '' }}" required>
                            @error('section')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="department">Jabatan<span>*</span></label>
                            <input type="text" id="department" name="department" value="{{ $user->department ?? '' }}" required>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="office_number">No. Telefon Pejabat<span>*</span></label>
                            <input type="text" id="office_number" name="office_number" value="{{ $user->office_number ?? '' }}" required>
                            @error('office_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="phone_number">No. Telefon Bimbit<span>*</span></label>
                            <input type="text" id="phone_number" name="phone_number" value="{{ $user->phone_number ?? '' }}" required>
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="email">Emel<span>*</span></label>
                            <input type="email" id="email" name="email" value="{{ $user->email ?? '' }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="filter-row">
                            <label for="image">Gambar Profil</label>
                            <input type="file" id="image" name="image" accept="image/*">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="Button_position_Laporan">
                        <button type="submit" class="dashboard-btn">Kemaskini Pengguna</button>
                        <a href="{{ route('pengurusan_pengguna') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
                @else
                    <p>Pengguna tidak ditemui.</p>
                @endif

            </div>

            
        </div>

    </div>


    </div>
@endsection
