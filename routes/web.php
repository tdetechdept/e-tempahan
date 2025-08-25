<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/fasiliti-bilik', [App\Http\Controllers\WebsiteController::class, 'fasiliti'])->name('portal.facility');

// Route::get('/fasiliti-bilik', function () {
//     return view('website.fasiliti');
// })->name('portal.facility');

Auth::routes();
Route::get('/register-success', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationMsg'])->name('register.success');
Route::get('/reset-password-success', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetPasswordMsg'])->name('reset-password.success');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth','activeUser']);

Route::group(['middleware' => ['auth','activeUser']], function() {
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
    
    // Admin User Management Routes
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::resource('users', AdminUserController::class);
        Route::post('/users/{user}/update-status', [AdminUserController::class, 'updateStatus'])->name('users.updateStatus');
        Route::get('/users/register/success', [AdminUserController::class, 'registerSuccess'])->name('users.register.success');
        Route::get('/users/register/unsuccess', [AdminUserController::class, 'registerUnsuccess'])->name('users.register.unsuccess');
        Route::get('/users/update/success', [AdminUserController::class, 'updateSuccess'])->name('users.update.success');
        Route::get('/users/deactivate/success', [AdminUserController::class, 'deactivateSuccess'])->name('users.deactivate.success');

    });

    
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/', [AdminReportController::class, 'index'])->name('index');
        Route::get('/daily', [AdminReportController::class, 'dailyReport'])->name('daily');
        Route::get('/weekly', [AdminReportController::class, 'weeklyReport'])->name('weekly');
        Route::get('/monthly', [AdminReportController::class, 'monthlyReport'])->name('monthly');
        Route::get('/yearly', [AdminReportController::class, 'yearlyReport'])->name('yearly');
    });
    
    Route::get('/organization', [OrganizationController::class, 'index'])->name('organization.index');
        Route::get('/organization/create/{type}', [OrganizationController::class, 'create'])->name('organization.create');
        Route::post('/organization/store/{type}', [OrganizationController::class, 'store'])->name('organization.store');
        Route::get('admin/organization/tab/{type}', [OrganizationController::class, 'tab'])->name('organization.tab');
        Route::get('/organization/edit/{type}/{id}', [OrganizationController::class, 'edit'])->name('organization.edit');
        Route::put('/organization/update/{type}/{id}', [OrganizationController::class, 'update'])->name('organization.update');
        Route::post('/organization/delete/{type}/{id}', [OrganizationController::class, 'destroy'])->name('organization.destroy');
    });


Route::middleware(['auth','activeUser']) ->prefix('user')->as('user.')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::put('/profile/upload-img', [ProfileController::class, 'uploadImg'])->name('profile.uploadImg');
    Route::put('/profile/remove-img', [ProfileController::class, 'removeImg'])->name('profile.removeImg');

    // BookingList
    Route::get('/booking/{status}/list', [App\Http\Controllers\User\BookingController::class, 'index'])->name('booking.list');
    // Search
    Route::get('/search', [App\Http\Controllers\User\BookingController::class, 'search'])->name('search.index');
    Route::get('/search/result', [App\Http\Controllers\User\BookingController::class, 'searchResult'])->name('search.result');
    Route::get('/search/view/{id}', [App\Http\Controllers\User\BookingController::class, 'searchView'])->name('search.view');

    // Boooking
    Route::get('/booking/adhoc', [App\Http\Controllers\User\BookingController::class, 'adHoc'])->name('booking.adhoc');
    Route::get('/booking/new/{user}/{room}', [App\Http\Controllers\User\BookingController::class, 'newBooking'])->name('booking.new');
    Route::post('/booking/new', [App\Http\Controllers\User\BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/{id}/show', [App\Http\Controllers\User\BookingController::class, 'show'])->name('booking.show');
    Route::put('/booking/{id}/cancel', [App\Http\Controllers\User\BookingController::class, 'cancel'])->name('booking.cancel');
    Route::put('/booking/{id}/confirm', [App\Http\Controllers\User\BookingController::class, 'confirm'])->name('booking.confirm');


    Route::get('/booking/{id}/edit', [App\Http\Controllers\User\BookingController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}', [App\Http\Controllers\User\BookingController::class, 'update'])->name('booking.update');
    Route::delete('/booking/new/{id}', [App\Http\Controllers\User\BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('/booking/new/{id}/pdf', [App\Http\Controllers\User\BookingController::class, 'downloadPDF'])->name('booking.downloadPDF');

    Route::get('/calendar/{user_id}', [App\Http\Controllers\User\CalendarController::class, 'index'])->name('calendar.index');
    
}); 

//For Super Admin will for my design theing
Route::middleware(['auth','activeUser'])->group(function () {
 
    // Dashboard
    Route::get('/super_admin', [App\Http\Controllers\SuperAdminController::class, 'index'])->name('dashboard');

    // Audit Routes
    Route::controller(App\Http\Controllers\AuditController::class)->group(function () {
        Route::get('/audit', 'index')->name('audit');
        Route::get('/audit/record-user-activity/{id}', 'recordUserActivity')->name('record_user_activity');
    });
    
    // Calendar Routes
    Route::controller(App\Http\Controllers\CalendarController::class)->group(function () {
        Route::get('/calendar', 'index')->name('calendar');
        Route::get('/calendar/create-special-holiday', 'createSpecialHoliday')->name('calendar.create_special_holiday');
        Route::post('/calendar/store-special-holiday', 'storeSpecialHoliday')->name('calendar.store_special_holiday');
        Route::get('/calendar/create-manual-booking', 'createManualBooking')->name('calendar.create_manual_booking');
        Route::post('/calendar/store-manual-booking', 'storeManualBooking')->name('calendar.store_manual_booking');
    });
    
    // API Routes for Calendar
    Route::get('/api/holidays', [App\Http\Controllers\CalendarController::class, 'getHolidays'])->name('api.holidays');
    
    // Report Routes
    Route::controller(App\Http\Controllers\ReportController::class)->group(function () {
        Route::get('/report', 'index')->name('report');
    });
    
                    // User Management Routes
                Route::controller(App\Http\Controllers\UserManagementController::class)->group(function () {
                    Route::get('/pengurusan-pengguna', 'pengurusanPengguna')->name('pengurusan_pengguna');
                    Route::get('/pengurusan-pengguna/create', 'create')->name('super_admin.users.create');
                    Route::get('/maklumat-pengguna/{id?}', 'maklumatPengguna')->name('maklumat_pengguna');
                    Route::get('/maklumat-pengguna-edit/{id?}', 'maklumatPenggunaEdit')->name('maklumat_pengguna_edit');
                    Route::get('/user-registered-success', 'userRegisteredSuccess')->name('user_registered');
                    Route::post('/super_admin/users', 'store')->name('super_admin.users.store');
                    Route::put('/super_admin/users/{user}', 'update')->name('super_admin.users.update');
                    Route::post('/super_admin/users/{user}/update-status', 'updateStatus')->name('super_admin.users.updateStatus');
                });
});