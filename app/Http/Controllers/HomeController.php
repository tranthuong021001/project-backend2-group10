<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.home');
    }
   
    public function getAllProductHome(){
        $product = Product::all();
        $Product_Image = Product_Image::all();
        return view('frontend.index', ['products'=>$product] , ['Product_Image'=>$Product_Image]);
    }
    public function getAdmin(){
        $product = Product::all();
        $Product_Image = Product_Image::all();
        return view('frontend.index', ['products'=>$product] , ['Product_Image'=>$Product_Image]);
    }


    public function Acount($para){
        return view('layouts/'.$para);
    }
}
