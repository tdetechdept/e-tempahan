
<form class="row g-3" id="confirmationForm" method="POST" action="{{ $action }}" enctype="multipart/form-data">
        @csrf
        @if ($button == 'update')
            @method('PUT')
            
        @endif
        @php
            if($button == 'update'){
                $class = 'form-control-plaintext';  
                $readonly ='readonly';
                $disable = 'disabled';
            }else{
                $class = 'form-control';  
                $readonly ='';
                $disable = '';
            }
            
        @endphp
    <!-- Content Card -->
    <div class="eb-boking-info-tabs mb-3 container-fluid">
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
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-booking-info-tab">
                <div class="eb-booking-info-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Nama Mesyuarat</label>
                                <input type="text" name="meeting_name" value="{{ old('meeting_name', $booking->meeting_name ?? null) }}"
                                        class="{{$class}}" {{$readonly}} id="meetingName">
                                    @error('meeting_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Pengerusi</label>
                                <select class="form-control" name="chairman" id="exampleFormControlSelect1">
                                    <option selected disabled>Sila Pilih Pengerusi</option>
                                    @foreach($chairmans as $chairman)
                                    <option value="{{$chairman->name}}" {{ old('chairman', $chairman->name) == $booking->chairman ? 'selected' : '' }}>{{$chairman->name}}</option>
                                    @endforeach
                                </select>
                                    @error('chairman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="">Tarikh Mesyuarat</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                    <label>Tarikh Mula</label>
                                    <input type="date" name="start_date" value="{{ old('start_date', ($booking->start_date)->format('Y-m-d')) ?? request()->get('date') }}"
                                            class="{{$class}}" {{$readonly}} id="meetingStartDate" @if($button == 'create') readonly @endif>
                                        @error('start_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                    <label>Tarikh Tamat</label>
                                    <input type="date" name="end_date" value="{{ old('end_date', ($booking->end_date)->format('Y-m-d')) ?? request()->get('date') }}"
                                            class="{{$class}}" {{$readonly}} id="meetingEndDate" @if($button == 'create') readonly @endif>
                                        @error('end_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <label for="">Masa Mesyuarat</label>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                    <label>Masa Mula</label>
                                    <input type="time" name="start_time" value="{{ old('start_time', ($booking->start_time)->format('H:i')) ?? request()->get('start') }}"
                                            class="form-control" id="meetingStartTime" @if($button == 'create') readonly @endif>
                                        @error('start_time')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group mb-4">
                                    <label>Masa Tamat</label>
                                    <input type="time" name="end_time" value="{{ old('end_time', ($booking->end_time)->format('H:i')) ?? request()->get('end') }}"
                                            class="form-control" id="meetingEndTime" @if($button == 'create') readonly @endif>
                                        @error('end_time')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Bilangan Peserta</label>
                                <input type="text" name="number_of_participants" value="{{ old('number_of_participants', $booking->number_of_participants) }}"
                                        class="{{$class}}" {{$readonly}} id="participantsCount">
                                    @error('number_of_participants')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Penerangan</label>
                                <textarea class="{{$class}}" {{$readonly}} id="validationTextarea" name="description" placeholder="Penerangan" required>{{ old('description', $booking->description) }}</textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Bilik </label>
                                {{-- <input type="text" name="room_id" value="{{ old('room_id') ?? $room->room_name ?? '' }}"
                                        class="form-control" id="roomName" readonly> --}}
                                <select class="form-control" name="" id="roomSelect" disabled>
                                    @foreach ($allrooms as $rooms)
                                        <option value="{{ $rooms->id }}" {{old('room_id', $rooms->id) === $room->id ? 'selected' : '' }}>{{ $rooms->room_name }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="room_id" value="{{ $room->id }}">

                                @error('room_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Jenis</label>
                                <select class="form-control" name="type" id="typeSelect" {{$disable}}>
                                    <option value="">Pilih Jenis</option>
                                    <option value="Interior" {{ old('type', $booking->type) == 'Interior' ? 'selected' : '' }}>Dalaman</option>
                                    <option value="External" {{ old('type', $booking->type) == 'External' ? 'selected' : '' }}>Luaran</option>
                                </select>
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Status </label>
                                <select class="form-control" name="status" id="statusSelect" {{$disable}}>
                                    <option value="">Pilih Status</option>
                                    <option value="1" {{ old('type', $booking->status) == 1  ? 'selected' : '' }}>Permohonan Baru</option>
                                    <option value="3" {{ old('type', $booking->status) == 3 ? 'selected' : '' }}>Pemohon Lulus</option>
                                </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Jenis Ulangan </label>
                                <select class="form-control" name="repetition_type" id="repetitionTypeSelect" {{$disable}}>
                                    <option value="">Pilih Jenis Ulangan</option>
                                    <option value="tiada" {{ old('type', $booking->repetition_type) == 'tiada' ?? null  ? 'selected' : '' }}>Tiada</option>
                                    <option value="Daily" {{ old('type', $booking->repetition_type) == 'Daily'  ? 'selected' : '' }}>Harian</option>
                                    <option value="Weekly" {{ old('type', $booking->repetition_type) == 'Weekly'  ? 'selected' : '' }}>Mingguan</option>
                                    <option value="Monthly" {{ old('type', $booking->repetition_type) == 'Monthly'  ? 'selected' : '' }}>Bulanan</option>
                                    <option value="Yearly" {{ old('type', $booking->repetition_type) == 'Yearly'  ? 'selected' : '' }}>Tahunan</option>
                                </select>
                                    @error('repetition_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Tarikh Ulangan </label>
                                <input type="date" name="repeat_date" value="{{ old('repeat_date', $booking->repeat_date) }}"
                                        class="{{$class}}" {{$readonly}} id="repeatDate">
                                    @error('repeat_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            @if($button === 'update')
                            <div class="form-group mb-4">
                                <label>Pelan Bilik </label>
                                <input type="text" name="room_plan" value="{{ old('room_plan', $booking->room_plan) }}"
                                        class="{{$class}}" {{$readonly}} id="room_plan">
                            </div>
                            @else
                            <div class="form-group mb-4">
                                <label>Pelan Bilik </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="room_plan" id="inlineRadio1" value="Bilik Darjah">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="inlineRadio1">Bilik Darjah</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="room_plan" id="inlineRadio2" value="Dewan Besar">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="inlineRadio2">Dewan Besar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="room_plan" id="inlineRadio3" value="Bilik Seminar">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="inlineRadio3">Bilik Seminar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="room_plan" id="inlineRadio4" value="Lain - lain">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="inlineRadio4">Lain - lain</label>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="" style="display: none" id="layoutImg">
                                        @if ($room->picture)
                                            <img src="{{ asset('images/rooms/' . $room->picture) }}" alt="Bilik Mesyuarat" class="room-img" width="100">
                                            @else
                                            <img src="{{ asset('img/no_img.png') }}" alt="Bilik Mesyuarat" class="room-img" width="100">
                                        @endif
                                    </div>
                                   
                                    <div class="col-md-12" style="display: none" id="layoutUpload">
                                        <!-- Picture -->
                                            <div class="form-group">
                                                <div class="eb-uplaod-file position-relative">
                                                    <input type="file" name="picture" class="form-control" id="picture">
                                                    <span class="material-symbols-rounded position-absolute top-50 end-0 translate-middle-y pe-3">upload</span>
                                                    <p class="form-text" id="pictureName">Sila muat naik fail anda (pdf/jpg)</p>
                                                </div>
                                                <small class="text-muted">Saiz maksimum fail untuk layout / pelan ialah 5MB</small>
                                                @error('picture')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                    </div>
                                </div>

                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="eb-booking-info-btns">
                        <!-- <button type="button" class="btn btn-secondry btn-back">Back</button> -->
                            <button type="button" class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
                    </div>
                </div>   
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-applicant-info-tab">
                <div class="eb-booking-info-tab">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Nama Pemohon</label>
                                <input type="text" name="" value="{{ Auth::user()->name }}"
                                        class="{{$class}}" {{$readonly}} id="name" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Nama Kementrian / Bahagian / Jabatan</label>
                                <input type="text" name="" value="{{ Auth::user()->department ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="jabatan" readonly>
                                 {{-- <select class="{{$class}}" {{$readonly}} name="section" id="secretariatTypeSelect">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select> --}}
                                    @error('section')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Jawatan </label>
                                <input type="text" name="" value="{{ Auth::user()->position ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="position" readonly>
                                 {{-- <select class="{{$class}}" {{$readonly}} name="position" id="positionSelect">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select> --}}
                                    @error('position')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Gred </label>
                                <input type="text" name="" value="{{ Auth::user()->grade ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="gred" readonly>
                                 {{-- <select class="{{$class}}" {{$readonly}} name="grade" id="gradeSelect">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select> --}}
                                    @error('grade')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>No. Telefon Pejabat </label>
                                <input type="text" name="" value="{{ Auth::user()->office_number ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="officePhone" readonly>
                                {{-- <input type="text" name="office_phone" value="{{ old('office_phone') }}"
                                        class="{{$class}}" {{$readonly}} id="officePhone"> --}}
                                    @error('office_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>No. Telefon Bimbit </label>
                                <input type="text" name="" value="{{ Auth::user()->phone_number ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="phone" readonly>
                                {{-- <input type="text" name="mobile_phone" value="{{ old('mobile_phone') }}"
                                        class="{{$class}}" {{$readonly}} id="mobilePhone"> --}}
                                    @error('mobile_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Emel</label>
                                <input type="text" name="" value="{{ Auth::user()->email ?? '' }}"
                                        class="{{$class}}" {{$readonly}} id="email" readonly>
                                {{-- <input type="email" name="email" value="{{ old('email') }}"
                                        class="{{$class}}" {{$readonly}} id="email"> --}}
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="eb-booking-info-btns">
                        <!-- <button type="button" class="btn btn-secondary btn-back">Back</button> -->
                        <button type="button" class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav" data-tab-step="-1">Kembali</button>
                        <button type="button" class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
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
                                <input type="text" name="secretariat_name" value="{{ old('secretariat_name', $booking->secretariat_name) }}"
                                        class="{{$class}}" {{$readonly}} id="secretariatName">
                                    @error('secretariat_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>No. Telefon Pejabat</label>
                                <input type="text" name="secretariat_office_phone" value="{{ old('secretariat_office_phone', $booking->secretariat_office_phone) }}"
                                        class="{{$class}}" {{$readonly}} id="secretariatOfficePhone">
                                    @error('secretariat_office_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>No. Telefon Bimbit </label>
                                <input type="text" name="secretariat_mobile_phone" value="{{ old('secretariat_mobile_phone', $booking->secretariat_mobile_phone) }}"
                                        class="{{$class}}" {{$readonly}} id="secretariatMobilePhone">
                                    @error('secretariat_mobile_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Emel </label>
                                <input type="text" name="secretariat_email" value="{{ old('secretariat_email', $booking->secretariat_email) }}"
                                        class="{{$class}}" {{$readonly}} id="secretariatEmail">
                                    @error('secretariat_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="eb-booking-info-btns">
                        <button type="button" class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav" data-tab-step="-1">Kembali</button>
                        <button type="button" class="btn btn-primary btn-next tab-nav" data-tab-step="1">Seterusnya</button>
                    </div>
                </div> 
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="pills-other-info-tab">
                <div class="eb-booking-info-tab">
                    @if($button === 'update')
                                        <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Makanan</label>
                                <p>
                                    @if($booking->food === 1)
                                    Ya
                                    @else
                                    Tidak
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Peralatan</label>
                                <p>{{ is_array($booking->equipment) ? implode(', ', $booking->equipment) : implode(', ', json_decode($booking->equipment, true)) }}</p>
                            </div>
                        </div>
                        @if($booking->food === 1)
                        <div class="col-lg-6 col-md-12">
                            <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Katering</label>
                                    <input type="text" name="catering_name" value="{{ old('catering_name') }}"
                                        class="{{$class}}" {{$readonly}} id="cateringName">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon</label>
                                    <input type="text" name="catering_phone" value="{{ old('catering_phone') }}"
                                        class="{{$class}}" {{$readonly}} id="cateringPhone">
                                </div>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="col-lg-6 col-md-12">
                            {{-- <div class="form-group mb-4">
                                <label>Keperluan Lain (Kereta) </label>
                                <p>{{ $booking->car_number ?? '-' }}</p>
                            </div> --}}
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Perkhidmatan Teknikal</label>
                                <p>
                                    @if($booking->technical_services === 1)
                                    Ya
                                    @else
                                    Tidak
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Perkhidmatan ICT</label>
                                <p>
                                    @if($booking->ict_services === 1)
                                    Ya
                                    @else
                                    Tidak
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Makanan</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="food" id="food1" value="1">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="food1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="food" id="food2" value="0">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="food2">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Peralatan</label>
                                @foreach ($room->facilities as $equipment)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="equipment[]" id="equipment{{ $equipment }}" value="{{ $equipment }}">
                                        <label class="form-check-label ml-2 mt-2 pt-1" for="equipment{{ $equipment }}">{{ $equipment }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12" style="display: none" id="foodForm">
                            <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>Nama Katering</label>
                                    <input type="text" name="catering_name" value="{{ old('catering_name') }}"
                                        class="form-control" id="cateringName">
                                    @error('catering_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group mb-4">
                                    <label>No. Telefon</label>
                                    <input type="text" name="catering_phone" value="{{ old('catering_phone') }}"
                                        class="form-control" id="cateringPhone">
                                    @error('catering_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-6 col-md-12">
                            {{-- <div class="form-group mb-4">
                                <label>Keperluan Lain (Kereta) </label>
                                <p>{{ $booking->car_number ?? '-' }}</p>
                            </div> --}}
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Perkhidmatan Teknikal</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="technical_services" id="technical1" value="1">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="technical1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="technical_services" id="technical2" value="0">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="technical2">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-4">
                                <label>Perkhidmatan ICT</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ict_services" id="ict1" value="1">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="ict1">Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ict_services" id="ict2" value="0">
                                    <label class="form-check-label ml-2 mt-2 pt-1" for="ict2">Tidak</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="eb-booking-info-btns">
                        <button type="button" class="btn btn-secondary eb-form-submit eb-delete-btn btn-back tab-nav" data-tab-step="-1">Kembali</button>
                        @if($button === 'update')
                        <button type="submit" class="btn btn-primary eb-form-submit">Kemaskini Permohonan</button>
                        @else
                        <button type="button" class="btn btn-primary eb-form-submit" onclick="openConfirmationModal()">Hantar Permohonan</button>
                        @endif
                    </div>

                </div> 
            </div>
        </div>
    </div> 

    <div class="modal fade eb-delete-popup" id="ConfirmationModal" tabindex="-1" role="dialog"
		aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="dynamicConfirmationForm" method="POST">
				@csrf
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<div class="modal-body">
                            <h5 class="text-center mb-4 font-weight-bold">Terma dan Syarat</h5>
                            <div style="max-height: 400px; overflow-y: auto; padding: 0 10px;">
                                <p><strong>1. Tempahan Awal</strong><br>
                                Semua permohonan tempahan bilik perlu dibuat sekurang–kurangnya tiga (3) hari bekerja sebelum tarikh mesyuarat atau acara berlangsung.<br>
                                Tujuan: Bagi membolehkan pentadbir bilik menyusun jadual penggunaan bilik dengan teratur dan mengelakkan pertindihan tempahan.</p>

                                <p><strong>2. Kelulusan Adalah Tertakluk kepada Ketersediaan</strong><br>
                                Permohonan tempahan akan disemak oleh Pentadbir Bilik dan hanya akan diluluskan jika bilik masih tersedia. Kelulusan juga mengambil kira keutamaan pengguna, jenis acara, dan kapasiti bilik.</p>

                                <p><strong>3. Ketepatan Maklumat</strong><br>
                                Pemohon bertanggungjawab memastikan semua maklumat yang diisi dalam borang adalah lengkap dan tepat. Maklumat tidak lengkap boleh menyebabkan kelewatan proses atau penolakan permohonan.</p>

                                <p><strong>4. Pengesahan Tempahan</strong><br>
                                Tempahan yang telah diluluskan perlu disahkan oleh pemohon dalam tempoh tiga (3) hari sebelum tarikh mesyuarat. Jika tidak disahkan, sistem boleh membatalkan tempahan secara automatik.</p>

                                <p><strong>5. Pembatalan Tempahan</strong><br>
                                Pemohon boleh membatalkan tempahan selagi status permohonan adalah 'Baharu'. Pembatalan perlu disertakan dengan ulasan atau sebab pembatalan. Ini memberi peluang kepada pengguna lain untuk menggunakan bilik yang sama.</p>
                            </div>
                        </div>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
							<button type="submit" class="btn btn-primary">Saya Faham dan Bersetuju</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

</form>

@push('js')
<script>
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

        //Pelan Bilik
        document.addEventListener('DOMContentLoaded', function () {
            const radioButtons = document.querySelectorAll('input[name="room_plan"]');
            const layoutImg = document.getElementById('layoutImg');
            const layoutUpload = document.getElementById('layoutUpload');


            radioButtons.forEach(radioButton => {
                radioButton.addEventListener('change', function() {
                    if(radioButton.value === 'Lain - lain'){
                        layoutUpload.style.display = 'block';
                        layoutImg.style.display = 'none';
                    }else{
                        layoutUpload.style.display = 'none';
                        layoutImg.style.display = 'block';
                    }
                });
            });

        });

        //Makanan
         document.addEventListener('DOMContentLoaded', function () {
            const foodButtons = document.querySelectorAll('input[name="food"]');
            const foodForm = document.getElementById('foodForm');


            foodButtons.forEach(foodButton => {
                foodButton.addEventListener('change', function() {
                    if(foodButton.value === '1'){
                        foodForm.style.display = 'block';
                    }else{
                        foodForm.style.display = 'none';
                    }
                });
            });

        });

</script>
<script>
    function openConfirmationModal() {
        const modal = new bootstrap.Modal(document.getElementById('ConfirmationModal'));
        modal.show();
    }  
</script>
<script>
    
</script>
@endpush
