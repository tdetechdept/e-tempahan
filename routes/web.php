<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/register-success', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationMsg'])->name('register.success');

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{id}/deactivate', [ UserController::class , 'deactivate'])->name('users.deactivate');
    Route::get('users/deactivate/success', [UserController::class, 'deactivateSuccess'])->name('users.deactivate.success');

    Route::get('/rooms/cancelled', [RoomController::class, 'cancelled'])->name('rooms.cancelled');
    Route::resource('rooms',  RoomController::class);

    Route::get('booking/cancelled', [BookingController::class, 'cancelBookingindex'])
        ->name('booking.cancel.index');
    Route::get('/booking/cancelled/show/{id}', [BookingController::class, 'cancelShowBooking'])->name('booking.cancelled.show');
    Route::post('/booking/cancelled/{id}', [BookingController::class, 'cancel'])->name('booking.cancel');
    // Route::get('/booking/{id}/pdf', [BookingController::class, 'downloadPDF']);
    Route::post('/booking/{id}/pdf', [BookingController::class, 'downloadPDF'])->name('booking.downloadPDF');
    Route::get('/booking/{id}/approved', [BookingController::class, 'approved'])->name('admin.booking.approved');
    Route::resource('booking', BookingController::class);
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
}); 
