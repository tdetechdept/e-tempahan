@extends('layouts.public.app')

@push('css')
    <!-- Custom styles for this template-->
    <link href="{{ asset('app.css') }}" rel="stylesheet">
    
    <style>
    .welcome-background {
        position: absolute;
        width: 100%;
        height: 50%;
        background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                    linear-gradient(180deg, rgba(17, 17, 47, 0) 43.76%, #0a131d 90.98%), 
                    url('../img/background/hero-img.png');
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        filter: blur(1px);
    }

    .hero {
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), linear-gradient(180deg, rgba(17, 17, 47, 0) 43.76%, #0a131d 90.98%),url('../img/background/hero-img.png'); /* Replace with real image path */
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


        /* Carousel styles */
        @media (min-width: 768px) {
          .carousel-inner {
            display: flex;
          }
          .carousel-item {
            margin-right: 0;
            flex: 0 0 33.333333%;
            display: block;
          }
        }
        .carousel-inner{
            padding: 1em;
        }
        .card{
            margin: 0 .5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
        }
        .carousel-control-prev, .carousel-control-next{
            background-color: #e1e1e1;
            width: 6vh;
            height: 6vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        .card .img-wrapper {
          max-width: 100%;
          height: 13em;
          display: flex;
          justify-content: center;
          align-items: center;
        }
        img{
          max-height: 100%;
        }
    </style>
<style>
    /* Calendar Grid Layout */
    .calendar-grid {
        border: 1px solid #dee2e6;
        border-radius: 4px;
        overflow: hidden;
    }

    .calendar-grid .row {
        margin: 0;
    }

    .calendar-grid .col {
        padding: 10px
    }

    /* Day Names Header */
    .day-names {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        font-weight: bold;
        font-size: 0.9rem;
    }

    .day-names .col {
        padding: 10px 5px;
        border-right: 1px solid #dee2e6;
    }

    .day-names .col:last-child {
        border-right: none;
    }

    /* Day Cells */
    .day-cell {
        min-height: 120px;
        border-right: 1px solid #dee2e6;
        border-bottom: 1px solid #dee2e6;
        padding: 10px;
        position: relative;
        background-color: white;
        overflow: hidden;
    }

    .day-cell:last-child {
        border-right: none;
    }

    .day-number {
        font-weight: bold;
        font-size: 0.9rem;
        margin-bottom: 8px;
        color: #333;
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        padding: 10px;
    }

    /* Other Month Days */
    .other-month-day {
        background-color: #f8f9fa;
        color: #6c757d;
    }

    .other-month-day .day-number {
        color: #6c757d;
    }

    /* Current Month Days */
    .current-month-day {
        background-color: white;
    }

    /* Today Highlight */
    .today-highlight {
        background-color: #e3f2fd !important;
        border: 2px solid #2196f3 !important;
    }

    .today-header-highlight {
        color: #2196f3 !important;
        font-weight: bold !important;
    }

    /* Event Styling */
    .calendar-grid .event {
        font-size: 0.75rem;
        padding: 6px 8px;
        border-radius: 4px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 100%;
        display: block;
        transition: all 0.2s ease;
        border: none;
        font-weight: 500;
        line-height: 1.2;
    }

    .calendar-grid .event:hover {
        transform: scale(1.02);
        box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }

    /* Event Colors - Simplified */
    .event-temuduga {
        background-color: #e3f2fd !important;
        color: #1976d2 !important;
        padding: 10px 0px;
    }

    .event-mesyuarat {
        background-color: #e8f5e8 !important;
        color: #2e7d32 !important;
    }

    /* Status-based colors (fallback) */
    .status-new {
        background-color: #e3f2fd !important;
        color: #1976d2 !important;
    }

    .status-pending {
        background-color: #fff3e0 !important;
        color: #f57c00 !important;
    }

    .status-approved {
        background-color: #e8f5e8 !important;
        color: #2e7d32 !important;
    }

    .status-rejected {
        background-color: #ffebee !important;
        color: #c62828 !important;
    }

    .status-default {
        background-color: #f5f5f5 !important;
        color: #424242 !important;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .day-cell {
            min-height: 100px;
            padding: 6px;
        }
        
        .calendar-grid .event {
            font-size: 0.7rem;
            padding: 4px 6px;
            margin: 3px 0;
        }
    }

    .room-section {
      padding: 40px 0;
    }
    .room-info h5 {
      font-weight: bold;
      margin-bottom: 5px;
    }
    .room-info p {
      margin-bottom: 15px;
    }
    .room-info ul {
      padding-left: 20px;
    }
    .room-images img {
      border-radius: 15px;
      width: 100%;
      height: auto;
      margin-bottom: 20px;
      object-fit: cover;
    }
    .section-title {
      color: #1f4c85;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: start;
    }
</style>
@endpush

@section('content')

  <!-- Introduction Section -->
  <section class="theme-color  py-5 text-center">
    {{-- PENGENALAN SISTEM E-TEMPAHAN --}}
    <div class="container">
      <h2 class="fw-bold">KALENDAR</h2>
      <h2 class="fw-bold">FASILITI DAN RUANG BILIK</h2>
      <p class="mt-3">Sistem eTempahan dibangunkan bagi kemudahan warga KK membuat tempahan:</p>

    </div>

    <!-- Calendar Header -->
    <div class="container mt-5">

      @include('website.calender')

    </div>

    {{-- GALERI --}}
    <div id="" class="container mt-5 pt-3">
      <h2 class="fw-bold">GALERI</h2>
      <p class="mt-3">Fasiliti bilik / Ruang bilik yang disediakan di Kementerian Komunikasi</p>

          <div id="carouselExampleControls" class="carousel" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
              <div class="carousel-item">
                <div class="card">
                        <div class="img-wrapper">
                        <img src="https://placehold.co/600x400/1a237e/ffffff?text=Dewan+Serbaguna+B1" class="card-img-top" alt="Dewan Serbaguna B1">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Dewan Serbaguna B1</h5>
                            <p class="card-text">Aras 21</p>
                        </div>
                    </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

    </div>

</section>

  <section class="py-5 bg-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3 text-dark">HUBUNGI KAMI</h2>
        <p class="mb-4 text-dark">Sekiranya anda mempunyai masalah sistem atau inginkan penjelasan terperinci, sila hubungi kami di:</p>

        <div class="rounded-4 p-4" style="background: linear-gradient(to right,#0a131d, #285689, #2a75cb); color: white;">
        <div class="row align-items-center text-start">
            
            <!-- Contact Person -->
            <div class="col-md-4 mb-4 mb-md-0 text-center">
            <h5 class="fw-bold">Mohd Zahar bin Zaidin</h5>
            <p class="mb-1">Aras 27, Bahagian Khidmat Pengurusan</p>
            <p class="mb-1">zahar@komunikasi.gov.my</p>
            <p class="mb-0">03-89115525</p>
            </div>

            <!-- Center: Logo and Text -->
            <div class="col-md-4 text-center mb-4 mb-md-0">
            <h5 class="fw-bold">Masalah sistem laporkannya di:</h5>
            <div class="d-flex justify-content-center">
              <img src="{{asset('img/img4.png')}}" alt="Aduan ICT Logo" style="max-height: 100px;">
            </div>
            </div>

            <!-- Right: Email -->
            <div class="col-md-4 text-center">
            <h5 class="fw-bold">Emailkannya</h5>
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

@push('js')
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
        var carouselWidth = $(".carousel-inner")[0].scrollWidth;
        var cardWidth = $(".carousel-item").width();
        var scrollPosition = 0;

        $(".carousel-control-next").on("click", function () {
          if (scrollPosition < (carouselWidth - cardWidth * 4)) { //check if you can go any further
            scrollPosition += cardWidth;  //update scroll position
            $(".carousel-inner").animate({ scrollLeft: scrollPosition },600); //scroll left
          }
        });

        $(".carousel-control-prev").on("click", function () {
          if (scrollPosition > 0) {
            scrollPosition -= cardWidth;
            $(".carousel-inner").animate(
              { scrollLeft: scrollPosition },
              600
            );
          }
        });

        var multipleCardCarousel = document.querySelector(
          "#carouselExampleControls"
        );
        if (window.matchMedia("(min-width: 768px)").matches) {
          //rest of the code
          var carousel = new bootstrap.Carousel(multipleCardCarousel, {
            interval: false
          });
        } else {
          $(multipleCardCarousel).addClass("slide");
        }

        var carousel = new bootstrap.Carousel(multipleCardCarousel, {
          interval: false,
          wrap: false,
        });
    </script>
@endpush

@push('js')
<script>
    // Pass PHP data to JavaScript
    window.calendarEvents = @json($bookings);
</script>
<script src="{{ asset('admin2/js/Calender2.js') }}"></script>
@endpush