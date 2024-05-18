<?php

use App\Http\Controllers\AuthUser;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Raw;

Route::get('/invoice/', function () {
    return view('welcome');
});

//user
// Route::middleware(['auth.custom'])->group(function () {
Route::post('/send_saran', [LandingPageController::class, 'sendSaran']);
Route::post('/create_payment/{id_pesan}', [PaymentController::class, 'createPayment']);
Route::post('/callback_payment', [PaymentController::class, 'callbackReturn']);
Route::get('/history_booking', [LandingPageController::class, 'historyBooking']);
Route::get('/detail_paket/{id_paket}', [LandingPageController::class, 'detailPaket']);
Route::get('/galeri', [LandingPageController::class, 'galeri']);
Route::get('/', [LandingPageController::class, 'index']);
// });

Route::group(["middleware" => ["guest"]], function () {
    Route::post('/auth/register/post', [AuthUser::class, 'store']);
    Route::post('/login', [AuthUser::class, 'login']);
    Route::get('/auth/register', [AuthUser::class, 'index']);
    Route::get('/auth/login', [AuthUser::class, 'loginForm'])->name('login');
});

//admin
Route::group(["middleware" => ["admin"]], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/data_pengguna', [DashboardController::class, 'dataUser']);
    Route::get('/data_admin', [DashboardController::class, 'dataAdmin']);
    Route::get('/data_saran', [DashboardController::class, 'dataSaran']);
    Route::get('/data_transaksi', [DashboardController::class, 'dataTransaksi']);
    Route::get('/data_fasilitas', [FasilitasController::class, 'index']);
    Route::get('/edit_fasilitas/{id}', [FasilitasController::class, 'show']);
    Route::post('/delete_fasilitas/{id}', [FasilitasController::class, "destroy"]);
    Route::get('/data_galeri', [GaleriController::class, 'index']);
    Route::get("/transaksi", [DashboardController::class, "transaksi"]);
    Route::post("/filter", [DashboardController::class, "filter"]);
    Route::get("/download-pdf/{id}", [DashboardController::class, "downloadPDF"]);
    Route::get('/logout', [AuthUser::class, 'logout']);
});
