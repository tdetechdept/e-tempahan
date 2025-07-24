@extends('layouts.main.app')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">User Management</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.index')}}" class="text-decoration-none text-dark">User Management</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none text-dark">User Information</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.edit', $user->id) }}" class="text-decoration-none text-success">Edit User Information</a>
        </div>
    </div>
@endsection

@section('title', 'Update User Information')

@section('content')
<form id="updateUserForm" method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <h3>Update User Information</h3>
                <p>Please update the user information below.</p>
                    
                <div class="eb-form-section">
                    <table class="table table-borderless">
                        <tr>
                            <th class="text-end align-middle">Officer Name *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                               @error('name')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </td>
                           
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Identity Card *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="identity_card" value="{{ old('identity_card', $user->identification) }}">
                                @error('identity_card')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                             
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Position *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="position" value="{{ old('position', $user->position) }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                             
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Grade *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="grade" value="{{ old('grade', $user->grade) }}">
                                @error('grade')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Section *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="section" value="{{ old('section', $user->section) }}">
                                @error('section')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Office Phone *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="phone_office" value="{{ old('phone_office', $user->office_number) }}">
                                @error('phone_office')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Mobile Phone *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="phone_mobile" value="{{ old('phone_mobile', $user->phone_number) }}">
                                @error('phone_mobile')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Email *</th>
                            <td style="border: none;">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </td>
                        </tr>
                    </table>
                    <div class="eb-form-btn-submit">
                        <button type="button" class="btn btn-secondary eb-form-submit" onclick="openUpdateModal()">Update User</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade eb-delete-popup" id="UpdateUserModal" tabindex="-1" role="dialog"
		aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="dynamicUpadateForm" method="POST">
				@csrf
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Are you sure?</h3>
						<p>Are you sure you want to update this user information?</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
							<button type="submit" class="btn btn-primary">Yes</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    </main>
</form>    
    <script>
        function openUpdateModal() {
            const modal = new bootstrap.Modal(document.getElementById('UpdateUserModal'));
            modal.show();
        }
        
    </script>

@endsection
