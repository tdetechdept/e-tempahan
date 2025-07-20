@extends('layouts.public.app')

@push('css')
    <style>
    .welcome-background {
        position: absolute;
        width: 100%;
        height: 50%;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                    linear-gradient(180deg, rgba(17, 17, 47, 0) 43.76%, #11112F 90.98%), 
                    url('../img/background/hero-img.png');
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        filter: blur(1px);
    }

    .hero {
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), linear-gradient(180deg, rgba(17, 17, 47, 0) 43.76%, #11112F 90.98%),url('../img/background/hero-img.png'); /* Replace with real image path */
      background-size: cover;
      background-position: center;
      padding: 100px 0;
      height: 651.24px;
      text-align: center;

    }
    .card-img-top {
      height: 200px;
      object-fit: cover;
    }
    .card {
      background: #fff;
      color: #000;
    }
    </style>

@endpush

@section('content')
  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h4 class="fw-normal">Selamat Datang</h4>
      <h1 class="display-4 fw-bold">Sistem e-Tempahan</h1>
      <a href="{{route('login')}}" class="btn btn-primary mt-3">Log Masuk</a>
    </div>
  </section>

  <!-- Introduction Section -->
  <section class="theme-color  py-5 text-center">
    <div class="container">
      <h2 class="fw-bold">PENGENALAN SISTEM E-TEMPAHAN</h2>
      <p class="mt-3">Sistem eTempahan dibangunkan bagi kemudahan warga KK membuat tempahan:</p>

      <div class="row mt-5">
        <!-- Card 1 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow">
            <img src="{{asset('img/img1.png')}}" class="card-img-top" alt="Fasiliti Bilik">
            <div class="card-body">
              <h5 class="card-title">Fasiliti Bilik/Ruang</h5>
              <p class="card-text">Tempahan fasiliti bilik/ruang secara dalam talian di KK.</p>
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow">
            <img src="{{asset('img/img2.png')}}" class="card-img-top" alt="Lampu & Penghawa Dingin">
            <div class="card-body">
              <h5 class="card-title">Lampu & Penghawa Dingin</h5>
              <p class="card-text">Permohonan penggunaan utiliti lampu dan penghawa dingin bagi yang bertugas selepas waktu pejabat dan cuti am di KK.</p>
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-4 mb-4">
          <div class="card h-100 shadow">
            <img src="{{asset('img/img3.png')}}" class="card-img-top" alt="Kenderaan Rasmi">
            <div class="card-body">
              <h5 class="card-title">Kenderaan Rasmi</h5>
              <p class="card-text">Permohonan tempahan kenderaan rasmi jabatan di KK.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3 text-dark">HUBUNGI KAMI</h2>
        <p class="mb-4 text-dark">Sekiranya anda mempunyai masalah sistem atau inginkan penjelasan terperinci, sila hubungi kami di:</p>

        <div class="rounded-4 p-4" style="background: linear-gradient(to right, #5a2d91, #6e3cb1, #7c46c3); color: white;">
        <div class="row align-items-center text-start">
            
            <!-- Contact Person -->
            <div class="col-md-4 mb-4 mb-md-0">
            <h5 class="fw-bold">Mohd Zahar bin Zaidin</h5>
            <p class="mb-1">Aras 27, Bahagian Khidmat Pengurusan</p>
            <p class="mb-1">zahar@komunikasi.gov.my</p>
            <p class="mb-0">03-89115525</p>
            </div>

            <!-- Center: Logo and Text -->
            <div class="col-md-4 text-center mb-4 mb-md-0">
            <p class="fw-bold">Masalah sistem laporkannya di:</p>
            <img src="{{asset('img/img4.png')}}" alt="Aduan ICT Logo" style="max-height: 100px;">
            </div>

            <!-- Right: Email -->
            <div class="col-md-4 text-md-end">
            <h6 class="fw-bold">Emailkannya</h6>
            <p>aplikasi@komunikasi.gov.my</p>
            </div>

        </div>
        </div>
    </div>
    </section>
{{-- <div class="welcome-background"></div> --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        
    </div>
</div> --}}
@endsection

