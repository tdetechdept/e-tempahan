@extends('layouts.main.app')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-4 row">
        <div class="mb-3 col-lg-7">
            <div class="p-4 bg-gradient-dark rounded-3 h-100 align-content-center ">
                <h1 class="mb-3 text-white fs-1">Selamat datang ke sistem eTempahan</h1>
                <p class="text-white fs-5">Urus dan pantau semua tempahan dengan mudah dan berkesan</p>
            </div>
        </div>
                <div class="flex-wrap gap-3 mb-3 col-lg-5 d-flex">
                    <div class="p-4 text-center bg-gradient-dark rounded-3 col-lg-6 eb-inner-box flex-grow-1">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-3">
                            <path
                                d="M0 30V26.6667H3.33333V0H20V1.66667H26.6667V26.6667H30V30H23.3333V5H20V30H0ZM13.3333 16.6667C13.8056 16.6667 14.2017 16.5067 14.5217 16.1867C14.8417 15.8667 15.0011 15.4711 15 15C14.9989 14.5289 14.8389 14.1333 14.52 13.8133C14.2011 13.4933 13.8056 13.3333 13.3333 13.3333C12.8611 13.3333 12.4656 13.4933 12.1467 13.8133C11.8278 14.1333 11.6678 14.5289 11.6667 15C11.6656 15.4711 11.8256 15.8672 12.1467 16.1883C12.4678 16.5094 12.8633 16.6689 13.3333 16.6667ZM6.66667 26.6667H16.6667V3.33333H6.66667V26.6667Z"
                                fill="white" />
                        </svg>
                        <h4 class="text-white fs-6">Total Bilik</h4>
                        <span class="text-white fs-5">{{ $totalRooms }}</span>
                    </div>
                    <div class="p-4 text-center bg-gradient-dark rounded-3 col-lg-6 eb-inner-box flex-grow-1">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mb-3">
                            <path
                                d="M10 35V31.6667C10 29.8986 10.7024 28.2029 11.9526 26.9526C13.2029 25.7024 14.8986 25 16.6667 25H23.3333C25.1014 25 26.7971 25.7024 28.0474 26.9526C29.2976 28.2029 30 29.8986 30 31.6667V35M13.3333 11.6667C13.3333 13.4348 14.0357 15.1305 15.286 16.3807C16.5362 17.631 18.2319 18.3333 20 18.3333C21.7681 18.3333 23.4638 17.631 24.714 16.3807C25.9643 15.1305 26.6667 13.4348 26.6667 11.6667C26.6667 9.89856 25.9643 8.20286 24.714 6.95262C23.4638 5.70238 21.7681 5 20 5C18.2319 5 16.5362 5.70238 15.286 6.95262C14.0357 8.20286 13.3333 9.89856 13.3333 11.6667Z"
                                stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h4 class="text-white fs-6">Total Penggua</h4>
                        <span class="text-white fs-5">{{ $totalUsers }}</span>
                    </div>
                    <div class="gap-5 px-3 py-5 bg-gradient-dark rounded-3 w-100 d-flex justify-content-center align-items-center">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.1665 5.41669C12.498 5.41669 12.816 5.54838 13.0504 5.7828C13.2848 6.01722 13.4165 6.33517 13.4165 6.66669V9.44669C18.1294 9.02775 22.8702 9.02775 27.5832 9.44669V6.66669C27.5832 6.33517 27.7149 6.01722 27.9493 5.7828C28.1837 5.54838 28.5017 5.41669 28.8332 5.41669C29.1647 5.41669 29.4826 5.54838 29.7171 5.7828C29.9515 6.01722 30.0832 6.33517 30.0832 6.66669V9.69335C31.2991 9.86578 32.4251 10.4314 33.2895 11.3038C34.1538 12.1762 34.7088 13.3076 34.8698 14.525L35.0148 15.6134C35.6215 20.19 35.5682 24.83 34.8582 29.3934C34.687 30.4919 34.1558 31.5025 33.3479 32.2663C32.54 33.0302 31.5013 33.504 30.3948 33.6134L28.4065 33.81C23.1481 34.3279 17.8516 34.3279 12.5932 33.81L10.6048 33.6134C9.49842 33.504 8.45969 33.0302 7.65181 32.2663C6.84392 31.5025 6.31267 30.4919 6.14151 29.3934C5.43136 24.8311 5.3786 20.1906 5.98484 15.6134L6.12984 14.525C6.29088 13.3076 6.84592 12.1762 7.71023 11.3038C8.57453 10.4314 9.7006 9.86578 10.9165 9.69335V6.66669C10.9165 6.33517 11.0482 6.01722 11.2826 5.7828C11.517 5.54838 11.835 5.41669 12.1665 5.41669ZM12.9082 12.005C17.9582 11.5067 23.0415 11.5067 28.0915 12.005L29.5998 12.155C31.0448 12.2967 32.1998 13.415 32.3915 14.8534L32.5365 15.9417C32.5865 16.3217 32.6321 16.7022 32.6732 17.0834H8.32651C8.36762 16.7022 8.41317 16.3217 8.46317 15.9417L8.60817 14.8534C8.70067 14.1544 9.02683 13.5072 9.53365 13.017C10.0405 12.5268 10.6982 12.2225 11.3998 12.1534L12.9082 12.005ZM8.12817 19.5834C7.96455 22.7333 8.12652 25.8917 8.61151 29.0084C8.69741 29.5593 8.96384 30.0661 9.36897 30.4492C9.77409 30.8323 10.295 31.07 10.8498 31.125L12.8382 31.3217C17.9332 31.825 23.0665 31.825 28.1615 31.3217L30.1498 31.125C30.7047 31.07 31.2256 30.8323 31.6307 30.4492C32.0358 30.0661 32.3023 29.5593 32.3882 29.0084C32.8748 25.8884 33.0348 22.73 32.8715 19.5834H8.12817Z"
                                fill="white" />
                        </svg>
                        <h4 class="mb-0 text-white fs-6">Total Tempahan</h4>
                        <span class="text-white fs-5">{{ $totalBookings }}</span>
                    </div>
                </div>
    </div>
    <div class="p-1 py-2 mb-3 card rounded-4">
        <div class="bg-white card-header border-bottom-0 rounded-top-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h5 id="dashboardCardTitle" class="mb-2 card-title mb-md-0 fw-semibold">Senarai Bilik</h5>
                <div id="addRoomButtonWrapper">
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary-custom">Tambah Bilik</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <!-- Table Controls -->
            <div class="mb-3 row align-items-center">
                <!-- Left: Dropdown & Label -->
                <div class="col-md-6 d-flex align-items-center gap-2 flex-wrap">
                    <span class="font-medium small eb-custom-color">Senarai</span>
                    <select class="form-select form-select-sm eb-select-room-list" style="width: auto;">
                        <option value="room">Bilik</option>
                        <option value="user">Pengguna</option>
                        <option value="rezervation">Tempahan</option>
                    </select>
                </div>

                <!-- Right: Link aligned to end -->
                <div class="col-md-6 d-flex justify-content-end">
                    <a id="seeAllLink" href="{{ route('rooms.index') }}" class="small text-decoration-underline"
                        style="color: #299d91; white-space: nowrap;">
                        Lihat Semua
                    </a>
                </div>
            </div>

            <!-- Room Table -->
            <div id="roomTableWrapper" class="table-responsive eb-table-wrapper">
                <table id="roomTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bil.</th>
                            <th scope="col" class="text-muted fw-normal small">Name Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Aras</th>
                            <th scope="col" class="text-muted fw-normal small">kapasiti</th>
                            <th scope="col" class="text-muted fw-normal small">Fasiliti</th>
                            <th scope="col" class="text-muted fw-normal small">Status Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $index => $room)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $room->room_name }}</td>
                                <td>{{ $room->level }}</td>
                                <td>{{ $room->room_capacity }} Orang</td>
                                <td>{{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}
                                </td>
                                <td>
                                    @if ($room->status == 1)
                                        <span class="block py-2 text-center badge text-bg-success w-100 rounded-4">AKTIF</span>
                                    @else
                                        <span class="badge d-block py-2 text-center w-100 rounded-4"
                                            style="background-color: #fdecea; color: #cc0000;">
                                            TIDAK AKTIF
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('rooms.show', $room->id) }}" style="text-decoration: none;">
                                        <button
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> Lihat
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- User Table -->
            <div id="userTableWrapper" class="table-responsive eb-table-wrapper" style="display: none;">
                <table id="userTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bil.</th>
                            <th scope="col" class="text-muted fw-normal small">Nama</th>
                            <th scope="col" class="text-muted fw-normal small">E-mel</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh/Masa</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh Mohon</th>
                            <th scope="col" class="text-muted fw-normal small">Status</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y, h:i A') }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                                <td>
                                    @php
                                        $statusStyles = [
                                            0 => [
                                                'label' => 'BAHARU',
                                                'bg' => '#fff3cd',
                                                'text' => '#856404',
                                            ],
                                            1 => [
                                                'label' => 'AkTIF',
                                                'bg' => '#d4edda',
                                                'text' => '#155724',
                                            ],
                                            2 => [
                                                'label' => 'DILULUSKAN',
                                                'bg' => '#cce5ff',
                                                'text' => '#004085',
                                            ],
                                            3 => [
                                                'label' => 'DITOLAK',
                                                'bg' => '#f8d7da',
                                                'text' => '#721c24',
                                            ],
                                            4 => [
                                                'label' => 'DIBATALKAN',
                                                'bg' => '#e2e3e5',
                                                'text' => '#383d41',
                                            ],
                                            5 => [
                                                'label' => 'NYAHAKTIF',
                                                'bg' => '#fefefe',
                                                'text' => '#6c757d',
                                            ],
                                        ];

                                        $status = $statusStyles[$user->status] ?? [
                                            'label' => 'TIDAK DIKETAHUI',
                                            'bg' => '#f8f9fa',
                                            'text' => '#6c757d',
                                        ];
                                    @endphp

                                    <span class="badge d-block text-center w-100 py-2 rounded-4"
                                        style="background-color: {{ $status['bg'] }}; color: {{ $status['text'] }};">
                                        {{ $status['label'] }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" style="text-decoration: none;">
                                        <button
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> Lihat
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Rezervation Table -->
            <div id="rezervationTableWrapper" class="table-responsive eb-table-wrapper" style="display: none;">
                <table id="rezervationTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bil.</th>
                            <th scope="col" class="text-muted fw-normal small">Nama/Kementerian/Bahagian</th>
                            <th scope="col" class="text-muted fw-normal small">Name Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh/Masa</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh Mohon</th>
                            <th scope="col" class="text-muted fw-normal small">Status</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($bookings as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $booking->meeting_name }}</td>
                                <td>{{ $booking->room->room_name ?? 'N/A' }}</td>
                                <td>{{ $booking->start_date }}
                                    {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}
                                </td>
                                <td>{{ $booking->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @php
                                        $statusStyles = [
                                            1 => [ // New
                                                'label' => 'BARU',
                                                'bg' => '#fff3cd',
                                                'text' => '#856404',
                                            ],
                                            2 => [ // Pending
                                                'label' => 'MENUNGGU',
                                                'bg' => '#d1ecf1',
                                                'text' => '#0c5460',
                                            ],
                                            3 => [ // Approved
                                                'label' => 'DILULUSKAN',
                                                'bg' => '#d4edda',
                                                'text' => '#155724',
                                            ],
                                            4 => [ // Rejected
                                                'label' => 'DITOLAK',
                                                'bg' => '#f8d7da',
                                                'text' => '#721c24',
                                            ],
                                            5 => [ // Cancelled
                                                'label' => 'DIBATALKAN',
                                                'bg' => '#e2e3e5',
                                                'text' => '#383d41',
                                            ],
                                        ];

                                        $status = $statusStyles[$booking->status] ?? [
                                            'label' => 'UNKNOWN',
                                            'bg' => '#f8f9fa',
                                            'text' => '#6c757d',
                                        ];
                                    @endphp

                                    <span class="badge d-block text-center w-100 py-2 rounded-4"
                                        style="background-color: {{ $status['bg'] }}; color: {{ $status['text'] }};">
                                        {{ $status['label'] }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('booking.show', $booking->id) }}"  style="text-decoration: none;">
                                        <button
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> Lihat
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tiada tempahan ditemui.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                const seeAllLink = $('#seeAllLink');
                const dashboardTitle = $('#dashboardCardTitle');

                $('.eb-select-room-list').on('change', function () {
                    const selected = $(this).val();

                    $('#roomTableWrapper').toggle(selected === 'room');
                    $('#userTableWrapper').toggle(selected === 'user');
                    $('#rezervationTableWrapper').toggle(selected === 'rezervation');

                    $('#addRoomButtonWrapper').toggle(selected === 'room');

                    switch (selected) {
                        case 'room':
                            seeAllLink.attr('href', '{{ route('rooms.index') }}');
                            dashboardTitle.text('Senarai Bilik');
                            break;
                        case 'user':
                            seeAllLink.attr('href', '{{ route('users.index') }}');
                            dashboardTitle.text('Senarai Pengguna');
                            break;
                        case 'rezervation':
                            seeAllLink.attr('href', '{{ route('booking.index') }}');
                            dashboardTitle.text('Senarai Permohonan Tempahan');
                            break;
                    }
                });

                $('.eb-select-room-list').trigger('change');
            });
        </script>
    @endpush
@endsection
