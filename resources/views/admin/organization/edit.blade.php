@extends('layouts.main.app')

@php
    $labels = [
        'section' => 'Bahagian',
        'department' => 'Jabatan',
        'agency' => 'Agensi',
        'chairman' => 'Pengerusi',
    ];

    $entityLabel = $labels[$type];
@endphp

@section('title', (isset($model) ? 'Kemaskini' : 'Tambah') . ' ' . $entityLabel)

@section('breadcrumb')
<div class="breadcrumb-section">
    <h1 class="breadcrumb-title">{{ (isset($model) ? 'Kemaskini' : 'Tambah') . ' ' . $entityLabel }}</h1>
    <div class="breadcrumb-nav">
        <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka </a>
        <span class="mx-2">/</span>
        <a href="{{ route('organization.index') }}" class="text-decoration-none text-dark">Pengurusan Organisasi</a>
        <span class="mx-2">/</span>
        <a href="#" class="text-decoration-none breadcrumb-active">
            {{ isset($model) ? 'Kemaskini' : 'Tambah' }} {{ $entityLabel }}
        </a>
    </div>
</div>
@endsection

@section('content')
<main class="main-content">
    <div class="content-card mb-3">
        <div class="eb-create-room-information">
            <h3>{{ isset($model) ? 'Kemaskini' : 'Cipta' }} {{ $entityLabel }}</h3>
            <p>Sila lengkapkan maklumat {{ isset($model) ? 'kemaskini' : 'penciptaan' }} di bawah.</p>

            <div class="eb-form-section">
                <form id="editForm" action="{{ isset($model)
                    ? route('organization.update', ['type' => $type, 'id' => $model->id])
                    : route('organization.store', $type) }}"
                      method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @if(isset($model))
                        @method('PUT')
                    @endif

                    {{-- Common name field --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label font-weight-bold">Nama {{ $entityLabel }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name"
                                   class="form-control form-control-lg rounded @error('name') is-invalid @enderror"
                                   placeholder="Masukkan Nama {{ $entityLabel }}"
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
                        <button type="button" class="btn btn-primary btn-medium px-5" data-toggle="modal" data-target="#confirmEditModal">
                            {{ isset($model) ? 'Kemaskini' : 'Hantar' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

{{-- Confirmation Modal --}}
<div class="modal fade eb-delete-popup" id="confirmEditModal" tabindex="-1" role="dialog" aria-labelledby="confirmEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="eb-delete-icon mb-3"></div>
                <h3>Adakah anda pasti?</h3>
                <p>Adakah anda pasti anda ingin {{ isset($model) ? 'kemaskini' : 'tambah' }} nama {{ $entityLabel }} ini?</p>
                <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('editForm').submit();">
                        Ya, {{ isset($model) ? 'Kemaskini' : 'Hantar' }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
