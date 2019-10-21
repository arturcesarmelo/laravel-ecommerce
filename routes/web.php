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

Route::get('/', 'LadingPageController@index');

Route::get('/shop/by-category/{category}', 'ShopController@byCategory')
	->name('shop.by_category')
;

Route::resource('/shop', 'ShopController');
Route::resource('/product', 'ProductController')->except('index');
Route::resource('/cart', 'CartController');
Route::post('/cart/switch_to_save_for_later/{row_id}', 'CartController@switchToSaveForLater')
	->name('cart.save_for_later');


Route::delete('save_for_later/{row_id}', 'SaveForLaterController@destroy')
	->name('save_for_later.destroy');

Route::post('save_for_later/{row_id}', 'SaveForLaterController@switchToCart')
	->name('save_for_later.switch_to_cart');

Route::resource('checkout', 'CheckoutController');

Route::get('thankyou', function() {
	return "thankyou";
});
