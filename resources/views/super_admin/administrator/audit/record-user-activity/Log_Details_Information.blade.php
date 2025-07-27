@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Audit</h2>
        <p class="breadcrumbs">Laman Utama / Rekod Aktiviti Pengguna / <span> Maklumat Butiran Log</span></p>


        <div class="maklumat_pengguna">
            <h2 class="section_title">Maklumat Butiran Log</h2>

            <div class="Info_content">
                <div class="Info_title">
                    <p>Nama Pegawai</p>
                    <p>Tarikh & Masa</p>
                    <p>Emel Pengguna</p>
                    <p>Peranan</p>
                    <p>Bahagian</p>
                    <p>Tindakan Dilakukan</p>
                    <p>Status</p>
                    <p>Alamat IP</p>
                    <p>Peranti / Pelayar</p>
                    <p>Lokasi Akses</p>
                </div>
                <div class="Info_desc">
                    <p>ROZAINI BINTI OTHMAN</p>
                    <p>05 Julai 2025, 08.00 pagi</p>
                    <p>rozaini@komunikasi.gov.my</p>
                    <p>Pengguna</p>
                    <p>Bahagian Akaun</p>
                    <p>Kemaskini Tempahan</p>
                    <p>Berjaya</p>
                    <p>192.168.1.10</p>
                    <p>Chrome, Windows 10</p>
                    <p>Putrajaya, Malaysia</p>
                </div>
            </div>
            <h2 class="section_title border-0">Maklumat Perubahan</h2>
            <div class="table-container">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Bil.</th>
                            <th>Perubahan</th>
                            <th>Sebelum</th>
                            <th>Selepas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Masa Tempahan</td>
                            <td>08.30 AM - 10.30 AM</td>
                            <td>10.30 AM - 12.30 AM</td>

                        </tr>

                    </tbody>
                </table>
                <div class="Log_Details_Information mt-5">
                    <button class="dashboard-btn btn ">Papan Pemuka</button>
                </div>
            </div>
        </div>







    </div>

    


    
@endsection
