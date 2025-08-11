@extends('layouts.main.app')

@section('title', 'Kemaskini Bilik')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Bilik</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.index') }}" class="text-decoration-none text-dark">Senarai Bilik</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.show', $room->id) }}" class="text-decoration-none text-dark">Maklumat</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.edit', $room->id) }}" class="text-decoration-none text-success">Kemaskini Bilik</a>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <h3>Kemaskini Maklumat Bilik</h3>
                <p>Sila kemaskini maklumat dibawah.</p>

                <div class="eb-form-section">
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <!-- Name Bilik -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomName">Name Bilik</label>
                                    <input type="text" name="room_name" value="{{ old('room_name', $room->room_name) }}"
                                        class="form-control" id="roomName">
                                    @error('room_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Penerangan</label>
                                    <input type="text" name="description"
                                        value="{{ old('description', $room->description) }}" class="form-control"
                                        id="description">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacity">kapasiti</label>
                                    <input type="text" name="room_capacity"
                                        value="{{ old('room_capacity', $room->room_capacity) }}" class="form-control"
                                        id="capacity">
                                    @error('room_capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            @php
                                use App\Models\Room;
                            @endphp
                            <!-- Status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status Bilik</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="{{ Room::STATUS_ACTIVE }}"
                                            {{ (int) old('status', $room->status) === Room::STATUS_ACTIVE ? 'selected' : '' }}>
                                            Aktif
                                        </option>
                                        <option value="{{ Room::STATUS_INACTIVE }}"
                                            {{ (int) old('status', $room->status) === Room::STATUS_INACTIVE ? 'selected' : '' }}>
                                            Tidak Pelan
                                        </option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Picture -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picture">Gambar</label>
                                    @if ($room->picture)
                                        <div class="mb-2">
                                            <img src="{{ asset(Room::IMAGE_PATH . '/' . $room->picture) }}"
                                                alt="{{ $room->room_name }}" class="rounded img-thumbnail"
                                                style="width: 120px; height: 90px; object-fit: cover;" />
                                        </div>
                                    @endif

                                    <div class="eb-uplaod-file position-relative">
                                        <input type="file" name="picture" class="form-control" id="picture">
                                        <span
                                            class="material-symbols-rounded position-absolute top-50 end-0 translate-middle-y pe-3">upload</span>
                                        <p class="form-text" id="pictureName"></p>
                                    </div>
                                    <p class="form-text" id="pictureChangedMessage" style="display: none; color: red;">Anda telah menukar gambar.</p>
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Layout -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="layoutPlan">Layout / Pelan</label>
                                    @if ($room->layout)
                                        <div class="mb-2">
                                            <img src="{{ asset(Room::PLAN_PATH . '/' . $room->layout) }}"
                                                alt="{{ $room->room_name }}" class="rounded img-thumbnail"
                                                style="width: 120px; height: 90px; object-fit: cover;" />
                                        </div>
                                    @endif
                                    <div class="eb-uplaod-file position-relative">
                                        <input type="file" name="layout_plan" class="form-control" id="layoutPlan">
                                        <span
                                            class="material-symbols-rounded position-absolute top-50 end-0 translate-middle-y pe-3">upload</span>
                                        <p class="form-text" id="layoutName"></p>
                                    </div>
                                    <p class="form-text" id="layoutChangedMessage" style="display: none; color: red;">Anda telah mengubah Tata Layout/Pelan.</p>
                                    @error('layout_plan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @if(session('layout_changed'))
                                        <p class="form-text" style="color: red;">
                                            Anda telah mengubah Layout/Pelan.
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Nama PIC -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pic_name">Nama PIC</label>
                                    <input type="text" name="pic_name" id="pic_name" class="form-control"
                                        value="{{ old('pic_name', $room->pic_name ?? '') }}">
                                    @error('pic_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- No. Telefon Pejabat PIC -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pic_phone">No. Telefon Pejabat PIC</label>
                                    <input type="text" name="pic_phone" id="pic_phone" class="form-control"
                                        value="{{ old('pic_phone', $room->pic_phone ?? '') }}">
                                    @error('pic_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Emel PIC -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pic_email">Emel PIC</label>
                                    <input type="email" name="pic_email" id="pic_email" class="form-control"
                                        value="{{ old('pic_email', $room->pic_email ?? '') }}">
                                    @error('pic_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Level -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <input type="text" name="level" id="level" class="form-control" min="1"
                                        value="{{ old('level', $room->level ?? '') }}">
                                    @error('level')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Facilities -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facilityInput">Fasiliti</label>
                                    <div class="gap-2 mb-2 d-flex">
                                        <input type="text" id="facilityInput" class="form-control"
                                            placeholder="Enter facility...">
                                    </div>
                                    <div class="eb-form-buttons">
                                        <button type="button" class="btn btn-primary eb-form-btn"
                                            onclick="addFacility()">Tambah</button>
                                    </div>
                                    <div id="facilitiesList" class="flex-wrap gap-2 mb-2 d-flex"></div>
                                    <input type="hidden" name="facilities" id="facilitiesHidden"
                                        value="{{ old('facilities', implode(',', $room->facilities ?? [])) }}">
                                    @error('facilities')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="eb-form-btn-submit">
                                <button type="submit" class="btn btn-secondary eb-form-submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    {{-- </div> --}}

    @push('js')
    <script>
    // document.getElementById('picture').addEventListener('change', function () {
    //     const message = document.getElementById('pictureChangedMessage');
    //     if (this.files.length > 0) {
    //         message.style.display = 'block';
    //     } else {
    //         message.style.display = 'none';
    //     }
    // });

    // document.getElementById('layoutPlan').addEventListener('change', function () {
    //     const message = document.getElementById('layoutChangedMessage');
    //     if (this.files.length > 0) {
    //         message.style.display = 'block';
    //     } else {
    //         message.style.display = 'none';
    //     }
    // });

        const facilities = @json(old('facilities') ? explode(',', old('facilities')) : $room->facilities ?? []);

        function addFacility() {
            const input = document.getElementById('facilityInput');
            const value = input.value.trim();
            if (value && !facilities.includes(value)) {
                facilities.push(value);
                renderFacilities();
                input.value = '';
            }
        }

        function removeFacility(index) {
            facilities.splice(index, 1);
            renderFacilities();
        }

        function renderFacilities() {
            const list = document.getElementById('facilitiesList');
            const hidden = document.getElementById('facilitiesHidden');
            list.innerHTML = '';
            facilities.forEach((item, i) => {
                const tag = document.createElement('span');
                tag.className =
                    'badge badge-primary rounded-pill px-3 py-2 mr-2 mb-2 d-inline-flex align-items-center';
                tag.innerHTML = `
                ${item}
                <button type="button" class="ml-2 close text-white" style="font-size: 1rem;" onclick="removeFacility(${i})">
                    &times;
                </button>`;
                list.appendChild(tag);
            });
            hidden.value = facilities.join(',');
        }

        function validateForm() {
            return true;
        }

        // File input preview names
        document.getElementById('picture')?.addEventListener('change', function() {
            document.getElementById('pictureName').textContent = this.files[0]?.name || '';
        });

        document.getElementById('layoutPlan')?.addEventListener('change', function() {
            document.getElementById('layoutName').textContent = this.files[0]?.name || '';
        });

        document.addEventListener('DOMContentLoaded', function() {
            renderFacilities();
        });
    </script>
    @endpush
@endsection
