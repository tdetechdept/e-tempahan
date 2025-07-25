@extends('layouts.main.app')

@section('content')
<!-- Booking Review page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Semakan Tempahan</h1>
            <div class="breadcrumb-nav">
                <span>Laman Utama</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Senarai Tempahan</span>
            </div>
        </div>

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Senarai Tempahan</h3>
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
                                <a class="nav-link {{ $isActive ? 'active' : '' }}"
                                id="pills-{{ $key }}-tab"
                                href="?filter={{ $key }}"
                                role="tab"
                                aria-controls="pills-{{ $key }}"
                                aria-selected="{{ $isActive ? 'true' : 'false' }}">
                                    {{ $statusLabels[$key] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                @include('admin.booking.partials.table', ['bookings' => $bookings])
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
    
<!-- Booking Review page end -->
@push('js')
    <script>
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function () {
            $('#rezervationTable').DataTable();
        });

        // table ajax
        $(document).ready(function () {
        $('.nav-pills .nav-link').on('click', function (e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('#booking-table-wrapper').html(data);

                    // Reinit DataTables if needed
                    if ($.fn.DataTable.isDataTable('#rezervationTable')) {
                        $('#rezervationTable').DataTable().destroy();
                    }
                    $('#rezervationTable').DataTable();

                    // Set active tab
                    $('.nav-pills .nav-link').removeClass('active');
                    $(e.target).addClass('active');
                },
                error: function () {
                    alert('Could not load data.');
                }
            });

            history.pushState(null, '', url);
        });

        $('#rezervationTable').DataTable();
    });
    </script>
@endpush
@endsection