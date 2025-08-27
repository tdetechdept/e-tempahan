@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page ">
        <h2 class="page_title">Pengurusan Pengguna</h2>
        <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Maklumat Pengguna</span></p>


        <div class="maklumat_pengguna">
            <h2 class="section_title">Maklumat Pengguna</h2>

            <div class="Info_content">
                <div class="Info_title">
                    <p>Nama Pegawai<span>*</span></p>
                    <p>No. Kad Pengenalan</p>
                    <p>Jawatan</p>
                    <p>Gred</p>
                    <p>Bahagian</p>
                    <p>No. Telefon Pejabat</p>
                    <p>No. Telefon Bimbit</p>
                    <p>Email</p>
                </div>
                <div class="Info_desc">
                    <p>ROZAINI BINTI OTHMAN</p>
                    <p>780114156854</p>
                    <p>Penolong Pegawai Teknologi Maklumat</p>
                    <p>FA32</p>
                    <p>Bahagian Akaun</p>
                    <p>03 8911 6471</p>
                    <p>03 8911 6471</p>
                    <p>rozaini@komunikasi.gov.my</p>
                </div>
            </div>

            <div class="Flex_center mt-4">
                <button class="button_Pendaftaran1">Pendaftaran Tidak Berjaya</button>
                <button class="button_Pendaftaran2">Pendaftaran Berjaya</button>
            </div>
        </div>

        <!-- Modal Trigger Button -->
        <button type="button" class="btn custom_btn2" data-toggle="modal" data-target="#myModal">
            Modal 1
        </button>

        <!-- Modal -->
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-contents">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11.001 10h2v5h-2zM11 16h2v2h-2z" />
                                <path fill="currentColor"
                                    d="M13.768 4.2C13.42 3.545 12.742 3.138 12 3.138s-1.42.407-1.768 1.063L2.894 18.064a1.99 1.99 0 0 0 .054 1.968A1.98 1.98 0 0 0 4.661 21h14.678c.708 0 1.349-.362 1.714-.968a1.99 1.99 0 0 0 .054-1.968zM4.661 19L12 5.137L19.344 19z" />
                            </svg>
                            <h4>Adakah anda pasti?</h4>
                            <p class="modal_desc">Adakah anda pasti anda ingin berjayakan
                                pendaftaran pengguna ini</p>

                        </div>
                    </div>
                    <div class="modal-footer modal_align_footer">
                        <button type="button" class="custom_btn" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-primary">Ya</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn custom_btn2" data-toggle="modal" data-target="#myModal2">
          Modal 2
        </button>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="modal-contents">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z" />
                    <path fill="#fff" d="M13 17h-2v-6h2zm0-8h-2V7h2z" />
                  </svg>
                  <h4>Pengesahan diperlukan</h4>
                  <p class="modal_desc">Adakah anda ingin memadam rekod ini secara kekal?</p>
                </div>
              </div>
              <div class="modal-footer modal_align_footer">
                <button type="button" class="custom_btn" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger">Padam</button>
              </div>
            </div>
          </div>
        </div>



    </div>
@endsection
