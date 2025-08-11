@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page">
        <h2 class="page_title">Pengurusan Pengguna</h2>
        <p class="breadcrumbs">Laman Utama / <span>Pengurusan Pengguna</span></p>

        <div class="table-section">
            <div class="search-section">
                <h4 class="table_title">Senarai Pengguna / Pendaftaran</h4>
                <div class="position-relative search_input">
                    <i class="fas fa-search position-absolute"
                        style="left: 12px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="text" id="userSearch" class="form-control pl-5" placeholder="Carian" value="{{ $search ?? '' }}">
                </div>
            </div>
            
            <div class="dropdown-section">
                <div>
                    <p>Senarai</p>
                    <select name="status" id="statusFilter">
                        <option value="semua" {{ ($statusFilter ?? 'semua') == 'semua' ? 'selected' : '' }}>Semua</option>
                        <option value="aktif" {{ ($statusFilter ?? '') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak_aktif" {{ ($statusFilter ?? '') == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
                {{-- <a href="{{ route('pengurusan_pengguna') }}" class="view-all-link">Lihat Semua</a> --}}
            </div>
            
            <div class="Flex-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="tab_button {{ ($filter ?? 'semua') == 'semua' ? 'active' : '' }}" 
                                id="pills-Semua-tab" data-filter="semua" type="button" role="tab">
                            Semua
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button {{ ($filter ?? '') == 'baharu' ? 'active' : '' }}" 
                                id="pills-Baharu-tab" data-filter="baharu" type="button" role="tab">
                            Baharu
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button {{ ($filter ?? '') == 'diluluskan' ? 'active' : '' }}" 
                                id="pills-Diluluskan-tab" data-filter="diluluskan" type="button" role="tab">
                            Diluluskan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button {{ ($filter ?? '') == 'ditolak' ? 'active' : '' }}" 
                                id="pills-Ditolak-tab" data-filter="ditolak" type="button" role="tab">
                            Ditolak
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button {{ ($filter ?? '') == 'dibatalkan' ? 'active' : '' }}" 
                                id="pills-Dibatalkan-tab" data-filter="dibatalkan" type="button" role="tab">
                            Dibatalkan
                        </button>
                    </li>
                </ul>
                       <a href="{{ route('super_admin.users.create') }}" class="btn button_primary">
                           Daftar Pengguna
                     </a>
            </div>
            
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-Semua" role="tabpanel" aria-labelledby="pills-Semua-tab">
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pegawai</th>
                                    <th>Bahagian</th>
                                    <th>Status</th>
                                    <th> Tindakan</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @forelse($users as $index => $user)
                                    <tr>
                                        <td>{{ $users->firstItem() + $index }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @switch($user->status)
                                                @case(0)
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 BAHARU">BAHARU</span>
                                                    @break
                                                @case(1)
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 PENDING">PENDING</span>
                                                    @break
                                                @case(2)
                                                    <span class="badge block py-2 text-center badge text-bg-success w-100 rounded-4 AKTIF">AKTIF</span>
                                                    @break
                                                @case(3)
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 DITOLAK">DITOLAK</span>
                                                    @break
                                                @case(4)
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 DIBATALKAN">DIBATALKAN</span>
                                                    @break
                                                @case(5)
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 NYAHAKTIF">NYAHAKTIF</span>
                                                    @break
                                                @default
                                                    <span class="badge block py-2 text-center badge  w-100 rounded-4 UNKNOWN">UNKNOWN</span>
                                            @endswitch
                                        </td>

                                    
                                        <td>
                                                <a href="{{ route('users.show', $user->id) }}"
                                                    class="gap-3 btn btn-outline-primary-custom btn-sm d-flex align-items-center w-100">
                                                    <span class="material-symbols-rounded">visibility</span>
                                                    Lihat
                                                </a>
                                        </td>
                                                                
                                        
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 ">
                                            <i class="fas fa-users fa-2x text-muted mb-2"></i>
                                            <p class="text-muted">Tiada pengguna ditemui</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    @if($users->hasPages())
                        <div class="Senarai_pengguna_pagination">
                            <p>Tunjuk {{ $users->count() }} Pengguna</p>
                            <nav aria-label="...">
                                {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    

    @push('css')
    <style>
        /* Status Badge Colors - Matching Figma Design */
        .badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .badge.AKTIF {
            background-color: #def7ec;
            color: #03543F;
        }
        
        .badge.BAHARU {
            background-color: #cce5ff;
            color: #004085;
        }
        
        .badge.PENDING {
            background-color: #fff3cd;
            color: #856404;
        }
        
        .badge.DITOLAK {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .badge.DIBATALKAN {
            background-color: #e2e3e5;
            color: #383d41;
        }
        
        .badge.NYAHAKTIF {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .badge.UNKNOWN {
            background-color: #f8f9fa;
            color: #6c757d;
        }
        
       
        
        /* Tab Button Styling */
        .tab_button {
            background: none;
            border: none;
            padding: 8px 16px;
            margin: 0 4px;
            border-radius: 20px;
            color: #6c757d;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .tab_button.active {
            background-color: #E6F3F3;
            border: 2px solid #008080;
            color: white;
        }
        
        .tab_button:hover:not(.active) {
            background-color: #f8f9fa;
            color: #495057;
        }
        
        /* Search and Filter Section */
        .search-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .search_input {
            width: 300px;
        }
        
        .dropdown-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .view-all-link {
            color: #20c997;
            text-decoration: none;
            font-weight: 500;
        }
        .btn-outline-primary-custom:hover {
    background: var(--primary-color);
    color: var(--white-color);
}
        .view-all-link:hover {
            text-decoration: underline;
        }
        
        /* Table Styling */
        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .custom-table th {
            background-color: #f8f9fa;
            padding: 12px;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
            color: #495057;
        }
        
        .custom-table td {
            padding: 12px;
            border-bottom: 1px solid #dee2e6;
            vertical-align: middle;
        }
        
        .custom-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        /* Pagination Styling */
        
        
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
            padding: 10px;
            color: #6c757d;
            background-color: white;
            border: 1px solid #e9ecef;
            text-decoration: none;
            font-weight: 500;
            min-width: 44px;
            transition: all 0.2s ease;
        }
        
        .page-link:hover {
            color: white;
            background-color: #008080;
            border-color: #dee2e6;
            text-decoration: none;
        }
        
        .page-item.active .page-link {
            background-color: #008080 !important;
            border-color: #008080;
            color: white;
        }
        
        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #f8f9fa;
            border-color: #e9ecef;
            cursor: not-allowed;
        }
        
        /* Modal Styling */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            border-radius: 12px 12px 0 0;
        }
        
        .modal-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            border-radius: 0 0 12px 12px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .search-section {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }
            
            .search_input {
                width: 100%;
            }
            
            .dropdown-section {
                flex-direction: column;
                gap: 10px;
            }
            
            .Flex-center {
                flex-direction: column;
                gap: 15px;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 2px;
            }
        }
    </style>
    @endpush

    @push('js')
    <script>
        // Search functionality
        $('#userSearch').on('keyup', function() {
            const searchTerm = $(this).val();
            filterUsers();
        });

        // Status filter
        $('#statusFilter').on('change', function() {
            filterUsers();
        });

        // Tab filter
        $('.tab_button').on('click', function() {
            $('.tab_button').removeClass('active');
            $(this).addClass('active');
            filterUsers();
        });

        function filterUsers() {
            const search = $('#userSearch').val();
            const status = $('#statusFilter').val();
            const filter = $('.tab_button.active').data('filter');
            
            $.ajax({
                url: '{{ route("pengurusan_pengguna") }}',
                type: 'GET',
                data: {
                    search: search,
                    status: status,
                    filter: filter
                },
                success: function(response) {
                    $('#userTableBody').html(response);
                }
            });
        }

        

        function updateUserStatus(userId, status) {
            if (confirm('Adakah anda pasti untuk mengemaskini status pengguna ini?')) {
                $.ajax({
                    url: `/super_admin/users/${userId}/update-status`,
                    type: 'POST',
                    data: {
                        status: status,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function() {
                        alert('Ralat semasa mengemaskini status pengguna');
                    }
                });
            }
        }
    </script>
    @endpush
@endsection
