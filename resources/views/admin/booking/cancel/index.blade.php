@extends('layouts.main.app')
@section('content')
<!-- Booking Review page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Booking Review</h1>
            <div class="breadcrumb-nav">
                <span>Home Page</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Room Information</span>
            </div>
        </div>

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Reservation List</h3>
                <div class="eb-tabs-tables">
                    @php
                        $statuses = ['All', 'New', 'Approved', 'Rejected', 'Cancelled'];
                        $activeFilter = strtolower(request('filter', 'all'));
                    @endphp
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach ($statuses as $status)
                        @php
                            $slug = strtolower($status);
                            $isActive = $activeFilter === $slug;
                        @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $isActive ? 'active' : '' }}"
                                id="pills-{{ $slug }}-tab"
                                href="?filter={{ $slug }}"
                                role="tab"
                                aria-controls="pills-{{ $slug }}"
                                aria-selected="{{ $isActive ? 'true' : 'false' }}">
                                    {{ $status }}
                            </a>
                            <!-- <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a> -->
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                @include('admin.booking.cancel.partials.table', ['bookings' => $bookings])
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

            // Optional: update browser URL without reloading
            history.pushState(null, '', url);
        });

        // Initialize DataTable on page load
        $('#rezervationTable').DataTable();
    });
    </script>
@endpush
@endsection
