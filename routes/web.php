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
    Route::get('/', 'index')->name('index');
    Route::get('/show/{photo}', 'show')->name('show');
    Route::post('/react/{photo}', 'react')->name('react');
});

Route::controller(CommentController::class)->as('comments.')->group(function () {
    Route::post('/store', 'store')->name('store');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::controller(LoginController::class)->as('login.')->withoutMiddleware(['auth'])->group(function () {
        Route::post('/login', 'auth')->name('auth');
        Route::get('/login', 'index')->name('index');
    });

    Route::controller(AdminPhotoUploadController::class)->as('upload.')->group(function () {
        Route::get('/upload', 'index')->name('index');
        Route::post('/upload', 'store')->name('store');
    });

    Route::controller(AdminPhotoGalleryController::class)->as('gallery.')->group(function () {
        Route::resource('/', AdminPhotoGalleryController::class)->parameter('', 'photo');
    });
});
