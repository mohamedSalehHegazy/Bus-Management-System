<?php

use App\Http\Controllers\Passenger\AuthController;
use App\Http\Controllers\Passenger\GeneralController;
use App\Http\Controllers\Passenger\ReservationController;
use App\Http\Controllers\Passenger\TripController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'passenger/'], function () {
    // UnAAuthorized Routes
    Route::post('login', [AuthController::class, 'login'])->name('passenger.login');

    // Authorized Routes
    Route::group(['middleware' => ['auth:api']], function () {
        // Trips
        Route::get('trips', [TripController::class, 'index'])->name('passenger.trips.index');
        Route::get('trips/{id}', [TripController::class, 'show'])->name('passenger.trips.show');

        Route::post('reservations', [ReservationController::class, 'create'])->name('passenger.reservations.create');

        // General Drop Down List
        Route::get('/ddlList', [GeneralController::class, 'ddlList'])->name('passenger.ddlList');
    });
});
