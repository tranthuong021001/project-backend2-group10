<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//khai bao model

use App\Product;
use App\Product_Image;
use App\Protype;

use App\Manufacture;

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

//get detailt product
public function ViewProductByManufacture()
{
   // $product = Product::all()->take(10);

    return view('frontend.productbymanufacture');
}
     //get detailt product
     public function getProductDetail()
     {
        // $product = Product::all()->take(10);

         return view('frontend.productdetail');
     }
    //get all products
    public function getProductByProtype()
    {
        $protype = Protype::all();
        return view('frontend.index', ['protypes' => $protype]);
    }

    //get all products , manufacture , proytpe of products
    public function getAllProduct()
    {
        


        //return view('frontend.index', ['manufactures' => $manufacture], ['protypes' => $protype], ['products' => $product]);
        return view('frontend.index');
    }

    //lấy sản phẩm kết với bảng product_image( chưa xong)
    public function getAllProductHome()
    {
        //hiển thị sản phẩm
        $product = Product::all();
        $Product_Image = Product_Image::all();
        //hiển thị loại sản phẩm
        $protype = Protype::all();

        return view('frontend.index', ['products' => $product], ['Product_Image' => $Product_Image], ['Protypes' => $protype]);
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


    // public function getOneProduct(){
    //     $product = Product::find(1);
    //     return view('frontend.master', ['product'=>$product]);
    // }





}
