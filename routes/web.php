<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ConfirmTicketController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\DestinationImageController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PassengerController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->middleware('guest:admin')
    ->name('admin.login.show');
Route::post('/login', [AuthController::class, 'login'])
    ->name('admin.login.post');
Route::get('/logout', [AuthController::class, 'logout'])
    ->name('admin.logout');

Route::get('/confirm-ticket/{bookingId}/{passengerId}', [ConfirmTicketController::class, 'showForm'])
    ->name('admin.confirm.ticket');
Route::post('/confirm-ticket', [ConfirmTicketController::class, 'approve'])
    ->name('admin.confirm.approve');

Route::middleware(['admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('admin.home');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'profile')->name('admin.profile');
        Route::post('/profile/update', 'updateProfile')->name('admin.profile.update');
        Route::post('/password/update', 'updatePassword')->name('admin.password.update');
    });
    Route::controller(DestinationController::class)->group(function () {
        Route::get('/destinations', 'index')->name('admin.destinations');
        Route::get('/destination/{id}/edit', 'edit')->name('admin.destination.edit');
        Route::post('/destination/update/{id}', 'update')->name('admin.destination.update');
    });

    Route::controller(DestinationImageController::class)->group(function () {
        Route::get('/destination-images/{id}', 'index')->name('admin.destination.images');
        Route::post('/destination-images', 'store')->name('admin.destination.images.store');
    });

    Route::controller(BookingController::class)->group(function () {
        Route::get('/bookings', 'index')->name('admin.bookings');
        Route::get('/bookings/list', 'getBookings')->name('admin.bookings.list');
        Route::get('/bookings/show/{id}', 'show')->name('admin.bookings.show');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/users', 'index')->name('admin.users');
        Route::get('/users/list', 'getUsers')->name('admin.users.list');
        Route::get('/user/show/{id}', 'show')->name('admin.user.show');
    });

    Route::controller(PassengerController::class)->group(function () {
        Route::get('/passengers', 'index')->name('admin.passengers');
        Route::get('/passengers/list', 'getPassengers')->name('admin.passengers.list');
        Route::get('/passenger/show/{id}', 'show')->name('admin.passenger.show');
    });
});
