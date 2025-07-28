@extends('layouts.main.app')

@section('title', 'Senarai Tempahan')

@php
    switch ($status) {
        case '1':
            // Code to be executed if status is '1' : new booking
            $status = 'Baharu';
            break;
        case '5':
            // Code to be executed if status is '5' : cancelled by user
            $status = 'Dibatalkan';
            break;
        case '6':
            // Code to be executed if status is '6' : updated by user
            $status = 'Dikemaskini';
            break;
        case '3':
            // Code to be executed if status is '3' : approved by admin
            $status = 'Pengesahan';
            break;
        // ... more cases
        default:
            // Code to be executed if expression does not match any case
            $status = '';
    }
@endphp

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Senarai Tempahan {{ $status }}</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Senarai Tempahan {{ $status }}</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content" >

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3">
                    <h3 class="mb-2 mb-md-0">Senarai Tempahan {{ $status }}</h3>
                    <div class="search-input d-flex align-items-center position-relative">
                        <span class="material-symbols-rounded position-absolute ms-2">search</span>
                        <input type="text" id="bookingSearch" class="form-control ps-5" placeholder="Carian" />
                    </div>
                </div>

                <div class="eb-tabs-tables">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                            aria-labelledby="pills-all-tab">
                            <div id="booking-table-wrapper">
                                <div class="table-responsive eb-table-main">
                                    <table id="rezervationTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Bil.</th>
                                                <th>Nama / Kementerian / Bahagian</th>
                                                <th>Nama Bilik</th>
                                                <th>Tarikh /Masa</th>
                                                <th>Tarikh Mohon</th>
                                                <th>Status</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @include('user.booking.partials.table', ['bookings' => $bookings])
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection