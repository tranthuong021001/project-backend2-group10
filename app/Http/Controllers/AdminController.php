<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;

class AdminController extends Controller
{
    public function getIndexAdmin()
    {
        if (Auth::check()) {
            $user = Auth::user();
         return view('admin.layouts.index',$user);
        }
      
    }
    public function LogoutAdmin()
    {
        Auth::logout();
    return redirect()->route('login');
    }
   
    public function getAllProductsAdmin()
    {
       
      $all_product = DB::table("products")
         ->join('protypes','protypes.id','=','products.type_id')
         ->join('manufactures','manufactures.id','=','products.manu_id')
         ->select('products.*', 'protypes.type_name', 'manufactures.manu_name')
        
         ;
        $all_product = $all_product->orderBy("products.id","Desc");
     
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
          // $path = $request->file('product_image')->store('public/assets/img/product');
           $get_image->move('assets/img/product/',$new_image);
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
   //manufacture 
   public function getAllManufacturesAdmin()
   {
     $all_manu = DB::table("manufactures")
        ->select('manufactures.*');
       $all_manu = $all_manu->orderBy("manufactures.id","Desc");
       $all_manu = $all_manu->paginate(15);
       return view('admin.layouts.AllManu')->with('allmanufactures',$all_manu);     
   }
   public function getIndexAddManufactures(Request $request)
   {     
            return view('admin.layouts.addManu');
   }
   public function getSaveManufactures(Request $request)
   {
      $data = array();
      $data['manu_name'] = $request->name;
      DB::table('manufactures')->insert($data);
      Session::put('message','Thêm hiệu sản xuất thành công');
     return Redirect::to('/allmanufactures');
   }
   public function EditManu($id)
   {
       $edit_manu =  DB::table("manufactures")->where('id',$id)->get(); 
      return view('admin.layouts.editManu')->with('editmanu',$edit_manu);
   }
    public function UpdateManu(Request $request,$id)
   {
       $data = array();
       $data['manu_name'] = $request->name;
      DB::table('manufactures')->where('id',$id)->update($data);
      Session::put('message','Cập nhập hiệu sản xuất thành công');
     return Redirect::to('/allmanufactures');
   }
   public function DeleteManu($id)
    {
        DB::table('manufactures')->where('id',$id)->delete();
       Session::put('message','xóa hiệu sản xuất thành công');
       return Redirect::to('/allmanufactures');
    }
    //protypes
    public function getAllProtypesAdmin()
    {
      $all_type = DB::table("protypes")
         ->select('protypes.*');
        $all_type = $all_type->orderBy("protypes.id","Desc");
        $all_type = $all_type->paginate(15);
        return view('admin.layouts.AllProtypes')->with('allprotypes',$all_type);     
    }
    public function getIndexAddProtypes(Request $request)
    {     
             return view('admin.layouts.addProtypes');
    }
    public function getSaveProtypes(Request $request)
    {
       $data = array();
       $data['type_name'] = $request->name;
       DB::table('protypes')->insert($data);
       Session::put('message','Thêm loại sản phẩm thành công');
      return Redirect::to('/allprotypes');
    }
    public function EditProtypes($id)
    {
        $edit_type =  DB::table("protypes")->where('id',$id)->get(); 
       return view('admin.layouts.editProtype')->with('editprotype',$edit_type);
    }
     public function UpdateProtypes(Request $request,$id)
    {
        $data = array();
        $data['type_name'] = $request->name;
       DB::table('protypes')->where('id',$id)->update($data);
       Session::put('message','Cập nhập loại sản phẩm thành công');
      return Redirect::to('/allprotypes');
    }
    public function DeleteProtypes($id)
     {
         DB::table('protypes')->where('id',$id)->delete();
        Session::put('message','xóa loại sản phẩm thành công');
        return Redirect::to('/allprotypes');
     }
     //user in admin getAllUserInAdmin
     public function getAllUserInAdmin()
     {
       $all_user = DB::table("users")
          ->select('users.*');
         $all_user = $all_user->orderBy("users.id","Desc");
         $all_user = $all_user->paginate(15);
         return view('admin.layouts.AllUser')->with('allusers',$all_user);     
     }
     public function DeleteUser($id)
     {
         DB::table('users')->where('id',$id)->delete();
        Session::put('message','xóa người dùng '."users.id".' thành công');
        return Redirect::to('/allusers');
     }
     public function AddUser(Request $request)
   {     
            return view('admin.layouts.addUser');
   }
   public function SaveUser(Request $request)
   {
      $data = array();
      $data['username'] = $request->username;
      $data['password'] = $request->password;
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['phone'] = $request->phone;
      DB::table('users')->insert($data);
      Session::put('message','Thêm người dùng thành công');
     return Redirect::to('/allusers');
   }
   public function EditUser($id)
   {
       $edit_user =  DB::table("users")->where('id',$id)->get(); 
      return view('admin.layouts.editUser')->with('edituser',$edit_user);
   }
    public function UpdateUser(Request $request,$id)
   {
    $data = array();
    $data['username'] = $request->username;
    $data['password'] = $request->password;
    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Cập nhập người dùng thành công');
     return Redirect::to('/allusers');
   }
     // admin bill 
     public function getAllBillInAdmin()
     {
       $allBill = DB::table("bills")
    //    ->join('bill__details','bill__details.id','=','bills.bill_id')
       ->join('users','users.id','=','bills.user_id')
   
      // ->join('shipping_infos','shipping_infos.id','=','bills.shipping_id')
          ->select('bills.*','users.name');
         $allBill = $allBill->orderBy("bills.id","Desc");
         $allBill = $allBill->paginate(15);
         return view('admin.layouts.AllBills')->with('allBill',$allBill);     
     }
     public function DeleteBill($id)
     {
         DB::table('bills')->where('id',$id)->delete();
        Session::put('message','xóa người dùng '."bills.id".' thành công');
        return Redirect::to('/allbills');
     }
     public function DetailBill($id)
     {
        $detailbill = DB::table("bills")
        ->join('bill__details','bill__details.bill_id','=','bills.id')
        ->join('products','products.id','=','bill__details.product_id')
        ->join('shipping__infos','shipping__infos.shipping_id','=','bills.shipping_id')
        ->join('users','users.id','=','bills.user_id')
        ->where('bills.id',$id)
       // ->join('shipping_infos','shipping_infos.id','=','bills.shipping_id')
           ->select('bills.*',
           'bill__details.bill_id','bill__details.product_id','bill__details.amount','bill__details.total_money',
           'products.product_name', 'products.price',
           'shipping__infos.shipping_name', 'shipping__infos.shipping_email','shipping__infos.shipping_address','shipping__infos.shipping_phone','shipping__infos.shipping_note',
           'users.name','users.email','users.phone')->first();
         //  print_r($detailbill);
       
        return view('admin.layouts.DetailBill')->with('detailbill',$detailbill);
     }
}
