@extends('layouts.main.app')

@section('title', 'Semakan Tempahan')

@section('content')
 <!-- Application Status page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Semakan Tempahan</h1>
            <div class="breadcrumb-nav">
                <span>Papan Pemuka </span>
                <span class="mx-2">/</span>
                <span>Senarai Tempaha</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Maklumat Tempahan</span>
            </div>
        </div>

        <!-- Content Card -->
        <div class="eb-boking-info-tabs mb-3 mt-4">
            <div class="eb-boking-status">
                @php
                    $statuses = [
                        1 => 'New',
                        2 => 'Pending',
                        3 => 'Approved',
                        4 => 'Rejected',
                        5 => 'Cancelled',
                    ];
                @endphp
                <div class="d-flex justify-content-between align-items-center eb-booking-status-top mb-4">
                    <h4>Status Permohonan </h4>
                    <p>{{ $statuses[$booking->status] ?? 'Unknown' }} </p>
                </div>
                <h3 class="mb-4">{{$booking->meeting_name}} </h3>
                <div class="eb-meeting-room-block mb-4">
                    <div class="eb-meeting-room-block-inner">
                        <p class="d-flex justify-content-between align-items-center  mb-4">Nama Bilik Mesyuarat <span>{{$booking->room->room_name}}</span></p>
                        <p class="d-flex justify-content-between align-items-center  mb-4">Aras <span>Aras {{$booking->room->level}} </span></p>
                        <p class="d-flex justify-content-between align-items-center mb-0">Kapasiti Bilik Mesyuarat  <span>{{$booking->room->capacity}} people  </span></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4 eb-app-search-wrap">
                    <h3 class="">Senarai Permohonan Tempahan </h3>
                    <div class="eb-application-search">
                        <input type="text" class="form-control" placeholder="Search" id="search" />
                    </div>
                </div>
                <div class="eb-booking-info-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Nama / Kementerian / Bahagian </label>
                                <p>{{$booking->user->name}} </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Bilik </label>
                                <p>{{$booking->room->room_name}}</p>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Tarikh /Masa  </label>
                                <p>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }} <span>{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}  - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Tempahan</label>
                                @php
                                    $facilities = $booking->room->facilities;

                                    // Decode if it's JSON
                                    if (is_string($facilities) && str_starts_with($facilities, '[')) {
                                        $facilities = json_decode($facilities, true);
                                    }
                                @endphp
                                <p>{{ !empty($facilities) ? (is_array($facilities) ? implode(', ', $facilities) : $facilities) : '-' }}</p>
                                    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Status</label>
                                <p>{{ $booking->status_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Status Tempahan Bilik</label>
                                <p>{{ $booking->room->status }} (L) </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Tarikh Mohon</label>
                                <p>{{ $booking->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Tarikh Lulus</label>
                                <p>{{ $booking->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="eb-booking-info-btns ">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-secondry">Kembali</a>
                    <button type="button" class="btn btn-primary eb-btn-cancel"  data-toggle="modal" data-target="#cancel" >Batalkan</button>
                </div>
            </div>  
        </div> 
    </main>

    <!-- Modal cancel -->
     <div class="modal fade eb-delete-popup" id="cancel" tabindex="-1" role="dialog" aria-labelledby="cancel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div class="eb-delete-icon"></div>
                <h3>Adakah anda pasti?</h3>
                <p>Adakah anda pasti anda ingin batalkan tempahan bilik ini?</p>
                <div class="eb-popup-btns">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <form id="cancelForm" action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </form>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rcancelled" >Yes</button> -->
                </div>
            </div>
            </div>
        </div>
    </div>

     <!-- Modal registration cancelled -->
    <!-- <div class="modal fade eb-registration-popup eb-registration-cancelled" id="rcancelled" tabindex="-1" role="dialog" aria-labelledby="rcancelled" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <div class="eb-registration-icon"></div>
                <h3>This booking request has been cancelled. </h3>
                <p>This booking has been successfully cancelled. A notification email will be sent to the applicant.</p>
                <div class="eb-popup-btns">
                    <a href="#" class="eb-popup-btn">Dashboard</a>
                </div>
            </div>
            </div>
        </div>
    </div> -->

     <!-- Application Status page end -->
@endsection