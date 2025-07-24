@extends('layouts.main.app')

@section('title', 'User Management')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Users</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Home</a>
            <span class="mx-2">/</span>
	        <a href="{{ route('users.index')}}" class="text-decoration-none text-success">User Management</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <div class="eb-tabs-tables">
                    
                @php
                    $statuses = ['All', 'New', 'Approved', 'Rejected', 'Cancelled'];
                    $activeFilter = strtolower(request('filter', 'all'));
                @endphp
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($statuses as $status)
                        @php
                            $slug = strtolower($status);
                            $isActive = $activeFilter === $slug;
                        @endphp
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link {{ $loop->first ? 'active' : '' }}"
                                data-status-filter="{{ $slug }}">
                                {{ $status }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                        <div id="booking-table-wrapper">
                            <div class="table-responsive eb-table-main">
                                <table id="userMgmtTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Section</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @include('admin.users.partials.table', ['users' => $users])
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   
    <script>
    let userTable;

    function initializeDataTable() {
        userTable = $('#userMgmtTable').DataTable({
            destroy: true,
            pageLength: 10,
            lengthMenu: [10, 20, 50, -1],
            ordering: true,
            dom: '<"d-flex justify-content-between align-items-center mb-3"lf>t<"d-flex justify-content-between align-items-center mt-3"ip>',
            language: {
                lengthMenu: 'Show <select class="form-select form-select-sm">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="50">50</option>' +
                    '<option value="-1">All</option>' +
                    '</select> entries',
                info: 'Showing _START_ to _END_ of _TOTAL_ users',
                paginate: {
                    previous: 'Prev',
                    next: 'Next'
                }
            }
        });

        // Bind row click
        $('#userMgmtTable tbody').on('click', 'tr', function () {
            const url = $(this).data('url');
            if (url) {
                window.location.href = url;
            }
        });
    }

    $(document).ready(function () {
        initializeDataTable();

        $('[data-status-filter]').on('click', function () {
            $('[data-status-filter]').removeClass('active');
            $(this).addClass('active');

            const filter = $(this).data('status-filter');

            $.ajax({
                url: "{{ route('users.index') }}",
                type: "GET",
                data: { filter: filter },
                success: function (data) {
                    // Replace tbody
                    $('#userMgmtTable').DataTable().destroy();
                    $('#userMgmtTable tbody').replaceWith(data);
                    initializeDataTable();
                },
                error: function () {
                    alert('Failed to fetch filtered users.');
                }
            });
        });
    });
</script>

@endsection