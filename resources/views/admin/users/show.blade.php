@extends('layouts.main.app')

@section('title', 'User Management')

@section('content')
<div class="container">
    <h1>Check Registration</h1>
    <table class="table">
        <tr>
            <th>Officer Name</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>No. Identification Card </th>
            <td>{{ $user->identification }}</td>
        </tr>
        <tr>
            <th>Position</th>
            <td>{{ $user->position }}</td>
        </tr>
        <tr>
            <th>Grade</th>
            <td>{{ $user->grade }}</td>
        </tr>
        <tr>
            <th>Section</th>
            <td>{{ $user->section }}</td>
        </tr>
        <tr>
            <th>No. Office Phone</th>
            <td>{{ $user->phone_office }}</td>
        </tr>
        <tr>
            <th>No. Mobile Phone</th>
            <td>{{ $user->phone_mobile }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
    </table>
</div>
<div class="d-flex justify-content-between mt-4">
    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#deactivateUserModal"> Deactivate User </button>
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary">Update User</a>
</div>

<!-- Deactivate User Modal -->
<div class="modal fade" id="deactivateUserModal" tabindex="-1" role="dialog" aria-labelledby="deactivateUserModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content text-center p-4">

      <div class="mb-3">
        <svg width="32" height="32" fill="currentColor" class="bi bi-exclamation-triangle text-warning" viewBox="0 0 16 16">
          <path d="M7.938 2.016a.13.13 0 0 1 .125 0l6.857 11.856c.04.07.04.16 0 .23a.13.13 0 0 1-.125.07H1.205a.13.13 0 0 1-.125-.07.145.145 0 0 1 0-.23L7.938 2.016zm.813.384L1.894 14h12.212L8.75 2.4zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm.1-4.995a.905.905 0 0 0-.9.995l.35 3.5a.5.5 0 0 0 .998 0l.35-3.5a.905.905 0 0 0-.898-.995z"/>
        </svg>
      </div>

      <h5 id="deactivateUserModalTitle" class="font-weight-bold mb-2">Are you sure?</h5>
      <p class="mb-4">Are you sure you want to deactivate this user information?</p>

      <div class="d-flex justify-content-center gap-2">
        <button type="button" class="btn btn-outline-secondary mr-2" data-dismiss="modal">No</button>
        <form action="{{ route('users.deactivate', $user->id) }}" method="POST" class="d-inline">
          @csrf
          <button type="submit" class="btn text-white" style="background-color: #00A39F;">Yes</button>
        </form>
      </div>

    </div>
  </div>
</div>



@endsection
