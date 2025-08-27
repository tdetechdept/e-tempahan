@extends('layouts.main.app')

@section('title', 'Pengurusan Pengguna')

@section('breadcrumb')
<div class="breadcrumb-section">
    <h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
    <div class="breadcrumb-nav">
        <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
        <span class="mx-2">/</span>
        <a href="{{ route('users.index')}}" class="text-decoration-none breadcrumb-active">Pengurusan Pengguna</a>
    </div>
</div>
@endsection

@section('content')
<main class="main-content">
    <div class="content-card mb-3">
        <div class="eb-create-room-information">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                <h3 class="mb-2 mb-md-0">Senarai Pengguna/Pendaftaran</h3>
                <div class="search-input d-flex align-items-center position-relative">
                    <span class="material-symbols-rounded position-absolute ms-2">search</span>
                    <input type="text" id="userSearch" class="form-control ps-5" placeholder="Carian" />
                </div>
            </div>

            <div class="eb-tabs-tables">
                @php
                    $statuses = ['all', 'new', 'approved', 'rejected', 'cancelled', 'deactivated'];
                    $statusLabels = [
                        'all' => 'Semua',
                        'new' => 'Baharu',
                        'approved' => 'Diluluskan',
                        'rejected' => 'Ditolak',
                        'cancelled' => 'Dibatalkan',
                        'deactivated' => 'Nyahaktif',
                    ];
                    $activeFilter = strtolower(request('filter', 'all'));
                @endphp

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($statuses as $key)
                        @php $isActive = $activeFilter === $key; @endphp
                        <li class="nav-item">
                            <a class="nav-link {{ $isActive ? 'active' : '' }}" href="?filter={{ $key }}" data-filter="{{ $key }}">
                                {{ $statusLabels[$key] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
                        <div id="user-table-wrapper">
                            <div class="table-responsive eb-table-main">
                                <table id="userMgmtTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Pegawai</th>
                                            <th>Bahagian</th>
                                            <th>Status</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('admin.users.partials.table', ['users' => $users])
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class="modal fade eb-delete-popup" id="deleteUserModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form method="POST" id="deleteUserForm">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <div class="eb-delete-icon mb-3"></div>
                                    <h3>Adakah anda pasti?</h3>
                                    <p id="delete-user-message">Adakah anda pasti mahu memadam pengguna ini?</p>
                                    <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
</main>

@push('js')
<script>
$.fn.dataTable.ext.errMode = 'none';

let userTable;

// Initialize DataTable
function initUserTable() {
    const table = $('#userMgmtTable');
    if (table.length) {
        if ($.fn.DataTable.isDataTable(table)) {
            table.DataTable().destroy();
        }
        userTable = table.DataTable({
            pageLength: 5,
            lengthMenu: [5,10,20,50,-1],
            ordering: true,
            dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
            language: {
                lengthMenu: 'Tunjuk <select class="form-select form-select-sm">'+
                            '<option value="5">5</option>'+
                            '<option value="10">10</option>'+
                            '<option value="20">20</option>'+
                            '<option value="50">50</option>'+
                            '<option value="-1">Semua</option>'+
                            '</select> pengguna',
                paginate: { previous: '<', next: '>' }
            }
        });
    }
}

// Search input listener
function attachUserSearchListener() {
    $('#userSearch').off('keyup').on('keyup', function() {
        if(userTable) userTable.search(this.value).draw();
    });
}

// AJAX load users by filter
function loadUsersByFilter(url) {
    $.get(url, function(response){
        if ($.fn.DataTable.isDataTable('#userMgmtTable')) {
            $('#userMgmtTable').DataTable().clear().destroy();
        }
        $('#userMgmtTable tbody').html(response);
        $('#userSearch').val('');
        initUserTable();
    }).fail(function() {
        alert('Gagal memuat data pengguna.');
    });
}

$(document).ready(function(){
    initUserTable();
    attachUserSearchListener();

    // Tab click -> AJAX filter
    $('.nav-pills .nav-link').on('click', function(e){
        e.preventDefault();
        const $this = $(this);
        const url = $this.attr('href'); // ?filter=new

        loadUsersByFilter(url);

        $('.nav-pills .nav-link').removeClass('active');
        $this.addClass('active');
        history.pushState(null,'',url);
    });

    // Delete user modal
    $(document).on('click','.btn-delete-user', function(){
        const url = $(this).data('url');
        const name = $(this).data('name');
        $('#deleteUserForm').attr('action', url);
        $('#delete-user-message').text(`Adakah anda pasti mahu memadam pengguna "${name.toUpperCase()}"?`);
        $('#deleteUserModal').modal('show');
    });
});
</script>
@endpush
@endsection
