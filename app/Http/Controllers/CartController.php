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
    public function Save_Cart(Request $request){
        $productid = $request->productid_hidden;
        $quanlity = $request->qty;

        $product_info = DB::table('products')->where('id', $productid)->first();

        //Cart::add('293ad', 'Product 1', 1, 9.99, 550);
        // Cart::destroy();
        $data['id'] = $product_info->id;
        $data['qty'] = $quanlity;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['weight'] = $product_info->price;
        $data['options']['image'] = $product_info->image;
        Cart::add($data);

        echo $data['id'].'<br>';
        echo $data['qty'].'<br>';
        echo $data['name'].'<br>';
        echo $data['price'].'<br>';
        return Redirect::to('/show-cart');
      // return view('frontend.cart.showcart', compact('product_info','quanlity'));


    }


    public function show_cart(){

        return view('frontend.cart.showcart');
    }

    //hàm xóa sp khỏi giỏ hàng
    public function delete_to_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        echo 'thuong';
        $qty = $request->quantity_product;
        $rowId = $request->rowId_cart;
        echo $rowId.'<br>';
        echo $qty;
        Cart::update($rowId, $qty);
        //return Redirect::to('/show-cart');
    }
}
