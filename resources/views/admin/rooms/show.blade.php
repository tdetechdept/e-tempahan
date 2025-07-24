@extends('layouts.main.app')

@section('title', 'Room Information')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Room</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Room List</span>
            <span class="mx-2">/</span>
            <span class="breadcrumb-active text-success">Room Information</span>
        </div>
    </div>
@endsection

@section('content')
    <main class="main-content">

        <!-- Content Card -->
        <div class="content-card mb-3">
            <div class="eb-create-room-information">
                <h3>Room Information</h3>
                <p>{{ $room->room_name }}</p>
                <div class="eb-form-section">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roomName">Room Name</label>
                                    <input type="text" class="form-control" id="roomName" placeholder=""
                                        value="{{ $room->room_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder=""
                                        value="{{ $room->description }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="capacity">Capacity</label>
                                    <input type="text" class="form-control" id="capacity" placeholder=""
                                        value="{{ $room->room_capacity }} people" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facilities ">Facilities </label>
                                    <input type="text" class="form-control" id="facilities" placeholder=""
                                        value="{{ is_array($room->facilities) ? implode(', ', $room->facilities) : $room->facilities }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    @if ($room->picture)
                                        <div class="eb-uplaod-file eb-readonly-box">
                                            <img src="{{ asset('images/rooms/' . $room->picture) }}" class="img-fluid" />
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="layout">Layout / Plan</label>
                                    @if ($room->layout)
                                        <div class="eb-uplaod-file eb-readonly-box">
                                            <img src="{{ asset('images/plans/' . $room->layout) }}" class="img-fluid" />
                                        </div>
                                    @else
                                        <p class="fst-italic text-muted">No layout provided</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="eb-form-btn-submit eb-readonly-btns">
                            <button type="button" class="btn btn-secondary eb-form-submit eb-delete-btn"
                                data-toggle="modal" onclick="openDeleteModal(this)"
                                data-url="{{ route('rooms.destroy', $room->id) }}">Delete</button>
                            <a href="{{ route('rooms.edit', $room) }}" class="btn btn-secondary eb-form-submit">Update</a>
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
                        <h3>Are you sure?</h3>
                        <p>Are you sure you want to delete this room?</p>
                        <div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function openDeleteModal(button) {
            const deleteUrl = button.getAttribute('data-url');
            const form = document.getElementById('dynamicDeleteForm');
            form.action = deleteUrl;

            const modal = new bootstrap.Modal(document.getElementById('delete'));
            modal.show();
        }
    </script>
@endsection
