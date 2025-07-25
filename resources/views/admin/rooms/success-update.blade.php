@extends('layouts.main.app')

@section('title', 'Room Updated')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="card-title"> Maklumat bilik berjaya dikemas kini..</h3>
                    <p class="card-text">Maklumat bilik telah berjaya dikemas kini.</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Laman Utama</a>
            </div>
        </div>
    </div>
@endsection
