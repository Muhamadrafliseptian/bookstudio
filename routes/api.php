<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::post('/create_payment', [PaymentController::class, 'createPayment']);
Route::get('/halo', [PaymentController::class, "index"]);