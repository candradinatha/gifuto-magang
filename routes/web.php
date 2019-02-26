<?php

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
    return redirect('/sale');
    // return view('index.customer.index');
});

Route::get('about-seller', function () {
    return view('index.seller.index');
});

Route::get('about', function () {
    return view('index.seller.index');
});

// sale kado routes 
Route::get('sale', 'KadoController@index')->name('kado.idex');
Route::get('sale/ajax', 'KadoController@indexAjax')->name('kado.idex.ajax');
Route::get('sale/search/autocomplete', 'KadoController@searchAutocomplete')->name('kado.search.autocomplete');
Route::get('sale/search', 'KadoController@search')->name('kado.search');
Route::get('sale/search/ajax', 'KadoController@ajaxSearch')->name('kado.search');
Route::get('sale/product-detail/{id}', 'KadoController@show')->name('kado.detail');
Route::get('sale/product-payment/{id}', 'KadoController@productPayment')->name('kado.payment')->middleware('auth:web');

// transaksis
Route::post('sale/transaction/store', 'TransaksiController@store')->name('transaksi.store')->middleware('auth:web');

Route::post('send', 'SubscribeController@store')->name('store.subscriber');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('seller', function() {
    return view('index.seller.index');
})->name('index-seller');


// seller
Route::get('seller-mail', function () {
    return view('seller.send-mail');
});
Route::post('send-seller-mail', 'SellerSubController@sendMail')->name('mail.sellersub');
Route::post('send-seller-subs', 'SellerSubController@store')->name('store.sellersub');

/////////////////////////////////////////////////////////////////////////////////////




Route::group(['prefix' => 'seller'], function () {
    
    Route::get('login', 'seller\SellerController@loginview');
    Route::post('login', 'seller\SellerController@attemptlogin')->name('seller.login');
    
    Route::get('register', 'seller\SellerController@registerview')->name('seller.register.view');
    Route::post('register', 'seller\SellerController@register')->name('seller.register');



    Route::group(['prefix' => 'dashboard','middleware'=>['auth:web_sellers']], function () {
        Route::get('/','seller\SellerDashboardController@dashboard_view')->name('seller.dashboard');

        Route::get('barang','seller\SellerDashboardController@barang_view')->name('seller.barang');
        Route::post('barang/upload','seller\SellerDashboardController@upload_barang')->name('seller.barang.post');



        Route::get('profil','seller\SellerDashboardController@profil_view')->name('seller.profil');

        Route::get('transaksi', 'seller\SellerDashboardController@ptransaksi_view')->name('seller.transaksi');

        Route::get('chat','seller\SellerDashboardController@chat_view' )->name('seller.chat');


        
    });
});

Route::get('/admin','AdminGifutoController@index')->name('admin.index');
Route::get('admin/status-seller','AdminGifutoController@status_seller')->name('admin.status_seller');
Route::get('admin/status-seller/edit/{id}','AdminGifutoController@edit')->name('admin.edit');
Route::get('admin/transaksi','AdminGifutoController@transaksi')->name('admin.transaksi');

Route::put('admin/status-seller/{id}','AdminGifutoController@update')->name('admin.update-status');
Route::put('admin/transaksi/{id}','AdminGifutoController@status')->name('admin.update-seller');
