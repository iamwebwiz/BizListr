<?php

use App\Http\Controllers\BusinessListingController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', static function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->group(static function () {
    Route::prefix('categories')->name('categories.')->group(static function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('listings')->name('listings.')->group(static function () {
        Route::get('/', [BusinessListingController::class, 'index'])->name('index');
        Route::post('store', [BusinessListingController::class, 'store'])->name('store');
        Route::patch('update', [BusinessListingController::class, 'update'])->name('update');
    });
});
