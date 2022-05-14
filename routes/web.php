<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{KamarController,OrderController,TipeController};

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

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });

    Route::prefix('kamar')->name('kamar.')->group(function () {
        Route::get('/', 'KamarController@index')->name('index');
        Route::get('/create', 'KamarController@create')->name('create');
        Route::post('/store', 'KamarController@store')->name('store');
        Route::get('/{id}/edit', 'KamarController@edit')->name('edit');
        Route::post('/{id}/update', 'KamarController@update')->name('update');
        Route::get('/{id}/delete', 'KamarController@destroy')->name('delete');
    });

    Route::prefix('order')->name('order.')->group(function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('/create', 'OrderController@create')->name('create');
        Route::post('/store', 'OrderController@store')->name('store');
        Route::get('/{id}/edit', 'OrderController@edit')->name('edit');
        Route::post('/{id}/update', 'OrderController@update')->name('update');
        Route::get('/{id}/delete', 'OrderController@destroy')->name('delete');
    });

    Route::prefix('tipe')->name('tipe.')->group(function () {
        Route::get('/', 'TipeController@index')->name('index');
        Route::get('/create', 'TipeController@create')->name('create');
        Route::post('/store', 'TipeController@store')->name('store');
        Route::get('/{id}/edit', 'TipeController@edit')->name('edit');
        Route::post('/{id}/update', 'TipeController@update')->name('update');
        Route::get('/{id}/delete', 'TipeController@destroy')->name('delete');
    });
});


Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', 'BookingController@checkout')->name('checkout');
    Route::get('/pay/{code}', 'BookingController@pay')->name('pay');
    Route::get('/transaction', 'BookingController@transaction')->name('transaction');
});
Route::post('/order', 'BookingController@order')->name('order');
Route::post('/checkout-non-register', 'BookingController@checkoutNonRegister')->name('checkout-non-register');
Route::get('/invoice/{id}', 'BookingController@invoice')->name('invoice');
