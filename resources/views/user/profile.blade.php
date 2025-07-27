@extends('layouts.main.app')

@section('title', 'Profil Pengguna')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Profil Pengguna</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Profil Pengguna</span>
        </div>
    </div>
@endsection

@section('content')
        <main class="main-content">

        <div class="card">
            <div class="card-body">
                <h6 class="card-title text-primary font-weight-bold">Maklumat Profil</h6>
                {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gambar Profil</label>
                    <div class="row mx-2">
                        <img src="{{asset('img/img1.png')}}" class="rounded-circle" alt="..." style="width: 150px; height: 150px;">
                        <div class="">
                            <button type="button" class="ml-5 btn btn-primary">Primary</button>
                            <button type="button" class="btn btn-secondary">Secondary</button>
                        </div>
                            
                    </div>
                </div>

                <div class="card" style="background-color: lightgray;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="nama" class="form-label">Nama Penuh</label>
                                <input type="text" class="form-control-plaintext" id="nama" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="nombor_kad_pengenalan" class="form-label">Nombor Kad Pengenalan</label>
                                <input type="text" class="form-control-plaintext" id="nombor_kad_pengenalan" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="emel" class="form-label">Emel</label>
                                <input type="email" class="form-control-plaintext" id="emel" aria-describedby="emailHelp" value="{{ auth()->user()->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card mt-5">
                    <div class="card-body">

                        <div class="d-flex bd-highlight mb-3">
                            <div class="mr-auto p-2 bd-highlight">
                                <h6 class="card-title text-primary font-weight-bold">Maklumat Profil</h6>
                            </div>
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button>
                            </div>
                        </div>
                        
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Penuh</label>
                                <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nombor_kad_pengenalan" class="form-label">Nombor Kad Pengenalan</label>
                                <input type="text" class="form-control" id="nombor_kad_pengenalan" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="jawatan" class="form-label">Jawatan</label>
                                <input type="text" class="form-control" id="jawatan" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="gred" class="form-label">Gred</label>
                                <input type="text" class="form-control" id="gred" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="bahagian" class="form-label">Bahagian</label>
                                <input type="text" class="form-control" id="bahagian" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan / Agensi</label>
                                <input type="text" class="form-control" id="jabatan" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="no_telefon_pejabat" class="form-label">No. Telefon Pejabat</label>
                                <input type="text" class="form-control" id="no_telefon_pejabat" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="no_telefon_bimbit" class="form-label">No. Telefon Bimbit</label>
                                <input type="text" class="form-control" id="no_telefon_bimbit" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Emel</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">

                        <div class="d-flex bd-highlight mb-3">
                            <div class="mr-auto p-2 bd-highlight">
                                <h6 class="card-title text-primary font-weight-bold">Kata Laluan</h6>
                            </div>
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-outline-primary"><i class="fas fa-pen"></i></button>
                            </div>
                        </div>
                        
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Kata Laluan</label>
                                <input type="password" class="form-control" id="password" aria-describedby="emailHelp" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Pengesahan Kata Laluan</label>
                                <input type="password" class="form-control" id="confirm_password" aria-describedby="emailHelp" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-muted">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-primary">Kembali</button>
                    <button type="button" class="btn btn-primary">Hantar Permohonan</button>
                </div>
           
            </div>
        </div>

        </main>
@endsection