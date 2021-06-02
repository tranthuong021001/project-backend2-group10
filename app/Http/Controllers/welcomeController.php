<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//khai bao model
use App\Manufacture;
use App\Product;
use App\Product_Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;

class WelcomeController extends Controller
{
    public function index($id = "thao")
    {
        return $id;
    }
    public function admin($age)
    {
        return 'hello admin!';
    }
    public function login(Request $request)
    {
        return 'hello ' . $request->username;
    }
    public function page($page)
    {
        return view('frontend/' . $page);
    }


    //get all products
    public function getProductByCategory()
    {
        $product = Product::all();
        return view('frontend.index', ['products' => $product]);
    }

    //get all products
    public function getAllProduct()
    {
        $product = Product::all();
        return view('frontend.index', ['products' => $product]);
    }

    //lấy sản phẩm kết với bảng product_image( chưa xong)
    public function getAllProductHome()
    {
        $product = Product::all();
        $Product_Image = Product_Image::all();
        return view('frontend.index', ['products' => $product], ['Product_Image' => $Product_Image]);
    }

    public function getAllManufactures()
    {
        $Manufactures = Manufacture::all();
        return view('frontend.index', ['Manufactures' => $Manufactures]);
    }

    public function getAllProduct_Image()
    {
        $Product_Image = Product_Image::all();
        return view('frontend.index', ['Product_Image' => $Product_Image]);
    }
   
}
