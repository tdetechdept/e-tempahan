@extends('layouts.main.app')

@section('title', 'Maklumat Bilik')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Bilik</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.index') }}" class="text-decoration-none text-dark">Senarai Bilik</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.show', $room->id) }}" class="text-decoration-none breadcrumb-active">Maklumat</a>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomName">Profil Bilik</label>
                                    <input type="text" class="form-control" id="roomName" placeholder=""
                                        value="{{ $room->room_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Penerangan</label>
                                    <input type="text" class="form-control" id="description" placeholder=""
                                        value="{{ $room->description }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacity">kapasiti</label>
                                    <input type="text" class="form-control" id="capacity" placeholder=""
                                        value="{{ $room->room_capacity }} people" readonly>
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

                            {{-- PIC Name --}}
                            @if ($room->pic_name)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pic_name">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="pic_name" placeholder=""
                                            value="{{ $room->pic_name }}" readonly>
                                    </div>
                                </div>
                            @endif

                            {{-- PIC Phone --}}
                            @if ($room->pic_phone)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pic_phone">No Telefon Pegawai</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="text" class="form-control" id="pic_phone" placeholder=""
                                                value="{{ $room->pic_phone }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- PIC Email --}}
                            @if ($room->pic_email)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pic_email">Email Pegawai</label>
                                        <div class="d-flex align-items-center gap-2">
                                            <input type="text" class="form-control" id="pic_email" placeholder=""
                                                value="{{ $room->pic_email }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picture">Gambar</label>
                                    @if ($room->picture)
                                        <div class="eb-uplaod-file eb-readonly-box">
                                            <img src="{{ asset('images/rooms/' . $room->picture) }}" class="img-fluid" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="layout">Layout / Pelan</label>
                                    @if ($room->layout)
                                        <div class="eb-uplaod-file eb-readonly-box">
                                            <img src="{{ asset('images/plans/' . $room->layout) }}" class="img-fluid" />
                                        </div>
                                    @else
                                        <p class="fst-italic text-muted">Tiada tata letak disediakan</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="eb-form-btn-submit eb-readonly-btns">
                            <button type="button" class="btn btn-secondary eb-form-submit eb-delete-btn" data-toggle="modal"
                                onclick="openDeleteModal(this)"
                                data-url="{{ route('rooms.destroy', $room->id) }}">Padam</button>
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-secondary eb-form-submit">
                                KemasKini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Custom Delete Modal -->
    <div class="modal fade eb-delete-popup" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form id="dynamicDeleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="eb-delete-icon mb-3"></div>
                        <h3>Adakah anda pasti?</h3>
                        <p>Adakah anda pasti mahu memadam bilik ini?</p>
                        <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('js')
    <script>
        function openDeleteModal(button) {
            const deleteUrl = button.getAttribute('data-url');
            const form = document.getElementById('dynamicDeleteForm');
            form.action = deleteUrl;

            const modal = new bootstrap.Modal(document.getElementById('delete'));
            modal.show();
        }
    </script>
    @endpush
@endsection
