@extends('layouts.auth.app')

@section('content')
    <main class="main-content">
        <div class="container p-5"> 

            <div class="card">
                <div class="card-body">
                    <div class="card-title fw-bold">{{ __('Pendaftaran Pengguna') }}</div>
                    <div class="card-text">
                        <p class="text-muted">Sila lengakapkan borang pendaftaran dibawah.</p>
                    </div>

                    <form class="mt-4" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="name" class="form-label">Nama Pegawai <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" placeholder="Contoh : Nama Pegawai" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="id_number" class="form-label">No. Kad Pengenalan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control formattedInputICWithoutDash" id="id_number" placeholder="Contoh : 123456109012" name="id_number" value="{{ old('id_number') }}" required>
                                       <div id="icHelp" class="form-text">Sila masukkan No. Kad Pengenalan tanpa '-'.</div>
                                       <div id="icHelp2" class="form-text">No. Kad Pengenalan ini akan digunakan sebagai ID pengguna anda.</div>
                                     @error('id_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="position" class="form-label">Jawatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="position" placeholder="Contoh : Penolong Pegawai Teknologi Maklumat" name="position" value="{{ old('position') }}" required autocomplete="position" autofocus>
                                     @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="grade" class="form-label">Gred <span class="text-danger">*</span></label>
                                    <select class="form-select" id="grade" name="grade" aria-label="Default select example">
                                        <option selected>Pilih Gred</option>
                                        <option value="FA31">FA31</option>
                                        <option value="FA32">FA32</option>
                                        <option value="FA33">FA33</option>
                                    </select>
                                     @error('grade')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="section" class="form-label">Bahagian<span class="text-danger">*</span></label>
                                    <select class="form-select" id="section" name="section" aria-label="Default select example">
                                        <option selected>Pilih Bahagian</option>
                                        <option value="Bahagian A">Bahagian A</option>
                                        <option value="Bahagian B">Bahagian B</option>
                                        <option value="Bahagian C">Bahagian C</option>
                                    </select>
                                     @error('section')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="department" class="form-label">Jabatan / Agensi <span class="text-danger">*</span></label>
                                    <select class="form-select" id="department" name="department" aria-label="Default select example">
                                        <option selected>Pilih Jabatan / Agensi</option>
                                        <option value="Jabatan A">Jabatan A</option>
                                        <option value="Jabatan B">Jabatan B</option>
                                        <option value="Jabatan C">Jabatan C</option>
                                    </select>
                                     @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="office_number" class="form-label">No. Telefon Pejabat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="office_number" placeholder="Contoh : 03-1234XXXX" name="office_number" value="{{ old('office_number') }}" required autocomplete="office_number" autofocus>
                                     @error('office_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="phone_number" class="form-label">No. Telefon Bimbit <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone_number" placeholder="Contoh : 0123467XXX" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                                     @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Emel<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : email@example.com" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                       <div id="emelHelp" class="form-text">Sila masukkan alamat emel yang sah. Gunakan alamat emel pejabat untuk penggunaan notis sistem</div>
                                     @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="password" class="form-label">Kata Laluan <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" placeholder="Kata Laluan" name="password" required autocomplete="new-password">
                                     @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="mb-3">
                                    <label for="confirmPassword" class="form-label">Sahkan Kata Laluan <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Sahkan Kata Laluan" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            <a href="{{ url('/') }}" class="btn btn-outline-primary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
{{-- <div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pendaftaran Pengguna') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

