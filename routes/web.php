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
})->name('home');

Route::view('kamar','kamar')->name('kamar');


Route::group([
    'prefix'=>config('admin.path'),

], function(){
    Route::get('login','LoginAdminController@formLogin')->name('admin.login');
    Route::post('login','LoginAdminController@login');

    Route::group(['middleware'=>'auth:admin'], function(){
        Route::post('logout','LoginAdminController@logout')->name('admin.logout');

        Route::get('/','DashboardController@index')->name('dashboard');
        Route::get('/akun', 'AdminController@akun')->name('admin.akun');
        Route::put('/akun', 'AdminController@updateAkun');

        Route::get('pemesanan','PemesananController@index')->name('pemesanan.index');
        Route::get('pemesanan/{pemesanan}','PemesananController@show')->name('pemesanan.show');
        Route::put('pemesanan/{pemesanan}','PemesananController@update')->name('pemesanan.update');
        
        Route::group(['middleware' => ['can:role,"admin"']], function() {
            Route::resource('fasilitas','FasilitasHotelController');
            Route::resource('kamar.fasilitas', 'FasilitasKamarController');
            Route::resource('admin', 'AdminController');
            Route::resource('kamar', 'KamarController');
        });
        
        
    });
    
});


