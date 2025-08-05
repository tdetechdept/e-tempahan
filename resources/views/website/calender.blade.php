        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label float-start" >Nama Bilik Mesyuarat</label>
                                    <select class="form-select" aria-label="Default select example" name="name">
                                        <option selected>Pilih Bilik Mesyuarat</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{$room->id}}" {{request()->name == $room->id ? "selected" : ""}}>{{$room->room_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label float-start" >Aras Bilik Mesyuarat</label>
                                    <select class="form-select" aria-label="Default select example" name="level">
                                        <option selected>Pilih Aras</option>
                                         @foreach ($rooms as $room)
                                            <option value="{{$room->level}}" {{request()->level == $room->level ? "selected" : ""}}>{{$room->level}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 p-0">
                                <div class="p-0 mt-4 pt-1">
                                    <button type="sumbit" class="btn btn-success mt-2"> 
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="p-2 bd-highlight">
                        @if(!(request()->name))
                         <div class="mt-4 pt-1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#myCollapsibleDiv" style="background-color: #285689" disabled>
                                <i class="fas fa-image pe-2"></i>
                                Galeri
                                <i class="fas fa-chevron-down ps-3"></i>
                            </button>
                        </div>
                        @else
                        <div class="mt-4 pt-1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#myCollapsibleDiv" style="background-color: #285689">
                                <i class="fas fa-image pe-2"></i>
                                Galeri
                                <i class="fas fa-chevron-down ps-3"></i>
                            </button>
                        </div>
                        @endif
                    </div>
                </div>

                <div id="myCollapsibleDiv" class="collapse">
                    {{-- <p>This content will be shown/hidden.</p> --}}
                    <div class="container room-section">
                        <div class="row">

                            <!-- Left Info Section -->
                            <div class="col-md-4 room-info">

                                <h5 class="section-title ps-3">Tentang Bilik</h5>

                                <div class="mb-3 row">
                                    <label for="nameBilik" class="col-sm-4 col-form-label fw-bold">Nama Bilik</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="nameBilik" value="{{$roomDetail->room_name ?? ''}}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="aras" class="col-sm-4 col-form-label fw-bold">Aras</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="aras" value="{{$roomDetail->level ?? ''}}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="facility" class="col-sm-4 col-form-label fw-bold">Fasiliti</label>
                                    <div class="col-sm-8">
                                        <ol class="list-group list-group-numbered" style="text-align: start;">
                                            @foreach($roomDetail->facilities as $facility)
                                                <li class="list-group-item">{{$facility}}</li>
                                            @endforeach
                                        </ol>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="kapasitiBilik" class="col-sm-4 col-form-label fw-bold">Kapasiti</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="kapasitiBilik" value="{{$roomDetail->room_capacity ?? ''}}">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="picPhone" class="col-sm-4 col-form-label fw-bold">No. Telefon Pejabat</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="picPhone" value="{{$roomDetail->pic_phone ?? ''}}">
                                    </div>
                                </div>

                            </div>

                            <!-- Right Image Section -->
                            <div class="col-md-8 room-images">
                            <div class="row">
                                <div class="col-md-6">
                                    @if($roomDetail->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}"
                                            alt="{{ $room->room_name }}" class="room-image"
                                            style="width: 400px; height: auto;">
                                    @else
                                        <img src="{{asset('img/no_img.png')}}" style="width: 400px; height: auto;" alt="Bilik Mesyuarat">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if($roomDetail->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}"
                                            alt="{{ $room->room_name }}" class="room-image"
                                            style="width: 400px; height: auto;">
                                    @else
                                        <img src="{{asset('img/no_img.png')}}" style="width: 400px; height: auto;" alt="Bilik Mesyuarat">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if($roomDetail->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}"
                                            alt="{{ $room->room_name }}" class="room-image"
                                            style="width: 400px; height: auto;">
                                    @else
                                        <img src="{{asset('img/no_img.png')}}" style="width: 400px; height: auto;" alt="Bilik Mesyuarat">
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    @if($roomDetail->picture)
                                        <img src="{{ asset('images/rooms/' . $room->picture) }}"
                                            alt="{{ $room->room_name }}" class="room-image"
                                            style="width: 400px; height: auto;">
                                    @else
                                        <img src="{{asset('img/no_img.png')}}" style="width: 400px; height: auto;" alt="Bilik Mesyuarat">
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="Laporan_content">
            <div class=" calendar-container2">

                <!-- Calendar Header -->
                <div class="d-flex justify-content-between align-items-center calendar-header2">
                    <div class="btn-group nav_button_group">
                        <button id="prevBtn" class="btn btn-outline-secondary">&lt;</button>
                        <button id="nextBtn" class="btn btn-outline-secondary ml-2">&gt;</button>
                    </div>
                    <button id="todayBtn" class="btn btn-outline-primary">Hari Ini</button>
                    <h4 id="currentMonthYear" class="mb-0"></h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label id="monthViewBtn" class="btn  active">
                            <input type="radio" name="options" autocomplete="off" checked> Bulan
                        </label>
                        <label id="weekViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Minggu
                        </label>
                        <label id="dayViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Hari
                        </label>
                        <label id="agendaViewBtn" class="btn ">
                            <input type="radio" name="options" autocomplete="off"> Agenda
                        </label>
                    </div>
                </div>

                <!-- Days of the week header -->
                <div class="calendar-grid">
                    <div class="row no-gutters text-center day-names">
                        <div class="col">Isnin</div>
                        <div class="col">Selasa</div>
                        <div class="col">Rabu</div>
                        <div class="col">Khamis</div>
                        <div class="col">Jumaat</div>
                        <div class="col">Sabtu</div>
                        <div class="col">Ahad</div>
                    </div>

                    <!-- Calendar Grid -->
                    <div id="calendarGrid" class="calendar-grid">
                        <!-- Calendar content will be generated here by JavaScript -->
                    </div>
                </div>
            </div>
        </div>