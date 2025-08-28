        <!-- Sidebar -->
        <ul class="navbar-nav bg-light sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <img class="ml-3" src="{{asset('img/logo/img-logo.png')}}" alt="" width="36" height="30">
                <div class="sidebar-brand-text mx-2">eTempahan</div>
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
            @role('User')
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.calendar.index', Auth::id())}}">
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
             @php
                $userBookRoutes = ['user.search.index', 'user.booking.list', 'user.booking.adhoc'];
                $isuserBookActive = in_array(Route::currentRouteName(), $userBookRoutes);
            @endphp
            <li class="nav-item {{ $isuserBookActive ? 'active' : '' }}">
                <a class="nav-link {{ $isuserBookActive ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseTempahan"
                    aria-expanded="{{ $isuserBookActive ? 'true' : 'false' }} aria-controls="collapseTempahan">
                    <i class="far fa-fw fa-calendar"></i>
                    <span>Tempahan</span>
                </a>
                <div id="collapseTempahan" class="collapse {{ $isuserBookActive ? 'show' : '' }}" aria-labelledby="headingTempahan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                        <a class="collapse-item" href="{{ route('user.search.index') }}">Carian Bilik</a>
                        <a class="collapse-item" href="{{ route('user.booking.list', 1) }}">Permohonan Baharu</a>
                        <a class="collapse-item" href="{{ route('user.booking.adhoc') }}">Permohonan Ad-Hoc</a>
                        <a class="collapse-item" href="{{ route('user.booking.list', 6) }}">Kemaskini</a>
                        <a class="collapse-item" href="{{ route('user.booking.list', 3) }}">Pengesahan</a>
                        <a class="collapse-item" href="{{ route('user.booking.list', 5) }}">Pembatalan</a>
                        <a class="collapse-item" href="{{ route('user.booking.list', 0) }}">Senarai Tempahan</a>
                    </div>
                </div>
            </li>
            @endrole

            @hasanyrole('Admin|Super Admin')
            <!-- Nav Item - Bilik Collapse Menu -->
                    @php
                        $bilikRoutes = ['rooms.index', 'rooms.create', 'rooms.show', 'rooms.edit', 'rooms.cancelled'];
                        $isBilikActive = in_array(Route::currentRouteName(), $bilikRoutes);
                    @endphp
            <li class="nav-item {{ $isBilikActive ? 'active' : '' }}">
                <a class="nav-link {{ $isBilikActive ? 'active' : '' }}" href="{{ route('rooms.index') }}">
                    <i class="fas fa-fw fa-map-marked-alt"></i>
                    <span>Bilik</span>
                </a>

                <div id="collapseBilik" class="collapse {{ $isBilikActive ? 'show' : '' }}"
                        aria-labelledby="headingBilik" data-parent="#accordionSidebar">
                    <div class="collapse {{ $isBilikActive ? 'show' : '' }}" id="collapseBilik"
                        aria-labelledby="headingBilik" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item {{ Route::currentRouteName() == 'rooms.create' ? 'active' : '' }}" href="{{ route('rooms.create') }}">Tambah</a>
                            <a class="collapse-item {{ in_array(Route::currentRouteName(), ['rooms.show', 'rooms.edit']) ? 'active' : '' }}" href="{{ route('rooms.index') }}"> Kemaskini</a>
                            <a class="collapse-item {{ Route::currentRouteName() == 'rooms.cancelled' ? 'active' : '' }}" href="{{ route('rooms.cancelled') }}">Padam</a>
                        </div>
                    </div>
                </div>
            </li>

            @php
                $semakanRoutes = ['booking.index', 'booking.show','booking.cancel.index', 'booking.cancelled.show', 'booking.create', 'booking.adhoc']; // all routes for Semakan Tempahan
                $isSemakanActive = in_array(Route::currentRouteName(), $semakanRoutes);
            @endphp
            <li class="nav-item {{ $isSemakanActive ? 'active' : '' }}">
                <a class="nav-link {{ $isSemakanActive ? 'active' : '' }}" href="{{ route('booking.index') }}">
                    <i class="fas fa-fw fa-search-location"></i>
                    <span>Semakan Tempahan</span>
                </a>
                <div id="collapseSemakan" class="collapse {{ $isSemakanActive ? 'show' : '' }}"
                    aria-labelledby="headingSemakan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Route::currentRouteName() == 'booking.index' ? 'active' : '' }}" href="{{ route('booking.index') }}">Baharu</a>
                        <a class="collapse-item {{ Route::currentRouteName() == 'booking.show' ? 'active' : '' }}" href="{{ route('booking.index') }}">Kemaskini</a>
                        <a class="collapse-item {{ in_array(Route::currentRouteName(), ['booking.cancel.index', 'booking.cancelled.show']) ? 'active' : '' }}" href="{{ route('booking.cancel.index') }}">Batal</a>

                        <a class="collapse-item {{ Route::currentRouteName() == 'booking.adhoc' ? 'active' : '' }}" href="#">Ad-hoc</a>
                    </div>
                </div>
            </li>
            @endhasanyrole
            

            @role('User')
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.profile.index')}}">
                    <i class="far fa-fw fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
            @endrole

            @role('Admin')
            <li class="nav-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengurusan Pengguna</span>
                </a>
            </li>

            <!-- Pengurusan Organisasi -->
            <li class="nav-item {{ request()->routeIs('organization.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('organization.index') }}">
                    <i class="fas fa-fw fa-sitemap"></i>
                    <span>Pengurusan Organisasi</span>
                </a>
            </li>

            <!-- Laporan -->
            <li class="nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('reports.index') }}">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
            </li>

            @endrole
            
            @role('Super Admin')

            <!-- Pengurusan Organisasi -->
            <li class="nav-item {{ request()->routeIs('organization.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('organization.index') }}">
                    <i class="fas fa-fw fa-sitemap"></i>
                    <span>Pengurusan Organisasi</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pentadbiran
            </div>

            <!-- Nav Item - Pentadbir Collapse Menu -->
            <li class="nav-item {{ request()->routeIs('audit*') || request()->routeIs('record_user_activity*') || request()->routeIs('calendar*') || request()->routeIs('report') || request()->routeIs('pengurusan_pengguna*') ? 'active' : '' }}">
                <a class="nav-link {{ request()->routeIs('audit*') || request()->routeIs('record_user_activity*') || request()->routeIs('calendar*') || request()->routeIs('report') || request()->routeIs('pengurusan_pengguna*') ? '' : 'collapsed' }}" 
                   href="#" data-toggle="collapse" data-target="#collapsePentadbir"
                   aria-expanded="{{ request()->routeIs('audit*') || request()->routeIs('record_user_activity*') || request()->routeIs('calendar*') || request()->routeIs('report') || request()->routeIs('pengurusan_pengguna*') ? 'true' : 'false' }}" 
                   aria-controls="collapsePentadbir">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>Pentadbir</span>
                </a>
                <div id="collapsePentadbir" class="collapse {{ request()->routeIs('audit*') || request()->routeIs('record_user_activity*') || request()->routeIs('calendar*') || request()->routeIs('report') || request()->routeIs('pengurusan_pengguna*') ? 'show' : '' }}" 
                     aria-labelledby="headingPentadbir" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->routeIs('reports') ? 'active' : '' }}" href="{{ route('reports.index') }}">Laporan</a>
                        <a class="collapse-item {{ request()->routeIs('audit*') || request()->routeIs('record_user_activity*') ? 'active' : '' }}" href="{{ route('audit') }}">Log Audit</a>
                        <a class="collapse-item {{ request()->routeIs('calendar*') ? 'active' : '' }}" href="{{ route('calendar') }}">Kalendar</a>
                        <a class="collapse-item {{ request()->routeIs('pengurusan_pengguna*') ? 'active' : '' }}" href="{{ route('pengurusan_pengguna') }}">Pengurusan Pengguna</a>
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
        