@extends('layouts.main.app')

@section('title', 'Buat Tempahan')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Buat Tempahan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.index') }}" class="text-decoration-none text-dark">Cari Bilik Mesyuarat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.result') }}" class="text-decoration-none text-dark">Hasil Cariaan Bilik Mesyuarat</a>
        </div>
    </div>
@endsection

@section('content')

    <main class="main-content">
        <div class="my-5">
            <div class="card shadow-sm custom-card">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold">Hasil Carian Bilik Mesyuarat</h5>
                </div>
                <div class="card-body">

                <!-- Room Table -->
                    <div id="newTableWrapper" class="table-responsive eb-table-wrapper">
                        <table id="newTable" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-muted fw-normal small">Bill.</th>
                                    <th scope="col" class="text-muted fw-normal small">Nama Bilik</th>
                                    <th scope="col" class="text-muted fw-normal small">Gambar</th>
                                    <th scope="col" class="text-muted fw-normal small">Kapasiti</th>
                                    <th scope="col" class="text-muted fw-normal small">Fasiliti</th>
                                    <th scope="col" class="text-muted fw-normal small">Maklumat PIC</th>
                                    <th scope="col" class="text-muted fw-normal small">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>


                                @forelse ($room as $index => $new)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $new->room_name ?? 'N/A' }}</td>
                                        <td>
                                            @if ($new->picture)
                                                <div class="eb-uplaod-file eb-readonly-box">
                                                    <img src="{{ asset('images/rooms/' . $new->picture) }}" class="img-fluid" />
                                                </div>
                                            @else
                                                <div class="eb-uplaod-file eb-readonly-box">
                                                    <img src="{{ asset('img/no_img.png') }}" class="img-fluid" />
                                                </div>
                                            @endif
                                        </td>
                                        <td>{{ $new->room_capacity ?? 'N/A' }}</td>
                                        <td>{{ is_array($new->facilities) ? implode(', ', $new->facilities) : $new->facilities }}</td>
                                        <td>
                                            <p>{{$new->pic_name ?? 'N/A'}}</p> <br>
                                            <p> <i class="bi bi-telephone-fill text-primary mr-1"></i> {{$new->pic_phone ?? 'N/A'}}</p>
                                        </td>
                                        <td>
                                            @php
                                                $details = [
                                                    'date' => request()->get('date'),
                                                    'start' => request()->get('starttime'),
                                                    'end' => request()->get('endtime'),
                                                ];
                                            @endphp
                                            <a href="{{ route('user.search.view', ['id' => $new->id, 'date' => $details['date'], 'start' => $details['start'], 'end' => $details['end']]) }}">
                                                <button 
                                                    class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                                    <span class="material-symbols-rounded eb-eye-btn"></span> See
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No bookings found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                
                </div>
            </div>
        </div>

    </main>
@endsection