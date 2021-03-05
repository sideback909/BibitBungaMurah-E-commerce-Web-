<?php
use Gloudemans\Shoppingcart\Facades\Cart;

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

Route::get('/','PostsController@index');
Route::get('/shop','PostsController@index')->name('shop.index');
Route::get('/produk/{product}','PostsController@show')->name('produk.show');
Route::get('/diskon/{diskon}','PostsController@show_diskon')->name('diskon.show_diskon');
Route::post('/produk/search','PostsController@search');

// Route::get('/cart','CartController@index')->name('cart.index');
// Route::post('/cart','CartController@store')->name('cart.store');
// Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');

Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.store');
Route::post('/','CartController@store_home')->name('cart.store_home');
// Route::post('/cart/diskon','CartController@diskon_store')->name('cart.diskon_store');
Route::patch('/cart/{product}','CartController@update')->name('cart.update');
Route::delete('/cart/{product}','CartController@destroy')->name('cart.destroy');
Route::get('/cart/massremove', 'CartController@massremove')->name('cart.massremove');




Route::post('/tambah','CartController@store_quan')->name('tambah.store_quan');

Route::get('empty', function(){
    Cart::destroy();
});



Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@store')->name('checkout.store');
Route::get('/checkout/province', 'CheckoutController@getprovince');
Route::get('/checkout/city', 'CheckoutController@getcity');

Route::post('/checkout/ongkir', 'CheckoutController@ongkir')->name('checkout.ongkir');;

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/upload/{id}', 'UploadController@index')->name('upload.index');
Route::post('/upload', 'CheckoutController@store_bukti')->name('upload.store_bukti');

Route::get('/order/{id}', 'OrderController@index')->name('order.index');