@extends('layouts.main.app')

@section('title', 'Tambah Bilik')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Bilik</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('organization.index') }}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
            <span class="mx-2">/</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Cipta Maklumat Bilik</h3>
                <p>Sila lengkapkan maklumat penciptaan dibawah.</p>

                <div class="eb-form-section">
                    <form action="{{ route('organization.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf
                        <div class="form-group row">
                        <label for="nama_bahagian" class="col-sm-2 col-form-label font-weight-bold">Nama Bahagian</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control form-control-lg rounded" placeholder="Masukkan Nama Bahagian" required>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-medium px-5">Hantar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
