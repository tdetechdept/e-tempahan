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
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="pills-new-tab" data-toggle="pill" href="#pills-new" role="tab" aria-controls="pills-new" aria-selected="false">New</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-approved-tab" data-toggle="pill" href="#pills-approved" role="tab" aria-controls="pills-approved" aria-selected="false">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-rejected-tab" data-toggle="pill" href="#pills-rejected" role="tab" aria-controls="pills-rejected" aria-selected="false">Rejected</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-cancelled-tab" data-toggle="pill" href="#pills-cancelled" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled</a>
                        </li> -->
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                @include('admin.booking.partials.table', ['bookings' => $bookings])
                            </div>
                            <!-- <div class="table-responsive eb-table-main">
                                <table id="rezervationTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Name / Ministry / Division </th>
                                            <th scope="col">Room Name </th>
                                            <th scope="col">Date / Time</th>
                                            <th scope="col">Apply Date </th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($bookings as $index => $booking)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>{{ $booking->user->name ?? '-' }} </td>
                                            <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                                            <td>
                                                <p>{{ $booking->start_date }}</p>
                                                <p>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</p>
                                            </td>
                                            <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                @php
                                                    $statusLabels = [
                                                        1 => 'New',
                                                        2 => 'Pending',
                                                        3 => 'Approved',
                                                        4 => 'Rejected',
                                                        5 => 'Cancelled',
                                                    ];
                                                    $statusColors = [
                                                        1 => 'secondary',
                                                        2 => 'warning',
                                                        3 => 'success',
                                                        4 => 'danger',
                                                        5 => 'dark',
                                                    ];
                                                    $status = $booking->status ?? 1;
                                                @endphp
                                                <span class="eb-status-tag eb-new">{{ strtoupper($statusLabels[$status] ?? 'UNKNOWN') }}</span>
                                            </td>
                                            <td><a herf="#" class="eb-view-eye-btn">See</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-gray-500">No bookings found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> -->
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