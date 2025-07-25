@extends('layouts.main.app')

@section('title', 'User Management')

@section('breadcrumb')
	<div class="breadcrumb-section">
		<h1 class="breadcrumb-title">Pengurusan Pengguna</h1>
		<div class="breadcrumb-nav">
			<!-- <span>Home</span> -->
			<a href="{{ route('home') }}" class="text-decoration-none text-dark">Laman Utama</a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.index') }}" class="text-decoration-none text-dark">Pengurusan Pengguna</a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.show', $user->id) }}" class="text-decoration-none text-success">Maklumat Pengguna</a>
		</div>
	</div>
@endsection

@section('content')
	<main class="main-content">
		<!-- Content Card -->
		<div class="content-card mb-3">
			<div class="eb-create-room-information">
				<h3>Semak Pendaftaran</h3>


				<!-- <div class="eb-form-section"> -->
				<table class="table table-borderless">
					<hr class="my-3">
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
					<button type="button" class="btn btn-warning eb-form-submit eb-delete-btn"
						onclick="openDeactivateModal(this)" data-url="{{ route('users.deactivate', $user->id) }}">
						Pendaftaran Tidak Berjaya
					</button>
					<a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary eb-form-submit">Pendaftaran Berjaya</a>
				</div>
			</div>
		</div>
	</main>

	<!-- User Deactivate Modal -->
	<div class="modal fade eb-delete-popup" id="deactivateUserModal" tabindex="-1" role="dialog"
		aria-labelledby="deactivateUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<form id="dynamicDeactivateForm" method="POST">
				@csrf
				<div class="modal-content">
					<div class="modal-body text-center">
						<div class="eb-delete-icon mb-3"></div>
						<h3>Adakah anda pasti?</h3>
						<p>Adakah anda pasti anda ingin berjayakan pendaftaran pengguna ini</p>
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
		function openDeactivateModal(button) {
			const url = button.getAttribute('data-url');
			document.getElementById('dynamicDeactivateForm').action = url;

			const modal = new bootstrap.Modal(document.getElementById('deactivateUserModal'));
			modal.show();
		}
	</script>
@endsection