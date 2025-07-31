@extends('layouts.main.app')

@section('title', 'Maklumat Bilik')
@push('css')
    <style>
    .room-img {
      width: 100%;
      border-radius: 8px;
    }
    .status {
      color: #0080c0;
      font-weight: 600;
      display: flex;
      align-items: center;
      margin-top: 15px;
    }
    .status i {
      font-size: 1.2rem;
      color: #0080c0;
      margin-right: 6px;
    }
    </style>
@endpush
@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Buat Tempahan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.index') }}" class="text-decoration-none text-dark">Carian Bilik Mesyuarat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.result') }}" class="text-decoration-none text-dark">Hasil Carian Bilik Mesyuarat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.view', $room->id) }}" class="text-decoration-none text-primary">Maklumat Bilik Mesyuarat</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Maklumat Bilik</h3>
                <p>{{ $room->room_name }}</p>
                <div class="eb-form-section">
                    <form>
                        <div class="row">
                                <!-- Image Section -->
                                <div class="col-md-4">
                                    @if ($room->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}" alt="Bilik Mesyuarat" class="room-img">
                                    @endif
                                    <!-- Status -->
                                    <div class="status">
                                    <i class="fas fa-check-circle"></i> Bilik Tersedia
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roomName">Name Bilik</label>
                                            <input type="text" class="form-control" id="roomName" placeholder=""
                                                value="{{ $room->room_name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description">Penerangan</label>
                                            <input type="text" class="form-control" id="description" placeholder=""
                                                value="{{ $room->description }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="capacity">Kapasiti</label>
                                            <input type="text" class="form-control" id="capacity" placeholder=""
                                                value="{{ $room->room_capacity }} people" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facilities ">Fasiliti </label>
                                            <input type="text" class="form-control" id="facilities" placeholder=""
                                                value="{{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facilities ">Tarikh Mesyuarat</label>
                                            <input type="text" class="form-control" id="facilities" placeholder=""
                                                value="{{\Carbon\Carbon::parse(request()->get('date'))->format('F d, Y')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="capacity">Masa Mesyuarat</label>
                                            <input type="text" class="form-control" id="capacity" placeholder=""
                                                value="{{\Carbon\Carbon::parse(request()->get('start'))->format('g:i A')}} - {{\Carbon\Carbon::parse(request()->get('end'))->format('g:i A')}}" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="eb-form-btn-submit eb-readonly-btns mt-3">
                            <button type="button" class="btn btn-outline-primary">Kembali</button>
                            <a href="{{ route('user.booking.new', ['user' => Auth::user()->id, 'room' => $room->id, 'date' => request()->get('date'), 'start' => request()->get('start'), 'end' => request()->get('end')]) }}" class="btn btn-primary">Tempah Bilik</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection
@push('js')

@endpush