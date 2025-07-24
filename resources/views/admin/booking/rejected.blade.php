@extends('layouts.main.app')
@section('content')
     <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="card-title">Booking has been declined</h3>
                    <p class="card-text">This booking request has been rejected. Please check your email for the next level.</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
            </div>
        </div>
    </div>
@endsection