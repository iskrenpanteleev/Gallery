<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Guest\PhotoController;
use App\Http\Controllers\Admin\PhotoGalleryController as AdminPhotoGalleryController;
use App\Http\Controllers\Admin\PhotoUploadController as AdminPhotoUploadController;
use App\Http\Controllers\Guest\CommentController;
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

Route::controller(PhotoController::class)->as('photos.')->group(function () {
    Route::resource('/', PhotoController::class)->only(['index', 'show'])
        ->parameter('', 'photo');
    Route::post('/rate/{photo}', 'rate')->name('react');
});

Route::controller(CommentController::class)->as('comments.')->group(function () {
    Route::post('/store', 'store')->name('store');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::controller(LoginController::class)->as('login.')->withoutMiddleware(['auth'])->group(function () {
        Route::post('/login', 'auth')->name('auth');
        Route::get('/login', 'index')->name('index');
    });

    Route::resource('upload', AdminPhotoUploadController::class)->only(['index', 'store']);

    Route::resource('photo', AdminPhotoGalleryController::class)->only(['index', 'destroy']);
});
