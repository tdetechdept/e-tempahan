@extends('layouts.main.app')

@section('title', 'Daftar Pengguna Baharu')

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
        <div class="breadcrumb-nav">
            <a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.index')}}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
            <span class="mx-2">/</span>
            <a href="{{ route('users.create') }}" class="text-decoration-none breadcrumb-active">Daftar Pengguna Baharu</a>
        </div>
    </div>
@endsection

@section('content')
<form id="createUserForm" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @csrf
    <main class="main-content">
        <div class="content-card">
            <div class="eb-create-room-information">
                <h3>Daftar Pengguna Baharu</h3>
                <p>Sila isi maklumat pengguna baharu di bawah</p>
                    
                <div class="eb-form-section">
                    <table class="table table-borderless">
                        <tr>
                            <th class="text-end align-middle">Nama Pegawai *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Kad Pengenalan *</th>
                            {{-- <td style="border: none;">
                                <input type="text" class="form-control" name="identity_card" value="{{ old('identity_card') }}">
                                @error('identity_card')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td> --}}
                            <td>
                                <input type="text" class="form-control" name="id_number" value="{{ old('id_number') }}">
                                @error('id_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Jawatan *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="position" value="{{ old('position') }}">
                                @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Gred *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="grade" value="{{ old('grade') }}">
                                @error('grade')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Bahagian *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="section" value="{{ old('section') }}">
                                @error('section')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Peranan *</th>
                            <td style="border: none;">
                                <select name="role" class="form-control">
                                    <option value="">-- Pilih Peranan --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}" {{ old('role') == $role->name ? 'selected' : '' }}>
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
                                <input type="text" class="form-control" name="phone_office" value="{{ old('phone_office') }}">
                                @error('phone_office')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">No. Telefon Bimbit *</th>
                            <td style="border: none;">
                                <input type="text" class="form-control" name="phone_mobile" value="{{ old('phone_mobile') }}">
                                @error('phone_mobile')
                                   <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Emel *</th>
                            <td style="border: none;">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Kata Laluan *</th>
                            <td style="border: none;">
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th class="text-end align-middle">Sahkan Kata Laluan *</th>
                            <td style="border: none;">
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </td>
                        </tr>
                    </table>
                    <div class="eb-form-btn-submit">
                        <button type="button" class="btn btn-primary eb-form-submit" onclick="openCreateModal()">Daftar Pengguna</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Confirmation -->
        <div class="modal fade eb-delete-popup" id="CreateUserModal" tabindex="-1" role="dialog"
		aria-labelledby="createUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="dynamicCreateForm" method="POST">
				@csrf
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti ingin mendaftarkan pengguna baharu ini?</p>
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
    function openCreateModal() {
        console.log('Opening modal...');
        const modal = new bootstrap.Modal(document.getElementById('CreateUserModal'));
        modal.show();
    }
    
    document.getElementById('dynamicCreateForm').addEventListener('submit', function(e) {
        e.preventDefault();
        console.log('Modal confirmed, submitting main form...');
        document.getElementById('createUserForm').submit();
    });
</script>
@endpush
@endsection
