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
            background-color: #285689;
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
            background-color: #285689;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            color: white;
            font-size: 16px;
        }
        .btn-custom:hover {
            background-color: #2470c7;
        }

        .eb-registration-icon{width: 100px;height: 100px;background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxjaXJjbGUgY3g9IjUwIiBjeT0iNTAiIHI9IjUwIiBmaWxsPSIjNzJENkNDIi8+CjxjaXJjbGUgY3g9IjUwIiBjeT0iNTAuNSIgcj0iNDAiIGZpbGw9IiMyOTlEOTEiLz4KPHBhdGggZD0iTTY2LjY2OCA0MC4wODRMNDUuODM0NiA2MC45MTczTDM1LjQxOCA1MC41MDA3IiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjUuMjA4MzMiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K");background-repeat: no-repeat;background-position: center;margin: 0 auto 50px;}
    </style>
@endpush

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 40vh;">
        <div class="text-center border-0 shadow-sm card p-4">
            <div class="card-body">
                <div class="mb-3">
                    <div class="mx-auto">
                        <svg class="mb-4" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" fill="#9DC0E7"/>
                            <circle cx="50" cy="50.5" r="40" fill="#285689"/>
                            <path d="M66.668 40.0859L45.8346 60.9193L35.418 50.5026" stroke="white" stroke-width="5.20833" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </div>
                    <h3 class="mb-3">Kata Laluan Baharu Berjaya Dicipta</h3>
                    <p class="mb-4">Sila Log Masuk menggunakan kata laluan baharu anda.</p>
                </div>
                <a href="{{ route('login') }}" class="btn btn-custom">Log Masuk</a>
            </div>
        </div>
    </div>
@endsection

