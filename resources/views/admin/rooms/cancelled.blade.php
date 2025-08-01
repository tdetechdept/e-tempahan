@extends('layouts.main.app')

@section('title', 'Bilik Dibatalkan')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Bilik</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.index') }}" class="text-decoration-none text-success">Senarai Bilik Dibatalkan</a>
        </div>
    </div>
@endsection

@section('content')
        <main class="main-content">
            <!-- Content Card -->
            <div class="content-card">
                <!-- Header -->
                <div class="mb-3 content-header d-flex justify-content-between align-items-center top-header-block">
                    <h2 class="mb-0 h4">Senarai Bilik Dibatalkan</h2>
                    <div class="gap-3 d-flex align-items-center search-main-block">
                        <div class="search-input">
                            <span class="material-symbols-rounded">search</span>
                            <input type="text" id="roomSearch" class="form-control" placeholder="Carian">
                        </div>
                        <a href="{{ route('rooms.create') }}" class="gap-2 btn btn-primary-custom d-flex align-items-center">
                            <span class="material-symbols-rounded">add</span>
                            Bilik
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table id="rooms-table" class="table mb-0 table-hover">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Name Bilik</th>
                                <th>Gambar</th>
                                <th>kapasiti</th>
                                <th>Fasiliti</th>
                                <th>Maklumat PIC</th>
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
                                                 alt="{{ $room->room_name }}" class="room-image" style="width: 80px; height: auto;">
                                        @else
                                            <span class="text-muted">Tiada Gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $room->room_capacity }} Orang</td>
                                    <td>
                                        {{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}
                                    </td>
                                    <td>
                                        @if ($room->pic_name || $room->pic_phone || $room->pic_email)
                                            <div>{{ $room->pic_name }}</div>
                                            @if ($room->pic_phone)
                                                <div class="d-flex align-items-center gap-1">
                                                    <span class="material-symbols-rounded" style="font-size: 16px; color: #003366;">call</span>
                                                    <span>{{ $room->pic_phone }}</span>
                                                </div>
                                            @endif
                                            @if ($room->pic_email)
                                                <div class="d-flex align-items-center gap-1">
                                                    <span class="material-symbols-rounded" style="font-size: 16px; color: #003366;">mail</span>
                                                    <span>{{ $room->pic_email }}</span>
                                                </div>
                                            @endif
                                        @else
                                            <span class="text-muted">Tiada Maklumat</span>
                                        @endif
                                   </td>
                                    <td>
                                        <a href="{{ route('rooms.show', $room) }}" class="gap-2 btn btn-sm btn-outline-custom d-flex align-items-center eye-btn">
                                            <span class="material-symbols-rounded">visibility</span>
                                            Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>

    @push('js')
    <script>
        $(document).ready(function () {
            var table = $('#rooms-table').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 20, 50, -1],
            ordering: true,
            dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
            language: {
                search: '',
                searchPlaceholder: 'Search rooms...',
                lengthMenu: 'Tunjuk  <select class="form-select form-select-sm">' +
                    '<option value="5">5</option>' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> bilik',
                paginate: {
                    previous: '<',
                    next: '>'
                }
            },
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0 
                }
            ],
            order: [[1, 'asc']] 
        });

            $('#roomSearch').on('keyup', function () {
                table.search(this.value).draw();
            });
        });
    </script>
    @endpush
@endsection
