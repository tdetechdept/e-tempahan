@extends('layouts.main.app')

@section('title', 'Tempahan Ad-hoc')

@push('css')
  <style>
    body {
      background-color: #f4f8f9;
    }
    .custom-card {
      border-radius: 10px;
      padding: 30px;
    }
    .email-link {
      font-weight: 600;
      font-size: 1.1rem;
      text-decoration: none;
    }
    .btn-outline-primary {
      border-color: #285689;
      color: #285689;
      font-weight: 600;
      padding: 8px 25px;
      border-radius: 6px;
    }
    .btn-outline-primary:hover {
      background-color: #285689;
      color: #fff;
    }
    .icon-email {
      font-size: 1.4rem;
      color: #285689;
      margin-right: 8px;
    }
  </style>
@endpush

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Tempahan Ad-hoc</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <span class="text-decoration-none text-primary">Tempahan Ad-hoc</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">

        <div class=" my-5">
        <div class="card shadow-sm custom-card">
            <div class="card-body">
            <h5 class="card-title font-weight-bold">Permohonan Ad - hoc</h5>
            <p class="card-text">
                Jika anda memerlukan bilik secara ad-hoc (contoh: mesyuarat tergempar atau permintaan di luar sistem), <br>
                sila hantar permohonan dan dokumen sokongan melalui emel berikut:
            </p>
            <p>
                <span class="icon-email">
                    <i class="fas fa-envelope"></i>
                </span>
                <a href="mailto:Admin@tempahan.gov.my" class="email-link text-primary">Admin@tempahan.gov.my</a>
            </p>
            <p class="text-muted">Permohonan ini akan disemak secara manual oleh pihak Admin</p>
            <a href="/home" class="btn btn-outline-primary mt-3">Kembali</a>
            </div>
        </div>
        </div>

    </main>
@endsection