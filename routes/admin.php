<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\WisataController;
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

    Route::prefix('wisatas')->name('wisatas.')->controller(WisataController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{wisata}', 'edit')->name('edit');
        Route::patch('/update/{wisata}', 'update')->name('update');
        Route::delete('/delete/{wisata}', 'destroy')->name('destroy');
        Route::get('/search', 'search')->name('search');
        Route::get('/gallery/{wisata}', 'gallery')->name('gallery');
        Route::post('/gallery/{wisata}', 'storeGallery')->name('storeGallery');
        Route::delete('/gallery/{wisata}/{galeri}', 'destroyGallery')->name('destroyGallery');
        Route::get('/nearby/{wisata}', 'getNearbyPlaces')->name('nearby');
    });

    Route::prefix('events')->name('events.')->controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{event}', 'edit')->name('edit');
        Route::patch('/update/{event}', 'update')->name('update');
        Route::delete('/delete/{event}', 'destroy')->name('destroy');
        Route::get('/search', 'search')->name('search');
        Route::get('/gallery/{event}', 'gallery')->name('gallery');
        Route::post('/gallery/{event}', 'storeGallery')->name('storeGallery');
        Route::delete('/gallery/{event}/{galeri}', 'destroyGallery')->name('destroyGallery');
    });

    // Route::prefix('galeris')->name('galeris.')->controller(GaleriController::class)->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/', 'store')->name('store');
    //     Route::get('/edit/{galeri}', 'edit')->name('edit');
    //     Route::patch('/update/{galeri}', 'update')->name('update');
    //     Route::delete('/delete/{galeri}', 'destroy')->name('destroy');
    //     Route::get('/search', 'search')->name('search');
    // });

    Route::prefix('ulasans')->name('ulasans.')->controller(UlasanController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/detail/{wisata}', 'detail')->name('detail');
        Route::get('/detail/{wisata}/search', 'searchAdmin')->name('search');
        Route::delete('/delete/{ulasan}', 'destroy')->name('destroy'); // Added delete route
    });

    Route::post('logout', [LoginController::class, 'destroy'])->name('destroy');
});
