<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'content'], function () {
    Route::get('/{vendorid}', [App\Http\Controllers\ContentController::class, 'dashboard'])->name('dashboard');
    Route::get('/{vendorid}/list', [App\Http\Controllers\ContentController::class, 'list'])->name('list');
    Route::get('/{vendorid}/images', [App\Http\Controllers\ContentController::class, 'images'])->name('images');
    Route::get('/{vendorid}/video', [App\Http\Controllers\ContentController::class, 'video'])->name('video');
    
    Route::post('/p_image', [App\Http\Controllers\ContentController::class, 'p_image'])->name('p_image');
    Route::post('/p_video',[App\Http\Controllers\ContentController::class, 'p_video'])->name('p_video');

    Route::get('/{vendorid}/{videoid}/d_video',[App\Http\Controllers\ContentController::class, 'd_video'])->name('d_video');
});

Route::get('register/{vendorid}/client',[App\Http\Controllers\ClientController::class, 'client'])->name('client');
Route::post('register/p_client',[App\Http\Controllers\ClientController::class, 'p_client'])->name('p_client');