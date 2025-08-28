@extends('layouts.super_admin.app')

@section('content')
    <div class="pengurusan_pengguna_page">
        {{-- <h2 class="page_title">Audit</h2>
        <p class="breadcrumbs">Laman Utama / <a href="{{ route('audit') }}">Rekod Aktiviti Pengguna</a> / <span>Maklumat Butiran Log</span></p> --}}

         <div class="breadcrumb-section mb-3">
            <h1 class="breadcrumb-title">Audit</h1>
            <div class="breadcrumb-nav">
                <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
                <span class="mx-2">/</span>
                 <a href="{{ route('audit') }}" class="text-decoration-none text-dark">Rekod Aktiviti Pengguna</a>
                <span class="mx-2">/</span>
                <a href="#" class="text-decoration-none text-primary">Maklumat Butiran Log</a>
            </div>
        </div>

        <div class="maklumat_pengguna">
            <h2 class="section_title">Maklumat Butiran Log</h2>

            <div class="Info_content">
                <div class="Info_title">
                    <p>Nama Pegawai</p>
                    <p>Tarikh & Masa</p>
                    <p>Emel Pengguna</p>
                    <p>Peranan</p>
                    <p>Bahagian</p>
                    <p>Tindakan Dilakukan</p>
                    <p>Status</p>
                    <p>Alamat IP</p>
                    <p>Peranti / Pelayar</p>
                    <p>URL Akses</p>
                </div>
                <div class="Info_desc">
                    <p>{{ $audit->user->name ?? 'Unknown' }}</p>
                    <p>{{ $audit->created_at->format('d F Y, h:i A') }}</p>
                    <p>{{ $audit->user->email ?? 'N/A' }}</p>
                    <p>{{ $audit->user->role ?? 'N/A' }}</p>
                    <p>{{ $audit->user->department ?? 'N/A' }}</p>
                    <p>{{ ucfirst($audit->event) }} {{ str_replace('App\Models\\', '', $audit->auditable_type) }}</p>
                    <p>
                        @php
                            $statusClass = match($audit->event) {
                                'created' => 'Berjaya',
                                'updated' => 'Berjaya',
                                'deleted' => 'Berjaya',
                                default => 'Berjaya'
                            };
                        @endphp
                        <span class="badge badge-success">{{ $statusClass }}</span>
                    </p>
                    <p>{{ $audit->ip_address ?? 'N/A' }}</p>
                    <p>{{ $audit->user_agent ? 'Browser: ' . substr($audit->user_agent, 0, 50) . '...' : 'N/A' }}</p>
                    <p>{{ $audit->url ?? 'N/A' }}</p>
                </div>
            </div>

            @if($audit->old_values || $audit->new_values)
                <h2 class="section_title border-0">Maklumat Perubahan</h2>
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Perubahan</th>
                                <th>Sebelum</th>
                                <th>Selepas</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $oldValues = is_array($audit->old_values) 
                                ? $audit->old_values 
                                : ($audit->old_values ? json_decode($audit->old_values, true) : []);

                            $newValues = is_array($audit->new_values) 
                                ? $audit->new_values 
                                : ($audit->new_values ? json_decode($audit->new_values, true) : []);
                            
                            $changes = array_merge($oldValues, $newValues);
                            $changes = array_unique(array_keys($changes));
                        @endphp
                            
                            @forelse($changes as $index => $field)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $field)) }}</td>
                                    <td>{{ $oldValues[$field] ?? 'N/A' }}</td>
                                    <td>{{ $newValues[$field] ?? 'N/A' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tiada perubahan dijumpai</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif

            <div class="Log_Details_Information mt-5">
                <a href="{{ route('audit') }}" class="dashboard-btn btn btn-primary">Kembali ke Audit</a>
            </div>
        </div>
    </div>
@endsection
