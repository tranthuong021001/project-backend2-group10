<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function Save_Cart(Request $request){
        $productid = $request->productid_hidden;
        $quanlity = $request->qty;

        $data = DB::table('products')->where('id', $productid)->get();

        return view('frontend.cart.showcart', compact('data','quanlity'));

    }
}
