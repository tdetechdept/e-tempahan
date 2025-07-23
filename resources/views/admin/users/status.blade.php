@extends('layouts.main.app')

@section('title', 'User Management')

@section('content')
 <style>

    .deactivate-box {
      background-color: white;
      border: 2px solid #339999;
      padding: 40px 30px;
      border-radius: 8px;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }

    .check-icon {
      background-color: #47c1ae;
      color: white;
      font-size: 32px;
      width: 60px;
      height: 60px;
      line-height: 60px;
      border-radius: 50%;
      margin: 0 auto 20px;
    }

    .deactivate-box h4 {
      font-weight: 700;
    }

    .btn-dashboard {
      background-color: #47c1ae;
      border: none;
    }

    .btn-dashboard:hover {
      background-color: #3ba18f;
    }
  </style>

    <div class="deactivate-box shadow-sm justify-center">
        <div class="check-icon">
        ✓
        </div>
        <h4>User has been deactivated.</h4>
        <p>Access to the system is no longer allowed until reactivated.</p>
        <a href="{{ route('home') }}" class="btn btn-dashboard text-white mt-3">Dashboard</a>
  </div>

@endsection
