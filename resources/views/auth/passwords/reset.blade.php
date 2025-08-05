@extends('layouts.auth.app')

@push('css')
    <style>
    .card-custom {
      border-radius: 10px;
      padding: 2rem;
      background: #fff;
      box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }
    .btn-custom {
      background-color: #285689;
      color: #fff;
      font-weight: 500;
    }
    .btn-custom:hover {
      background-color: #3e82d1;
    }
    .form-control {
      border-radius: 8px;
    }
    .input-group-text {
      background: transparent;
      border-left: 0;
      cursor: pointer;
    }
    .error-text {
      font-size: 0.85rem;
      color: red;
    }
    .text-theme{
        color: #285689;
    }
  </style>
@endpush

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-50">
  <div class="card-custom w-75">
    <h5 class="fw-bold text-theme">Lupa Kata Laluan ?</h5>
    <p class="text-decoration-none mb-4 d-inline-block text-theme">Kemaskini Kata Laluan</p>

    <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="row mb-3" style="display: none">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
      <div class="row">
        <!-- Kata Laluan Baharu -->
        <div class="col-md-6 mb-3">
          <label for="newPassword" class="form-label">Masukkan Kata Laluan Baharu</label>
          <div class="input-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="***********" required autocomplete="new-password">
            <span class="input-group-text"><i class="bi bi-eye"></i></span>
          </div>
          {{-- <div class="d-flex mt-1">
            <div class="text-danger me-2"><i class="bi bi-exclamation-circle"></i></div>
            <small class="error-text">Sekurang - kurangnya 12 aksara, Gabungan huruf besar, huruf kecil, & simbol</small>
          </div> --}}
        </div>

        <!-- Sahkan Kata Laluan -->
        <div class="col-md-6 mb-3">
          <label for="confirmPassword" class="form-label">Sahkan Kata Laluan Baharu</label>
          <div class="input-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="***********" required autocomplete="new-password">
            <span class="input-group-text"><i class="bi bi-eye"></i></span>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-custom w-50 mt-3">Hantar</button>
      </div>
    </form>
  </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus readonly>

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
                                    {{ __('Reset Password') }}
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

@push('js')
<script>
  document.querySelectorAll('.input-group-text').forEach(function(toggle) {
    toggle.addEventListener('click', function() {
      const input = this.previousElementSibling;
      if (input.type === "password") {
        input.type = "text";
        this.innerHTML = '<i class="bi bi-eye-slash"></i>'; // change icon
      } else {
        input.type = "password";
        this.innerHTML = '<i class="bi bi-eye"></i>'; // revert icon
      }
    });
  });
</script>
    
@endpush
