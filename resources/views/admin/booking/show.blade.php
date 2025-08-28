@extends('layouts.main.app')

@section('title', 'Semakan Tempahan')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Semakan Tempahan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('booking.index') }}" class="text-decoration-none text-dark">Senarai Permohonan Tempahan</a>
            <span class="mx-2">/</span>
            <a href="{{ route('booking.show', $booking->id) }}" class="text-decoration-none breadcrumb-active">Semakan Tempahan</a>
        </div>
    </div>
@endsection

@section('content')
<!-- Room Information  Review page start -->
    <main class="main-content" >
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
                    <a class="nav-link active text-primary" id="pills-booking-info-tab" data-toggle="tab" href="#tab1" role="tab"
                        aria-controls="pills-booking-info" aria-selected="true">Maklumat Tempahan Bilik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="pills-applicant-info-tab" data-toggle="tab" href="#tab2" role="tab"
                        aria-controls="pills-applicant-info" aria-selected="false">Maklumat Sekretariat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="pills-secretariat-info-tab" data-toggle="tab" href="#tab3" role="tab"
                        aria-controls="pills-secretariat-info" aria-selected="false">Maklumat Urusetia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary" id="pills-other-info-tab" data-toggle="tab" href="#tab4" role="tab"
                        aria-controls="pills-other-info" aria-selected="false">Tempahan Lain</a>
                </li>
            </ul>
            <div class="tab-content eb-tabs-booking-info" id="pills-tabContent">
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
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Tarikh
                                            Muld</span> {{\Carbon\Carbon::parse($booking->start_date)->format('F d, Y')}}
                                    </p>
                                    <p class="d-flex align-items-center justify-content-between"><span>Tarikh Tamat</span>
                                        {{\Carbon\Carbon::parse($booking->end_date)->format('F d, Y')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4 eb-meeting-group">
                                    <label>Masa Mesyuarat</label>
                                    <p class="d-flex align-items-center justify-content-between mb-2"><span>Masa Mula</span>
                                        {{\Carbon\Carbon::parse($booking->start_time)->format('h:i A')}}</p>
                                    <p class="d-flex align-items-center justify-content-between"><span>Masa
                                            Tamat</span>{{\Carbon\Carbon::parse($booking->end_time)->format('h:i A')}}</p>
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
                                    <p>{{$booking->user->department}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Jawatan </label>
                                    <p> {{$booking->user->position}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Gred </label>
                                    <p> {{$booking->user->grade}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Pejabat </label>
                                    <p> {{$booking->user->office_number}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon Bimbit </label>
                                    <p> {{$booking->user->phone_number}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Emel</label>
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
                            <button class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav"
                                data-tab-step="-1">Kembali</button>
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
                            <button class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav"
                                data-tab-step="-1">Kembali</button>
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
                                    @if ($booking->equipment)
                                    <p>{{ is_array($booking->equipment) ? implode(', ', $booking->equipment) : implode(', ', json_decode($booking->equipment, true)) }}
                                    </p>
                                    @else
                                    <p>-</p>
                                    @endif
                                </div>
                            </div>
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

                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Keperluan Lain (Kereta) </label>
                                    <p>{{ $booking->car_number ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Perkhidmatan Teknikal</label>
                                    <p>{{$booking->technical_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Perkhidmatan ICT</label>
                                    <p>{{$booking->ict_services ? 'Yes' : 'No'}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- <form action="{{ route('booking.update', $booking->id) }}" method="POST">

                                @csrf
                                @method('PUT')
                                <div class="col-lg-6 col-md-12" id="updateInfoContainer" style="display: none;">
                                    <div class="form-group mb-4">
                                        <label>Ulasan</label>
                                        <textarea class="form-control" name="reviews" placeholder="Please state the reason you are rejecting this booking.">{{ old('reviews', $booking->reviews) }}</textarea>
                                    </div>
                                </div>
                                <div class="eb-booking-info-btns">
                                    <button type="button" class="btn btn-primary" id="showUpdateBtn">Kemaskini</button>
                                    <button type="submit" name="action" value="reject" class="btn btn-secondary">Tolak</button>
                                    <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                    <button type="button" class="btn btn-primary" name="action" value="pass" data-toggle="modal" data-target="#successfully">Luluskan</button>
                                </div>
                            </form> -->
                        <form method="POST" action="{{ route('booking.update', $booking->id) }}" id="rejectForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-6 col-md-12" id="updateInfoContainer" style="display: none;">
                                    <div class="form-group mb-4">
                                        <label>Maklumat Kemaskini</label>
                                        <textarea class="form-control" name="update_info"
                                            placeholder="Sila masukkan maklumat untuk dikemas kini.">{{ old('reviews', $booking->update_info) }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12" id="rejectInfoContainer" style="display: none;">
                                    <div class="form-group mb-4">
                                        <label>Ulasan</label>
                                        <textarea class="form-control" name="reviews" id="reviews"
                                            placeholder="Sila nyatakan sebab anda menolak tempahan ini.">{{ old('reviews', $booking->reviews) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="eb-booking-info-btns">
                                <button type="button" class="btn btn-primary" id="showUpdateBtn">Kemaskini</button>
                                <button type="button" class="btn btn-secondary" id="rejectBtn">Tolak</button>
                                <input type="hidden" name="action" id="actionInput" value="">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <!-- <button type="submit" class="btn btn-primary"
                                    onclick="document.getElementById('actionInput').value='pass'">Luluskan</button> -->
                                <button type="button" class="btn btn-primary" id="approveBtn">Luluskan</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal registration -->
    <div class="modal fade eb-successfully-popup" id="successfully" tabindex="-1" role="dialog"
        aria-labelledby="successfully" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="eb-successfully-icon"></div>
                    <h3>Permohonan Berjaya Diluluskan</h3>
                    <p>Sila simpan salinan untuk rujukan. Anda boleh memuat turun dokumen dalam format PDF dan mencetaknya
                        sekarang.</p>
                    <div class="eb-popup-btns">
                        <button type="button" class="btn btn-primary eb-pdf-download-btn" id="downloadPDF"
                            data-dismiss="modal">Muat Turun PDF</button>
                        <button type="button" id="printPDF" class="btn btn-primary eb-pdf-print-btn">Cetak</button>

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

        // Reject button
        document.addEventListener('DOMContentLoaded', function () {
            const rejectBtn = document.getElementById('rejectBtn');
            const rejectInfoContainer = document.getElementById('rejectInfoContainer');
            const actionInput = document.getElementById('actionInput');
            const rejectForm = document.getElementById('rejectForm');
            const reviewsTextarea = document.getElementById('reviews');

            let rejectClickedOnce = false;

            rejectBtn.addEventListener('click', function () {
                if (!rejectClickedOnce) {
                    // First click: show textarea
                    rejectInfoContainer.style.display = 'block';
                    rejectBtn.textContent = 'Hantar Tolakan'; // Change label
                    rejectClickedOnce = true;
                } else {
                    // Second click: validate and submit
                    const review = reviewsTextarea.value.trim();
                    if (review === '') {
                        alert('Sila nyatakan sebab penolakan.'); // Please state reason for rejection
                        return;
                    }

                    actionInput.value = 'reject';
                    rejectForm.submit();
                }
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
                    }, 1500);
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

            document.getElementById('approveBtn').addEventListener('click', function () {
                document.getElementById('actionInput').value = 'pass';
                $('#successfully').modal('show'); // Bootstrap modal open
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