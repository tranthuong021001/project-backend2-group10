<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//
Auth::routes();

//Route::get('/home', 'HomeController@getAllProductHome')->name('home');

Route::get('/hi', 'welcomecontroller@laySanPhamTheoLoai' );
//route động có tham số dùng để chuyển đến trang Account
//Route::get('/{para}', 'HomeController@index')->name('home');

Route::get('/', 'welcomecontroller@getAllProduct');


Route::get('/index', 'welcomecontroller@getAllProduct');
Route::get('/manu', 'welcomecontroller@getAllManufactures');

//lấy sản phâm theo  loại
Route::get('/productbycategory/{id}', 'welcomecontroller@getProductByCategory')->name('productbycategory');
//lấy sản phâm theo  hãng sản xuất
Route::get('/productbymanufacture/{id}', 'welcomecontroller@getProductByManufacture')->name('productbymanufacture');

//hiển thị chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{id}', 'welcomecontroller@Product_Detail')->name('Product_Detail');

//Cart
//thêm sản phẩm vào giỏ hàng
Route::post('/save-cart', 'CartController@Save_Cart' );
Route::get('/show-cart', 'CartController@show_cart' );
//xóa sản phẩm khỏi giỏ hàng
Route::get('/delete-to-cart/{rowId}', 'CartController@delete_to_cart' );
//cap nhat so luong sản phẩm trong giỏ hàng
Route::post('/update-cart-quantity', 'CartController@update_cart_quantity' );

//Checkout register
Route::get('/show-order', 'CheckoutController@show_order' );
Route::get('/login-checkout', 'CheckoutController@login_checkout' );
Route::post('/add-customer', 'CheckoutController@add_customer' );
Route::get('/checkout', 'CheckoutController@checkout' );


//route động có tham số dùng để gắn các liên kết trang
Route::get('/{page}', 'welcomecontroller@page' );









//đăng ký route middleware để check login
// Route::post('formlogin', 'WelcomeController@login')->middleware('checklogin'::class);
