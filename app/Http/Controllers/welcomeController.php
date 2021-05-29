<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

//khai bao model

use App\Product;
use App\Product_Image;
use App\Protype;

use App\Manufacture;
use App\Category;

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


    //hàm lấy all sản phẩm theo hãng
    public function getProductByManufacture($id)
    {
        $productbymanufacture = Manufacture::find($id)->product;
        return view('frontend.productbymanufacture', compact('productbymanufacture'));
    }
    //hàm lấy all sản phẩm theo loại
    public function getProductByCategory($id)
    {
        $category = Protype::find($id)->product;
        return view('frontend.productbycategory', compact('category'));
    }

     //xem chi tiet san pham
     public function View_Product_Detail($id)
     {
        $singleProduct = Product::find($id);

        // $product_image = Product::find($id)->product_image;
        // //lấy các sản phẩm cùng manufacture vs singleProduct
        // $productByCategory = Protype::find($singleProduct->type_id)->product;


        return view('frontend.index', compact('singleProduct'));
     }

     //xem chi tiet san pham View_Product_Detail
     public function Product_Detail($id)
     {
        $singleProduct = Product::find($id);

        $product_image = Product::find($id)->product_image;
        //lấy các sản phẩm cùng manufacture vs singleProduct
        $productByCategory = Protype::find($singleProduct->type_id)->product;
        return view('frontend.productdetail', compact('singleProduct','product_image','productByCategory'));
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
        $product_Feature = Product::where('sale', '>=',1)->get();

        //return view('frontend.index', ['manufactures' => $manufacture], ['protypes' => $protype], ['products' => $product]);
        return view('frontend.index', compact('product_Feature'));
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
?>
