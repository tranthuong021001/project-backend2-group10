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
    public function getIndexAdmin()
    {
        if (Auth::check()) {
         return view('admin.layouts.index');
        }
      
    }
    public function getAllProductsAdmin()
    {
       
      $all_product = DB::table("products")
         ->join('protypes','protypes.id','=','products.type_id')
         ->join('manufactures','manufactures.id','=','products.manu_id')
         ;
        $all_product = $all_product->orderBy("products.id","Desc");
        $all_product = $all_product->select("*");
        $all_product = $all_product->paginate(15);
        return view('admin.layouts.AllProducts')->with('allproducts',$all_product);

        // return view('admin.layouts.AllProducts')->with('admin.layouts.AllProducts',$manager_product);;
        
      
    }
    public function getIndexAddProduct(Request $request)
    {
        $manu =  DB::table("manufactures")->orderBy("id","desc")->get();
        $type =  DB::table("protypes")->orderBy("id","desc")->get();
        $gender =  DB::table("genders")->orderBy("id","desc")->get();
        
        // $type =  DB::table("protypes");
        // $type = $type->select("*");
        // $datamanu = $manu->paginate(30);
        // $datatype = $type->paginate(30);
      

             return view('admin.layouts.addProduct')-> with('manu',$manu)->with('type',$type)->with('gender',$gender);
    }
    public function getSaveProduct(Request $request)
    {
       $data = array();
       $data['name'] = $request->name;
       $data['price'] = $request->price;
       $data['type_id'] = $request->type;
       $data['manu_id'] = $request->manu;
       $data['description'] = $request->description;
       $data['sale'] = $request->sale;
       $data['size'] = $request->size;
       $data['gender'] = $request->gender;
       
       $get_image =$request->file('product_image');
       
       if($get_image){
           $get_name = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name));
           $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
           $get_image->move('public/assets/img/product',$new_image);
           $data['image'] = $new_image;
        DB::table('products')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('/allproducts');   
       }
       $data['image'] = '';
       DB::table('products')->insert($data);
       Session::put('message','Thêm sản phẩm thành công');
      return Redirect::to('/allproducts');
    }
    public function EditProduct($id)
    {
        
        $manu =  DB::table("manufactures")->orderBy("id","desc")->get();
        $type =  DB::table("protypes")->orderBy("id","desc")->get();
        $gender =  DB::table("genders")->orderBy("id","desc")->get();
        $edit_product =  DB::table("products")->where('id',$id)->get();
       // $manager_product = view('admin.layouts.editProduct')->with('editproduct',$edit_product);
       
      

       return view('admin.layouts.editProduct')->with('editproduct',$edit_product)->with('manu',$manu)->with('type',$type)->with('gender',$gender);
    }
    public function UpdateProduct(Request $request,$id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['type_id'] = $request->type;
        $data['manu_id'] = $request->manu;
        $data['description'] = $request->description;
        $data['sale'] = $request->sale;
        $data['size'] = $request->size;
        $data['gender'] = $request->gender;
       // $manager_product = view('admin.layouts.editProduct')->with('editproduct',$edit_product);
       
       $get_image =$request->file('product_image');
       if($get_image){
        $get_name = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move('public/assets/img/product',$new_image);
        $data['image'] = $new_image;
        DB::table('products')->where('id',$id)->update($data);
        Session::put('message','Cập nhập sản phẩm thành công');
        return Redirect::to('/allproducts');   
       }
      
       DB::table('products')->where('id',$id)->update($data);
       Session::put('message','Cập nhập sản phẩm thành công');
      return Redirect::to('/allproducts');
    }
    public function DeleteProduct($id)
    {
        
        DB::table('products')->where('id',$id)->delete();
       // $manager_product = view('admin.layouts.editProduct')->with('editproduct',$edit_product);
       Session::put('message','xóa sản phẩm thành công');
       return Redirect::to('/allproducts');
      

       
    }
    // public function getOneProduct(){
    //     $product = Product::find(1);
    //     return view('frontend.master', ['product'=>$product]);
    // }





}
