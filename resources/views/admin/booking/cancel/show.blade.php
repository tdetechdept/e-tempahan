@extends('layouts.main.app')
@section('content')
 <!-- Application Status page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Booking Review</h1>
            <div class="breadcrumb-nav">
                <span>Home Page</span>
                <span class="mx-2">/</span>
                <span>Reservation List</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Booking Information</span>
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
                    <h4>Application Status </h4>
                    <p>{{ $statuses[$booking->status] ?? 'Unknown' }} </p>
                </div>
                <h3 class="mb-4">{{$booking->meeting_name}} </h3>
                <div class="eb-meeting-room-block mb-4">
                    <div class="eb-meeting-room-block-inner">
                        <p class="d-flex justify-content-between align-items-center  mb-4">Meeting Room Name <span>{{$booking->room->room_name}}</span></p>
                        <p class="d-flex justify-content-between align-items-center  mb-4">Level <span>Level {{$booking->room->level}} </span></p>
                        <p class="d-flex justify-content-between align-items-center mb-0">Meeting Room Capacity  <span>{{$booking->room->capacity}} people  </span></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4 eb-app-search-wrap">
                    <h3 class="">Reservation Application List </h3>
                    <div class="eb-application-search">
                        <input type="text" class="form-control" placeholder="Search" id="search" />
                    </div>
                </div>
                <div class="eb-booking-info-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Name / Ministry / Division </label>
                                <p>{{$booking->user->name}} </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Room </label>
                                <p>{{$booking->room->room_name}}</p>
                            </div>
                        </div>
                         <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Date / Time  </label>
                                <p>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }} <span>{{ \Carbon\Carbon::parse($booking->start_time)->format('h:i A') }}  - {{ \Carbon\Carbon::parse($booking->end_time)->format('h:i A') }}</span></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Reservation  </label>
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
                                <label>Status  </label>
                                <p>{{ $booking->status_name }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Room Reservation Status   </label>
                                <p>{{ $booking->room->status }} (L) </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Apply Date </label>
                                <p>{{ $booking->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Pass Date </label>
                                <p>{{ $booking->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="eb-booking-info-btns ">
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-secondry">Back</a>
                    <button type="button" class="btn btn-primary eb-btn-cancel"  data-toggle="modal" data-target="#cancel" >Cancel</button>
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
                <h3>Are you sure?</h3>
                <p>Are you sure you want to cancel this room reservation?</p>
                <div class="eb-popup-btns">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <form id="cancelForm" action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary">Yes</button>
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