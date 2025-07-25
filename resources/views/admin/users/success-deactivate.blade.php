@extends('layouts.main.app')

@section('title', 'User Management')

@section('content')
  <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="card-title"> Pengguna telah dinyahaktifkan.</h3>
                    <p class="card-text">Akses ke sistem tidak lagi dibenarkan sehingga diaktifkan semula.</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Papan Pemuka</a>
            </div>
        </div>
</div>

@endsection
