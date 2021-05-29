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

//route động có tham số dùng để chuyển đến trang chi tiết sản phẩm
Route::get('/danh-muc/{id}', 'welcomecontroller@getProductDetail')->name('protype-pro');
Route::get('/index', 'welcomecontroller@getAllProductHome');
Route::get('/manu', 'welcomecontroller@getAllManufactures');
//liên kết 1-1
// Route::get('/lienketchinhphu', function(){
//     $products = App\Product::all();
//     foreach($products as $product){
//         echo $product->name . "<br>";
//         echo $product->infos->NSX . "<br>";

//     }
// });
//lấy sản phâm theo danh loại
Route::get('/productbycategory/{id}', 'welcomecontroller@getProductByCategory')->name('productbycategory');
//lấy sản phâm theo danh hãng sản xuất
Route::get('/productbymanufacture/{id}', 'welcomecontroller@getProductByManufacture')->name('productbymanufacture');

//hiển thị chi tiết sản phẩm
Route::get('/chi-tiet-san-pham/{id}', 'welcomecontroller@Product_Detail')->name('Product_Detail');
//hiển thị chi tiết sản phẩm
Route::get('/view-detail/{id}', 'welcomecontroller@View_Product_Detail')->name('View_Product_Detail');

//thêm sản phẩm vào giỏ hàng
Route::post('/save-cart', 'CartController@Save_Cart' );


//route động có tham số dùng để gắn các liên kết trang
Route::get('/{page}', 'welcomecontroller@page' );









//đăng ký route middleware để check login
// Route::post('formlogin', 'WelcomeController@login')->middleware('checklogin'::class);
