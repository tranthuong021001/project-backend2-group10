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
    return view('frontend/index');
});

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



