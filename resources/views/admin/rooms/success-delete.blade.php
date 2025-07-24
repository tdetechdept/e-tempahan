@extends('layouts.main.app')

@section('title', 'Room Deleted')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="card-title">The Room has been successfully deleted.</h3>
                    <p class="card-text">The room has been successfully deleted from the system</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
            </div>
        </div>
    </div>
@endsection
