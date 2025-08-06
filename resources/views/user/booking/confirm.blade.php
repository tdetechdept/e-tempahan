@extends('layouts.main.app')

@section('title', 'Tempahan telah dibatalkan')

@section('content')
     <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="card-title">Tempahan anda telah disahkan</h3>
                    <p class="card-text">Permohonan tempahan anda telah disahkan. <br>
                         Mohon lihat emel anda untuk ke peringkat seterusnya.</p>
                </div>
                <a href="{{ route('home') }}" class="btn btn-primary">Papan Pemuka</a>
            </div>
        </div>
    </div>
@endsection