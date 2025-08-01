@extends('layouts.main.app')


@section('title', 'Pengurusan Organisasi')

@section('breadcrumb')
<div class="breadcrumb-section">
        <h1 class="breadcrumb-title"> Pengurusan Organisasi</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-decoration-none text-success">Tambah Nama Bahagian</a>
        </div>
    </div>
@endsection

@section('content')

<main class="main-content">
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="mb-4"><strong>Tambah Nama Bahagian</strong></h5>
                <form action="#" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="nama_bahagian" class="col-sm-2 col-form-label font-weight-bold">Nama Bahagian</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_bahagian" id="nama_bahagian" class="form-control form-control-lg rounded" placeholder="Masukkan Nama Bahagian">
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary btn-lg px-5">Hantar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
