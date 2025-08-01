@extends('layouts.main.app')

@section('title', 'Pengurusan Organisasi')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Pengurusan Organisasi</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('organization.index') }}" class="text-decoration-none text-success">Pengurusan Organisas</a>
        </div>
    </div>
@endsection

@section('content')
<main class="main-content">
    <div class="content-card mb-3">
        <div class="eb-create-room-information">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                <h3 class="mb-2 mb-md-0">Senarai Nama Bahagian</h3>
                <div class="d-flex align-items-center gap-2">
                    <div class="search-input d-flex align-items-center position-relative me-2">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="organizationSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                    <a href="{{ route('organization.create') }}" class="btn btn-primary">
                        Tambah Nama Bahagian
                    </a>
                </div>
            </div>

            <div class="eb-tabs-tables">
                <ul class="nav nav-pills mb-3" id="org-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" href="#">Nama Bahagian</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Nama Jabatan</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Nama Agensi</a></li>
                    <li class="nav-item"><a class="nav-link disabled" href="#">Nama Pengerusi</a></li>
                </ul>

                <div class="table-responsive eb-table-main">
                    <table id="organizationTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Bil.</th>
                                <th>Nama Bahagian</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $staticDepartments = [
                                    ['id' => 1, 'name' => 'Bahagian Pentadbiran'],
                                    ['id' => 2, 'name' => 'Bahagian Kewangan'],
                                    ['id' => 3, 'name' => 'Bahagian Sumber Manusia'],
                                    ['id' => 4, 'name' => 'Bahagian IT'],
                                    ['id' => 5, 'name' => 'Bahagian Logistik'],
                                ];
                            @endphp

                            @foreach ($staticDepartments as $index => $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ strtoupper($department['name']) }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="#" class="btn btn-sm rounded-circle"
                                            style="background-color: #fff3cd; color: #856404; border: 1px solid #856404;" title="Kemaskini">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="#" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm rounded-circle"
                                                style="background-color: #f8d7da; color: #721c24; border: 1px solid #721c24;" title="Padam"
                                                onclick="return confirm('Padam pengguna ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="text-muted">Tunjuk {{ count($staticDepartments) }} senarai nama bahagian</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('js')
<script>
    $.fn.dataTable.ext.errMode = 'none';
    let orgTable;

    function initOrganizationTable() {
        const table = $('#organizationTable');
        if (table.length) {
            if ($.fn.DataTable.isDataTable(table)) {
                table.DataTable().destroy();
            }

            orgTable = table.DataTable({
                pageLength: 10,
                ordering: false,
                dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
                language: {
                    lengthMenu: 'Tunjuk <select class="form-select form-select-sm">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">Semua</option>' +
                        '</select> rekod',
                    paginate: {
                        previous: '<',
                        next: '>'
                    }
                }
            });

            $('#organizationSearch').off('keyup').on('keyup', function () {
                orgTable.search(this.value).draw();
            });
        }
    }

    $(document).ready(function () {
        initOrganizationTable();
    });
</script>
@endpush
