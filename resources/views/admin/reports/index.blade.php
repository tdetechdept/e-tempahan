@extends('layouts.main.app')

@section('title', 'Laporan')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Laporan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <span class="text-primary">Laporan</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="mb-0">Laporan</h3>
                    <div class="search-input d-flex align-items-center position-relative">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="reportSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-pills mb-4" id="report-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="pill" href="#harian">Harian</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#mingguan">Mingguan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#bulanan">Bulanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#tahunan">Tahunan</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content">
                    {{-- DAILY TAB --}}
                    <div class="tab-pane fade show active" id="harian">
                        <form method="GET" action="{{ route('reports.daily') }}">
                            <div class="form-group row">
                                <label for="section_id" class="col-sm-2 col-form-label font-weight-bold">Bahagian</label>
                                <div class="col-sm-10">
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option value="">-- Pilih Bahagian --</option>
                                        @foreach($organizations as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="hari" class="col-sm-2 col-form-label font-weight-bold">Hari</label>
                                <div class="col-sm-10">
                                    <input type="date" name="hari" id="hari" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label font-weight-bold">Status
                                    Permohonan</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Baru</option>
                                        <option value="2">Belum Diproses</option>
                                        <option value="3">Diluluskan</option>
                                        <option value="4">Ditolak</option>
                                        <option value="5">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-medium px-5">Teruskan</button>
                            </div>
                        </form>
                    </div>

                    {{-- WEEKLY TAB --}}
                    <div class="tab-pane fade" id="mingguan">
                        <form method="GET" action="">
                            <div class="form-group row">
                                <label for="section_id_week"
                                    class="col-sm-2 col-form-label font-weight-bold">Bahagian</label>
                                <div class="col-sm-10">
                                    <select name="section_id" id="section_id_week" class="form-control">
                                        <option value="">-- Pilih Bahagian --</option>
                                        @foreach($organizations as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date_week" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Mula</label>
                                <div class="col-sm-4">
                                    <input type="date" name="start_date" id="start_date_week" class="form-control" />
                                </div>

                                <label for="end_date_week" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Tamat</label>
                                <div class="col-sm-4">
                                    <input type="date" name="end_date" id="end_date_week" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status_week" class="col-sm-2 col-form-label font-weight-bold">Status
                                    Permohonan</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status_week" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Baru</option>
                                        <option value="2">Belum Diproses</option>
                                        <option value="3">Diluluskan</option>
                                        <option value="4">Ditolak</option>
                                        <option value="5">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-medium px-5">Teruskan</button>
                            </div>
                        </form>
                    </div>

                    {{-- MONTHLY TAB --}}
                    <div class="tab-pane fade" id="bulanan">
                        <form method="GET" action="">
                            <div class="form-group row">
                                <label for="section_id_month"
                                    class="col-sm-2 col-form-label font-weight-bold">Bahagian</label>
                                <div class="col-sm-10">
                                    <select name="section_id" id="section_id_month" class="form-control">
                                        <option value="">-- Pilih Bahagian --</option>
                                        @foreach($organizations as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date_month" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Mula</label>
                                <div class="col-sm-4">
                                    <input type="date" name="start_date" id="start_date_month" class="form-control" />
                                </div>

                                <label for="end_date_month" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Tamat</label>
                                <div class="col-sm-4">
                                    <input type="date" name="end_date" id="end_date_month" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status_month" class="col-sm-2 col-form-label font-weight-bold">Status
                                    Permohonan</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status_month" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Baru</option>
                                        <option value="2">Belum Diproses</option>
                                        <option value="3">Diluluskan</option>
                                        <option value="4">Ditolak</option>
                                        <option value="5">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-medium px-5">Teruskan</button>
                            </div>
                        </form>
                    </div>

                    {{-- YEARLY TAB --}}
                    <div class="tab-pane fade" id="tahunan">
                        <form method="GET" action="">
                            <div class="form-group row">
                                <label for="section_id_year"
                                    class="col-sm-2 col-form-label font-weight-bold">Bahagian</label>
                                <div class="col-sm-10">
                                    <select name="section_id" id="section_id_year" class="form-control">
                                        <option value="">-- Pilih Bahagian --</option>
                                        @foreach($organizations as $org)
                                            <option value="{{ $org->id }}">{{ $org->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date_year" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Mula</label>
                                <div class="col-sm-4">
                                    <input type="date" name="start_date" id="start_date_year" class="form-control" />
                                </div>

                                <label for="end_date_year" class="col-sm-2 col-form-label font-weight-bold">Tarikh
                                    Tamat</label>
                                <div class="col-sm-4">
                                    <input type="date" name="end_date" id="end_date_year" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status_year" class="col-sm-2 col-form-label font-weight-bold">Status
                                    Permohonan</label>
                                <div class="col-sm-10">
                                    <select name="status" id="status_year" class="form-control">
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1">Baru</option>
                                        <option value="2">Belum Diproses</option>
                                        <option value="3">Diluluskan</option>
                                        <option value="4">Ditolak</option>
                                        <option value="5">Dibatalkan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-medium px-5">Teruskan</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </main>
@endsection