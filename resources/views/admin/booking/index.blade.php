@extends('layouts.main.app')

@section('title', 'Semakan Tempahan')

@section('content')
<!-- Booking Review page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Semakan Tempahan</h1>
            <div class="breadcrumb-nav">
                <span>Papan Pemuka</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Senarai Tempahan</span>
            </div>
        </div>

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                    <h3 class="mb-2 mb-md-0">Senarai Tempahan</h3>
                    <div class="search-input d-flex align-items-center position-relative">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="bookingSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                </div>

                <div class="eb-tabs-tables">
                    @php
                        $statusKeys = ['all', 'new', 'approved', 'rejected', 'cancelled'];
                        $statusLabels = [
                            'all' => 'Semua',
                            'new' => 'Baharu',
                            'approved' => 'Diluluskan',
                            'rejected' => 'Ditolak',
                            'cancelled' => 'Dibatalkan'
                        ];
                        $activeFilter = strtolower(request('filter', 'all'));
                    @endphp

                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach ($statusKeys as $key)
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
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                <div class="table-responsive eb-table-main">
                                    <table id="rezervationTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Bil.</th>
                                                <th>Nama / Kementerian / Bahagian</th>
                                                <th>Nama Bilik</th>
                                                <th>Tarikh /Masa</th>
                                                <th>Tarikh Mohon</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @include('admin.booking.partials.table', ['bookings' => $bookings])
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
            $.fn.dataTable.ext.errMode = 'none';

            let bookingTable;

            function initDataTable() {
                const table = $('#rezervationTable');

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
                                '</select> tempahan',
                            paginate: {
                                previous: '<',
                                next: '>'
                            },
                        }
                    });

                    $('#bookingSearch').off('keyup').on('keyup', function () {
                        bookingTable.search(this.value).draw();
                    });
                } else {
                    console.warn('Table not found or invalid.');
                }
            }

            function updateTableTbodyFromAjax(url) {
                $.get(url, function (response) {
                    if ($.fn.DataTable.isDataTable('#rezervationTable')) {
                        $('#rezervationTable').DataTable().clear().destroy();
                    }

                    $('#rezervationTable tbody').html(response);
                    $('#bookingSearch').val('');
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
        </script>
    @endpush

@endsection