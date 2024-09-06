<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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

// Tampilan Depan
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('tentang-kami', [HomeController::class, 'tentangKami'])->name('tentang-kami');
Route::get('destinasi-wisata', [HomeController::class, 'destinasiwisata'])->name('destinasiwisata');
Route::get('events', [HomeController::class, 'events'])->name('events');
Route::get('deskripsi-event/{event}', [HomeController::class, 'deskripsievent'])->name('deskripsievent');
Route::get('deskripsi-wisata/{wisata}', [HomeController::class, 'deskripsiwisata'])->name('deskripsiwisata');
Route::get('cari-wisata', [HomeController::class, 'cariWisata'])->name('cariwisata');
Route::get('cari-event', [HomeController::class, 'cariEvent'])->name('carievent');





Route::middleware('guest')->group(function () {
    // Login
    Route::prefix('login')->name('login.')->controller(LoginController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'process')->name('process');
    });

    // Register
    Route::prefix('register')->name('register.')->controller(RegisterController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'process')->name('process');
    });
});