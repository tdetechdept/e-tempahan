@extends('layouts.auth.app')

@push('css')
    <style>
        .card {
            border: none;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .check-icon {
            background-color: #34bfa3;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px auto;
        }
        .check-icon i {
            color: white;
            font-size: 36px;
        }
        .btn-custom {
            background-color: #34bfa3;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            font-size: 16px;
        }
        .btn-custom:hover {
            background-color: #2fa890;
        }

        .eb-registration-icon{width: 100px;height: 100px;background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxjaXJjbGUgY3g9IjUwIiBjeT0iNTAiIHI9IjUwIiBmaWxsPSIjNzJENkNDIi8+CjxjaXJjbGUgY3g9IjUwIiBjeT0iNTAuNSIgcj0iNDAiIGZpbGw9IiMyOTlEOTEiLz4KPHBhdGggZD0iTTY2LjY2OCA0MC4wODRMNDUuODM0NiA2MC45MTczTDM1LjQxOCA1MC41MDA3IiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjUuMjA4MzMiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K");background-repeat: no-repeat;background-position: center;margin: 0 auto 50px;}
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 40vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto mb-2 eb-registration-icon"></div>
                    <h3 class="mb-3">Permohonan Pendaftaran Dihantar</h3>
                    <p class="mb-4">Permohonan pendaftaran anda sedang di dalam proses.<br>
                    Mohon lihat emel anda untuk ke peringkat seterusnya</p>
                </div>
                <a href="{{ route('login') }}" class="btn btn-custom">Log Masuk</a>
            </div>
        </div>
    </div>
@endsection

