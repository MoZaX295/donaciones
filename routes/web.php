<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::resource('registrar', UserController::class);
Route::resource('donar', DonationController::class);
Route::resource('iniciarsesion', LoginController::class);
Route::get('/historial', function () {
    return view('donations/record');
});
Route::get('/admin/historial', function () {
    return view('admin/record');
});
