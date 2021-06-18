<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use App\shipping;
use App\Product;
use App\User;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
  public function AuthLogin(){
    $admin_id = Session::get('id');
    $admin_role = Session::get('role');
  
    if($admin_id){
        if($admin_role == '1'){
            return Redirect::to('/admin/tc');
        }
        else{
        return Redirect::to('/')->send();
        }
    }
    else{
        return Redirect::to('/logout-checkout')->send();
    }
}
    public function getIndexAdmin()
    {
        $this->AuthLogin();
         return view('admin.layouts.index');
        
    }
    public function LogoutAdmin()
    {
        Auth::logout();
    return redirect()->route('login');
    }
    public function getAllProductsAdmin()
    {  
      $this->AuthLogin();
      $all_product = DB::table("products")
         ->join('protypes','protypes.id','=','products.type_id')
         ->join('manufactures','manufactures.id','=','products.manu_id')
         ->select('products.*', 'protypes.type_name', 'manufactures.manu_name')
         ;
        $all_product = $all_product->orderBy("products.id","Desc");
     
        $all_product = $all_product->paginate(15);
        return view('admin.layouts.AllProducts')->with('allproducts',$all_product);
    }
    public function getIndexAddProduct(Request $request)
    {
      $this->AuthLogin();
        $manu =  DB::table("manufactures")->orderBy("id","desc")->get();
        $type =  DB::table("protypes")->orderBy("id","desc")->get();
        $gender =  DB::table("genders")->orderBy("id","desc")->get();
        return view('admin.layouts.addProduct')-> with('manu',$manu)->with('type',$type)->with('gender',$gender);
    }
    public function getSaveProduct(Request $request)
    {
      $this->AuthLogin();
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
      $this->AuthLogin();
        $manu =  DB::table("manufactures")->orderBy("id","desc")->get();
        $type =  DB::table("protypes")->orderBy("id","desc")->get();
        $gender =  DB::table("genders")->orderBy("id","desc")->get();
        $edit_product =  DB::table("products")->where('id',$id)->get();
       return view('admin.layouts.editProduct')->with('editproduct',$edit_product)->with('manu',$manu)->with('type',$type)->with('gender',$gender);
    }
    public function UpdateProduct(Request $request,$id)
    {
      $this->AuthLogin();
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
      $this->AuthLogin();
        DB::table('products')->where('id',$id)->delete();
      
       Session::put('message','xóa sản phẩm thành công');
       return Redirect::to('/allproducts');  
    }
   //manufacture 
   public function getAllManufacturesAdmin()
   {
    $this->AuthLogin();
     $all_manu = DB::table("manufactures")
        ->select('manufactures.*');
       $all_manu = $all_manu->orderBy("manufactures.id","Desc");
       $all_manu = $all_manu->paginate(15);
       return view('admin.layouts.AllManu')->with('allmanufactures',$all_manu);     
   }
   public function getIndexAddManufactures(Request $request)
   {     
    $this->AuthLogin();
            return view('admin.layouts.addManu');
   }
   public function getSaveManufactures(Request $request)
   {
    $this->AuthLogin();
      $data = array();
      $data['manu_name'] = $request->name;
      DB::table('manufactures')->insert($data);
      Session::put('message','Thêm hiệu sản xuất thành công');
     return Redirect::to('/allmanufactures');
   }
   public function EditManu($id)
   {
    $this->AuthLogin();
       $edit_manu =  DB::table("manufactures")->where('id',$id)->get(); 
      return view('admin.layouts.editManu')->with('editmanu',$edit_manu);
   }
    public function UpdateManu(Request $request,$id)
   {
    $this->AuthLogin();
       $data = array();
       $data['manu_name'] = $request->name;
      DB::table('manufactures')->where('id',$id)->update($data);
      Session::put('message','Cập nhập hiệu sản xuất thành công');
     return Redirect::to('/allmanufactures');
   }
   public function DeleteManu($id)
    {
      $this->AuthLogin();
        DB::table('manufactures')->where('id',$id)->delete();
       Session::put('message','xóa hiệu sản xuất thành công');
       return Redirect::to('/allmanufactures');
    }
    //protypes
    public function getAllProtypesAdmin()
    {
      $this->AuthLogin();
      $all_type = DB::table("protypes")
         ->select('protypes.*');
        $all_type = $all_type->orderBy("protypes.id","Desc");
        $all_type = $all_type->paginate(15);
        return view('admin.layouts.AllProtypes')->with('allprotypes',$all_type);     
    }
    public function getIndexAddProtypes(Request $request)
    {  
      $this->AuthLogin();   
             return view('admin.layouts.addProtypes');
    }
    public function getSaveProtypes(Request $request)
    {
      $this->AuthLogin();
       $data = array();
       $data['type_name'] = $request->name;
       DB::table('protypes')->insert($data);
       Session::put('message','Thêm loại sản phẩm thành công');
      return Redirect::to('/allprotypes');
    }
    public function EditProtypes($id)
    {
      $this->AuthLogin();
        $edit_type =  DB::table("protypes")->where('id',$id)->get(); 
       return view('admin.layouts.editProtype')->with('editprotype',$edit_type);
    }
     public function UpdateProtypes(Request $request,$id)
    {
      $this->AuthLogin();
        $data = array();
        $data['type_name'] = $request->name;
       DB::table('protypes')->where('id',$id)->update($data);
       Session::put('message','Cập nhập loại sản phẩm thành công');
      return Redirect::to('/allprotypes');
    }
    public function DeleteProtypes($id)
     {
      $this->AuthLogin();
         DB::table('protypes')->where('id',$id)->delete();
        Session::put('message','xóa loại sản phẩm thành công');
        return Redirect::to('/allprotypes');
     }
     //user in admin getAllUserInAdmin
     public function getAllUserInAdmin()
     {
      $this->AuthLogin();
       $all_user = DB::table("users")
      
          ->select('users.*');
         $all_user = $all_user->orderBy("users.id","Desc");
         $all_user = $all_user->paginate(15);
         return view('admin.layouts.AllUser')->with('allusers',$all_user);     
     }
     public function DeleteUser($id)
     {
      $this->AuthLogin();
         DB::table('users')->where('id',$id)->delete();
        Session::put('message','xóa người dùng '."users.id".' thành công');
        return Redirect::to('/allusers');
     }
     public function AddUser(Request $request)
   {
            $this->AuthLogin(); 
            $role =  DB::table("role")->orderBy("id","desc")->get();    
            return view('admin.layouts.addUser')->with('role',$role);
   }
   public function SaveUser(Request $request)
   {
    $this->AuthLogin();
      $data = array();
      $data['username'] = $request->username;
      $data['password'] = md5($request->password);
      $data['name'] = $request->name;
      $data['email'] = $request->email;
      $data['phone'] = $request->phone;
      $data['role'] = $request->role;
      DB::table('users')->insert($data);
      Session::put('message','Thêm người dùng thành công');
     return Redirect::to('/allusers');
   }
   public function EditUser($id)
   {
    $this->AuthLogin();
    $role =  DB::table("role")->orderBy("id","desc")->get();    
       $edit_user =  DB::table("users")->where('id',$id)->get(); 
      return view('admin.layouts.editUser')->with('edituser',$edit_user)->with('role',$role);
   }
    public function UpdateUser(Request $request,$id)
   {
    $this->AuthLogin();
    $data = array();
    $data['username'] = $request->username;
    $data['password'] = md5($request->password) ;
    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['phone'] = $request->phone;
    $data['role'] = $request->role;
      DB::table('users')->where('id',$id)->update($data);
      Session::put('message','Cập nhập người dùng thành công');
     return Redirect::to('/allusers');
   }
     // admin bill 
     public function getAllBillInAdmin()
     {
      $this->AuthLogin();
         $order = Bill::orderby('created_at','Desc')->get();
         return view('admin.layouts.AllBills')->with(compact('order'));     
     }
     public function DeleteBill($id)
     {
      $this->AuthLogin();
         DB::table('bills')->where('id',$id)->delete();
        Session::put('message','xóa người dùng '."bills.id".' thành công');
        return Redirect::to('/allbills');
     }
     public function DetailBill($id)
     {
      $this->AuthLogin();
      
        $order = Bill::where('id',$id)->get();
        foreach($order as $key)
        {
            $user_id = $key->user_id;
            $shipping_id = $key->shipping_id;   
        }
        $user = User::where('id',$user_id)->first();
        $shipping = shipping::where('shipping_id',$shipping_id)->first();
        $order_detail = Bill_Detail::with('product')->where('bill_id',$id)->get();
        return view('admin.layouts.DetailBill')->with(compact('order_detail' ,'user','shipping' ));
     }
     
}
