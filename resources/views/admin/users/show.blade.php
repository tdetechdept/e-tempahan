@extends('layouts.main.app')

@section('title', content: 'Pengurusan Pengguna')

@section('breadcrumb')
	<div class="breadcrumb-section">
		<h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
		<div class="breadcrumb-nav">
			<!-- <span>Home</span> -->
			<a href="{{ route('home') }}" class="text-decoration-none text-dark">Papan Pemuka </a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.index') }}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.show', $user->id) }}" class="text-decoration-none breadcrumb-active">Maklumat Pengguna</a>
		</div>
	</div>
@endsection

@section('content')
	<main class="main-content">
		<!-- Content Card -->
		<div class="content-card mb-3">
			<div class="eb-create-room-information">
				<h3>Maklumat Pengguna</h3>

				<!-- <div class="eb-form-section"> -->
				<table class="table table-borderless">
					<hr class="my-3">
					<tr>
						<th>Gambar Profil</th>
						<td style="border: none;">
							@if($user->image)
								                        <img src="{{ asset('uploads/users/' . $user->image) }}?v={{ time() }}" alt="User Image" width="120">
							@else
								Tiada gambar
							@endif
						</td>
					</tr>
					<tr>
						<th>Nama Pegawai</th>
						<td style="border: none;">{{ $user->name }}</td>
					</tr>
					<tr>
						<th>No. Kad Pengenalan</th>
						<td style="border: none;">{{ $user->id_number }}</td>
					</tr>
					<tr>
						<th>Jawatan</th>
						<td style="border: none;">{{ $user->position }}</td>
					</tr>
					<tr>
						<th>Gred</th>
						<td style="border: none;">{{ $user->grade }}</td>
					</tr>
					<tr>
						<th>Bahagian</th>
						<td style="border: none;">{{ $user->section }}</td>
					</tr>
					<tr>
						<th>No. Telefon Pejabat</th>
						<td style="border: none;">{{ $user->office_number }}</td>
					</tr>
					<tr>
						<th>No. Telefon Bimbit</th>
						<td style="border: none;">{{ $user->phone_number }}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td style="border: none;">{{ $user->email }}</td>
					</tr>
				</table>
				<hr class="my-4">

				<div class="eb-form-btn-submit eb-readonly-btns">
					<div class="d-flex justify-content-between align-items-center w-100">
						
						@if ($user->status == 0)
							<!-- Unsuccessful Registration -->
							<div class="Senarai_pengguna_pagination">
								<button type="button" class="btn me-2"
									onclick="openModal('unsuccessfulModal', 'unsuccessfulForm', '{{ route('admin.users.updateStatus', $user->id) }}')">
									Pendaftaran Tidak Berjaya
								</button>

								<!-- Successful Registration -->
								<button type="button" class="btn btn-secondary eb-form-submit"
									onclick="openModal('successfulModal', 'successfulForm', '{{ route('admin.users.updateStatus', $user->id) }}')">
									Pendaftaran Berjaya
								</button>
							</div>
						@elseif ($user->status == 5)
							<!-- Deactivated user - show activate button -->
							<div class="Senarai_pengguna_pagination">
								<button type="button" class="btn btn-success me-2"
									onclick="openModal('activateUserModal', 'activateUserForm', '{{ route('users.updateStatus', $user->id) }}')">
									Aktifkan Pengguna
								</button>
								<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary eb-form-submit me-2">
									Kemaskini Pengguna
								</a>
							</div>
						@else
							<!-- Otherwise, show deactivate/edit user buttons -->
							<div class="Senarai_pengguna_pagination">
								<button type="button" class="btn coustome-btn_2_red me-2"
									onclick="openModal('deactivateUserModal', 'deactivateUserForm', '{{ route('users.deactivate', $user->id) }}')">
									Nyahaktif Pengguna
								</button>
								<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-secondary eb-form-submit me-2">
									Kemaskini Pengguna
								</a>
							</div>
						@endif
						
						<!-- Audit History Button - Links to Super Admin Audit -->
						<!-- <a href="{{ route('audit') }}?username={{ urlencode($user->name) }}" class="btn btn-outline-info">
							<i class="fas fa-history"></i> Lihat Audit
						</a> -->
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- Unsuccessful Registration Modal -->
	<div class="modal fade eb-delete-popup" id="unsuccessfulModal" tabindex="-1" role="dialog"
		aria-labelledby="unsuccessfulModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="unsuccessfulForm" method="POST">
				@csrf
				<input type="hidden" name="status" value="3">
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin menolak pendaftaran pengguna ini?</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- User Deactivate Modal -->
	<div class="modal fade eb-delete-popup" id="deactivateUserModal" tabindex="-1" role="dialog"
		aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="deactivateUserForm" method="POST">
				@csrf
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin menyahaktifkan pengguna ini?</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Confirm Status Update Modal -->
	<div class="modal fade eb-delete-popup" id="successfulModal" tabindex="-1" role="dialog"
		aria-labelledby="successfulModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="successfulForm" method="POST">
				@csrf
				<input type="hidden" name="status" value="1">
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin berjayakan pendaftaran pengguna ini?</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Activate User Modal -->
	<div class="modal fade eb-delete-popup" id="activateUserModal" tabindex="-1" role="dialog"
		aria-labelledby="activateUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="activateUserForm" method="POST">
				@csrf
				<input type="hidden" name="status" value="2">
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin mengaktifkan pengguna ini?</p>
						<div class="eb-popup-btns d-flex justify-content-center gap-2 mt-4">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
							<button type="submit" class="btn btn-primary">Ya</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script>
		function openModal(modalId, formId, actionUrl) {
			const form = document.getElementById(formId);
			form.action = actionUrl;
			$('#' + modalId).modal('show');
		}
	</script>
@endsection