@extends('layouts.main.app')

@section('title', 'Tempahan telah dibatalkan')

@section('content')
     <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2">
                        <svg class="mb-4" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" fill="#9DC0E7"/>
                            <circle cx="50" cy="50.5" r="40" fill="#285689"/>
                            <path d="M66.668 40.0859L45.8346 60.9193L35.418 50.5026" stroke="white" stroke-width="5.20833" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="card-title">Tempahan telah dibatalkan</h3>
                    <p class="card-text">Permohonan tempahan ini telah dibatalkan. Mohon lihat emel anda untuk ke peringkat seterusnya.</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Papan Pemuka</a>
            </div>
        </div>
    </div>
@endsection