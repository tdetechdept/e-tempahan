@extends('layouts.main.app')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Kemaskini Tempahan</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Kemaskini Tempahan</span>
        </div>
    </div>
@endsection

@section('content')

    @include('user.booking.book._form', [
        'button' => 'update',
        'action' => route('user.booking.update', $booking),
    ])

@endsection