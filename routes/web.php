<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Pelanggan\PelangganLandingController;
use App\Http\Controllers\Pelanggan\PelangganBookingController;
use App\Http\Controllers\Pelanggan\PelangganReviewController;
use App\Http\Controllers\Pelanggan\PelangganProfileController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPelangganController;
use App\Http\Controllers\Admin\AdminBarbermanController;
use App\Http\Controllers\Admin\AdminBookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Pelanggan
Route::get('/', [PelangganLandingController::class, 'index'])->name('/');
Route::resource('review', PelangganReviewController::class);


Route::group(['middleware' => [CekLevel::class . ':Pelanggan']], function () {
    Route::get('booking', [PelangganBookingController::class, 'index'])->name('booking.index');
    Route::resource('pelanggan-profile', PelangganProfileController::class);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login-action', [LoginController::class, 'authenticate']);

//Logout
Route::get('/logout-action', [LoginController::class, 'logout']);


//Admin dan Barberman
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::group(['middleware' => [CekLevel::class . ':Admin']], function () {
        Route::resource('data-pelanggan', AdminPelangganController::class);
        Route::resource('data-barberman', AdminBarbermanController::class);
        Route::resource('data-service', AdminServiceController::class);
        Route::resource('data-booking', AdminBookingController::class);
        Route::resource('data-review', AdminReviewController::class);
        Route::resource('profile', AdminProfileController::class);
    });

    Route::group(['middleware' => [CekLevel::class . ':Barberman']], function () {
    });
});
