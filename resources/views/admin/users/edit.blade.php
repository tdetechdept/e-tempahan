@extends('layouts.main.app')

@section('title', 'Kemaskini Pengguna')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka </a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.index')}}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.show', $user->id) }}" class="text-decoration-none text-dark">Maklumat Pengguna</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.edit', $user->id) }}" class="text-decoration-none breadcrumb-active">Kemaskini Maklumat Pengguna</a>
        </div>
    </div>
@endsection

@section('title', 'Update User Information')

@section('content')
<form id="updateUserForm" method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <h3>Kemaskini Maklumat Pengguna</h3>
                <p>Sila mengemaskini maklumat pengguna dibawah </p>
                    
                <div class="eb-form-section">
                    <table class="table table-borderless">
                        <tr>
                            <th class="text-end align-middle">Nama Pegawai *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                               @error('name')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                            </td>
                           
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Kad Pengenalan *</th>
                            <td style="border: none;">
                                <input type="text" class="formattedInputICWithoutDash form-control" name="identity_card" value="{{ old('identity_card', $user->id_number) }}">
                                @error('identity_card')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                             
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Jawatan *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="position" value="{{ old('position', $user->position) }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                             
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Gred *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="grade" value="{{ old('grade', $user->grade) }}">
                                @error('grade')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Bahagian *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="section" value="{{ old('section', $user->section) }}">
                                @error('section')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Peranan *</th>
                            <td style="border: none;">
                                <select name="role" class="form-control" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Telefon Pejabat *</th>
                            <td style="border: none;">
                                <input type="text" class="formattedInputPhoneNumber form-control" name="phone_office" value="{{ old('phone_office', $user->office_number) }}">
                                @error('phone_office')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                            
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Telefon Bimbit *</th>
                            <td style="border: none;">
                                <input type="text" class="formattedInputPhoneNumber form-control" name="phone_mobile" value="{{ old('phone_mobile', $user->phone_number) }}">
                                @error('phone_mobile')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Emel *</th>
                            <td style="border: none;">
                                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </td>
                        </tr>
                    </table>
                    <div class="eb-form-btn-submit">
                        <button type="button" class="btn btn-secondary eb-form-submit" onclick="openUpdateModal()">Kemaskini Pengguna</button>
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
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin mengemaskini maklumat pengguna ini</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
    </main>
</form>    
    @push('js')
    <script>
        function openUpdateModal() {
            console.log('Opening modal...');
            const modal = new bootstrap.Modal(document.getElementById('UpdateUserModal'));
            modal.show();
        }
        
        // Handle modal form submission
        document.getElementById('dynamicUpadateForm').addEventListener('submit', function(e) {
            e.preventDefault();
            console.log('Modal form submitted, redirecting to main form...');
            
            // Check if file is selected
            const fileInput = document.querySelector('input[name="image"]');
            if (fileInput && fileInput.files.length > 0) {
                console.log('File selected:', fileInput.files[0].name);
            } else {
                console.log('No file selected');
            }
            
            // Submit the main form instead of the modal form
            document.getElementById('updateUserForm').submit();
        });
    </script>
     @endpush
@endsection
