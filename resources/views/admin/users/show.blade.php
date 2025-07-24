@extends('layouts.main.app')

@section('title', 'User Management')

@section('breadcrumb')
	<div class="breadcrumb-section">
		<h1 class="breadcrumb-title">User Management</h1>
		<div class="breadcrumb-nav">
			<!-- <span>Home</span> -->
			<a href="{{ route('home') }}" class="text-decoration-none text-dark">Home</a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.index') }}" class="text-decoration-none text-dark">User Management</a>
			<span class="mx-2">/</span>
			<a href="{{ route('users.show', $user->id) }}" class="text-decoration-none text-success">User Information</a>
		</div>
	</div>
@endsection

@section('content')
	<main class="main-content">
		<!-- Content Card -->
		<div class="content-card mb-3">
			<div class="eb-create-room-information">
				<h3>User Information</h3>


				<!-- <div class="eb-form-section"> -->
				<table class="table table-borderless">
					<hr class="my-3">
					<tr>
						<th>Officer Name</th>
						<td style="border: none;">{{ $user->name }}</td>
					</tr>
					<tr>
						<th>No. Identification Card</th>
						<td style="border: none;">{{ $user->id_number }}</td>
					</tr>
					<tr>
						<th>Position</th>
						<td style="border: none;">{{ $user->position }}</td>
					</tr>
					<tr>
						<th>Grade</th>
						<td style="border: none;">{{ $user->grade }}</td>
					</tr>
					<tr>
						<th>Section</th>
						<td style="border: none;">{{ $user->section }}</td>
					</tr>
					<tr>
						<th>No. Office Phone</th>
						<td style="border: none;">{{ $user->office_number }}</td>
					</tr>
					<tr>
						<th>No. Mobile Phone</th>
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
						Deactivate User
					</button>
					<a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary eb-form-submit">Update User</a>
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
						<h3>Are you sure?</h3>
						<p>Are you sure you want to deactivate this user?</p>
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
		function openDeactivateModal(button) {
			const url = button.getAttribute('data-url');
			document.getElementById('dynamicDeactivateForm').action = url;

			const modal = new bootstrap.Modal(document.getElementById('deactivateUserModal'));
			modal.show();
		}
	</script>
@endsection