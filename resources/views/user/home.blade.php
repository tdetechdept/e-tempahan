@extends('layouts.main.app')

@section('title', 'Dashboard')
@push('css')
    <style>
    .welcome-card {
      background: #285689;
      color: white;
      /* height: 200px; */
      border-radius: 25px;
      padding: 40px;
      position: relative;
      overflow: hidden;
    }
    .welcome-card::after {
      content: "";
      position: absolute;
      right: -100px;
      top: 0;
      width: 300px;
      height: 300px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 50%;
    }
    .stats-card {
      background: linear-gradient(135deg, #023774, #285689);
      color: white;
      border-radius: 15px;
      padding: 20px;
      text-align: left;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }
    .stats-card i {
      font-size: 2rem;
      margin-bottom: 10px;
      display: block;
    }
    .stats-card h5 {
      font-weight: 600;
      font-size: 1rem;
    }
    .stats-card p {
      font-size: 1.5rem;
      margin: 0;
      font-weight: bold;
    }
    </style>
@endpush
@section('content')
<div class=" py-1">
  <!-- Welcome Card -->
  <div class="welcome-card mb-4">
    <h3><strong>Selamat Datang ke sistem eTempahan !</strong></h3>
    <p class="lead">Jom mulakan tempahan anda dengan beberapa klik sahaja</p>
  </div>

  <!-- Stats Cards -->
  <div class="row text-center">
    <div class="col-md-4 mb-3">
      <div class="stats-card">
        <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 16.0417H35M28.3333 4.375V11.0417M11.6667 4.375V11.0417M28.3333 7.70833H11.6667C9.89856 7.70833 8.20286 8.41071 6.95262 9.66095C5.70238 10.9112 5 12.6069 5 14.375V28.9583C5 30.7264 5.70238 32.4221 6.95262 33.6724C8.20286 34.9226 9.89856 35.625 11.6667 35.625H28.3333C30.1014 35.625 31.7971 34.9226 33.0474 33.6724C34.2976 32.4221 35 30.7264 35 28.9583V14.375C35 12.6069 34.2976 10.9112 33.0474 9.66095C31.7971 8.41071 30.1014 7.70833 28.3333 7.70833Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 24.5207L17.815 27.3357C17.9141 27.4355 18.032 27.5147 18.1619 27.5687C18.2917 27.6228 18.431 27.6506 18.5717 27.6506C18.7123 27.6506 18.8516 27.6228 18.9814 27.5687C19.1113 27.5147 19.2292 27.4355 19.3283 27.3357L25 21.6641" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="col-9">
            <h5>Jumlah Tempahan</h5>
            <p>{{$allBook}}</p>
        </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="stats-card">
        <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 16.0417H35M28.3333 4.375V11.0417M11.6667 4.375V11.0417M28.3333 7.70833H11.6667C9.89856 7.70833 8.20286 8.41071 6.95262 9.66095C5.70238 10.9112 5 12.6069 5 14.375V28.9583C5 30.7264 5.70238 32.4221 6.95262 33.6724C8.20286 34.9226 9.89856 35.625 11.6667 35.625H28.3333C30.1014 35.625 31.7971 34.9226 33.0474 33.6724C34.2976 32.4221 35 30.7264 35 28.9583V14.375C35 12.6069 34.2976 10.9112 33.0474 9.66095C31.7971 8.41071 30.1014 7.70833 28.3333 7.70833Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 24.5207L17.815 27.3357C17.9141 27.4355 18.032 27.5147 18.1619 27.5687C18.2917 27.6228 18.431 27.6506 18.5717 27.6506C18.7123 27.6506 18.8516 27.6228 18.9814 27.5687C19.1113 27.5147 19.2292 27.4355 19.3283 27.3357L25 21.6641" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="col-9">
            <h5>Kemaskini Tempahan</h5>
            <p>{{$updateBook}}</p>
        </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="stats-card">
        <div class="row">
        <div class="col-3 d-flex justify-content-center align-items-center">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 16.0417H35M28.3333 4.375V11.0417M11.6667 4.375V11.0417M28.3333 7.70833H11.6667C9.89856 7.70833 8.20286 8.41071 6.95262 9.66095C5.70238 10.9112 5 12.6069 5 14.375V28.9583C5 30.7264 5.70238 32.4221 6.95262 33.6724C8.20286 34.9226 9.89856 35.625 11.6667 35.625H28.3333C30.1014 35.625 31.7971 34.9226 33.0474 33.6724C34.2976 32.4221 35 30.7264 35 28.9583V14.375C35 12.6069 34.2976 10.9112 33.0474 9.66095C31.7971 8.41071 30.1014 7.70833 28.3333 7.70833Z" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 24.5207L17.815 27.3357C17.9141 27.4355 18.032 27.5147 18.1619 27.5687C18.2917 27.6228 18.431 27.6506 18.5717 27.6506C18.7123 27.6506 18.8516 27.6228 18.9814 27.5687C19.1113 27.5147 19.2292 27.4355 19.3283 27.3357L25 21.6641" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
        <div class="col-9">
            <h5>Batal Tempahan</h5>
            <p>{{$cancelBook}}</p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="p-1 py-2 mb-3 card rounded-4">
        <div class="bg-white card-header border-bottom-0 rounded-top-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                <h5 class="mb-2 card-title mb-md-0 fw-semibold">Senarai Tempahan</h5>
                <a href="{{ route('user.search.index') }}" class="btn btn-primary-custom">Buat Tempahan</a>
            </div>
        </div>

        <div class="card-body">
            <!-- Table Controls -->
            <div class="mb-3 row align-items-center">
                <div class="col-md-6">
                    <div class="gap-2 d-flex flex-column flex-sm-row align-items-sm-center">
                        <span class="mr-3 font-medium  small eb-custom-color">Status</span>
                        <select class="form-select form-select-sm eb-select-room-list" style="width: auto;">
                            <option value="baharu">Baharu</option>
                            <option value="lulus">Lulus</option>
                            <option value="menunggu">Menunggu Pengesahan</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- New Booking -->
            <div id="newTableWrapper" class="table-responsive eb-table-wrapper">
                <table id="newTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bill.</th>
                            <th scope="col" class="text-muted fw-normal small">Nama Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Aras</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh Mohon</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh / Masa</th>
                            <th scope="col" class="text-muted fw-normal small">Status</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($newBookings as $index => $new)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $new->room->room_name ?? 'N/A' }}</td>
                                <td>{{ $new->room->level ?? 'N/A' }}</td>
                                <td>{{ $new->start_date }}
                                    {{ \Carbon\Carbon::parse($new->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($new->end_time)->format('H:i') }}
                                </td>
                                <td>{{ $new->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @php
                                        $statusStyles = [
                                            1 => [ // New
                                                'label' => 'BARU',
                                                'bg' => '#fff3cd', 
                                                'text' => '#856404',
                                            ],
                                            2 => [ // Pending
                                                'label' => 'MENUNGGU PENGESAHAN',
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
                                            5 => [ // Cancelled by User
                                                'label' => 'DIBATALKAN',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             6 => [ // updated by User
                                                'label' => 'KEMASKINI',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             7 => [ // Confirmed by User
                                                'label' => 'DITERIMA',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                        ];
                                
                                        $status = $statusStyles[$new->status] ?? [
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
                                    <a href="{{ route('user.booking.show', $new->id) }}">
                                        <button 
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> See
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Approve Booking -->
            <div id="approvedTableWrapper" class="table-responsive eb-table-wrapper" style="display: none;">
                <table id="approvedTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bill.</th>
                            <th scope="col" class="text-muted fw-normal small">Nama Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Aras</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh Mohon</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh / Masa</th>
                            <th scope="col" class="text-muted fw-normal small">Status</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($approvedBookings as $index => $appv)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $appv->room->room_name ?? 'N/A' }}</td>
                                <td>{{ $appv->room->level ?? 'N/A' }}</td>
                                <td>{{ $appv->start_date }}
                                    {{ \Carbon\Carbon::parse($appv->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($appv->end_time)->format('H:i') }}
                                </td>
                                <td>{{ $appv->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @php
                                        $statusStyles = [
                                            1 => [ // New
                                                'label' => 'BARU',
                                                'bg' => '#fff3cd', 
                                                'text' => '#856404',
                                            ],
                                            2 => [ // Pending
                                                'label' => 'MENUNGGU PENGESAHAN',
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
                                            5 => [ // Cancelled by User
                                                'label' => 'DIBATALKAN',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             6 => [ // updated by User
                                                'label' => 'KEMASKINI',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             7 => [ // Confirmed by User
                                                'label' => 'DITERIMA',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                        ];
                                
                                        $status = $statusStyles[$appv->status] ?? [
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
                                    <a href="{{ route('user.booking.show', $appv->id) }}">
                                        <button 
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> See
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Rezervation Table -->
            <div id="waitTableWrapper" class="table-responsive eb-table-wrapper" style="display: none;">
                <table id="waitTable" class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-muted fw-normal small">Bill.</th>
                            <th scope="col" class="text-muted fw-normal small">Nama Bilik</th>
                            <th scope="col" class="text-muted fw-normal small">Aras</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh Mohon</th>
                            <th scope="col" class="text-muted fw-normal small">Tarikh / Masa</th>
                            <th scope="col" class="text-muted fw-normal small">Status</th>
                            <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($waitBookings as $index => $wait)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="fw-semibold">{{ $wait->meeting_name }}</td>
                                <td>{{ $wait->room->room_name ?? 'N/A' }}</td>
                                <td>{{ $wait->start_date }}
                                    {{ \Carbon\Carbon::parse($wait->start_time)->format('H:i') }}
                                    -
                                    {{ \Carbon\Carbon::parse($wait->end_time)->format('H:i') }}
                                </td>
                                <td>{{ $wait->created_at->format('Y-m-d') }}</td>
                                <td>
                                    @php
                                       $statusStyles = [
                                            1 => [ // New
                                                'label' => 'BARU',
                                                'bg' => '#fff3cd', 
                                                'text' => '#856404',
                                            ],
                                            2 => [ // Pending
                                                'label' => 'MENUNGGU PENGESAHAN',
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
                                            5 => [ // Cancelled by User
                                                'label' => 'DIBATALKAN',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             6 => [ // updated by User
                                                'label' => 'KEMASKINI',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                             7 => [ // Confirmed by User
                                                'label' => 'DITERIMA',
                                                'bg' => '#e2e3e5', 
                                                'text' => '#383d41',
                                            ],
                                        ];

                                        $status = $statusStyles[$wait->status] ?? [
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
                                    <a href="{{ route('user.booking.show', $wait->id) }}">
                                        <button 
                                            class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                            <span class="material-symbols-rounded eb-eye-btn"></span> See
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#newTable').DataTable();
            $('#approvedTable').DataTable();
            $('#waitTable').DataTable();

            $('.eb-select-room-list').on('change', function() {
                const selected = $(this).val();
                $('#newTableWrapper').toggle(selected === 'baharu');
                $('#approvedTableWrapper').toggle(selected === 'lulus');
                $('#waitTableWrapper').toggle(selected === 'menunggu');
            });
        });
    </script>
@endpush