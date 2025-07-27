@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Laporan</h2>
        <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Laporan</span></p>

        <div class="Laporan_content">
            <div class="search-section">
                <h4 class="table_title">Laporan</h4>
                <div class="position-relative search_input">
                    <i class="fas fa-search position-absolute"
                        style="left: 12px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="text" class="form-control pl-5 " placeholder="Search...">
                </div>
            </div>
            <div class="Flex-center">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="tab_button active" id="pills-Semua-tab" data-toggle="pill" data-target="#pills-Semua"
                            type="button" role="tab" aria-controls="pills-Semua" aria-selected="true">Semua</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button" id="pills-Baharu-tab" data-toggle="pill" data-target="#pills-Baharu"
                            type="button" role="tab" aria-controls="pills-Baharu" aria-selected="false">Baharu</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button" id="pills-Diluluskan-tab" data-toggle="pill"
                            data-target="#pills-Diluluskan" type="button" role="tab" aria-controls="pills-Diluluskan"
                            aria-selected="false">Diluluskan</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button" id="pills-Ditolak-tab" data-toggle="pill" data-target="#pills-Ditolak"
                            type="button" role="tab" aria-controls="pills-Ditolak"
                            aria-selected="false">Ditolak</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="tab_button" id="pills-Dibatalkan-tab" data-toggle="pill"
                            data-target="#pills-Dibatalkan" type="button" role="tab" aria-controls="pills-Dibatalkan"
                            aria-selected="false">Dibatalkan</button>
                    </li>
                </ul>

            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active px-3" id="pills-Semua" role="tabpanel"
                    aria-labelledby="pills-Semua-tab">
                    <div class="filter-block">
                        <div class="filter-row">
                            <label for="bahagian">Bahagian</label>
                            <select name="bahagian" id="bahagian" class="bahagian">
                                <option value="semua">Semua</option>
                                <option value="bahagian1">Bahagian 1</option>
                                <option value="bahagian2">Bahagian 2</option>
                                <option value="bahagian3">Bahagian 3</option>
                            </select>
                        </div>

                        <div class="filter-row">
                            <label for="tahun">Tahun</label>
                            <input type="text" id="tahun" placeholder="Type Something ....">
                        </div>

                        <div class="filter-row">
                            <label for="status">Status Permohonan</label>
                            <select name="status" id="status">
                                <option value="semua">Semua</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        
                    </div>


                </div>
                <div class="tab-pane fade px-3" id="pills-Baharu" role="tabpanel" aria-labelledby="pills-Baharu-tab">2</div>
                <div class="tab-pane fade px-3" id="pills-Diluluskan" role="tabpanel"
                    aria-labelledby="pills-Diluluskan-tab">3
                </div>
                <div class="tab-pane fade px-3" id="pills-Ditolak" role="tabpanel" aria-labelledby="pills-Ditolak-tab">
                    <div class="filter-block">
                        <div class="filter-row">
                            <label for="bahagian">Bahagian</label>
                            <select name="bahagian" id="bahagian" class="bahagian">
                                <option value="semua">Semua</option>
                                <option value="bahagian1">Bahagian 1</option>
                                <option value="bahagian2">Bahagian 2</option>
                                <option value="bahagian3">Bahagian 3</option>
                            </select>
                        </div>
                        <div class="filter-row">
                            <label for="bahagian">Bulan</label>
                            <select name="bahagian" id="bahagian" class="bahagian">
                                <option value="semua">Semua</option>
                                <option value="bahagian1">Bahagian 1</option>
                                <option value="bahagian2">Bahagian 2</option>
                                <option value="bahagian3">Bahagian 3</option>
                            </select>
                        </div>

                        <div class="filter-row">
                            <label for="tahun">Tahun</label>
                            <input type="text" id="tahun" placeholder="Type Something ....">
                        </div>

                        <div class="filter-row">
                            <label for="status">Status Permohonan</label>
                            <select name="status" id="status">
                                <option value="semua">Semua</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>
                            </select>
                        </div>

                        
                    </div>
                </div>
                <div class="tab-pane fade px-3" id="pills-Dibatalkan" role="tabpanel"
                    aria-labelledby="pills-Dibatalkan-tab">
                    5
                </div>
                <div class="Button_position_Laporan">
                  <button class="dashboard-btn">Papan Pemuka</button>
              </div>

            </div>
        </div>
    @endsection
