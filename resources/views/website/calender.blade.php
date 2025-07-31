        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label float-start">Bahagia / Jabatan / Unit</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label float-start">Nama Bilik</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-md-2 p-0">
                                <div class="p-0 mt-4 pt-1">
                                    <button type="button" class="btn btn-success">Cari</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="p-2 bd-highlight">
                         <div class="mt-4 pt-1">
                            <button type="button" class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#myCollapsibleDiv" style="background-color: #285689">
                                <i class="fas fa-image pe-2"></i>
                                Galeri
                                <i class="fas fa-chevron-down ps-3"></i>
                            </button>
                        </div>
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
                                        <input type="text" readonly class="form-control-plaintext" id="nameBilik" value="Bilik Mesyuarat Utama">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="aras" class="col-sm-4 col-form-label fw-bold">Aras</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="aras" value="34">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="facility" class="col-sm-4 col-form-label fw-bold">Fasiliti</label>
                                    <div class="col-sm-8">
                                        <ol class="list-group list-group-numbered" style="text-align: start;">
                                        <li class="list-group-item">A list item</li>
                                        <li class="list-group-item">A list item</li>
                                        <li class="list-group-item">A list item</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="saizBilik" class="col-sm-4 col-form-label fw-bold">Saiz Bilik</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="saizBilik" value="240m²">
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="nameBilik" class="col-sm-4 col-form-label fw-bold">No. Telefon Pejabat</label>
                                    <div class="col-sm-8">
                                        <input type="text" readonly class="form-control-plaintext" id="nameBilik" value="03-8911 7000">
                                    </div>
                                </div>

                            </div>

                            <!-- Right Image Section -->
                            <div class="col-md-8 room-images">
                            <div class="row">
                                <div class="col-md-6">
                                <img src="{{asset('img/img1.png')}}" alt="Bilik Mesyuarat">
                                </div>
                                <div class="col-md-6">
                                <img src="{{asset('img/img1.png')}}" alt="Bilik Mesyuarat">
                                </div>
                                <div class="col-md-6">
                                <img src="{{asset('img/img1.png')}}" alt="Bilik Mesyuarat">
                                </div>
                                <div class="col-md-6">
                                <img src="{{asset('img/img1.png')}}" alt="Bilik Mesyuarat">
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