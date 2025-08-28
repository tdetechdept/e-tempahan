@extends('layouts.main.app')

@section('title', $title)

@section('breadcrumb')
<div class="breadcrumb-section">
    <h1 class="breadcrumb-title">{{ $title }}</h1>
    <div class="breadcrumb-nav">
        <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka </a>
        <span class="mx-2">/</span>
        <a href="{{ route('organization.index') }}" class="text-decoration-none text-dark">Pengurusan Organisasi</a>
        <span class="mx-2">/</span>
        <a href="{{ route('organization.create', $type) }}" class="text-decoration-none breadcrumb-active">{{ $title }}</a>
    </div>
</div>
@endsection

@section('content')
<main class="main-content">
    <div class="content-card mb-3">
        <div class="eb-create-room-information">
            <h3>{{ $title }}</h3>
            <p>Please complete the creation details below.</p>

            <div class="eb-form-section">
                <form id="createForm" action="{{ route('organization.store', $type) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Name Field --}}
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label font-weight-bold">{{ $fieldLabel }}</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name"
                                class="form-control form-control-lg rounded @error('name') is-invalid @enderror"
                                placeholder="Enter {{ $fieldLabel }}" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Extra fields for chairman --}}
                    @if($type === 'chairman')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font-weight-bold">Position</label>
                            <div class="col-sm-10">
                                <input type="text" name="position"
                                    class="form-control form-control-lg rounded @error('position') is-invalid @enderror"
                                    placeholder="Enter Position" value="{{ old('position') }}">
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font-weight-bold">Division</label>
                            <div class="col-sm-10">
                                <input type="text" name="division"
                                    class="form-control form-control-lg rounded @error('division') is-invalid @enderror"
                                    placeholder="Enter Division" value="{{ old('division') }}">
                                @error('division')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label font-weight-bold">Office Phone</label>
                            <div class="col-sm-10">
                                <input type="text" name="office_phone"
                                    class="form-control form-control-lg rounded @error('office_phone') is-invalid @enderror"
                                    placeholder="Enter Office Phone" value="{{ old('office_phone') }}">
                                @error('office_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-primary btn-medium px-5" data-toggle="modal" data-target="#confirmModal">
                            Hantar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@php
    $typeLabels = [
        'section' => 'bahagian',
        'department' => 'jabatan',
        'agency' => 'agensi',
        'chairman' => 'pengerusi',
    ];

    $entityLabel = $typeLabels[$type] ?? 'entiti';
@endphp
{{-- Confirmation Modal --}}
<div class="modal fade eb-delete-popup" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="eb-delete-icon mb-3"></div>
                <h3>Adakah anda pasti?</h3>
               <p>Adakah anda pasti anda ingin tambah nama {{ $entityLabel }} ini?</p>
                <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('createForm').submit();">
                        Ya, Hantar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
