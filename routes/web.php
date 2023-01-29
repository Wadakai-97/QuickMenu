<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RecipeController;

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

// ホーム
Route::get('/home', [HomeController::class, 'index']);

// メニュー
Route::controller(MenuController::class)->group(function() {
    Route::prefix('/menu')->group(function() {
        Route::get('/list', 'getList')->name('menu.list');
        Route::post('/search', 'search')->name('menu.search');
        Route::get('/detail/{id}', 'detail')->name('menu.detail');
        Route::get('/create', 'index')->name('menu.create');
        Route::post('/store', 'create')->name('menu.store');
        Route::post('/destroy/{id}', 'destroy')->name('menu.destroy');
        Route::get('/csv_download', 'csvDownload')->name('menu.csv_download');
    });
});

Auth::routes();
