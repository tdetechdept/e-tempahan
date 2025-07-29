@extends('layouts.main.app')

@section('content')
    <div class="pengurusan_pengguna_page">
        <h2 class="page_title">Pengurusan Pengguna</h2>
        <p class="breadcrumbs">Laman Utama / Pengurusan Pengguna / <span>Maklumat Pengguna</span></p>

        <div class="maklumat_pengguna">
            <h2 class="section_title">Semak Pendaftaran</h2>

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
                    @if(isset($user))
                        <p>{{ strtoupper($user->name) }}</p>
                        <p>{{ $user->id_number ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->position ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->grade ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->department ?? $user->section ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->office_number ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->phone_number ?? 'Tidak dinyatakan' }}</p>
                        <p>{{ $user->email }}</p>
                    @else
                        <p>ROZAINI BINTI OTHMAN</p>
                        <p>780114156854</p>
                        <p>Penolong Pegawai Teknologi Maklumat</p>
                        <p>FA32</p>
                        <p>Bahagian Akaun</p>
                        <p>03 8911 6471</p>
                        <p>03 8911 6471</p>
                        <p>rozaini@komunikasi.gov.my</p>
                    @endif
                </div>
            </div>

            <div class="Flex_center mt-4">
                @if(isset($user) && $user->status == 0)
                    <!-- For new users - show approval/rejection buttons -->
                    <div class="Usermanagement_button_align">
                    <button class="button_Pendaftaran1" onclick="openRejectionModal()">
                        Pendaftaran Tidak Berjaya
                    </button>
                    <button class="button_Pendaftaran2" onclick="openApprovalModal()">
                        Pendaftaran Berjaya
                    </button>
                    </div>
                @elseif(isset($user))
                    <!-- For existing users - show deactivation and update buttons -->
                    <div class="Usermanagement_button_align">
                    <button class="button_Pendaftaran1" onclick="openDeactivationModal()">
                        Nyahaktif Pengguna
                    </button>
                    <a href="{{ route('maklumat_pengguna_edit', $user->id) }}" class="button_Pendaftaran2">
                        Kemaskini Pengguna
                    </a>
                    </div>
                @else
                    <!-- Default buttons for demo -->
                    <div class="Usermanagement_button_align">
                    <button class="button_Pendaftaran1" onclick="openRejectionModal()">
                        Pendaftaran Tidak Berjaya
                    </button>
                    <button class="button_Pendaftaran2" onclick="openApprovalModal()">
                        Pendaftaran Berjaya
                    </button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Approval Modal -->
        <div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-contents">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                                <path fill="#fff" d="M13 17h-2v-6h2zm0-8h-2V7h2z"/>
                            </svg>
                            <h4>Adakah anda pasti?</h4>
                            <p class="modal_desc">Adakah anda pasti anda ingin meluluskan pendaftaran pengguna ini?</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_align_footer">
                        <button type="button" class="custom_btn" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-success" onclick="approveUser()">Ya, Luluskan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rejection Modal -->
        <div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-contents">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11.001 10h2v5h-2zM11 16h2v2h-2z"/>
                                <path fill="currentColor" d="M13.768 4.2C13.42 3.545 12.742 3.138 12 3.138s-1.42.407-1.768 1.063L2.894 18.064a1.99 1.99 0 0 0 .054 1.968A1.98 1.98 0 0 0 4.661 21h14.678c.708 0 1.349-.362 1.714-.968a1.99 1.99 0 0 0 .054-1.968zM4.661 19L12 5.137L19.344 19z"/>
                            </svg>
                            <h4>Adakah anda pasti?</h4>
                            <p class="modal_desc">Adakah anda pasti anda ingin menolak pendaftaran pengguna ini?</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_align_footer">
                        <button type="button" class="custom_btn" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger" onclick="rejectUser()">Ya, Tolak</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deactivation Modal -->
        <div class="modal fade" id="deactivationModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-contents">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11.001 10h2v5h-2zM11 16h2v2h-2z"/>
                                <path fill="currentColor" d="M13.768 4.2C13.42 3.545 12.742 3.138 12 3.138s-1.42.407-1.768 1.063L2.894 18.064a1.99 1.99 0 0 0 .054 1.968A1.98 1.98 0 0 0 4.661 21h14.678c.708 0 1.349-.362 1.714-.968a1.99 1.99 0 0 0 .054-1.968zM4.661 19L12 5.137L19.344 19z"/>
                            </svg>
                            <h4>Adakah anda pasti?</h4>
                            <p class="modal_desc">Adakah anda pasti anda ingin nyahaktifkan pengguna ini?</p>
                        </div>
                    </div>
                    <div class="modal-footer modal_align_footer">
                        <button type="button" class="custom_btn" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-warning" onclick="deactivateUser()">Ya, Nyahaktif</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('css')
    <style>
        .maklumat_pengguna {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .section_title {
            color: #495057;
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 25px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e9ecef;
        }

        .Info_content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .Info_title p {
            font-weight: 600;
            color: #495057;
            margin-bottom: 15px;
            padding: 8px 0;
        }

        .Info_title p span {
            color: #dc3545;
        }

        .Info_desc p {
            color: #6c757d;
            margin-bottom: 15px;
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .Flex_center {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .button_Pendaftaran1 {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 200px;
        }

        .button_Pendaftaran1:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
        }

        .button_Pendaftaran2 {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            min-width: 200px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .button_Pendaftaran2:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
            color: white;
            text-decoration: none;
        }

        /* Modal Styling */
        .modal-contents {
            text-align: center;
            padding: 20px;
        }

        .modal-contents svg {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
        }

        .modal-contents h4 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .modal_desc {
            color: #6c757d;
            font-size: 14px;
            line-height: 1.5;
        }

        .modal_align_footer {
            justify-content: center;
            gap: 15px;
        }

        .custom_btn {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 500;
        }

        .custom_btn:hover {
            background-color: #5a6268;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .Info_content {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .Flex_center {
                flex-direction: column;
                align-items: center;
            }

            .button_Pendaftaran1,
            .button_Pendaftaran2 {
                width: 100%;
                max-width: 300px;
            }
        }
    </style>
    @endpush

    @push('js')
    <script>
        function openApprovalModal() {
            $('#approvalModal').modal('show');
        }

        function openRejectionModal() {
            $('#rejectionModal').modal('show');
        }

        function openDeactivationModal() {
            $('#deactivationModal').modal('show');
        }

        function approveUser() {
            @if(isset($user))
                updateUserStatus({{ $user->id }}, 2);
            @else
                alert('Pengguna diluluskan!');
                window.location.href = '{{ route("pengurusan_pengguna") }}';
            @endif
        }

        function rejectUser() {
            @if(isset($user))
                updateUserStatus({{ $user->id }}, 3);
            @else
                alert('Pendaftaran ditolak!');
                window.location.href = '{{ route("pengurusan_pengguna") }}';
            @endif
        }

        function deactivateUser() {
            @if(isset($user))
                updateUserStatus({{ $user->id }}, 5);
            @else
                alert('Pengguna dinyahaktifkan!');
                window.location.href = '{{ route("pengurusan_pengguna") }}';
            @endif
        }

        function updateUserStatus(userId, status) {
            $.ajax({
                url: `/super_admin/users/${userId}/update-status`,
                type: 'POST',
                data: {
                    status: status,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('.modal').modal('hide');
                    window.location.href = '{{ route("pengurusan_pengguna") }}';
                },
                error: function() {
                    alert('Ralat semasa mengemaskini status pengguna');
                }
            });
        }
    </script>
    @endpush
@endsection
