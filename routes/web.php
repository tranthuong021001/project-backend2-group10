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


//route động có tham số dùng để chuyển đến trang Account
//Route::get('/{para}', 'HomeController@index')->name('home');

Route::get('/productbymanufacture', 'welcomecontroller@ViewProductByManufacture');
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



//route động có tham số dùng để gắn các liên kết trang
Route::get('/{page}', 'welcomecontroller@page' );










// Route tĩnh
// Route::get('/gioithieu', function(){
//     return view('gioithieu');
// });
// Route::get('/sanpham', function(){
//     return view('sanpham');
// });
// Route::get('/lienhe', function(){
//     return view('lienhe');
// });
// Route::get('/trangchu', function(){
//     return view('trangchu');
// });
// Route::get('/table', function(){
//     return view('sanpham_table');
// });
// Route::get('/chair', function(){
//     return view('sanpham_chair');
// });

// Route động (có tham số)
// Route::get('/{id}', function($id){
//     return view("$id");
// });

//đăng ký route middleware để check login
// Route::post('formlogin', 'WelcomeController@login')->middleware('checklogin'::class);
