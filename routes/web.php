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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function() {
    // Route::get('/posts', \App\Http\Controllers\IndexController::class)->name('index')
Route::post('/post/create', \App\Http\Controllers\CreateController::class)->name('create');
    // Route::delete('/posts/delete/{postId}', \App\Http\Controllers\DeleteController::class)->name('delete');
    // Route::get('/posts/edit/{postId}', \App\Http\Controllers\EditIndexController::class)->name('editindex')->where('postId','[0-9]+');
    // Route::put('/posts/edit/{postId}', \App\Http\Controllers\EditController::class)->name('edit')->where('postId','[0-9]+');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/post', function () {
        return view('post');
    })->name('post');
    
});


require __DIR__.'/auth.php';

