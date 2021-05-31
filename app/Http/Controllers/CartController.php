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
        return Redirect::to('/show-cart');
      // return view('frontend.cart.showcart', compact('product_info','quanlity'));


    }

    public function show_cart(){
        // $productid = $request->productid_hidden;
        // $quanlity = $request->qty;

        // $product_info = DB::table('products')->where('id', $productid)->get();
        return view('frontend.cart.showcart');
    }
}
