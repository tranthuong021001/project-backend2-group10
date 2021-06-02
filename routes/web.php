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
Route::get('/admin', 'AdminController@getIndexAdmin')->middleware('auth');
Route::get('/logout', 'AdminController@LogoutAdmin')->middleware('auth');
Route::get('/allproducts', 'AdminController@getAllProductsAdmin')->middleware('auth');
Route::get('/admin/addproduct', 'AdminController@getIndexAddProduct');
Route::post('/admin/saveproduct', 'AdminController@getSaveProduct');
Route::get('/admin/editproduct/{id}', 'AdminController@EditProduct');
Route::post('/admin/updateproduct/{id}', 'AdminController@UpdateProduct');
Route::get('/admin/deleteproduct/{id}', 'AdminController@DeleteProduct');
//manufacture admin
Route::get('/allmanufactures', 'AdminController@getAllManufacturesAdmin')->middleware('auth');
Route::get('/admin/addmanufactures', 'AdminController@getIndexAddManufactures');
Route::post('/admin/savemanufactures', 'AdminController@getSaveManufactures');
Route::get('/admin/editmanu/{id}', 'AdminController@EditManu');
Route::post('/admin/updatemanu/{id}', 'AdminController@UpdateManu');
Route::get('/admin/deletemanu/{id}', 'AdminController@DeleteManu');
//protypes
Route::get('/allprotypes', 'AdminController@getAllProtypesAdmin')->middleware('auth');
Route::get('/admin/addprotypes', 'AdminController@getIndexAddProtypes');
Route::post('/admin/saveprotypes', 'AdminController@getSaveProtypes');
Route::get('/admin/editprotype/{id}', 'AdminController@EditProtypes');
Route::post('/admin/updateprotype/{id}', 'AdminController@UpdateProtypes');
Route::get('/admin/deleteprotype/{id}', 'AdminController@DeleteProtypes');


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
