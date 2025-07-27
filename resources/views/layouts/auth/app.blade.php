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
      background: linear-gradient(135deg, #008080, #299D91);
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
      border-color: #299D91;
      box-shadow: none;
    }
    .btn-primary {
      background-color: #299D91;
      border: none;
    }
    .btn-outline-primary {
       --bs-btn-color: #299D91;
      --bs-btn-border-color: #299D91;
      --bs-btn-hover-color: #fff;
      --bs-btn-hover-bg: #299D91;
      --bs-btn-hover-border-color: #299D91;
      --bs-btn-focus-shadow-rgb: 25, 135, 84;
      --bs-btn-active-color: #fff;
      --bs-btn-active-bg: #299D91;
      --bs-btn-active-border-color: #299D91;
      --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
      --bs-btn-disabled-color: #299D91;
      --bs-btn-disabled-bg: transparent;
      --bs-btn-disabled-border-color: #299D91;
      --bs-gradient: none;
    }
    .btn-primary:hover {
      background-color: #299D91;
    }
    .footer {
      background-color: #299D91;
      color: white;
      padding: 2rem 0;
    }
    .footer a {
      color: white;
      text-decoration: none;
    }
    .footer a:hover {
      text-decoration: underline;
    }
    .top-bar .btn {
      background-color: #299D91;
      color: white;
    }
    .top-bar .btn:hover {
      background-color: #299D91;
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
    <div class="container">
      <div class="row text-center text-md-start">
        <div class="col-md-4 mb-3 mb-md-0">
          <img src="{{asset('img/logo/img-logo.png')}}" alt="Logo" width="50">
          <h5 class="mt-2">eTempahan</h5>
          <p class="small">Kementerian Komunikasi</p>
        </div>
        <div class="col-md-2">
          <h6>Pautan</h6>
          <ul class="list-unstyled small">
            <li><a href="#">Laman Utama</a></li>
            <li><a href="#">Dasar Privasi</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Hubungi Kami</h6>
          <ul class="list-unstyled small">
            <li><i class="bi bi-envelope-fill"></i> info@komunikasi.gov.my</li>
            <li><i class="bi bi-telephone-fill"></i> 03 - 1234 5678</li>
            <li><i class="bi bi-telephone"></i> 03 - 1234 5678</li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Alamat</h6>
          <p class="small">
            Aras 6, Kompleks Komunikasi,<br>
            Presint 4, 62000 Putrajaya, Malaysia.
          </p>
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
