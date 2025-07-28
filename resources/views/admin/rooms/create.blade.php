@extends('layouts.main.app')

@section('title', 'Tambah Bilik')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Bilik</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.index') }}" class="text-decoration-none text-dark">Senarai Bilik</a>
            <span class="mx-2">/</span>
            <a href="{{ route('rooms.create') }}" class="text-decoration-none text-success">Tambah Bilik</a>
        </div>
    </div>
@endsection

@section('content')

    <main class="main-content">
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Cipta Maklumat Bilik</h3>
                <p>Sila lengkapkan maklumat penciptaan dibawah.</p>

                <div class="eb-form-section">
                    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf
                        <div class="row">
                            <!-- Name Bilik -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomName">Name Bilik</label>
                                    <input type="text" name="room_name" value="{{ old('room_name') }}"
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
                                    <input type="text" name="description" value="{{ old('description') }}"
                                        class="form-control" id="description">
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacity">kapasiti</label>
                                    <input type="text" name="room_capacity" value="{{ old('room_capacity') }}"
                                        class="form-control" id="capacity">
                                    @error('room_capacity')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <!-- Status -->
                            @php
                                use App\Models\Room;
                                $selectedStatus = old('status', '');
                            @endphp

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status">Status Bilik</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="" {{ $selectedStatus === '' ? 'selected' : '' }}>Select
                                            Status</option>
                                        <option value="{{ Room::STATUS_ACTIVE }}"
                                            {{ (string) $selectedStatus === (string) Room::STATUS_ACTIVE ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="{{ Room::STATUS_INACTIVE }}"
                                            {{ (string) $selectedStatus === (string) Room::STATUS_INACTIVE ? 'selected' : '' }}>
                                            Inactive
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
                                    <div class="eb-uplaod-file position-relative">
                                        <input type="file" name="picture" class="form-control" id="picture">
                                        <span
                                            class="material-symbols-rounded position-absolute top-50 end-0 translate-middle-y pe-3">upload</span>
                                        <p class="form-text" id="pictureName"></p>
                                    </div>
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Layout -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="layout_plan">Layout / Pelan</label>
                                    <div class="eb-uplaod-file position-relative">
                                        <input type="file" name="layout_plan" class="form-control" id="layoutPlan">
                                        <span
                                            class="material-symbols-rounded position-absolute top-50 end-0 translate-middle-y pe-3">upload</span>
                                        <p class="form-text" id="layoutName"></p>
                                    </div>
                                    @error('layout_plan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Level -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <input type="text" name="level" id="level" class="form-control" min="1"
                                        value="{{ old('level') }}">
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
                                    <div id="facilitiesList" class="flex-wrap gap-2 mb-2 mt-2 d-flex"
                                        style="display: flex; flex-wrap: wrap; margin-bottom: 0.5rem;"></div>
                                    <input type="hidden" name="facilities" id="facilitiesHidden"
                                        value="{{ old('facilities') }}">
                                    @error('facilities')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="eb-form-btn-submit">
                            <button type="Submit" class="btn btn-secondary eb-form-submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    @push('js')
    <script>
        document.getElementById('picture').addEventListener('change', function() {
            document.getElementById('pictureName').textContent = this.files[0]?.name || '';
        });

        document.getElementById('layoutPlan').addEventListener('change', function() {
            document.getElementById('layoutName').textContent = this.files[0]?.name || '';
        });

        const facilities = [];

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
    </script>
    @endpush
@endsection
