@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page">
        <h2 class="page_title">Pengurusan Pengguna</h2>
        <p class="breadcrumbs">Laman Utama / <span>Pengurusan Pengguna</span></p>




        <div class="table-section">
            <div class="search-section">
                <h4 class="table_title">Senarai Pengguna / Pengguna</h4>
                <div class="position-relative search_input">
                    <i class="fas fa-search position-absolute"
                        style="left: 12px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                    <input type="text" class="form-control pl-5 " placeholder="Search...">
                </div>


            </div>
            <div class="dropdown-section">
                <div>
                    <p>Senarai</p>
                    <select name="status" id="status">
                        <option value="semua">Semua</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                </div>
                <a href="#">Lihat Semua</a>
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
                <button class="btn button_primary">Daftar Pengguna</button>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-Semua" role="tabpanel" aria-labelledby="pills-Semua-tab">
                    <div class="table-container">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name Pegaeai</th>
                                    <th>Bahagian</th>
                                    <th>No.Telefon</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Anik Azsuper_admin</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>015665465465</td>
                                    <td>anik@example.com</td>
                                    <td><span class="badge AKTIF">AKTIF</span></td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Anik Azsuper_admin</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>015665465465</td>
                                    <td>anik@example.com</td>
                                    <td><span class="badge BAHARU">BAHARU</span></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Anik Azsuper_admin</td>
                                    <td>Lorem ipsum dolor sit amet</td>
                                    <td>015665465465</td>
                                    <td>anik@example.com</td>
                                    <td><span class="badge NYAHAKTIF">NYAHAKTIF</span></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-Baharu" role="tabpanel" aria-labelledby="pills-Baharu-tab">2</div>
                <div class="tab-pane fade" id="pills-Diluluskan" role="tabpanel" aria-labelledby="pills-Diluluskan-tab">3
                </div>
                <div class="tab-pane fade" id="pills-Ditolak" role="tabpanel" aria-labelledby="pills-Ditolak-tab">4</div>
                <div class="tab-pane fade" id="pills-Dibatalkan" role="tabpanel" aria-labelledby="pills-Dibatalkan-tab">5
                </div>
                <div class="pagination_align">
                    <p>Tunjuk 10 Pengguna</p>
                    <nav aria-label="...">
                        <ul class="pagination">
    
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m13.292 12l-4.6-4.6l.708-.708L14.708 12L9.4 17.308l-.708-.708z" />
                                </svg></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            
        </div>
    </div>
@endsection
