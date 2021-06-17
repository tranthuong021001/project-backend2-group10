<?php

use Doctrine\DBAL\Driver\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

/*
********************************************************************
*******************ROUTE Ở PHẦN GIAO DIỆN ADMIN********************
********************************************************************
*/
Route::get('/admin/tc', 'AdminController@getIndexAdmin')->middleware('auth');
Route::get('/logout', 'AdminController@LogoutAdmin')->middleware('auth');
Route::get('/allproducts', 'AdminController@getAllProductsAdmin')->middleware('auth');
Route::get('/admin/addproduct', 'AdminController@getIndexAddProduct')->middleware('auth');;
Route::post('/admin/saveproduct', 'AdminController@getSaveProduct')->middleware('auth');;
Route::get('/admin/editproduct/{id}', 'AdminController@EditProduct')->middleware('auth');;
Route::post('/admin/updateproduct/{id}', 'AdminController@UpdateProduct')->middleware('auth');;
Route::get('/admin/deleteproduct/{id}', 'AdminController@DeleteProduct')->middleware('auth');;
//manufacture admin
Route::get('/allmanufactures', 'AdminController@getAllManufacturesAdmin')->middleware('auth');
Route::get('/admin/addmanufactures', 'AdminController@getIndexAddManufactures')->middleware('auth');;
Route::post('/admin/savemanufactures', 'AdminController@getSaveManufactures')->middleware('auth');;
Route::get('/admin/editmanu/{id}', 'AdminController@EditManu')->middleware('auth');;
Route::post('/admin/updatemanu/{id}', 'AdminController@UpdateManu')->middleware('auth');;
Route::get('/admin/deletemanu/{id}', 'AdminController@DeleteManu')->middleware('auth');;
//protypes admin
Route::get('/allprotypes', 'AdminController@getAllProtypesAdmin')->middleware('auth');
Route::get('/admin/addprotypes', 'AdminController@getIndexAddProtypes')->middleware('auth');;
Route::post('/admin/saveprotypes', 'AdminController@getSaveProtypes')->middleware('auth');;
Route::get('/admin/editprotype/{id}', 'AdminController@EditProtypes')->middleware('auth');;
Route::post('/admin/updateprotype/{id}', 'AdminController@UpdateProtypes')->middleware('auth');;
Route::get('/admin/deleteprotype/{id}', 'AdminController@DeleteProtypes')->middleware('auth');;

//user admin
Route::get('/allusers', 'AdminController@getAllUserInAdmin')->middleware('auth');
Route::get('/admin/deleteuser/{id}', 'AdminController@DeleteUser')->middleware('auth');
Route::get('/adduser', 'AdminController@AddUser')->middleware('auth');
Route::post('/saveuser', 'AdminController@SaveUser')->middleware('auth');;
Route::get('/edituser/{id}', 'AdminController@EditUser')->middleware('auth');;
Route::post('/updateuser/{id}', 'AdminController@UpdateUser')->middleware('auth');;
//bill admin
Route::get('/allbills', 'AdminController@getAllBillInAdmin')->middleware('auth');
Route::get('/admin/deletebill/{id}', 'AdminController@DeleteBill')->middleware('auth');;
Route::get('/admin/billdetail/{id}', 'AdminController@DetailBill')->middleware('auth');


/*
********************************************************************
*******************ROUTE Ở PHẦN GIAO DIỆN NGƯỜI DÙNG****************
********************************************************************
*/
Route::get('/', 'welcomecontroller@getProductClothingFemale');

Route::get('/manu', 'welcomecontroller@getAllManufactures');

//lấy sản phâm theo  loại
Route::get('/productbycategory/{id}', 'welcomecontroller@getProductByCategory')->name('productbycategory');
//lấy sản phâm theo loại và hãng nam
Route::get('/productbycategorymen/{id}/{manu_id}', 'welcomecontroller@getProductByCategoryMen')->name('productbycategorymen');
//lấy sản phâm theo loại và hãng nữ
Route::get('/productbycategorywomen/{id}/{manu_id}', 'welcomecontroller@getProductByCategoryWomen')->name('productbycategorywomen');
//lấy sản phâm đang sale
Route::get('/productmensale', 'welcomecontroller@getProductMenSale');
Route::get('/productwomensale', 'welcomecontroller@getProductWomenSale');

//lấy sản phâm theo  hãng sản xuất
Route::get('/productbymanufacture/{id}', 'welcomecontroller@getProductByManufacture')->name('productbymanufacture');
Route::get('/productbymanufacturegenderwomen/{id}/{gender}', 'welcomecontroller@getProductByManufactureWomen')->name('productbymanufacturegenderwomen');
Route::get('/productbymanufacturegendermen/{id}/{gender}', 'welcomecontroller@getProductByManufactureMen')->name('productbymanufacturegendermen');

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
Route::get('/logout-checkout', 'CheckoutController@logout_checkout' );
Route::post('/add-customer', 'CheckoutController@add_customer' );
Route::post('/login-account', 'CheckoutController@login_account' );

//Bill
Route::post('/order', 'CheckoutController@order' );
Route::get('/checkout', 'CheckoutController@return_checkout_file');

//Rating product
Route::post('/rating-product', 'CheckoutController@rating_product' );

//tim kiem san pham
Route::get('/seachproduct', 'welcomecontroller@Seach_Product');
Route::get('/contact', 'welcomecontroller@Contact');

