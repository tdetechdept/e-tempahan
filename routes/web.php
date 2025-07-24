<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    // Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::post('users/{id}/deactivate', [ UserController::class , 'deactivate'])->name('users.deactivate');
    Route::get('users/deactivate/success', [UserController::class, 'deactivateSuccess'])->name('users.deactivate.success');

    Route::get('/rooms/cancelled', [RoomController::class, 'cancelled'])->name('rooms.cancelled');
    Route::resource('rooms',  RoomController::class);
});


Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password');
}); 
