@extends('layouts.main.app')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">User Management</h1>
        <div class="breadcrumb-nav">
            <span>Home Page</span>
            <span class="mx-2">/</span>
            <span>User Management</span>
            <span class="mx-2">/</span>
            <span class="breadcrumb-active">User Information</span>
        </div>
    </div>
@endsection

@section('title', 'Update User Information')

@section('content')
    <div class="py-4 container-fluid">
    <h4 class="mb-4 fw-bold">Update User Information</h4>

    <div class="border-0 shadow-sm card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Officer Name *</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No. Identity Card *</label>
                        <input type="text" class="form-control" name="identity_card" value="{{ old('identity_card', $user->identification) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Position *</label>
                        <input type="text" class="form-control" name="position" value="{{ old('position', $user->position) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Grade *</label>
                        <input type="text" class="form-control" name="grade" value="{{ old('grade', $user->grade) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Section *</label>
                        <input type="text" class="form-control" name="section" value="{{ old('section', $user->section) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No. Office Phone *</label>
                        <input type="text" class="form-control" name="phone_office" value="{{ old('phone_office', $user->phone_office) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No. Mobile Phone *</label>
                        <input type="text" class="form-control" name="phone_mobile" value="{{ old('phone_mobile', $user->phone_mobile) }}">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                <div class="eb-form-btn-submit">
                    <button type="Submit" class="btn btn-secondary eb-form-submit">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
