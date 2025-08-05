@extends('layouts.main.app')

@section('title', (isset($model) ? 'Kemaskini' : 'Tambah') . ' ' . ucfirst($type))

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">{{ ucfirst($type) }}</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('organization.index') }}" class="text-decoration-none text-dark">Pengurusan Organisasi</a>
            <span class="mx-2">/</span>
            <a href="#" class="text-decoration-none text-success">
                {{ isset($model) ? 'Kemaskini' : 'Tambah' }} {{ ucfirst($type) }}
            </a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>{{ isset($model) ? 'Kemaskini' : 'Cipta' }} {{ ucfirst($type) }}</h3>
                <p>Sila lengkapkan maklumat {{ isset($model) ? 'kemaskini' : 'penciptaan' }} di bawah.</p>

                <div class="eb-form-section">
                    <form action="{{ isset($model)
                        ? route('organization.update', ['type' => $type, 'id' => $model->id])
                        : route('organization.store', $type) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        @if(isset($model))
                            @method('PUT')
                        @endif

                        {{-- Common name field --}}
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label font-weight-bold">
                                Nama {{ ucfirst($type) }}
                            </label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name"
                                       class="form-control form-control-lg rounded @error('name') is-invalid @enderror"
                                       placeholder="Masukkan Nama {{ ucfirst($type) }}"
                                       value="{{ old('name', isset($model) ? $model->name : '') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Extra fields for chairman --}}
                        @if($type === 'chairman')
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Jawatan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="position"
                                           class="form-control form-control-lg rounded @error('position') is-invalid @enderror"
                                           placeholder="Masukkan Jawatan"
                                           value="{{ old('position', isset($model) ? $model->position : '') }}">
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Bahagian</label>
                                <div class="col-sm-10">
                                    <input type="text" name="division"
                                           class="form-control form-control-lg rounded @error('division') is-invalid @enderror"
                                           placeholder="Masukkan Bahagian"
                                           value="{{ old('division', isset($model) ? $model->division : '') }}">
                                    @error('division')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label font-weight-bold">Telefon Pejabat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="office_phone"
                                           class="form-control form-control-lg rounded @error('office_phone') is-invalid @enderror"
                                           placeholder="Masukkan Telefon Pejabat"
                                           value="{{ old('office_phone', isset($model) ? $model->office_phone : '') }}">
                                    @error('office_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-medium px-5">
                                {{ isset($model) ? 'Kemaskini' : 'Hantar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
