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
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function() {
    Route::post('/post/create', \App\Http\Controllers\CreateController::class)->name('create');
    Route::delete('/post/delete/{postId}', \App\Http\Controllers\DeleteController::class)->name('delete');
    Route::get('/post/edit/{postId}', \App\Http\Controllers\EditIndexController::class)->name('editindex')->where('postId','[0-9]+');
    Route::put('/post/edit/{postId}', \App\Http\Controllers\EditController::class)->name('edit')->where('postId','[0-9]+');
    Route::get('/post', \App\Http\Controllers\IndexController::class)->name('index');

    Route::get('/dashboard', \App\Http\Controllers\IndexController::class)->name('dashboard');

    Route::get('/post', function () {
        return view('post');
    })->name('post');
    
});


