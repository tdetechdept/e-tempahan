@extends('layouts.main.app')

@section('title', 'Maklumat Bilik')
@push('css')
    <style>
    .room-img {
      width: 100%;
      border-radius: 8px;
    }
    .status {
      color: #0080c0;
      font-weight: 600;
      display: flex;
      align-items: center;
      margin-top: 15px;
    }
    .status i {
      font-size: 1.2rem;
      color: #0080c0;
      margin-right: 6px;
    }

    .status-cancel {
      color: #dc3545;
      font-weight: 600;
      display: flex;
      align-items: center;
      margin-top: 15px;
    }
    .status-cancel i {
      font-size: 1.2rem;
      color: #dc3545;
      margin-right: 6px;
    }

    .time-picker-header {
      font-weight: 500;
      margin-bottom: 5px;
    }
    .time-input {
      display: flex;
      align-items: center;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 6px 10px;
      margin-bottom: 10px;
    }
    .time-input i {
      margin-right: 8px;
      color: #333;
    }
    .time-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 8px;
    }
    .time-btn {
      border-radius: 8px;
      border: none;
      padding: 6px 0;
      font-weight: 500;
      font-size: 14px;
      cursor: pointer;
    }
    .time-btn.available {
      background-color: #e6edff;
      color: #3366ff;
    }
    .time-btn.available:hover {
      background-color: #ccd9ff;
    }
    .time-btn.unavailable {
      background-color: #f0f0f0;
      color: #999;
      cursor: not-allowed;
    }
    .time-picker-nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }
    </style>
@endpush
@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Buat Tempahan</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.index') }}" class="text-decoration-none text-dark">Carian Bilik Mesyuarat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.result') }}" class="text-decoration-none text-dark">Hasil Carian Bilik Mesyuarat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.search.view', $room->id) }}" class="text-decoration-none text-primary">Maklumat Bilik Mesyuarat</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Maklumat Bilik</h3>
                <p>{{ $room->room_name }}</p>
                <div class="eb-form-section">
                    <form>
                        <div class="row">
                                <!-- Image Section -->
                                <div class="col-md-4">
                                    @if ($room->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}" alt="Bilik Mesyuarat" class="room-img">
                                    @else
                                        <img src="{{ asset('img/no_img.png') }}" alt="Bilik Mesyuarat" class="room-img">
                                    @endif
                                    <!-- Status -->
                                    @if($status === true)
                                    <div class="status">
                                        <i class="fas fa-check-circle"></i> Bilik Tersedia
                                    </div>
                                    @else
                                    <div class="status-cancel">
                                        <i class="fas fa-times-circle"></i> Bilik Tidak Tersedia
                                    </div>
                                    <div class="container-fluids mt-4">
                                        <p><strong>Bilik tidak tersedia pada masa yang anda pilih.</strong> Berikut ialah senarai masa yang boleh ditempah pada tarikh tersebut.</p>
                                        <div class="row">
                                            <!-- Masa Mula -->
                                            <div class="col-md-6">
                                            <div class="time-picker-header">Masa Mula</div>
                                            <div class="time-input" id="masaMulaInput">
                                                <i class="far fa-clock"></i>
                                                <span class="selected-time">Pilih masa</span>
                                            </div>
                                                <input type="time" id="newStartTime" class="form-control" name="newStartTime">

                                            <div class="time-picker-nav">
                                                <button type="button" class="btn btn-link p-0" onclick="changeSession('mula', -1)"><i class="fas fa-chevron-left"></i></button>
                                                <strong id="mula-session-label">Pagi / Tengah Hari</strong>
                                                <button type="button" class="btn btn-link p-0" onclick="changeSession('mula', 1)"><i class="fas fa-chevron-right"></i></button>
                                            </div>
                                            <div class="time-grid" id="mula-time-grid"></div>
                                            </div>

                                            <!-- Masa Tamat -->
                                            <div class="col-md-6">
                                            <div class="time-picker-header">Masa Tamat</div>
                                            <div class="time-input" id="masaTamatInput">
                                                <i class="far fa-clock"></i>
                                                <span class="selected-time">Pilih masa</span>
                                            </div>
                                                <input type="time" id="newEndTime" class="form-control" name="newEndTime">

                                            <div class="time-picker-nav">
                                                <button type="button" class="btn btn-link p-0" onclick="changeSession('tamat', -1)"><i class="fas fa-chevron-left"></i></button>
                                                <strong id="tamat-session-label">Petang</strong>
                                                <button type="button" class="btn btn-link p-0" onclick="changeSession('tamat', 1)"><i class="fas fa-chevron-right"></i></button>
                                            </div>
                                            <div class="time-grid" id="tamat-time-grid"></div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="roomName">Name Bilik Mesyuarat</label>
                                            <input type="text" class="form-control" id="roomName" placeholder=""
                                                value="{{ $room->room_name ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="level">Aras Bilik Mesyuarat</label>
                                            <input type="text" class="form-control" id="level" placeholder=""
                                                value="{{ $room->level ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="capacity">Kapasiti</label>
                                            <input type="text" class="form-control" id="capacity" placeholder=""
                                                value="{{ $room->room_capacity ?? 'N/A' }} people" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facilities ">Fasiliti </label>
                                            <input type="text" class="form-control" id="facilities" placeholder=""
                                                value="{{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="picName">Nama PIC</label>
                                            <input type="text" class="form-control" id="picName" placeholder=""
                                                value="{{ $room->pic_name ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="picPhone">No. Telefon Pejabat PIC</label>
                                            <input type="text" class="form-control" id="picPhone" placeholder=""
                                                value="{{ $room->pic_phone ?? 'N/A' }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="facilities ">Tarikh Mesyuarat</label>
                                            <input type="text" class="form-control" id="facilities" placeholder=""
                                                value="{{\Carbon\Carbon::parse(request()->get('date'))->format('F d, Y')}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="capacity">Masa Mesyuarat</label>
                                            <input type="text" class="form-control" id="capacity" placeholder=""
                                                value="{{\Carbon\Carbon::parse(request()->get('start'))->format('g:i A')}} - {{\Carbon\Carbon::parse(request()->get('end'))->format('g:i A')}}" readonly>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                        <div class="eb-booking-info-btns mt-3">
                            <button type="button" class="btn btn-outline-primary">Kembali</button>
                            @if($status === true)
                            <a href="{{ route('user.booking.new', ['user' => Auth::user()->id, 'room' => $room->id, 'date' => request()->get('date'), 'participants' => request()->get('participants'), 'start' => request()->get('start'), 'end' => request()->get('end')]) }}" class="btn btn-primary">Tempah Bilik</a>
                            @else
                            <button type="button" id="tidakSedia" class="btn btn-primary" onclick="redirectToPageWithParam()" disabled >Tempah Bilik</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
  // const timeData = {
  //   "Pagi / Tengah Hari": [
  //     {time: "07.30", available: true},
  //     {time: "08.00", available: true},
  //     {time: "08.30", available: false},
  //     {time: "09.00", available: false},
  //     {time: "09.30", available: true},
  //     {time: "10.00", available: true},
  //     {time: "10.30", available: false},
  //     {time: "11.00", available: false},
  //     {time: "11.30", available: false},
  //     {time: "12.00", available: false}
  //   ],
  //   "Petang": [
  //     {time: "01.00", available: true},
  //     {time: "01.30", available: true},
  //     {time: "02.00", available: false},
  //     {time: "02.30", available: false},
  //     {time: "03.00", available: true},
  //     {time: "03.30", available: true},
  //     {time: "04.00", available: false},
  //     {time: "04.30", available: false},
  //     {time: "05.00", available: false},
  //     {time: "05.30", available: false},
  //     {time: "06.00", available: false},
  //     {time: "06.30", available: false},
  //   ]
  // };
  var pagi = @json($morning);
  var ptg = @json($evening);

   const timeData = {
    "Pagi / Tengah Hari": pagi,
    "Petang": ptg,
   }

  const sessions = ["Pagi / Tengah Hari", "Petang"];
  let currentSession = {mula: 0, tamat: 1};

  function renderTimeGrid(type) {
    const sessionName = sessions[currentSession[type]];
    document.getElementById(`${type}-session-label`).innerText = sessionName;
    const newStartTime = document.getElementById('newStartTime');
    const newEndTime = document.getElementById('newEndTime');
    const tidakSedia = document.getElementById('tidakSedia');
    const grid = document.getElementById(`${type}-time-grid`);
    grid.innerHTML = '';
    timeData[sessionName].forEach(slot => {
      const btn = document.createElement('button');
      btn.type = 'button';
      btn.className = `time-btn ${slot.available ? 'available' : 'unavailable'}`;
      btn.innerText = slot.time;
      if (slot.available) {
        btn.onclick = () => {
          document.querySelector(`#masa${type.charAt(0).toUpperCase() + type.slice(1)}Input .selected-time`).innerText = slot.time;
          if(type === 'mula'){
          newStartTime.value = slot.time;

          }else{
          newEndTime.value = slot.time;
          tidakSedia.removeAttribute('disabled');
          }
        };
      }
      grid.appendChild(btn);
    });
  }

  function changeSession(type, dir) {
    currentSession[type] = (currentSession[type] + dir + sessions.length) % sessions.length;
    renderTimeGrid(type);
  }

  // Initial render
  renderTimeGrid('mula');
  renderTimeGrid('tamat');

  function redirectToPageWithParam() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);


    const user = {{auth()->user()->id}};
    const room = {{$room->id}};
    const date = urlParams.get('date');
    const participants = urlParams.get('participants');

    const inputValue1 = document.getElementById("newStartTime").value;
    const inputValue2 = document.getElementById("newEndTime").value;

    const targetUrl = "/user/booking/new/"+ user +"/" + room + "/?date=" + date + "&participants=" + participants + "&start=" + inputValue1 + "&end=" +  inputValue2;
    window.location.href = targetUrl;
  }

</script>
@endpush