@extends('layouts.main.app')

@section('title', 'Room Updated')

@section('content')
<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
    <div class="p-4 text-center shadow card" style="max-width: 30rem;">
        <div class="mb-4">
            <div class="mx-auto d-flex align-items-center justify-content-center rounded-circle bg-info bg-opacity-10" style="width: 64px; height: 64px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-info">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        <h2 class="mb-2 h5 text-dark fw-semibold">User update successful</h2>
        <p class="mb-4 text-muted small">User have been updated and saved successfully.</p>
        <a href="{{ route('home') }}" class="text-white btn btn-info">Back to Dashboard</a>
    </div>
</div>
@endsection
