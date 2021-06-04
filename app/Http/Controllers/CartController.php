<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Cart;

session_start();

class CartController extends Controller
{
    //hàm thêm sản phẩm vào giỏ hàng
    public function Save_Cart(Request $request)
    {
        //kiểm tra nếu chưa đăng nhập thì ko cho thêm sản phẩm vào giỏ hàng
        $customer_id = Session::get('id');
        if ($customer_id == null) {
            return Redirect::to('/login-checkout');
        }
        else {
            $productid = $request->productid_hidden;
            $quanlity = $request->qty;
            $product_info = DB::table('products')->where('id', $productid)->first();
            $data['id'] = $product_info->id;
            $data['qty'] = $quanlity;
            $data['name'] = $product_info->name;
            $data['price'] = $product_info->price;
            $data['weight'] = $product_info->price;
            $data['options']['image'] = $product_info->image;
            Cart::add($data);
            return Redirect::to('/show-cart');
        }
    }

    //hàm hiển thị trang giỏ hàng
    public function show_cart()
    {
        return view('frontend.cart.showcart');
    }

    //hàm xóa sp khỏi giỏ hàng
    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request)
    {
        $qty = $request->quantity_product;
        $rowId = $request->rowId_cart;
        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');
    }
}
