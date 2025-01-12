<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\UlasanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', DashboardController::class)->name('index');

    Route::prefix('ulasans')->name('ulasans.')->controller(UlasanController::class)->group(function () {
        Route::get('/', 'indexUlasan')->name('indexUlasan');
        Route::get('search', 'searchUser')->name('searchUser');
        Route::post('store', 'store')->name('store');
    });

    Route::post('logout', [LoginController::class, 'destroy'])->name('destroy');
});