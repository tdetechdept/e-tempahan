@extends('layouts.main.app')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Tambah Tempahan</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Tambah Tempahan</span>
        </div>
    </div>
@endsection

@section('content')

    @include('user.booking.book._form', [
        'button' => 'create',
        'action' => route('user.booking.store'),
    ])

@endsection