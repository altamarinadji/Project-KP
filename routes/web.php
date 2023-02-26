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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// composer require livewire/livewire ^1.3.3
// composer require laravel/ui ^2.0
Route::livewire('/', 'home')->name('home');
Route::livewire('/products', 'product-index')->name('products');
Route::livewire('/keranjang', 'keranjang')->name('keranjang');
Route::livewire('/checkout', 'checkout')->name('checkout');
Route::livewire('/history', 'history')->name('history');
Route::livewire('/products/{id}', 'pesan')->name('pesan');
Route::livewire('/keranjang/{id}', 'revisi')->name('revisi');
Route::livewire('/history/{id}', 'detailhistory')->name('detailhistory');


//admin
Route::get('dashboard', 'admin\adminController@index')->name('dashboard');


Route::resource('master_products', 'masterbb\masterproductController');
Route::get('master_products/edit/{id}', 'masterbb\masterproductController@edit');
Route::post('master_products/update/{id}', 'masterbb\masterproductController@update');
Route::get('master_products/destroy/{id}', 'masterbb\masterproductController@destroy');

Route::resource('master_pesanan', 'masterbb\pesananController');
Route::get('master_pesanan/detail/{id}', 'masterbb\pesananController@detail');
Route::get('master_pesanan/detail/destroy/{id}', 'masterbb\pesananController@destroy');
Route::get('master_pesanan/detail/atur/{id}', 'masterbb\pesananController@edit');
Route::post('master_pesanan/detail/update/{id}', 'masterbb\pesananController@update');
Route::get('master_pesanan/detail/update2/{id}', 'masterbb\pesananController@update2');
Route::get('master_pesanan/detail/cetakkw/{id}', 'masterbb\pesananController@cetak');

Route::resource('master_bb', 'masterbb\bahanController');
Route::get('master_bb/destroy/{id}', 'masterbb\bahanController@destroy');
Route::get('master_bb/edit/{id}', 'masterbb\bahanController@edit');
Route::post('master_bb/update/{id}', 'masterbb\bahanController@update');

Route::resource('master_pelanggan', 'masterbb\pelangganController');
Route::get('master_pelanggan/destroy/{id}', 'masterbb\pelangganController@destroy');
Route::get('master_pelanggan/edit/{id}', 'masterbb\pelangganController@edit');
Route::post('master_pelanggan/update/{id}', 'masterbb\pelangganController@update');

Route::get('/cetak/{id}', 'CetakController@cetak');

