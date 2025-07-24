@extends('layouts.main.app')

@section('title', 'Edit Room')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Room</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Room List</span>
            <span class="mx-2">/</span>
            <span class="breadcrumb-active">Edit Room</span>
        </div>
    </div>
@endsection

@section('content')
    {{-- <div class="py-2 container-fluid"> --}}
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <h3>Edit Room Information</h3>
                <p>Please update the information below.</p>

                <div class="eb-form-section">
                    <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data"
                        onsubmit="return validateForm()">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <!-- Room Name -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomName">Room Name</label>
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
                                    <label for="description">Description</label>
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
                                    <label for="capacity">Capacity</label>
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
                                    <label for="status">Room Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="{{ Room::STATUS_ACTIVE }}"
                                            {{ (int) old('status', $room->status) === Room::STATUS_ACTIVE ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="{{ Room::STATUS_INACTIVE }}"
                                            {{ (int) old('status', $room->status) === Room::STATUS_INACTIVE ? 'selected' : '' }}>
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
                                    <label for="picture">Picture</label>
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
                                    @error('picture')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Layout -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="layoutPlan">Layout / Plan</label>
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
                                        value="{{ old('level', $room->level ?? '') }}">
                                    @error('level')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Facilities -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facilityInput">Facilities</label>
                                    <div class="gap-2 mb-2 d-flex">
                                        <input type="text" id="facilityInput" class="form-control"
                                            placeholder="Enter facility...">
                                    </div>
                                    <div class="eb-form-buttons">
                                        <button type="button" class="btn btn-primary eb-form-btn"
                                            onclick="addFacility()">Add</button>
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
                                <button type="submit" class="btn btn-secondary eb-form-submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    {{-- </div> --}}

    {{-- JS for handling uploads and facilities --}}
    <script>
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
@endsection
