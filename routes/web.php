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
Route::get('/login-checkout', 'CheckoutController@login_checkout');
Route::get('/admin/tc', 'AdminController@getIndexAdmin');

Route::get('/allproducts', 'AdminController@getAllProductsAdmin');
Route::get('/admin/addproduct', 'AdminController@getIndexAddProduct');
Route::post('/admin/saveproduct', 'AdminController@getSaveProduct');
Route::get('/admin/editproduct/{id}', 'AdminController@EditProduct');
Route::post('/admin/updateproduct/{id}', 'AdminController@UpdateProduct');
Route::get('/admin/deleteproduct/{id}', 'AdminController@DeleteProduct');
//manufacture admin
Route::get('/allmanufactures', 'AdminController@getAllManufacturesAdmin');
Route::get('/admin/addmanufactures', 'AdminController@getIndexAddManufactures');
Route::post('/admin/savemanufactures', 'AdminController@getSaveManufactures');
Route::get('/admin/editmanu/{id}', 'AdminController@EditManu');
Route::post('/admin/updatemanu/{id}', 'AdminController@UpdateManu');
Route::get('/admin/deletemanu/{id}', 'AdminController@DeleteManu');
Route::get('/allprotypes', 'AdminController@getAllProtypesAdmin');
Route::get('/admin/addprotypes', 'AdminController@getIndexAddProtypes');
Route::post('/admin/saveprotypes', 'AdminController@getSaveProtypes');
Route::get('/admin/editprotype/{id}', 'AdminController@EditProtypes');
Route::post('/admin/updateprotype/{id}', 'AdminController@UpdateProtypes');
Route::get('/admin/deleteprotype/{id}', 'AdminController@DeleteProtypes');

//user admin
Route::get('/allusers', 'AdminController@getAllUserInAdmin');
Route::get('/admin/deleteuser/{id}', 'AdminController@DeleteUser');
Route::get('/adduser', 'AdminController@AddUser');
Route::post('/saveuser', 'AdminController@SaveUser');
Route::get('/edituser/{id}', 'AdminController@EditUser');
Route::post('/updateuser/{id}', 'AdminController@UpdateUser');
//bill admin
Route::get('/allbills', 'AdminController@getAllBillInAdmin');
Route::get('/admin/deletebill/{id}', 'AdminController@DeleteBill');
Route::get('/admin/billdetail/{id}', 'AdminController@DetailBill');


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

//xem lịch sử mua hàng
Route::get('/purchase-history/{user_id}', 'welcomecontroller@Purchase_History')->name('Purchase_History');
