@extends('layouts.main.app')

@section('title', 'Buat Tempahan')

@push('css')
  <!-- Tempus Dominus Bootstrap 4 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/css/tempusdominus-bootstrap-4.min.css" />
@endpush
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

                    {{-- <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="starttime">Masa Mula</label>
                                <input type="time" class="form-control" id="starttime" name="starttime" step="1800" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label for="endtime">Masa Tamat</label>
                                <input type="time" class="form-control" id="endtime" name="endtime" required>
                            </div>
                        </div>
                    </div> --}}

                    <div class="row">
                    <!-- Masa Mula -->
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Masa Mula</label>
                        <div class="input-group date" id="timepickerStart" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="starttime" data-target="#timepickerStart"/>
                        <div class="input-group-append" data-target="#timepickerStart" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Masa Tamat -->
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Masa Tamat</label>
                        <div class="input-group date" id="timepickerEnd" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="endtime" data-target="#timepickerEnd"/>
                        <div class="input-group-append" data-target="#timepickerEnd" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
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

@push('js')
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

<!-- Moment.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<!-- Tempus Dominus JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.39.0/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Font Awesome for clock icon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
$(function () {
    $('#timepickerStart').datetimepicker({
        format: 'hh:mm A' // 12-hour format with AM/PM
    });
    $('#timepickerEnd').datetimepicker({
        format: 'hh:mm A'
    });
});
</script>
@endpush