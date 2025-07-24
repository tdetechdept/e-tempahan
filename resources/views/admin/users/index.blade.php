@extends('layouts.main.app')

@section('title', 'User Management')

@section('content')
    <main class="main-content">

    @section('breadcrumb')
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Users</h1>
            <div class="breadcrumb-nav">
                <span>User Page</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">User Information</span>
            </div>
        </div>
    @endsection

    <div class="content-card mb-3">
        <div class="eb-create-room-information">

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
                        <a class="nav-link {{ $isActive ? 'active' : '' }}" id="pills-{{ $slug }}-tab"
                            href="?filter={{ $slug }}" role="tab" aria-controls="pills-{{ $slug }}"
                            aria-selected="{{ $isActive ? 'true' : 'false' }}">
                            {{ $status }}
                        </a>
                        <!-- <a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a> -->
                    </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div id="booking-table-wrapper">
                        @include('admin.users.partials.table', ['users' => $users])
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const rows = document.querySelectorAll('#userMgmtTable tbody tr');
        rows.forEach(row => {
            row.addEventListener('click', function() {
                const url = this.getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    });
</script>
@endsection
