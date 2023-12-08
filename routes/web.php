<?php

use App\Http\Middleware\CekLevel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\Pelanggan\PelangganLandingController;
use App\Http\Controllers\Pelanggan\PelangganBookingController;
use App\Http\Controllers\Pelanggan\PelangganReviewController;
use App\Http\Controllers\Pelanggan\PelangganProfileController;
use App\Http\Controllers\Pelanggan\PelangganRiwayatController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminPelangganController;
use App\Http\Controllers\Admin\AdminBarbermanController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminCetakController;
use App\Http\Controllers\Admin\AdminImageSliderController;
use App\Http\Controllers\Barberman\BarbermanBookingController;
use App\Http\Controllers\Barberman\BarbermanCetakController;
use App\Http\Controllers\Barberman\BarbermanProfileController;
use App\Http\Controllers\Pelanggan\PelangganServiceController;

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

//Guest
// Route::get('/', [PelangganLandingController::class, 'index'])->name('/');
// Route::get('/detail-model/{id}', [PelangganLandingController::class, 'lihatdetail']);
// Route::resource('detail-service', PelangganServiceController::class);
// Route::resource('review', PelangganReviewController::class);
// routes/web.php

// Gusset
Route::middleware('guest')->group(function () {
    Route::get('/', [PelangganLandingController::class, 'index'])->name('/');

    Route::get('/detail-model/{id}', [PelangganLandingController::class, 'lihatdetail']);

    Route::resource('detail-service', PelangganServiceController::class);

    Route::resource('review', PelangganReviewController::class);
});





Route::group(['middleware' => [CekLevel::class . ':Pelanggan']], function () {
    Route::resource('booking', PelangganBookingController::class);
    Route::resource('my-booking', PelangganRiwayatController::class);
    Route::resource('pelanggan-profile', PelangganProfileController::class);
});

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/login-action', [LoginController::class, 'authenticate']);
Route::post('/register-action', [LoginController::class, 'register']);
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
        Route::resource('image-slider', AdminImageSliderController::class);
        Route::get('/cetak-harian', [AdminCetakController::class, 'cetakHarian'])->name('cetak.harian');
        Route::get('/cetak-bulanan', [AdminCetakController::class, 'cetakBulanan'])->name('cetak.bulanan');
        Route::get('/cetak-tahunan', [AdminCetakController::class, 'cetakTahunan'])->name('cetak.tahunan');

    });

    Route::group(['middleware' => [CekLevel::class . ':Barberman']], function () {

        Route::resource('booking-barberman', BarbermanBookingController::class);
        Route::resource('profile-barberman', BarbermanProfileController::class);
        Route::get('/cetak-booking-barberman', [BarbermanCetakController::class, 'cetakbookingbarberman'])->name('/cetak-booking-barberman');
        // Route::get('/pegawai/cetak_pdf', 'PegawaiController@cetak_pdf');
    });
});
