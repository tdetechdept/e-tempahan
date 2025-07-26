        <!-- Sidebar -->
        <ul class="navbar-nav bg-light sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">eTempahan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="nav-link " href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Papan Pemuka</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            @role('user')
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-calendar-alt"></i>
                    <span>Kalendar</span></a>
            </li>
            <hr class="sidebar-divider">
            @endrole

            @role('User')
            <!-- Heading -->
            <div class="sidebar-heading">
                Tempahan
            </div>

            <!-- Nav Item - Tempahan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTempahan"
                    aria-expanded="true" aria-controls="collapseTempahan">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Tempahan</span>
                </a>
                <div id="collapseTempahan" class="collapse" aria-labelledby="headingTempahan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="#">Carian Bilik</a>
                        <a class="collapse-item" href="#">Permohonan Baharu</a>
                        <a class="collapse-item" href="#">Permohonan Ad-Hoc</a>
                        <a class="collapse-item" href="#">Kemaskini</a>
                        <a class="collapse-item" href="#">Pengesahan</a>
                        <a class="collapse-item" href="#">Pembatalan</a>
                        <a class="collapse-item" href="#">Senarai Tempahan</a>
                    </div>
                </div>
            </li>
            @endrole

            @hasanyrole('Admin|Super Admin')
            <!-- Nav Item - Bilik Collapse Menu -->
                    @php
                        $bilikRoutes = ['rooms.index', 'rooms.create', 'rooms.cancelled'];
                        $isBilikActive = in_array(Route::currentRouteName(), $bilikRoutes);
                    @endphp
            <li class="nav-item {{ $isBilikActive ? 'active' : '' }}">
                <a class="nav-link {{ $isBilikActive ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
                    data-target="#collapseBilik" aria-expanded="{{ $isBilikActive ? 'true' : 'false' }}"
                    aria-controls="collapseBilik">
                    <i class="fas fa-fw fa-map-marked-alt"></i>
                    <span>Bilik</span>
                </a>

                <div id="collapseBilik" class="collapse {{ $isBilikActive ? 'show' : '' }}"
                        aria-labelledby="headingBilik" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::is('rooms.index') ? 'active' : '' }}"
                            href="{{ route('rooms.index') }}">Carian Bilik</a>
                        <a class="collapse-item {{ Route::is('rooms.edit') || Route::is('rooms.edit*') ? 'active' : '' }}"
                            href="{{ route('rooms.index') }}">Kemaskini</a>
                        <a class="collapse-item {{ Route::is('rooms.cancelled') ? 'active' : '' }}"
                            href="{{ route('rooms.cancelled') }}">Batal</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Semakan Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSemakan"
                    aria-expanded="true" aria-controls="collapseSemakan">
                    <i class="fas fa-fw fa-search-location"></i>
                    <span>Semakan Tempahan</span>
                </a>
                <div id="collapseSemakan" class="collapse" aria-labelledby="headingSemakan"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Semakan:</h6> --}}
                        <a class="collapse-item" href="#">Baharu</a>
                        <a class="collapse-item" href="{{ route('booking.index') }}">Kemaskini</a>
                        <a class="collapse-item" href="{{ route('booking.cancel.index') }}">Batal</a>
                        <a class="collapse-item" href="#">Ad-hoc</a>
                    </div>
                </div>
            </li>
            @endhasanyrole
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            @role('User')
            <li class="nav-item">
                <a class="nav-link" href="{{route('profile.index')}}">
                    <i class="far fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            @endrole

            @role('Admin')
            <li class="nav-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengurusan Pengguna</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            @endrole
            
            @role('Super Admin')

            <!-- Heading -->
            <div class="sidebar-heading">
                Pentadbiran
            </div>

            <!-- Nav Item - Pentadbir Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePentadbir"
                    aria-expanded="true" aria-controls="collapsePentadbir">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pendtadbir</span>
                </a>
                <div id="collapsePentadbir" class="collapse" aria-labelledby="headingPentadbir" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan:</h6>
                        <a class="collapse-item" href="#">Laporan</a>
                        <a class="collapse-item" href="#">Log Audit</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Pengurusan:</h6>
                        <a class="collapse-item" href="#">Kalendar</a>
                        <a class="collapse-item" href="#">Pengurusan Pengguna</a>
                    </div>
                </div>
            </li>
            @endrole

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Log Keluar -->
            <li class="nav-item mt-auto"> <!-- mt-auto pushes it to the bottom -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <button class="nav-link btn btn-link" type="submit" style="color: inherit; text-decoration: none;">
                        <i class="fas fa-sign-out-alt"></i>
                        Log Keluar
                    </button>
                </form>
                {{-- <a class="nav-link" href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    Log Keluar
                </a> --}}
            </li>

        </ul>
        <!-- End of Sidebar -->