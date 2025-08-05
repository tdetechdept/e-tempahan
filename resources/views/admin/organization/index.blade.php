@extends('layouts.main.app')

@section('title', 'Pengurusan Organisasi')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Pengurusan Organisasi</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('organization.index') }}" class="text-decoration-none text-success">Pengurusan Organisasi</a>
        </div>
    </div>
@endsection

@section('content')
<main class="main-content">
    <div class="content-card mb-3">
        <div class="eb-create-room-information">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                <h3 class="mb-2 mb-md-0">Senarai Nama Bahagian</h3>
                <div class="d-flex align-items-center">
                    <div class="search-input d-flex align-items-center position-relative me-2">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="organizationSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                   <a href="{{ route('organization.create', ['type' => 'section']) }}" class="btn btn-primary btn-medium" id="addItemBtn">
                        <span id="addItemLabel">Tambah Nama Bahagian</span>
                    </a>
                </div>
            </div>

            <div class="eb-tabs-tables">
              <ul class="nav nav-pills mb-3" id="org-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="tab-section-tab" data-toggle="tab"
                        href="#tab-section" role="tab" aria-controls="tab-section" aria-selected="true"
                        data-label="Tambah Nama Bahagian"
                        data-url="{{ route('organization.create', ['type' => 'section']) }}">
                        Nama Bahagian
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-department-tab" data-toggle="tab"
                        href="#tab-department" role="tab" aria-controls="tab-department" aria-selected="false"
                        data-label="Tambah Nama Jabatan"
                        data-url="{{ route('organization.create', ['type' => 'department']) }}">
                        Nama Jabatan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-agency-tab" data-toggle="tab"
                        href="#tab-agency" role="tab" aria-controls="tab-agency" aria-selected="false"
                        data-label="Tambah Nama Agensi"
                        data-url="{{ route('organization.create', ['type' => 'agency']) }}">
                        Nama Agensi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="tab-chairman-tab" data-toggle="tab"
                        href="#tab-chairman" role="tab" aria-controls="tab-chairman" aria-selected="false"
                        data-label="Tambah Nama Pengerusi"
                        data-url="{{ route('organization.create', ['type' => 'chairman']) }}">
                        Nama Pengerusi
                    </a>
                </li>
            </ul>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-section" role="tabpanel" aria-labelledby="tab-section-tab">
                        @include('admin.organization.partials.table', [
                            'data' => $sections,
                            'routePrefix' => 'section',
                            'tableId' => 'table-sections',
                            'type' => 'Nama Bahagian'
                        ])
                    </div>
                    <div class="tab-pane fade" id="tab-department" role="tabpanel" aria-labelledby="tab-department-tab">
                        @include('admin.organization.partials.table', [
                            'data' => $department,
                            'tableId' => 'table-departments',
                            'routePrefix' => 'department',
                            'type' => 'Nama Jabatan'
                        ])
                    </div>
                    <div class="tab-pane fade" id="tab-agency" role="tabpanel" aria-labelledby="tab-agency-tab">
                        @include('admin.organization.partials.table', [
                            'data' => $agencies,
                            'tableId' => 'table-agencies',
                            'routePrefix' => 'agency',
                            'type' => 'Nama Agensi'
                        ])
                    </div>
                    <div class="tab-pane fade" id="tab-chairman" role="tabpanel" aria-labelledby="tab-chairman-tab">
                        @include('admin.organization.partials.table', [
                            'data' => $chairmen,
                            'tableId' => 'table-chairmen',
                            'routePrefix' => 'chairman',
                            'type' => 'Nama Pengerusi'
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@push('js')
<script>
   $.fn.dataTable.ext.errMode = 'none';

const tableIds = ['table-sections', 'table-departments', 'table-agencies', 'table-chairmen'];
const initializedTables = {};


function initAllDataTables() {
    tableIds.forEach(id => {
        const table = $('#' + id);
        if (table.length) {
            if ($.fn.DataTable.isDataTable(table)) {
                table.DataTable().clear().destroy();
            }
            initializedTables[id] = table.DataTable({
                pageLength: 10,
                ordering: false,
                dom: 't<"d-flex justify-content-between align-items-center mt-3"lp>',
                language: {
                    lengthMenu: 'Tunjuk <select class="custom-select custom-select-sm form-control form-control-sm" style="width: auto;">' +
                        '<option value="10">10</option>' +
                        '<option value="20">20</option>' +
                        '<option value="50">50</option>' +
                        '<option value="-1">Semua</option>' +
                        '</select> rekod',
                    paginate: {
                        previous: '&lt;',
                        next: '&gt;'
                    }
                }
            });
        }
    });
}

function attachSearchListener() {
    $('#organizationSearch').off('keyup').on('keyup', function () {
        const visibleTableId = $('.tab-pane.active table.dataTable').attr('id');
        if (visibleTableId && initializedTables[visibleTableId]) {
            initializedTables[visibleTableId].search(this.value).draw();
        }
    });
}

$(document).ready(function () {
    initAllDataTables();
    attachSearchListener();
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        const tab = $(e.target);
        const href = tab.attr('href'); 
        const tableId = href.replace('#tab-', 'table-'); 

        const label = tab.data('label');
        const url = tab.data('url');

        $('#addItemLabel').text(label);
        $('#addItemBtn').attr('href', url);
        $('#organizationSearch').val('').trigger('keyup');
    });

    $(document).on('click', '.btn-delete', function () {
        const id = $(this).data('id');
        const type = $(this).data('type');
        const name = $(this).data('name');
        const actionUrl = `/organization/delete/${type}/${id}`;
        $('#dynamicDeleteForm').attr('action', actionUrl);
        $('#delete-message').text(`Adakah anda pasti mahu memadam "${name.toUpperCase()}"?`);
        $('#deleteModal').modal('show');
    });
});

</script>
@endpush


@endsection
