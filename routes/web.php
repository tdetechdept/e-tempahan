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
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{id}/deactivate', [ UserController::class , 'deactivate'])->name('users.deactivate');
    Route::get('users/deactivate/success', [UserController::class, 'deactivateSuccess'])->name('users.deactivate.success');
    Route::post('/users/{user}/update-status', [UserController::class, 'updateStatus'])->name('users.updateStatus');

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


Route::middleware(['auth']) ->prefix('user')->as('user.')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');

    // Boooking
    Route::get('/booking/adhoc', [App\Http\Controllers\User\BookingController::class, 'adHoc'])->name('booking.adhoc');
}); 



//For Super Admin will for my design theing
Route::middleware(['auth'])
    ->prefix('super_admin')  // URL prefix ONLY
    ->as('super_admin.')
    ->group(function () {
 
    // Now URL is /super_admin but route name is just 'super_admin'
    Route::view('/', 'super_admin')->name('super_admin');
 
    Route::view('/audit', 'super_admin.administrator.audit.Audit')->name('audit');
 
    Route::view('/audit/record-user-activity', 'super_admin.administrator.audit.record-user-activity.Log_Details_Information')
        ->name('record_user_activity');
 
    Route::view('/calendar', 'super_admin.administrator.calendar.Calendar')->name('calendar');
    Route::view('/calendar/create-special-holiday', 'super_admin.administrator.calendar.create-special-holiday.Calendar')
        ->name('calendar.create_special_holiday');
 
    Route::view('/report', 'super_admin.administrator.report.report')->name('report');
 
    Route::view('/pengurusan-pengguna', 'super_admin.administrator.user-management.pengurusan_pengguna')
        ->name('pengurusan_pengguna');
    Route::view('/maklumat-pengguna', 'super_admin.administrator.user-management.user-information.maklumat_pengguna')
        ->name('maklumat_pengguna');
    Route::view('/maklumat-pengguna-edit', 'super_admin.administrator.user-management.user-information-edit.Maklumat_Pengguna2')
        ->name('maklumat_pengguna_edit');
 
    Route::view('/user-registered-success', 'super_admin.administrator.user-successfully-registered.Pengguna_berjaya_didaftarkan')
        ->name('user_registered');
});