<?php

use Doctrine\DBAL\Driver\Middleware;
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


   // Route::match(['get','post'],'/admin',['as' =>'/admin','user' => 'welcomecontroller@getIndexAdmin']);
//Route::get('/admin', 'welcomecontroller@getIndexAdmin');
 
Route::get('/home', 'HomeController@getAllProductHome')->name('home');
//product admin
//Route::get('/addproduct', 'welcomecontroller@getIndexAddProduct');
Route::get('/admin', 'WelcomeController@getIndexAdmin')->middleware('auth');
Route::get('/allproducts', 'WelcomeController@getAllProductsAdmin')->middleware('auth');
Route::get('/admin/addproduct', 'welcomecontroller@getIndexAddProduct');
Route::post('/admin/saveproduct', 'welcomecontroller@getSaveProduct');
Route::get('/admin/editproduct/{id}', 'welcomecontroller@EditProduct');




//Route::match(['get','post'],'/admin/addproduct',['as' =>'/admin/addproduct','user' => 'welcomecontroller@getIndexAddProduct'])->middleware('auth') ;
//route động có tham số dùng để chuyển đến trang Account
Route::get('/{para}', 'HomeController@index')->name('home');


Route::get('/', 'welcomecontroller@getAllProduct');
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
