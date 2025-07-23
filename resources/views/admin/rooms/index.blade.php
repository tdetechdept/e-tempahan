@extends('layouts.main.app')

@section('title', 'Room List')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Room</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Room List</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">


        <!-- Content Card -->
        <div class="content-card">
            <!-- Header -->
            <div class="mb-3 content-header d-flex justify-content-between align-items-center top-header-block">
                <h2 class="mb-0 h4">Room List</h2>
                <div class="gap-3 d-flex align-items-center search-main-block">
                    <div class="search-input">
                        <span class="material-symbols-rounded">search</span>
                        <input type="text" id="roomSearch" class="form-control" placeholder="Search">
                    </div>
                    <a href="{{ route('rooms.create') }}" class="gap-2 btn btn-primary-custom d-flex align-items-center">
                        <span class="material-symbols-rounded">add</span>
                        Room
                    </a>
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table id="rooms-table" class="table mb-0 table-hover ">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Room Name</th>
                            <th>Picture</th>
                            <th>Capacity</th>
                            <th>Facilities</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $index => $room)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-medium">{{ $room->room_name }}</td>
                                <td>
                                    @if ($room->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}"
                                            alt="{{ $room->room_name }}" class="room-image"
                                            style="width: 80px; height: auto;">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $room->room_capacity }} people</td>
                                <td>
                                    {{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}
                                </td>
                                <td>
                                    <a href="{{ route('rooms.show', $room) }}"
                                        class="gap-2 btn btn-sm btn-outline-custom d-flex align-items-center eye-btn">
                                        <span class="material-symbols-rounded">visibility</span>
                                        See
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#rooms-table').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 20, 50, -1],
                ordering: true,
                dom: 't<"d-flex justify-content-between align-items-center mt-3"lip>',
                language: {
                    search: '',
                    searchPlaceholder: 'Search rooms...',
                    lengthMenu: 'Show <select class="form-select form-select-sm">' +
                        '<option value="5">5</option>' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">All</option>' +
                        '</select> entries',
                    info: 'Showing _START_ to _END_ of _TOTAL_ rooms',
                    paginate: {
                        previous: 'Prev',
                        next: 'Next'
                    }
                }
            });

            $('#roomSearch').on('keyup', function() {
                table.search(this.value).draw();
            });
        });
    </script>
@endsection
