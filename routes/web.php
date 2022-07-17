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
    //新規投稿処理
    Route::post('/post/create', \App\Http\Controllers\CreateController::class)->name('create');
    //データを削除
    Route::delete('/post/delete/{postId}', \App\Http\Controllers\DeleteController::class)->name('delete');
    //詳細画面表示
    Route::get('/post/edit/{postId}', \App\Http\Controllers\EditIndexController::class)->name('editindex')->where('postId','[0-9]+');
    //詳細画面を編集
    Route::put('/post/edit/{postId}', \App\Http\Controllers\EditController::class)->name('edit')->where('postId','[0-9]+');
    //投稿一覧表示
    Route::get('/dashboard', \App\Http\Controllers\IndexController::class)->name('dashboard');
    //投稿画面のルーティング
    Route::get('/post', function () {
        return view('post');
    })->name('post');
    
});


