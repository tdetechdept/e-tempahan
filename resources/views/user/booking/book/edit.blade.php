@extends('layouts.main.app')

@push('css')
<style>
    .warning-message {
      display: flex;
      align-items: center;
      font-size: 16px;
    }
    .warning-message i {
      color: #f4c542; /* Warning yellow */
      font-size: 20px;
      margin-right: 8px;
    }

    .modal-content {
      border-radius: 12px;
      text-align: center;
      padding: 20px;
    }
    .modal-icon {
      background-color: #eaf2ff;
      border-radius: 12px;
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px auto;
    }
    .modal-icon i {
      font-size: 28px;
      color: #4a90e2;
    }
    .modal-title {
      font-weight: bold;
      font-size: 20px;
    }
    .modal-body-text {
      font-size: 16px;
      color: #6c757d;
      margin: 15px 0;
    }
    .btn-outline-primary {
      border-width: 2px;
    }
</style>
@endpush

@section('breadcrumb')
    <div class="breadcrumb-section">
        <h1 class="breadcrumb-title">Kemaskini Tempahan</h1>
        <div class="breadcrumb-nav">
            <span>Dashboard</span>
            <span class="mx-2">/</span>
            <span>Kemaskini Tempahan</span>
        </div>
    </div>
@endsection

@section('content')

    @include('user.booking.book._form', [
        'button' => 'update',
        'action' => route('user.booking.update', $booking),
    ])

@endsection

@push('js')
<script>
    //CHAIRMAN
        let oldValue = "{{$booking->chairman}}"; // initial value
        const input = document.getElementById("chairman");
        const errorDiv = document.getElementById("chairmanText");

        input.addEventListener("change", function () {
            if (input.value !== oldValue) {
                errorDiv.style.display = "block"; // show alert
            } else {
                errorDiv.style.display = "none"; // hide alert
            }
        });
    
    //MASA MULA
        let mulaOldValue = "{{$booking->start_time->format('H:i')}}"; // initial value
        const mula = document.getElementById("masaMula");
        const mulaText = document.getElementById("masaMulaText");

        mula.addEventListener("change", function () {
            if (mula.value !== mulaOldValue) {
                mulaText.style.display = "block"; // show alert
            } else {
                mulaText.style.display = "none"; // hide alert
            }
        });

    //MASA TAMAT
        let tamatOldValue = "{{$booking->end_time->format('H:i')}}"; // initial value
        const tamat = document.getElementById("masaTamat");
        const tamatText = document.getElementById("masaTamatText");

        tamat.addEventListener("change", function () {
            if (tamat.value !== tamatOldValue) {
                tamatText.style.display = "block"; // show alert
            } else {
                tamatText.style.display = "none"; // hide alert
            }
        });
</script>
@endpush