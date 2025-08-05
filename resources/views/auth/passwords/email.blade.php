@extends('layouts.auth.app')

@push('css')
    <style>
    .auth-right {
      padding: 3rem 2rem !important;
    }
    .btn-custom {
      background-color: #285689;
      color: #fff;
      border: none;
    }
    .btn-custom:hover {
      background-color: #3e82d1;
    }
        .text-theme{
            color: #285689;
        }
    </style>
@endpush

@section('content')
<div class="container">
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
          <div class="col-md-7 p-4 m-auto auth-right">
                <h5 class="fw-bold text-theme">Lupa Kata Laluan ?</h5>
                <p class="text-theme">Sila masukkan emel anda yang telah berdaftar dengan sistem</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                 <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                    <div class="mb-3">
                    <label for="email" class="form-label">Emel</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Hantar</button>
                </form>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
