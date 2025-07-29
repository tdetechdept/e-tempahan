@extends('layouts.main.app')

@section('title', 'Pengurusan Pengguna')

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
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                    <h3 class="mb-2 mb-md-0">Senarai Pengguna/Pendaftaran</h3>
                    <div class="search-input d-flex align-items-center position-relative">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="userSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                </div>


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

                    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-0 flex-wrap" id="pills-tab" role="tablist">
                            @foreach ($statuses as $key)
                                @php
                                    $isActive = $activeFilter === $key;
                                @endphp
                                <li class="nav-item">
                                    <a class="nav-link {{ $isActive ? 'active' : '' }}" href="?filter={{ $key }}"
                                        data-filter="{{ $key }}" role="tab">
                                        {{ $statusLabels[$key] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Right-aligned Button -->
                        <div id="addUserButtonWrapper" class="ms-3">
                            <a href="#" class="btn btn-primary-custom">
                                Daftar Pengguna
                            </a>
                        </div>
                    </div>
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
                                        <tbody>
                                            @include('admin.users.partials.table', ['users' => $users])
                                        </tbody>
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
            // $.fn.dataTable.ext.errMode = 'none';
            // let userTable;

            // function initializeDataTable() {
            //     userTable = $('#userMgmtTable').DataTable({
            //         destroy: true,
            //         pageLength: 5,
            //         lengthMenu: [5, 10, 20, 50, -1],
            //         ordering: true,
            //         dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
            //         language: {
            //             lengthMenu: 'Tunjuk <select class="form-select form-select-sm">' +
            //                 '<option value="5">5</option>' +
            //                 '<option value="10">10</option>' +
            //                 '<option value="20">20</option>' +
            //                 '<option value="50">50</option>' +
            //                 '<option value="-1">All</option>' +
            //                 '</select> pengguna',
            //             paginate: {
            //                 previous: '<',
            //                 next: '>'
            //             },
            //         },
            //     });

            //     $('#userSearch').on('keyup', function () {
            //         userTable.search(this.value).draw();
            //     });


            //     // Bind row click
            //     $('#userMgmtTable tbody').on('click', 'tr', function () {
            //         const url = $(this).data('url');
            //         if (url) {
            //             window.location.href = url;
            //         }
            //     });
            // }

            // function loadFilteredUsersFromHash() {
            //     const hash = window.location.hash.replace('#', '') || 'all';
            //     const validFilters = ['all', 'new', 'approved', 'rejected', 'cancelled'];
            //     const filter = validFilters.includes(hash) ? hash : 'all';

            //     // Update active tab
            //     $('[data-status-filter]').removeClass('active');
            //     $(`[data-status-filter="${filter}"]`).addClass('active');

            //     $.ajax({
            //         url: "{{ route('users.index') }}",
            //         type: "GET",
            //         data: { filter: filter },
            //         success: function (data) {
            //             if ($.fn.DataTable.isDataTable('#userMgmtTable')) {
            //                 $('#userMgmtTable').DataTable().destroy();
            //             }
            //             $('#userMgmtTable tbody').replaceWith(data);
            //             initializeDataTable();
            //         },
            //         error: function () {
            //             alert('Failed to fetch filtered users.');
            //         }
            //     });
            // }

            // $(document).ready(function () {
            //     initializeDataTable();
            //     loadFilteredUsersFromHash();

            //     $('[data-status-filter]').on('click', function () {
            //         const filter = $(this).data('status-filter');
            //         if (filter) {
            //             window.location.hash = filter;
            //         }
            //     });

            //     window.addEventListener('hashchange', function () {
            //         loadFilteredUsersFromHash();
            //     });
            // });


            $.fn.dataTable.ext.errMode = 'none';

            let userTable;

            function initDataTable() {
                const table = $('#userMgmtTable');

                if (table.length) {
                    if ($.fn.DataTable.isDataTable(table)) {
                        table.DataTable().destroy();
                    }

                    bookingTable = table.DataTable({
                        pageLength: 5,
                        lengthMenu: [5, 10, 20, 50, -1],
                        ordering: true,
                        dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
                        language: {
                            lengthMenu: 'Tunjuk <select class="form-select form-select-sm">' +
                                '<option value="5">5</option>' +
                                '<option value="10">10</option>' +
                                '<option value="20">20</option>' +
                                '<option value="50">50</option>' +
                                '<option value="-1">Semua</option>' +
                                '</select> pengguna',
                            paginate: {
                                previous: '<',
                                next: '>'
                            },
                        }
                    });

                    $('#userSearch').off('keyup').on('keyup', function () {
                        bookingTable.search(this.value).draw();
                    });
                } else {
                    console.warn('Table not found or invalid.');
                }
            }

            function updateTableTbodyFromAjax(url) {
                $.get(url, function (response) {
                    if ($.fn.DataTable.isDataTable('#userMgmtTable')) {
                        $('#userMgmtTable').DataTable().clear().destroy();
                    }

                    $('#userMgmtTable tbody').html(response);
                    $('#userSearch').val('');
                    initDataTable();
                }).fail(function () {
                    alert('Failed to load data');
                });
            }

            $(document).ready(function () {
                initDataTable();
                $('.nav-pills .nav-link').on('click', function (e) {
                    e.preventDefault();
                    const url = $(this).attr('href');
                    const $this = $(this);
                    updateTableTbodyFromAjax(url);
                    $('.nav-pills .nav-link').removeClass('active');
                    $this.addClass('active');
                    history.pushState(null, '', url);
                });
            });

            $('#userMgmtTable tbody').on('click', 'tr', function () {
                   const url = $(this).data('url');
                 if (url) {
                        window.location.href = url;
                    }
               });
             
        </script>
    @endpush
@endsection