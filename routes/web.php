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
Route::middleware(['auth'])->group(function () {
 
    // Dashboard
    Route::get('/', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('dashboard');
    
    // Audit Routes
    Route::controller(App\Http\Controllers\AuditController::class)->group(function () {
        Route::get('/audit', 'index')->name('audit');
        Route::get('/audit/record-user-activity/{id}', 'recordUserActivity')->name('record_user_activity');
    });
    
    // Calendar Routes
    Route::controller(App\Http\Controllers\CalendarController::class)->group(function () {
        Route::get('/calendar', 'index')->name('calendar');
        Route::get('/calendar/create-special-holiday', 'createSpecialHoliday')->name('calendar.create_special_holiday');
    });
    
    // Report Routes
    Route::controller(App\Http\Controllers\ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report');
    });
    
    // User Management Routes
    Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
        Route::get('/pengurusan-pengguna', 'pengurusanPengguna')->name('pengurusan_pengguna');
        Route::get('/maklumat-pengguna', 'maklumatPengguna')->name('maklumat_pengguna');
        Route::get('/maklumat-pengguna-edit', 'maklumatPenggunaEdit')->name('maklumat_pengguna_edit');
        Route::get('/user-registered-success', 'userRegisteredSuccess')->name('user_registered');
    });
});