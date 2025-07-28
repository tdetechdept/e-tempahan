@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Laporan</h2>
        <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Laporan</span></p>

        <div class="pengurusan_pengguna_page">

            <div class="calender_section">
                <h4 class="table_title">Laporan</h4>
                <p>Sila mengemaskini maklumat pengguna dibawah</p>


                <div class="filter-block">
                    <div class="filter-row">
                        <label for="tahun">Nama Pegawai<span>*</span></label>
                        <input type="text" id="tahun" placeholder="ROZAINI BINTI OTHMAN">
                    </div>
                    <div class="filter-row">
                        <label for="tahun">No. Kad Pengenalan<span>*</span></label>
                        <input type="text" id="tahun" placeholder="780114156854">
                    </div>
                    <div class="filter-row">
                        <label for="tahun">Jawatan<span>*</span></label>
                        <input type="text" id="tahun" placeholder="Penolong Pegawai teknologi Maklumat">
                    </div>
                    <div class="filter-row">
                        <label for="bahagian">Gred<span>*</span></label>
                        <select name="bahagian" id="bahagian" class="bahagian">
                            <option value="semua">FA32</option>
                            <option value="bahagian1">Bahagian 1</option>
                            <option value="bahagian2">Bahagian 2</option>
                            <option value="bahagian3">Bahagian 3</option>
                        </select>
                    </div>

                    <div class="filter-row">
                        <label for="status">Bahagian<span>*</span></label>
                        <select name="status" id="status">
                            <option value="semua">Bahagian Akaun</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak_aktif">Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="filter-row">
                        <label for="tahun">No. Telefon Pejabat<span>*</span></label>
                        <input type="text" id="tahun" placeholder="03 8911 6471
">
                    </div>
                    <div class="filter-row">
                        <label for="tahun">No. Telefon Bimbit<span>*</span></label>
                        <input type="text" id="tahun" placeholder="0197239482
">
                    </div>
                    <div class="filter-row">
                        <label for="tahun">Emel<span>*</span></label>
                        <input type="text" id="tahun" placeholder="rozaini@komunikasi.gov.my
">
                    </div>

                </div>

                <div class="Button_position_Laporan">
                    <button class="dashboard-btn">Kemaskini Pengguna</button>
                </div>




            </div>

            
        </div>

    </div>


    </div>
@endsection
