<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'E-Tempahan')</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin2/css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('admin2/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('app.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    @stack('css')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('layouts.main.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('layouts.main.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @include('layouts.main.breadcrumb')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
     <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bersedia untuk Log Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Log Keluar" di bawah jika anda bersedia untuk menamatkan sesi semasa anda.</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Log Keluar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="{{ asset('admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin2/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('admin2/js/Calender1.js') }}"></script>
    <script src="{{ asset('admin2/js/Calender2.js') }}"></script>
    <script src="{{ asset('admin2/js/Calender3.js') }}"></script>
    <script src="{{ asset('admin2/js/Dropdown.js') }}"></script>
    <script src="{{ asset('admin2/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin2/js/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    @stack('js')
</body>
</html>