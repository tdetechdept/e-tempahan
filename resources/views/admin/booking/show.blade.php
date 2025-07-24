@extends('layouts.main.app')

@section('content')
<!-- Room Information  Review page start -->
    <main class="main-content" >
        <!-- Breadcrumb -->
        <div class="breadcrumb-section">
            <h1 class="breadcrumb-title">Booking Review</h1>
            <div class="breadcrumb-nav">
                <span>Dashboard</span>
                <span class="mx-2">/</span>
                <span>Reservation Application List</span>
                <span class="mx-2">/</span>
                <span class="breadcrumb-active">Booking Review</span>
            </div>
        </div>

        <!-- Content Card -->
        <div class="eb-boking-info-tabs mb-3">
            <ul class="nav nav-tabs mt-4" id="pills-tab" role="tablist">
                <!-- <li class="nav-item">
                    <a class="nav-link active" id="pills-booking-info-tab" data-toggle="tab" href="#pills-booking-info" role="tab" aria-controls="pills-booking-info" aria-selected="true">Room Booking Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-applicant-info-tab" data-toggle="tab" href="#pills-applicant-info" role="tab" aria-controls="pills-applicant-info" aria-selected="false">Applicant Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-secretariat-info-tab" data-toggle="tab" href="#pills-secretariat-info" role="tab" aria-controls="pills-secretariat-info" aria-selected="false">Secretariat Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-other-info-tab" data-toggle="tab" href="#pills-other-info" role="tab" aria-controls="pills-other-info" aria-selected="false">Other Booking Information</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link active" id="pills-booking-info-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="pills-booking-info" aria-selected="true">Room Booking Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-applicant-info-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="pills-applicant-info" aria-selected="false">Applicant Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-secretariat-info-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="pills-secretariat-info" aria-selected="false">Secretariat Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-other-info-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="pills-other-info" aria-selected="false">Other Booking Information</a>
                </li>
            </ul>
            <div class="tab-content eb-tabs-booking-info" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-booking-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Meeting Name</label>
                                    <p>{{$booking->meeting_name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Chairman</label>
                                    <p>{{$booking->chairman}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4 eb-meeting-group">
                                    <label>Meeting Date</label>
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Start Date</span> {{\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')}}</p>
                                    <p class="d-flex align-items-center justify-content-between"><span>End Date</span> {{\Carbon\Carbon::parse($booking->end_date)->format('F d, Y')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4 eb-meeting-group">
                                    <label>Meeting Time</label>
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Start Time</span> {{\Carbon\Carbon::parse($booking->start_time)->format('h:i A')}}</p>
                                    <p class="d-flex align-items-center justify-content-between"><span>End Time</span>{{\Carbon\Carbon::parse($booking->end_time)->format('h:i A')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Number of Participants</label>
                                    <p>{{$booking->number_of_participants}} People</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Description</label>
                                    <p><strong>{{$booking->description}}</strong></p>
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
                                    <label>Type </label>
                                    <p>{{$booking->type}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Status </label>
                                    <p>{{ $booking->status_name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Repetition Type </label>
                                    <p>{{$booking->repetition_type}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Repeat Date </label>
                                    <p>{{\Carbon\Carbon::parse($booking->repeat_date)->format('F d, Y')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Layout/Plan </label>
                                    <p>{{$booking->room_plan}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="eb-booking-info-btns">
                            <!-- <button type="button" class="btn btn-secondry btn-back">Back</button> -->
                               <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Next</button>
                        </div>
                    </div>   
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-applicant-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Applicant Name</label>
                                    <p>{{$booking->user->name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Name of Ministry / Division / Department</label>
                                    <p>{{$booking->user->department}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Position </label>
                                    <p> {{$booking->user->position}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Grade </label>
                                    <p> {{$booking->user->grade}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Office Phone </label>
                                    <p> {{$booking->user->office_number}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Mobile Phone </label>
                                    <p> {{$booking->user->phone_number}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Email</label>
                                    <p>{{$booking->user->email}}</p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Mobile Phone</label>
                                    <p>012-345 6789</p>
                                </div>
                            </div> -->
                        </div>
                        <div class="eb-booking-info-btns">
                            <!-- <button type="button" class="btn btn-secondary btn-back">Back</button> -->
                            <button class="btn btn-secondary btn-back tab-nav" data-tab-step="-1">Back</button>
                            <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Next</button>
                            <!-- <button type="button" class="btn btn-primary btn-next">Next</button> -->
                        </div>
                    </div> 
                </div>
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-secretariat-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Secretariat Name</label>
                                    <p>{{$booking->secretariat_name ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Office Phone</label>
                                    <p>{{$booking->secretariat_office_phone ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Mobile Phone </label>
                                    <p> {{$booking->secretariat_mobile_phone ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Email </label>
                                    <p> {{$booking->secretariat_email ?? '-'}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="eb-booking-info-btns">
                            <button class="btn btn-secondary btn-back tab-nav" data-tab-step="-1">Back</button>
                            <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Next</button>
                        </div>
                    </div> 
                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-other-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Food</label>
                                    <p>{{ $booking->food ? 'Yes' : 'No' }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Equipment</label>
                                    <p>{{ is_array($booking->equipment) ? implode(', ', $booking->equipment) : implode(', ', json_decode($booking->equipment, true)) }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                        <label>Catering Name</label>
                                        <p>{{ $booking->catering_name ?? '-'}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                        <label>No. Telephone </label>
                                        <p> {{ $booking->catering_phone ?? '-'}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Other Needs (Car) </label>
                                    <p>{{ $booking->car_number ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Technical Services</label>
                                    <p>{{$booking->technical_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>ICT services</label>
                                    <p>{{$booking->ict_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Update Information</label>
                                    <textarea class="form-control" id="" placeholder="Please enter information to update."></textarea>
                                </div>
                            </div> -->
                        </div>
                        <form action="{{ route('booking.update', $booking->id) }}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="col-lg-6 col-md-12" id="updateInfoContainer" style="display: none;">
                                <div class="form-group mb-4">
                                    <label>Reviews</label>
                                    <textarea class="form-control" name="reviews" placeholder="Please state the reason you are rejecting this booking.">{{ old('reviews', $booking->reviews) }}</textarea>
                                </div>
                            </div>
                           
                       
                            <!-- <div class="eb-booking-info-btns">
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#successfully">Update</button>
                                <button type="button" class="btn btn-secondry">Reject</button>
                                <button type="button" class="btn btn-primary" >Pass</button>
                            </div> -->
                            <div class="eb-booking-info-btns">
                                <button type="button" class="btn btn-primary" id="showUpdateBtn">Update</button>
                                <!-- <button type="button" submitvalue="reject" class="btn btn-secondary">Reject</button> -->
                                <button type="submit" name="action" value="reject" class="btn btn-secondary">Reject</button>
                                <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                <button type="button" class="btn btn-primary" name="action" value="pass" data-toggle="modal" data-target="#successfully">Pass</button>
                                <!-- <button type="submit" name="action" value="pass" class="btn btn-primary">Pass</button> -->
                               
                            </div>
                        </form>
                    </div> 
                </div>
            </div>
        </div> 
    </main>

    <!-- Modal registration -->
    <div class="modal fade eb-successfully-popup" id="successfully" tabindex="-1" role="dialog" aria-labelledby="successfully" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="eb-successfully-icon"></div>
                    <h3>Application Successfully Approved</h3>
                    <p> Please keep a copy for reference. You can download the document in PDF format and print it now.</p>
                    <div class="eb-popup-btns">
                        <button type="button" class="btn btn-primary eb-pdf-download-btn" id="downloadPDF" data-dismiss="modal">Download PDF</button>
                        <button type="button" id="printPDF" class="btn btn-primary eb-pdf-print-btn">Print</button>

                        <!-- <button type="button" class="btn btn-primary eb-pdf-print-btn">Print</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Room Information Review page start -->
    

    @push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const showUpdateBtn = document.getElementById('showUpdateBtn');
            const updateInfoContainer = document.getElementById('updateInfoContainer');

            showUpdateBtn.addEventListener('click', function () {
                updateInfoContainer.style.display = 'block';    // Show the textarea
                showUpdateBtn.style.display = 'none';           // Hide the Update button
            });
        });
        // pdf download
        document.getElementById('downloadPDF').addEventListener('click', function () {
            const bookingId = document.querySelector('input[name="booking_id"]').value;
            const reviews = document.querySelector('textarea[name="reviews"]').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Optional, if CSRF needed
            const baseURL = "{{ url('') }}";
            // const url = "{{ url('/booking') }}/" + bookingId + "/pdf";
            const url = "{{ route("booking.downloadPDF", $booking->id) }}";
            // const url = `/booking/${bookingId}/pdf`;

            // Send fetch request with reviews & action=pass
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // if CSRF is enabled
                },
                body: JSON.stringify({
                    action: 'pass',
                    reviews: reviews
                })
            })
            .then(response => response.blob())
            .then(blob => {
                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = `Application_${bookingId}_Approved.pdf`;
                document.body.appendChild(link);
                link.click(); // ✅ Only click once
                document.body.removeChild(link);
                window.URL.revokeObjectURL(link.href);

                // ✅ Delay a bit before redirecting to ensure download triggers
                setTimeout(() => {
                    window.location.href = `${baseURL}/booking/${bookingId}/approved`;
                }, 1000);
            })
            .catch(error => {
                alert('Error generating PDF');
                console.error(error);
            });
        });

        // print pdf
        document.getElementById('printPDF').addEventListener('click', function () {
            const bookingId = document.querySelector('input[name="booking_id"]').value;
            const reviews = document.querySelector('textarea[name="reviews"]').value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const baseURL = "{{ url('') }}";
            const url = "{{ url('/booking') }}/" + bookingId + "/pdf";
            // const url = `/booking/${bookingId}/pdf`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    action: 'pass',
                    reviews: reviews,
                    print: true // pass print flag in body
                })
            })
            .then(response => response.blob())
            .then(blob => {
                const blobURL = URL.createObjectURL(blob);
                const printWindow = window.open(blobURL, '_blank');
                if (!printWindow) {
                    alert('Please enable popups to print the PDF.');
                }

                // Delay the redirect slightly to ensure popup is opened before navigating away
                setTimeout(() => {
                    window.location.href = `${baseURL}/booking/${bookingId}/approved`;
                }, 1500); // Adjust timing as needed (1.5 seconds is usually safe)
            })
            .catch(error => {
                alert('Error opening PDF for print');
                console.error(error);
            });
        });
        // next click 
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-nav');

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const direction = parseInt(this.getAttribute('data-tab-step'));
                    const activeTab = document.querySelector('.nav-tabs .nav-link.active');

                    if (!activeTab) return;

                    const tabs = Array.from(document.querySelectorAll('.nav-tabs .nav-link'));
                    const currentIndex = tabs.indexOf(activeTab);
                    const nextIndex = currentIndex + direction;

                    if (nextIndex >= 0 && nextIndex < tabs.length) {
                        const nextTab = tabs[nextIndex];
                        const bsTab = new bootstrap.Tab(nextTab);
                        bsTab.show();
                    }
                });
            });
        });
    </script>
<!--     
    <script>
        $(document).ready(function () {
            $('.btn-next').on('click', function () {
                const currentTab = $('#pills-tab .nav-link.active');
                const nextTab = currentTab.closest('li').next().find('.nav-link');
                if (nextTab.length) {
                    nextTab.tab('show');
                }
            });

            $('.btn-back').on('click', function () {
                const currentTab = $('#pills-tab .nav-link.active');
                const prevTab = currentTab.closest('li').prev().find('.nav-link');
                if (prevTab.length) {
                    prevTab.tab('show');
                }
            });
        });
    </script> -->
@endpush
@endsection