    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        {{-- <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> --}}

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

                        <!-- Nav Item - Messages -->
            {{-- <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="messagesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">7</span>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                alt="...">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                problem I've been having.</div>
                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                        </div>
                    </a>
                </div>
            </li> --}}

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="alertsDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    @php
                        $notifyUser = App\Models\User::userUnreadNotifications(Auth::user()->id);
                    @endphp
                    @if ($notifyUser->count())
                        <span class="badge badge-danger badge-counter">{{$notifyUser->count()}}</span>
                    @endif
                </a>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Notifikasi
                    </h6>
                    @if ($notifyUser->count())

                    @foreach ($notifyUser as $notification)
                        @php
                            switch ($notification->status) {
                                case 1:
                                    $statusLabel = 'diterima dan perlu semakan';
                                    break;
                                case 2:
                                    $statusLabel = 'sedang Menunggu Pengesahan';
                                    break;
                                case 3:
                                    $statusLabel = 'telah Diluluskan';
                                    break;
                                case 4:
                                    $statusLabel = 'telah Dibatalkan';
                                    break;
                                case 5:
                                    $statusLabel = 'Dibatalkan';
                                    break;
                                case 6:
                                    $statusLabel = 'Kemaskini';
                                    break;
                                case 7:
                                    $statusLabel = 'Disahkan';
                                    break;
                                default:
                                    $statusLabel = 'sedang Menunggu Pengesahan';
                            }
                        @endphp

                        @if(auth()->user()->hasRole('User'))
                            <a class="dropdown-item d-flex align-items-center" href="{{route('user.booking.show', [$notification->id, 'read' => 1])}}">
                        @else
                            <a class="dropdown-item d-flex align-items-center" href="{{route('booking.show', [$notification->id, 'read' => 1])}}">
                        @endif

                            <div class="mr-3">
                                <div class="icon-circle">
                                    {{-- <i class="fas fa-file-alt text-white"></i> --}}
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.91508 0.20724C3.0839 0.0603433 3.30417 -0.0134708 3.52742 0.00203613C3.75067 0.017543 3.95862 0.121101 4.10552 0.289928C4.25241 0.458754 4.32623 0.679021 4.31072 0.902272C4.29521 1.12552 4.19166 1.33347 4.02283 1.48037C2.72345 2.61062 1.8407 4.26512 1.6847 6.16262C1.6664 6.38565 1.56025 6.59227 1.38961 6.73704C1.21896 6.8818 0.997796 6.95285 0.774766 6.93455C0.551735 6.91625 0.345109 6.8101 0.200343 6.63946C0.0555763 6.46881 -0.0154718 6.24765 0.00282811 6.02462C0.195578 3.68387 1.2872 1.62324 2.91508 0.20724ZM13.3326 0.28974C13.4795 0.120986 13.6874 0.0174924 13.9106 0.00202122C14.1338 -0.01345 14.354 0.0603678 14.5228 0.20724C16.1503 1.62324 17.2423 3.68349 17.4347 6.02462C17.4461 6.13627 17.4352 6.24909 17.4025 6.35646C17.3698 6.46384 17.316 6.56361 17.2443 6.64993C17.1725 6.73626 17.0843 6.8074 16.9847 6.8592C16.8851 6.91099 16.7762 6.9424 16.6644 6.95158C16.5525 6.96076 16.4399 6.94753 16.3332 6.91266C16.2265 6.8778 16.1279 6.82199 16.043 6.74852C15.9582 6.67504 15.8888 6.58538 15.8391 6.48477C15.7893 6.38417 15.7601 6.27464 15.7532 6.16262C15.5968 4.26512 14.7145 2.61062 13.4151 1.47999C13.2463 1.33308 13.1428 1.12516 13.1274 0.901949C13.1119 0.678741 13.1857 0.458528 13.3326 0.28974ZM8.71895 1.03112C11.6882 1.03112 14.164 3.30361 14.4175 6.26199L14.5971 8.35824C14.6773 9.29372 14.9759 10.1973 15.469 10.9964L16.0206 11.8904C16.5748 12.7877 16.2726 13.7151 15.2271 13.8542C14.0316 14.0132 12.0351 14.1557 8.71895 14.1557C5.40283 14.1557 3.40633 14.0132 2.21083 13.8542C1.16533 13.7151 0.863078 12.7877 1.41695 11.8904L1.96895 10.9967C2.46223 10.1975 2.761 9.29364 2.8412 8.35787L3.0212 6.26162C3.27395 3.30362 5.74933 1.03112 8.71895 1.03112ZM8.71895 15.2811C7.49983 15.2811 6.45245 15.2624 5.55283 15.2297C5.85298 15.8103 6.30705 16.2971 6.86535 16.6369C7.42365 16.9766 8.06465 17.1563 8.7182 17.1561C9.37176 17.1563 10.0128 16.9766 10.5711 16.6369C11.1294 16.2971 11.5834 15.8103 11.8836 15.2297C10.984 15.262 9.9377 15.2811 8.71895 15.2811Z" fill="#285689"/>
                                    </svg>

                                </div>
                            </div>
                            <div>
                                @if ($notification->status == 1)
                                    <span class="">Permohonan baharu tempahan bilik {{ $notification->room->room_name }} {{ $statusLabel }}</span>
                                @elseif ($notification->status == 2 || $notification->status == 3 || $notification->status == 4)
                                    <span class="">Tempahan bilik {{ $notification->room->room_name }} anda {{ $statusLabel }}</span>
                                @elseif ($notification->status == 5 || $notification->status == 6 || $notification->status == 7)
                                    <span class="">Tempahan bilik {{ $notification->room->room_name }} telah {{ $statusLabel }} oleh pemohon</span>
                                @endif
                                <div class="small text-gray-500">{{ $notification->created_at->format('F d, Y') }}</div>
                            </div>
                        </a>
                    @endforeach

                    @else
                        <div class="text-center p-3">
                            Tiada notifikasi baru
                        </div>
                    @endif
                    {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle">
                                <i class="fas fa-file-alt text-white"></i>
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.91508 0.20724C3.0839 0.0603433 3.30417 -0.0134708 3.52742 0.00203613C3.75067 0.017543 3.95862 0.121101 4.10552 0.289928C4.25241 0.458754 4.32623 0.679021 4.31072 0.902272C4.29521 1.12552 4.19166 1.33347 4.02283 1.48037C2.72345 2.61062 1.8407 4.26512 1.6847 6.16262C1.6664 6.38565 1.56025 6.59227 1.38961 6.73704C1.21896 6.8818 0.997796 6.95285 0.774766 6.93455C0.551735 6.91625 0.345109 6.8101 0.200343 6.63946C0.0555763 6.46881 -0.0154718 6.24765 0.00282811 6.02462C0.195578 3.68387 1.2872 1.62324 2.91508 0.20724ZM13.3326 0.28974C13.4795 0.120986 13.6874 0.0174924 13.9106 0.00202122C14.1338 -0.01345 14.354 0.0603678 14.5228 0.20724C16.1503 1.62324 17.2423 3.68349 17.4347 6.02462C17.4461 6.13627 17.4352 6.24909 17.4025 6.35646C17.3698 6.46384 17.316 6.56361 17.2443 6.64993C17.1725 6.73626 17.0843 6.8074 16.9847 6.8592C16.8851 6.91099 16.7762 6.9424 16.6644 6.95158C16.5525 6.96076 16.4399 6.94753 16.3332 6.91266C16.2265 6.8778 16.1279 6.82199 16.043 6.74852C15.9582 6.67504 15.8888 6.58538 15.8391 6.48477C15.7893 6.38417 15.7601 6.27464 15.7532 6.16262C15.5968 4.26512 14.7145 2.61062 13.4151 1.47999C13.2463 1.33308 13.1428 1.12516 13.1274 0.901949C13.1119 0.678741 13.1857 0.458528 13.3326 0.28974ZM8.71895 1.03112C11.6882 1.03112 14.164 3.30361 14.4175 6.26199L14.5971 8.35824C14.6773 9.29372 14.9759 10.1973 15.469 10.9964L16.0206 11.8904C16.5748 12.7877 16.2726 13.7151 15.2271 13.8542C14.0316 14.0132 12.0351 14.1557 8.71895 14.1557C5.40283 14.1557 3.40633 14.0132 2.21083 13.8542C1.16533 13.7151 0.863078 12.7877 1.41695 11.8904L1.96895 10.9967C2.46223 10.1975 2.761 9.29364 2.8412 8.35787L3.0212 6.26162C3.27395 3.30362 5.74933 1.03112 8.71895 1.03112ZM8.71895 15.2811C7.49983 15.2811 6.45245 15.2624 5.55283 15.2297C5.85298 15.8103 6.30705 16.2971 6.86535 16.6369C7.42365 16.9766 8.06465 17.1563 8.7182 17.1561C9.37176 17.1563 10.0128 16.9766 10.5711 16.6369C11.1294 16.2971 11.5834 15.8103 11.8836 15.2297C10.984 15.262 9.9377 15.2811 8.71895 15.2811Z" fill="#285689"/>
                                </svg>

                            </div>
                        </div>
                        <div>
                            <span class="">Tempahan bilik mesyuarat kesumba anda telah diluluskan</span>
                            <div class="small text-gray-500">December 12, 2019</div>
                        </div>
                    </a> --}}
                    {{-- <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-success">
                                <i class="fas fa-donate text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 7, 2019</div>
                            $290.29 has been deposited into your account!
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                            <div class="icon-circle bg-warning">
                                <i class="fas fa-exclamation-triangle text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500">December 2, 2019</div>
                            Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                    </a> --}}
                    {{-- <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a> --}}
                </div>
            </li> 

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle"
                        src="{{ asset('/admin2/img/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{route('user.profile.index')}}">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile Saya
                    </a>
                    {{-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log Keluar
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->