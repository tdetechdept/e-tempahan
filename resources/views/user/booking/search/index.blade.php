@extends('layouts.main.app')

@section('title', 'Buat Tempahan')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Buat Tempahan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.create') }}" class="text-decoration-none text-primary">Cari Bilik Mesyuarat</a>
        </div>
    </div>
@endsection

@section('content')

    <main class="main-content">
        <div class="my-5">
            <div class="card shadow-sm custom-card">
                <div class="card-header">
                    <h5 class="card-title font-weight-bold">Carian Bilik Mesyuarat</h5>
                    <p class="card-text">
                        Sila isi Maklumat dibawah untuk mencari bilik mesyuarat yang sesuai dengan keperluan anda.
                    </p>
                </div>
                <div class="card-body">
                <h6 class="card-title font-weight-bold">Carian Bilik Mesyuarat</h6>
                <form action="{{ route('user.search.result') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="rooName">Nama Bilik Mesyuarat</label>
                                {{-- <input type="text" class="form-control" id="rooName" name="rooName" required> --}}
                                <select class="form-control" name="roomName" id="roomNameSelect">
                                    <option>Pilih Nama Bilik Mesyuarat</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="rooLevel">Aras Bilik Mesyuarat</label>
                                {{-- <input type="text" class="form-control" id="rooLevel" name="rooLevel" required> --}}
                                <select class="form-control" name="roomLevel" id="roomLevelSelect">
                                    <option>Pilih Aras Bilik Mesyuarat</option>
                                   @foreach ($rooms as $room)
                                        <option value="{{ $room->level }}">Aras {{ $room->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="participants">Jumlah Peserta</label>
                                <input type="text" class="form-control" id="participants" name="participants" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="date">Tarikh Tempahan</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                    </div>
                        <label for=""> Masa Mesyuarat</label>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="starttime">Masa Mula</label>
                                <input type="time" class="form-control" id="starttime" name="starttime" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="endtime">Masa Tamat</label>
                                <input type="time" class="form-control" id="endtime" name="endtime" required>
                            </div>
                        </div>
                    </div>
                <div class="float-right">
                    <button type="button" class="btn btn-outline-primary">Kembali</button>
                    <button type="submit" class="btn btn-primary">Cari Bilik</button>
                </div>
                </form> 
                </div>
            </div>
        </div>

    </main>
@endsection