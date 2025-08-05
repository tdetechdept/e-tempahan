@extends('layouts.auth.app')

@section('content')
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="row login-box">
          <!-- Left Box -->
          <div class="col-md-5 left-box">
            <h6>Selamat Datang ke Sistem</h6>
            <h2 class="fw-bold">eTempahan</h2>
            <p>Sila log masuk untuk meneruskan</p>
          </div>

          <!-- Right Form -->
          <div class="col-md-7 p-4">
            <h5 class="fw-bold">Masuk</h5>
            <p class="text-muted">Sila isi maklumat anda di bawah</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="mb-3">
                <label for="email" class="form-label">ID Pengguna</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan ID Pengguna">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Laluan</label>
                <div class="input-group">
                  <input type="password" class="form-control" name="password" id="password" placeholder="********">
                  <span class="input-group-text"><i class="bi bi-eye"></i></span>
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <input type="checkbox" id="rememberMe">
                  <label for="rememberMe" class="form-check-label">Ingat Saya</label>
                </div>
                 @if (Route::has('password.request'))
                    <a class="text-decoration-none text-theme" href="{{ route('password.request') }}">
                        {{ __('Lupa Kata Laluan?') }}
                    </a>
                 @endif
                {{-- <a href="#" class="text-decoration-none text-theme">Lupa Kata Laluan?</a> --}}
              </div>
              <button type="submit" class="btn btn-primary w-100">Log Masuk</button>
            </form>
            <div class="text-center mt-3">
              <a href="{{ route('register') }}" class="text-theme fw-bold text-decoration-none">Daftar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection