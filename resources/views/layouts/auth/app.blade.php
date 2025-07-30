<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eTempahan - Kementerian Komunikasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #eef4f5;
    }
    .header, .footer {
      background-color: white;
    }
    .left-box {
      background: linear-gradient(45deg, #183555, #285689);
      border-radius: 10px;
      color: white;
      padding: 10rem 2rem;
      height: 100% !important;
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
    }
    .login-box {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
      overflow: hidden;
    }
    .form-control:focus {
      border-color: #285689;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #285689;
      border: none;
    }
    .btn-outline-primary {
       --bs-btn-color: #285689;
      --bs-btn-border-color: #285689;
      --bs-btn-hover-color: #fff;
      --bs-btn-hover-bg: #285689;
      --bs-btn-hover-border-color: #285689;
      --bs-btn-focus-shadow-rgb: 25, 135, 84;
      --bs-btn-active-color: #fff;
      --bs-btn-active-bg: #285689;
      --bs-btn-active-border-color: #285689;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #285689;
      --bs-btn-disabled-bg: transparent;
      --bs-btn-disabled-border-color: #285689;
      --bs-gradient: none;
    }
    .btn-primary:hover {
      background-color: #285689;
    }
     .footer {
      background-color: #1f4c85; /* dark blue background */
      color: white;
      padding: 40px 0;
    }
    .footer a {
      color: white;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
    .footer .logo {
      max-width: 100px;
      max-height: 80px;
    }
    .footer h5 {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .footer p {
      font-size: 15px;
      font-weight: 100;
    }
    .top-bar .btn {
      background-color: #285689;
      color: white;
    }
    .top-bar .btn:hover {
      background-color: #285689;
    }
    a {
      color: #285689;
    }
    a .text-theme{
            color: #285689;
        }
  </style>

     <!-- Custom styles for this page -->
      @stack('css')
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Header -->
  <div class="top-bar d-flex justify-content-between align-items-center px-4 py-3">
    <div class="d-flex align-items-center">
      <a href="{{ url('/') }}" class="d-flex text-dark align-items-center text-decoration-none">
        <img src="{{asset('img/logo/img-logo.png')}}" alt="Jata Negara" width="40">
        <span class="ms-2 fw-semibold">Kementerian Komunikasi</span>
      </a>
    </div>
    <a href="{{ route('register') }}" class="btn btn-sm">Daftar</a>
  </div>

  <!-- Login Form -->
  <div class="container my-5">
        @yield('content')
  </div>

  <!-- Footer -->
<footer class="footer mt-auto">
  <div class="container mt-3">
    <div class="row text-white">
      <!-- Logo & Title -->
      <div class="col-md-4 mb-4">
        <div class="d-flex flex-row bd-highlight mb-3">
          <div class="p-2 bd-highlight me-2">
            <img src="{{asset('img/logo/img-logo.png')}}" alt="Logo" class="logo mb-3">
          </div>
          <div class="p-2 bd-highlight text-center">
            <h3>eTempahan</h3>
            <hr>
            <p>Kementerian Komunikasi</p>
          </div>
        </div>
        
      </div>
      
      <!-- Pautan -->
      <div class="col-md-2 mb-4">
        <h5>Pautan</h5>
        <ul class="list-unstyled">
          <li><a href="#">Laman Utama</a></li>
          <li><a href="#">Dasar Privasi</a></li>
        </ul>
      </div>

      <!-- Hubungi Kami -->
      <div class="col-md-3 mb-4">
        <h5>Hubungi Kami</h5>
        <p><i class="bi bi-envelope"></i> Info@komunikasi.gov.my</p>
        <p><i class="bi bi-telephone"></i> 03 - 1234 5678 &nbsp; 03 - 1234 5678</p>
      </div>

      <!-- Alamat -->
      <div class="col-md-3 mb-4">
        <h5>Alamat</h5>
        <p><i class="bi bi-geo-alt"></i> Aras 5, Kompleks Komunikasi,<br>
           Presint 4,<br>
           62100 Putrajaya, Malaysia.</p>
      </div>
    </div>
  </div>
</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <script>
        $(".formattedInputICWithoutDash").on("input", function () {
            var value = $(this).val().replace(/\D/g, ""); // Remove non-digits

            if (value.length > 12) {
                value = value.substring(0, 12);
            }

            $(this).val(value);
        });
    </script>
    <!-- Custom styles for this page -->
      @stack('js')
</body>
</html>
