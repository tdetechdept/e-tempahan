@extends('layouts.super_admin.app')

@push('css')
<style>
    .pagination-container {
        margin-top: 2rem;
    }
    
    .pagination {
        display: flex;
        list-style: none;
        padding: 0;
        margin: 0;
        border-radius: 8px;
        overflow: hidden;
        background: white;
    }
    
    .page-item {
        margin: 0;
    }
    
    .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 12px 16px;
        color: #6c757d;
        background-color: white;
        border: 1px solid #e9ecef;
        text-decoration: none;
        font-weight: 500;
        min-width: 44px;
        transition: all 0.2s ease;
    }
    
    .page-link:hover {
        color: #495057;
        background-color: #f8f9fa;
        border-color: #dee2e6;
        text-decoration: none;
    }
    
    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: white;
    }
    
    .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #f8f9fa;
        border-color: #e9ecef;
        cursor: not-allowed;
    }
    
    .page-item:first-child .page-link {
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    
    .page-item:last-child .page-link {
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
    }
    
    .page-link i {
        font-size: 14px;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .pagination {
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .page-link {
            padding: 8px 12px;
            min-width: 36px;
            font-size: 14px;
        }
    }
</style>
@endpush

@section('content')
    <div class="">
        {{-- <h2 class="page_title">Audit</h2>
        <p class="breadcrumbs">Laman Utama / <span>Audit</span></p> --}}
        <div class="breadcrumb-section mb-3">
            <h1 class="breadcrumb-title">Audit</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-decoration-none text-primary">Audit</a>
            </div>
        </div>
        

        <div class="audit_table_container">
            <h4 class="table_title mb-4">Rekod Aktiviti Pengguna</h4>
            <form method="GET" action="{{ route('audit') }}" class="input_filds_date_name">
                <div class="form-group">
                    <label for="datepicker">Tarikh</label>
                    <input type="date" class="form-control" id="datepicker" name="date" value="{{ request('date') }}" placeholder="Pilith Tarikh">
                </div>
                <div class="form-group">
                    <label for="username">Name Pengguna</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ request('username') }}" placeholder="Nama Pengguna">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ route('audit') }}" class="btn btn-secondary">Reset</a>
                </div>
               
            </form>
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Pengguna</th>
                            <th>Bahagian</th>
                            <th>Tindakan</th>
                            <th>Status</th>
                            <th>Alamat IP</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($audits as $index => $audit)
                            <tr>
                                <td>{{ $audits->firstItem() + $index }}</td>
                                <td>{{ $audit->user_name ?? 'Unknown' }}</td>
                                <td>{{ $audit->department ?? 'N/A' }}</td>
                                <td>{{ ucfirst($audit->event) }}</td>
                                <td>
                                    @php
                                        $statusClass = match($audit->event) {
                                            'created' => ['AKTIF', 'Berjaya'],
                                            'updated' => ['AKTIF', 'Berjaya'],
                                            'deleted' => ['AKTIF', 'Berjaya'],
                                            default => ['NYAHAKTIF', 'Gagal']
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass[0] }}">{{ $statusClass[1] }}</span>
                                </td>
                                <td>{{ $audit->ip_address ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('record_user_activity', $audit->id) }}"
                                        class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                        <span class="material-symbols-rounded">visibility</span>
                                        Lihat
                                    </a>
                                    {{-- <a href="{{ route('record_user_activity', $audit->id) }}" class="btn-view">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                                            <path fill="currentColor" d="M515.472 321.408c-106.032 0-192 85.968-192 192c0 106.016 85.968 192 192 192s192-85.968 192-192s-85.968-192-192-192m0 320c-70.576 0-129.473-58.816-129.473-129.393s57.424-128 128-128c70.592 0 128 57.424 128 128s-55.935 129.393-126.527 129.393m508.208-136.832c-.368-1.616-.207-3.325-.688-4.91c-.208-.671-.624-1.055-.864-1.647c-.336-.912-.256-1.984-.72-2.864c-93.072-213.104-293.663-335.76-507.423-335.76S95.617 281.827 2.497 494.947c-.4.897-.336 1.824-.657 2.849c-.223.624-.687.975-.895 1.567c-.496 1.616-.304 3.296-.608 4.928c-.591 2.88-1.135 5.68-1.135 8.592c0 2.944.544 5.664 1.135 8.591c.32 1.6.113 3.344.609 4.88c.208.72.672 1.024.895 1.68c.336.88.256 1.968.656 2.848c93.136 213.056 295.744 333.712 509.504 333.712c213.776 0 416.336-120.4 509.44-333.505c.464-.912.369-1.872.72-2.88c.224-.56.655-.976.848-1.6c.496-1.568.336-3.28.687-4.912c.56-2.864 1.088-5.664 1.088-8.624c0-2.816-.528-5.6-1.104-8.497M512 800.595c-181.296 0-359.743-95.568-447.423-287.681c86.848-191.472 267.68-289.504 449.424-289.504c181.68 0 358.496 98.144 445.376 289.712C872.561 704.53 693.744 800.595 512 800.595"></path>
                                        </svg> Lihat
                                    </a> --}}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tiada rekod audit dijumpai</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                @if($audits->hasPages())
                    <div class="Audit_pagination_align">
                        {{ $audits->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
        </div>
    @endsection
