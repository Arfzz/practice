<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomenController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfNotAuthenticated;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(AlbumController::class)->prefix('albums')->name('album.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});
Route::controller(FotoController::class)->prefix('fotos')->name('foto.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});    
    
     

Route::prefix('komens')->name('komen.')->group(function () {
    Route::post('/{id}', [KomenController::class, 'store'])->middleware(RedirectIfNotAuthenticated::class)->name('store');
    Route::delete('/{id}', [KomenController::class, 'destroy'])->middleware(RedirectIfNotAuthenticated::class)->name('destroy');
});

Route::prefix('likes')->name('like.')->group(function () {
    Route::post('/like/{id}', [LikeController::class, 'index'])->middleware(RedirectIfNotAuthenticated::class)->name('index');
});
 
 