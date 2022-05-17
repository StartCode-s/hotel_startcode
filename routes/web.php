<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{KamarController,OrderController,TipeController,FasilitasController};

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


Route::prefix('admin')->middleware(['auth','checkRole:2'])->name('admin.')->group(function () {
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

    Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
        Route::get('/', 'FasilitasController@index')->name('index');
        Route::get('/create', 'FasilitasController@create')->name('create');
        Route::post('/store', 'FasilitasController@store')->name('store');
        Route::get('/{id}/edit', 'FasilitasController@edit')->name('edit');
        Route::post('/{id}/update', 'FasilitasController@update')->name('update');
        Route::get('/{id}/delete', 'FasilitasController@destroy')->name('delete');
    });
});


Route::middleware(['auth','checkRole:0'])->group(function () {
    Route::post('/checkout', 'BookingController@checkout')->name('checkout');
    Route::get('/pay/{code}', 'BookingController@pay')->name('pay');
    Route::get('/cancel-order/{code}', 'BookingController@cancelOrder')->name('cancel-order');
    Route::post('/update-transaction', 'BookingController@updateTransaction')->name('update-transaction');
    Route::get('/transaction', 'BookingController@transaction')->name('transaction');
    Route::get('/transaction-invoice/{code}', 'BookingController@transactionInvoice')->name('transaction-invoice');
    Route::get('/transaction-success', 'BookingController@transactionSuccess')->name('transaction-success');
    Route::get('/transaction-pending', 'BookingController@transactionPending')->name('transaction-pending');
    Route::get('/transaction-error', 'BookingController@transactionError')->name('transaction-error');
    Route::post('/order', 'BookingController@order')->name('order');
    Route::post('/checkout-non-register', 'BookingController@checkoutNonRegister')->name('checkout-non-register');
    Route::get('/invoice/{id}', 'BookingController@invoice')->name('invoice');


});


Route::prefix('reception')->group(function () {
    Route::middleware(['checkRole:1','auth'])->group(function () {
        Route::get('/', 'ReceptionController@index')->name('reception.index');
        Route::get('/search', 'ReceptionController@search')->name('reception.search');
    });

    Route::get('/checkIn/{code}', 'ReceptionController@checkIn')->name('reception.checkIn');
    Route::get('/checkOut/{code}', 'ReceptionController@checkOut')->name('reception.checkOut');
});


