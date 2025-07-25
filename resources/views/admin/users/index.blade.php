@extends('layouts.main.app')

@section('title', 'User Management')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.index')}}" class="text-decoration-none text-success">Pengurusan Pengguna</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Senarai Pengguna/Pendaftaran</h3>
                <div class="eb-tabs-tables">
                    @php
                        // Internal keys
                        $statuses = ['all', 'new', 'approved', 'rejected', 'cancelled'];

                        // Labels to show in UI (can be translated)
                        $statusLabels = [
                            'all' => 'Semua',
                            'new' => 'Baharu',
                            'approved' => 'Diluluskan',
                            'rejected' => 'Ditolak',
                            'cancelled' => 'Dibatalkan',
                        ];

                        $activeFilter = strtolower(request('filter', 'all'));
                    @endphp

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach ($statuses as $key)
                            @php
                                $isActive = $activeFilter === $key;
                            @endphp
                            <li class="nav-item">
                                <!-- <a href="{{ route('users.index', ['filter' => $key]) }}#{{ $key }}"
                                    class="nav-link {{ $isActive ? 'active' : '' }}" data-status-filter="{{ $key }}">
                                    {{ $statusLabels[$key] }}
                                </a> -->
                                <a href="javascript:void(0);" 
                                    class="nav-link {{ $isActive ? 'active' : '' }}" 
                                    data-status-filter="{{ $key }}">
                                    {{ $statusLabels[$key] }}
                                 </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                <div class="table-responsive eb-table-main">
                                    <table id="userMgmtTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Pegawai</th>
                                                <th>Bahagian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        @include('admin.users.partials.table', ['users' => $users])
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

    @push('js')
        <script>
            $.fn.dataTable.ext.errMode = 'none';
            let userTable;

            function initializeDataTable() {
                userTable = $('#userMgmtTable').DataTable({
                    destroy: true,
                    pageLength: 5,
                    lengthMenu: [5, 10, 20, 50, -1],
                    ordering: true,
                    dom: 'ft<"d-flex justify-content-between align-items-center mt-3"lp>',
                    language: {
                        search: '',
                        searchPlaceholder: 'Search rooms...',
                        lengthMenu: 'Tunjuk <select class="form-select form-select-sm">' +
                            '<option value="5">5</option>' +
                            '<option value="10">10</option>' +
                            '<option value="20">20</option>' +
                            '<option value="50">50</option>' +
                            '<option value="-1">All</option>' +
                            '</select> pengguna',
                        paginate: {
                            previous: '<',
                            next: '>'
                        },
                    },
                });

                // Bind row click
                $('#userMgmtTable tbody').on('click', 'tr', function () {
                    const url = $(this).data('url');
                    if (url) {
                        window.location.href = url;
                    }
                });
            }

            function loadFilteredUsersFromHash() {
                const hash = window.location.hash.replace('#', '') || 'all';
                const validFilters = ['all', 'new', 'approved', 'rejected', 'cancelled'];
                const filter = validFilters.includes(hash) ? hash : 'all';

                // Update active tab
                $('[data-status-filter]').removeClass('active');
                $(`[data-status-filter="${filter}"]`).addClass('active');

                $.ajax({
                    url: "{{ route('users.index') }}",
                    type: "GET",
                    data: { filter: filter },
                    success: function (data) {
                        if ($.fn.DataTable.isDataTable('#userMgmtTable')) {
                            $('#userMgmtTable').DataTable().destroy();
                        }
                        $('#userMgmtTable tbody').replaceWith(data);
                        initializeDataTable();
                    },
                    error: function () {
                        alert('Failed to fetch filtered users.');
                    }
                });
            }

            $(document).ready(function () {
                initializeDataTable();
                loadFilteredUsersFromHash();

                $('[data-status-filter]').on('click', function () {
                    const filter = $(this).data('status-filter');
                    if (filter) {
                        window.location.hash = filter;
                    }
                });

                window.addEventListener('hashchange', function () {
                    loadFilteredUsersFromHash();
                });
            });
        </script>
    @endpush
@endsection