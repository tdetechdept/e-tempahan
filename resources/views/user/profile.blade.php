@extends('layouts.main.app')

@section('title', 'Profil Pengguna')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Profil Pengguna</h1>
        <div class="breadcrumb-nav">
            <span>Papan Pemuka</span>
            <span class="mx-2">/</span>
            <span>Profil Pengguna</span>
        </div>
    </div>
@endsection

@section('content')
        <main class="main-content">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                @endif

        <div class="card mt-3">
            <div class="card-body">
                <h6 class="card-title text-primary font-weight-bold">Maklumat Profil</h6>
                {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Gambar Profil</label>
                    <div class="row mx-2">
                        @if (auth()->user()->image)
                            <img src="{{ asset('/uploads/users/' . auth()->user()->image) }}?v={{ time() }}" class="rounded-circle" alt="..." style="width: 150px; height: 150px;">
                        @else
                            <img src="{{ asset('admin2/img/undraw_profile.svg') }}" class="rounded-circle" alt="..." style="width: 150px; height: 150px;">      
                        @endif
                        <div class="">
                            <button type="button" class="ml-5 btn btn-primary" data-toggle="modal" data-target="#imgModal">Muat Naik Gambar</button>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#confirmationModal">Buang Gambar</button>
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
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop"><i class="fas fa-pen"></i></button>
                            </div>
                        </div>
                        
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Penuh</label>
                                <input type="text" class="form-control" id="nama" aria-describedby="" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nombor_kad_pengenalan" class="form-label">Nombor Kad Pengenalan</label>
                                <input type="text" class="form-control" id="nombor_kad_pengenalan" aria-describedby="" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="jawatan" class="form-label">Jawatan</label>
                                <input type="text" class="form-control" id="jawatan" name="position" aria-describedby="" value="{{ auth()->user()->position }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="gred" class="form-label">Gred</label>
                                <input type="text" class="form-control" id="gred" name="grade" aria-describedby="" value="{{ auth()->user()->grade }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="bahagian" class="form-label">Bahagian</label>
                                <input type="text" class="form-control" id="bahagian" name="section" aria-describedby="" value="{{ auth()->user()->section }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan / Agensi</label>
                                <input type="text" class="form-control" id="jabatan" name="department" aria-describedby="" value="{{ auth()->user()->department }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="no_telefon_pejabat" class="form-label">No. Telefon Pejabat</label>
                                <input type="text" class="form-control" id="no_telefon_pejabat" name="office_number" aria-describedby="" value="{{ auth()->user()->office_number }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="no_telefon_bimbit" class="form-label">No. Telefon Bimbit</label>
                                <input type="text" class="form-control" id="no_telefon_bimbit" name="phone_number" aria-describedby="" value="{{ auth()->user()->phone_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Emel</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" name="email" value="{{ auth()->user()->email }}" readonly>
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
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
                                <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#passwordModal"><i class="fas fa-pen"></i></button>
                            </div>
                        </div>
                        
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Kata Laluan</label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="password" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Pengesahan Kata Laluan</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" aria-describedby="confirm_password" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-footer text-muted">
                <div class="float-right">
                    <a href="{{route('home')}}" type="button" class="btn btn-outline-primary">Kembali</a>
                    {{-- <button type="button" class="btn btn-primary">Hantar Permohonan</button> --}}
                </div>
           
            </div>
        </div>

        </main>


        <!-- Maklumat Pengguna -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Maklumat Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
            <div class="modal-body">
                 <div class="card mt-5">
                    <div class="card-body">
                         @php
                            $grades = \App\Models\Grade::all();
                            $sections = \App\Models\Section::all();
                            $departments = \App\Models\Department::all();
                            $agencies = \App\Models\Agency::all();

                            $items = $departments->concat($agencies);
                        @endphp
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama Penuh</label>
                                <input type="text" class="form-control" id="nama" name="name" aria-describedby="" value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="nombor_kad_pengenalan" class="form-label">Nombor Kad Pengenalan</label>
                                <input type="text" class="form-control" id="nombor_kad_pengenalan" name="id_number" aria-describedby="" value="{{ auth()->user()->id_number }}" readonly>
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="jawatan" class="form-label">Jawatan</label>
                                <input type="text" class="form-control" id="jawatan" name="position" aria-describedby="" value="{{ auth()->user()->position }}">
                            </div>
                            <div class="col-md-6">
                                <label for="gred" class="form-label">Gred</label>
                                 <select class="form-control" id="gred" name="grade" aria-label="Default select example">
                                    <option selected disabled>Pilih Gred</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->grade}} ({{$grade->name}})" {{ old('grade', $grade->grade. '('.$grade->name.')' ?? '') == auth()->user()->grade ? 'selected' : '' }}>{{$grade->grade}} ({{$grade->name}})</option>   
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="gred" name="grade" aria-describedby="" value="{{ auth()->user()->grade }}"> --}}
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="bahagian" class="form-label">Bahagian</label>
                                <select class="form-control" id="section" name="section" aria-label="Default select example">
                                    <option selected disabled>Pilih Bahagian</option>
                                    @foreach ($sections as $section)
                                        <option value="{{$section->name}}" {{ old('section', $section->name ?? '') == auth()->user()->section ? 'selected' : '' }}>{{$section->name}}</option>
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="bahagian" name="section" aria-describedby="" value="{{ auth()->user()->section }}"> --}}
                            </div>
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan / Agensi</label>
                                <select class="form-control" id="department" name="department" aria-label="Default select example">
                                    <option selected disabled>Pilih Jabatan / Agensi</option>
                                    @foreach ($items as $item)
                                        <option value="{{$item->name}}" {{ old('department', $item->name ?? '') == auth()->user()->department ? 'selected' : '' }}>{{$item->name}}</option>   
                                    @endforeach
                                </select>
                                {{-- <input type="text" class="form-control" id="jabatan" name="department" aria-describedby="" value="{{ auth()->user()->department }}"> --}}
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="no_telefon_pejabat" class="form-label">No. Telefon Pejabat</label>
                                <input type="text" class="form-control" id="no_telefon_pejabat" name="office_number" aria-describedby="" value="{{ auth()->user()->office_number }}">
                            </div>
                            <div class="col-md-6">
                                <label for="no_telefon_bimbit" class="form-label">No. Telefon Bimbit</label>
                                <input type="text" class="form-control" id="no_telefon_bimbit" name="phone_number" aria-describedby="" value="{{ auth()->user()->phone_number }}">
                            </div>
                        </div>
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" class="form-label">Emel</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="" name="email" value="{{ auth()->user()->email }}" readonly>
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary">Kemaskini</button>
            </div>
            </form>
            </div>
        </div>
        </div>


        <!-- Modal Password -->
        <div class="modal fade" id="passwordModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="passwordLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{ route('user.profile.change-password') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordLabel">Kemaskini Kata Laluan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bg-light mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">Kata Laluan</label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="password" >
                            </div>
                            <div class="col-md-6">
                                <label for="confirm_password" class="form-label">Pengesahan Kata Laluan</label>
                                <input type="password" class="form-control" id="confirm_password" name="password_confirmation" aria-describedby="confirm_password" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

        <!-- Modal IMG -->
        <div class="modal fade" id="imgModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="imgLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="{{ route('user.profile.uploadImg') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="imgLabel">Muat Naik Gambar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row bg-light mb-3">
                            <div class="col-md-12">
                                <label for="profil" class="form-label">Gambar Profil</label>
                                <input type="file" class="form-control" id="profil" name="image" aria-describedby="Gambar Profil" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Muat Naik</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

            <!-- Modal -->
        <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content text-center">
                <form action="{{ route('user.profile.removeImg') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <!-- Icon -->
                        <div class="mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x text-primary"></i>
                        </div>
                        <!-- Title -->
                        <h5 class="mb-3 font-weight-bold">Adakah anda pasti?</h5>
                        <!-- Text -->
                        <p>Adakah anda pasti anda ingin memadam gambar profil?</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-primary" id="confirmBtn">Ya</button>
                    </div>
                </form>
                </div>
            </div>
        </div>

@endsection