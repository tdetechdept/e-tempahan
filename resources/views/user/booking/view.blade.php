@extends('layouts.main.app')

@push('css')
<style>
    .status {
      color: #198754;
    }
    .status i {
      /* font-size: 1.2rem; */
      color: #198754;
    }

    .status-batal {
      color: #dc3545;
    }
    .status-batal i {
      /* font-size: 1.2rem; */
      color: #dc3545;
    }
</style>
@endpush
@section('title', 'Lihat Tempahan')
@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Lihat Tempahan</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Senarai Tempahan</span>
            <span class="mx-2">/</span>
            <span>Lihat Tempahan</span>
        </div>
    </div>
@endsection

@section('content')
<!-- Room Information  Review page start -->
    <main class="main-content" >

        <!-- Content Card -->
        <div class="eb-boking-info-tabs mb-3">
            <ul class="nav nav-tabs mt-4" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-booking-info-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="pills-booking-info" aria-selected="true">Maklumat Tempahan Bilik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-applicant-info-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="pills-applicant-info" aria-selected="false">Maklumat Pemohon</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-secretariat-info-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="pills-secretariat-info" aria-selected="false">Maklumat Urusetia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-other-info-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="pills-other-info" aria-selected="false">Maklumat Tempahan Lain</a>
                </li>
            </ul>
            <div class="tab-content eb-tabs-booking-info" id="pills-tabContent">
                @if($booking->status === 3)
                {{-- STATUS & DOWNLOAND DIV --}}
                <div class="mb-3">
                    <div class="col-md-12 mb-3">
                        <div class="float-right">
                            <a class="btn btn-sm mr-3 text-dark" id="printPDF"> <i class="fas fa-print text-primary"></i> Cetak Borang</a>
                            <a class="btn btn-sm text-dark" id="downloadPDF"> <i class="fas fa-download text-primary"></i>  Muat Turun Borang</a>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between mt-3">
                        <div class="">
                            <h6 class="font-weight-bold text-primary">Status Permohonan</h6>
                        </div>
                        <div class="">
                            <div class="status">
                                <i class="fas fa-check-circle mr-4"></i> Diluluskan Oleh Admin
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($booking->status === 5)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mt-3">
                            <div class="">
                                <h6 class="font-weight-bold text-primary">Status Permohonan</h6>
                            </div>
                            <div class="">
                                <div class="status-batal">
                                    <i class="fas fa-check-circle mr-4"></i> Dibatalkan Oleh Pemohon
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($booking->status === 4)
                    <div class="mb-3">
                        <div class="d-flex justify-content-between mt-3">
                            <div class="">
                                <h6 class="font-weight-bold text-primary">Status Permohonan</h6>
                            </div>
                            <div class="">
                                <div class="status-batal">
                                    <i class="fas fa-check-circle mr-4"></i> Ditolak Oleh Admin
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-booking-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Mesyuarat</label>
                                    <p>{{$booking->meeting_name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Pengerusi</label>
                                    <p>{{$booking->chairman}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4 eb-meeting-group">
                                    <label>Tarikh Mesyuarat</label>
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Tarikh Muld</span> {{\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')}}</p>
                                    <p class="d-flex align-items-center justify-content-between"><span>Tarikh Tamat</span> {{\Carbon\Carbon::parse($booking->end_date)->format('F d, Y')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4 eb-meeting-group">
                                    <label>Masa Mesyuarat</label>
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Masa Mula</span> {{\Carbon\Carbon::parse($booking->start_time)->format('h:i A')}}</p>
                                    <p class="d-flex align-items-center justify-content-between"><span>Masa Tamat</span>{{\Carbon\Carbon::parse($booking->end_time)->format('h:i A')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Bilangan Peserta</label>
                                    <p>{{$booking->number_of_participants}} People</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Penerangan</label>
                                    <p><strong>{{$booking->description}}</strong></p>
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
                                    <label>Jenis</label>
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
                                    <label>Jenis Ulangan </label>
                                    <p>{{$booking->repetition_type}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Tarikh Ulangan </label>
                                    <p>{{\Carbon\Carbon::parse($booking->repeat_date)->format('F d, Y')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Layout/Pelan </label>
                                    <p>{{$booking->room_plan}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="eb-booking-info-btns">
                            <!-- <button type="button" class="btn btn-secondry btn-back">Back</button> -->
                               <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
                        </div>
                    </div>   
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-applicant-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Pemohon</label>
                                    <p>{{$booking->user->name}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Kementrian / Bahagian / Jabatan</label>
                                    <p>{{$booking->ministry}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Jawatan </label>
                                    <p> {{$booking->position}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Gred </label>
                                    <p> {{$booking->gred}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Pejabat </label>
                                    <p> {{$booking->office}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Bimbit </label>
                                    <p> {{$booking->phone}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Emel</label>
                                    <p>{{$booking->email}}</p>
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
                            <button class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav" data-tab-step="-1">Kembali</button>
                            <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
                            <!-- <button type="button" class="btn btn-primary btn-next">Next</button> -->
                        </div>
                    </div> 
                </div>
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-secretariat-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Urusetia</label>
                                    <p>{{$booking->secretariat_name ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Pejabat</label>
                                    <p>{{$booking->secretariat_office_phone ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Bimbit </label>
                                    <p> {{$booking->secretariat_mobile_phone ?? '-'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Emel </label>
                                    <p> {{$booking->secretariat_email ?? '-'}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="eb-booking-info-btns">
                            <button class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav" data-tab-step="-1">Kembali</button>
                            <button class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
                        </div>
                    </div> 
                </div>
                <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-other-info-tab">
                    <div class="eb-booking-info-tab">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Makanan</label>
                                    <p>{{ $booking->food ? 'Yes' : 'No' }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Peralatan</label>
                                    <p>{{ is_array($booking->equipment) ? implode(', ', $booking->equipment) : implode(', ', json_decode($booking->equipment, true)) }}</p>
                                </div>
                            </div>
                            @if($booking->food)
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                        <label>Nama Katering</label>
                                        <p>{{ $booking->catering_name ?? '-'}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                        <label>No. Telefon</label>
                                        <p> {{ $booking->catering_phone ?? '-'}}</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endif
                             <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Keperluan Lain</label>
                                    <p>{{$booking->other_requirements ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                            @if($booking->other_requirements)
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Kereta </label>
                                    <p>{{ $booking->car_number ?? '-' }}</p>
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-6 col-md-12" hidden>
                                <div class="form-group mb-4">
                                    <label>Perkhidmatan Teknikal</label>
                                    <p>{{$booking->technical_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12" hidden>
                                <div class="form-group mb-4">
                                    <label>Perkhidmatan ICT</label>
                                    <p>{{$booking->ict_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                        </div>

                        <form id="confirm_form" action="{{route('user.booking.confirm', $booking->id)}}" method="post">
                            @csrf
                            @method('PUT')
                        </form>

                        <form method="POST" action="{{ route('user.booking.cancel', $booking->id) }}" id="rejectForm">
                            @csrf
                            @method('PUT')

                         <div class="col-lg-6 col-md-12" id="rejectInfoContainer" style="display: none;">
                            <div class="form-group mb-4">
                                <label>Ulasan</label>
                                <textarea class="form-control" name="reviews" id="reviews"
                                    placeholder="Sila nyatakan sebab anda membetalkan tempahan ini.">{{ old('reviews', $booking->reviews) }}</textarea>
                            </div>
                        </div>


                        <div class="d-flex bd-highlight mb-3">
                            <div class="mr-auto p-2 bd-highlight">
                            @if($booking->status === 3)
                                <p>Sila sahkan permohonan tempahan anda sebelum tarikh Mesyuarat.</p>
                            @else
                                <a href="javascript:history.back()" class="btn btn-outline-secondary eb-delete-btn ">Kembali</a>
                            @endif
                            </div>
                            @if($booking->status === 3)
                            <div class="p-2 bd-highlight">
                                <a href="javascript:history.back()" class="btn btn-outline-secondary eb-delete-btn ">Kembali</a>
                                <button type="submit" form="confirm_form" class="btn btn-primary">Sahkan Tempahan</button>
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                {{-- <a href="{{route('user.booking.edit', $booking->id)}}" class="btn btn-primary" >Sahkan Tempahan</a> --}}
                            </div>
                            @endif
                            @if($booking->status === 1 || $booking->status === 2)
                            <div class="p-2 bd-highlight">
                                <button type="button" class="btn btn-danger" id="rejectBtn">Batalkan Tempahan</button>
                                <input type="hidden" name="action" id="actionInput" value="">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            </div>
                            @endif
                             @if($booking->status === 1 || $booking->status === 2 || $booking->status === 2)
                            <div class="p-2 bd-highlight">
                                <a href="{{route('user.booking.edit', $booking->id)}}" class="btn btn-primary" >Kemaskini Tempahan</a>
                            </div>
                            @endif
                        </div>
                        </form>

                    </div> 
                </div>
            </div>
        </div> 
    </main>

     {{-- <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to proceed?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content text-center">
        <div class="modal-body">
            <!-- Icon -->
            <div class="mb-3">
            <i class="fas fa-exclamation-triangle fa-3x text-primary"></i>
            </div>
            <!-- Title -->
            <h5 class="mb-3 font-weight-bold">Adakah anda pasti?</h5>
            <!-- Text -->
            <p>Adakah anda pasti anda ingin membatalkan tempahan ini?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Tidak</button>
            <button type="button" class="btn btn-primary" id="confirmBtn">Ya</button>
        </div>
        </div>
    </div>
    </div>
    
@endsection

    @push('js')
    <script>

        // Reject button
        document.addEventListener('DOMContentLoaded', function () {
            const rejectBtn = document.getElementById('rejectBtn');
            const confirmBtn = document.getElementById('confirmBtn');
            const rejectInfoContainer = document.getElementById('rejectInfoContainer');
            const actionInput = document.getElementById('actionInput');
            const rejectForm = document.getElementById('rejectForm');
            const reviewsTextarea = document.getElementById('reviews');
            const confirmationModalElement = document.getElementById('confirmationModal');
            const confirmationModal = new bootstrap.Modal(confirmationModalElement);

            let rejectClickedOnce = false;

            rejectBtn.addEventListener('click', function () {
                if (!rejectClickedOnce) {
                    // First click: show textarea
                    rejectInfoContainer.style.display = 'block';
                    rejectBtn.textContent = 'Hantar Pembatalan'; // Change label
                    rejectClickedOnce = true;
                } else {
                    // Second click: validate and submit
                    const review = reviewsTextarea.value.trim();
                    if (review === '') {
                        alert('Sila nyatakan sebab penolakan.'); // Please state reason for rejection
                        return;
                    }

                    confirmationModal.show();


                    // actionInput.value = 'reject';
                    // rejectForm.submit();
                }
            });

            confirmBtn.addEventListener('click', function () {
                actionInput.value = 'reject';
                rejectForm.submit();
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


@if($booking->status === 3)

<script>
            
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
                        window.location.href = `${baseURL}/user/booking/${bookingId}/show`;
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
                        window.location.href = `${baseURL}/user/booking/${bookingId}/show`;
                    }, 1500);
                })
                .catch(error => {
                    alert('Error opening PDF for print');
                    console.error(error);
                });
        });
</script>
@endif
@endpush