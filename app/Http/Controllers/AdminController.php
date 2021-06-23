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
    public function AuthLogin()
    {
        $admin_id = Session::get('id');

        $admin_role = Session::get('role');

        if ($admin_id) {
            if ($admin_role == '1') {
                $admin_name = DB::table('users')->where('id', $admin_id)->first();
                return Redirect::to('/admin/tc')->with(compact('admin_name'));
            } else {
                return Redirect::to('/')->send();
            }
        } else {
            return Redirect::to('/logout-checkout')->send();
        }
    }
    public function getNameAdmin()
    {
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
    }
    public function getIndexAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        return view('admin.layouts.index')->with(compact('admin_name'));
    }
    public function LogoutAdmin()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function getAllProductsAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $all_product = DB::table("products")
            ->join('protypes', 'protypes.id', '=', 'products.type_id')
            ->join('manufactures', 'manufactures.id', '=', 'products.manu_id')
            ->select('products.*', 'protypes.type_name', 'manufactures.manu_name');
        $all_product = $all_product->orderBy("products.id", "Desc");

        $all_product = $all_product->paginate(15);
        return view('admin.layouts.AllProducts')->with('allproducts', $all_product)->with(compact('admin_name'));
    }
    public function getIndexAddProduct(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        return view('admin.layouts.addProduct')->with('manu', $manu)->with('type', $type)->with('gender', $gender)->with(compact('admin_name'));
    }
    public function getSaveProduct(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['type_id'] = $request->type;
        $data['manu_id'] = $request->manu;
        $data['description'] = $request->description;
        $data['sale'] = $request->sale;
        $data['size'] = $request->size;
        $data['gender'] = $request->gender;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('assets/img/product/', $new_image);
            $data['image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công');
            return Redirect::to('/allproducts')->with(compact('admin_name'));
        }
        $data['image'] = '';
        DB::table('products')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return Redirect::to('/allproducts')->with(compact('admin_name'));
    }
    public function EditProduct($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $manu =  DB::table("manufactures")->orderBy("id", "desc")->get();
        $type =  DB::table("protypes")->orderBy("id", "desc")->get();
        $gender =  DB::table("genders")->orderBy("id", "desc")->get();
        $edit_product =  DB::table("products")->where('id', $id)->get();
        return view('admin.layouts.editProduct')->with('editproduct', $edit_product)->with('manu', $manu)->with('type', $type)->with('gender', $gender)->with(compact('admin_name'));
    }
    public function UpdateProduct(Request $request, $id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['type_id'] = $request->type;
        $data['manu_id'] = $request->manu;
        $data['description'] = $request->description;
        $data['sale'] = $request->sale;
        $data['size'] = $request->size;
        $data['gender'] = $request->gender;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('assets/img/product', $new_image);
            $data['image'] = $new_image;
            DB::table('products')->where('id', $id)->update($data);
            Session::put('message', 'Cập nhập sản phẩm thành công');
            return Redirect::to('/allproducts')->with(compact('admin_name'));
        }

        DB::table('products')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhập sản phẩm thành công');
        return Redirect::to('/allproducts')->with(compact('admin_name'));
    }
    public function DeleteProduct($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        DB::table('products')->where('id', $id)->delete();

        Session::put('message', 'xóa sản phẩm thành công');
        return Redirect::to('/allproducts')->with(compact('admin_name'));
    }
    //manufacture
    public function getAllManufacturesAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $all_manu = DB::table("manufactures")
            ->select('manufactures.*');
        $all_manu = $all_manu->orderBy("manufactures.id", "Desc");
        $all_manu = $all_manu->paginate(15);
        return view('admin.layouts.AllManu')->with('allmanufactures', $all_manu)->with(compact('admin_name'));
    }
    public function getIndexAddManufactures(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        return view('admin.layouts.addManu')->with(compact('admin_name'));
    }
    public function getSaveManufactures(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['manu_name'] = $request->name;
        DB::table('manufactures')->insert($data);
        Session::put('message', 'Thêm hiệu sản xuất thành công');
        return Redirect::to('/allmanufactures')->with(compact('admin_name'));
    }
    public function EditManu($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $edit_manu =  DB::table("manufactures")->where('id', $id)->get();
        return view('admin.layouts.editManu')->with('editmanu', $edit_manu)->with(compact('admin_name'));
    }
    public function UpdateManu(Request $request, $id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['manu_name'] = $request->name;
        DB::table('manufactures')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhập hiệu sản xuất thành công');
        return Redirect::to('/allmanufactures')->with(compact('admin_name'));
    }
    public function DeleteManu($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        DB::table('manufactures')->where('id', $id)->delete();
        Session::put('message', 'xóa hiệu sản xuất thành công');
        return Redirect::to('/allmanufactures')->with(compact('admin_name'));
    }
    //protypes
    public function getAllProtypesAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $all_type = DB::table("protypes")
            ->select('protypes.*');
        $all_type = $all_type->orderBy("protypes.id", "Desc");
        $all_type = $all_type->paginate(15);
        return view('admin.layouts.AllProtypes')->with('allprotypes', $all_type)->with(compact('admin_name'));
    }
    public function getIndexAddProtypes(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        return view('admin.layouts.addProtypes')->with(compact('admin_name'));
    }
    public function getSaveProtypes(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['type_name'] = $request->name;
        DB::table('protypes')->insert($data);
        Session::put('message', 'Thêm loại sản phẩm thành công');
        return Redirect::to('/allprotypes')->with(compact('admin_name'));
    }
    public function EditProtypes($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $edit_type =  DB::table("protypes")->where('id', $id)->get();
        return view('admin.layouts.editProtype')->with('editprotype', $edit_type)->with(compact('admin_name'));
    }
    public function UpdateProtypes(Request $request, $id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['type_name'] = $request->name;
        DB::table('protypes')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhập loại sản phẩm thành công');
        return Redirect::to('/allprotypes')->with(compact('admin_name'));
    }
    public function DeleteProtypes($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        DB::table('protypes')->where('id', $id)->delete();
        Session::put('message', 'xóa loại sản phẩm thành công');
        return Redirect::to('/allprotypes')->with(compact('admin_name'));
    }
    //user in admin getAllUserInAdmin
    public function getAllUserInAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $all_user = DB::table("users")
            ->select('users.*');
        $all_user = $all_user->orderBy("users.id", "Desc");
        $all_user = $all_user->paginate(15);
        return view('admin.layouts.AllUser')->with('allusers', $all_user)->with(compact('admin_name'));
    }
    public function DeleteUser($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        DB::table('users')->where('id', $id)->delete();
        Session::put('message', 'xóa người dùng ' . "users.id" . ' thành công');
        return Redirect::to('/allusers')->with(compact('admin_name'));
    }
    public function AddUser(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $role =  DB::table("role")->orderBy("id", "desc")->get();
        return view('admin.layouts.addUser')->with('role', $role)->with(compact('admin_name'));
    }
    public function SaveUser(Request $request)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['role'] = $request->role;
        DB::table('users')->insert($data);
        Session::put('message', 'Thêm người dùng thành công');
        return Redirect::to('/allusers')->with(compact('admin_name'));
    }
    public function EditUser($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $role =  DB::table("role")->orderBy("id", "desc")->get();
        $edit_user =  DB::table("users")->where('id', $id)->get();
        return view('admin.layouts.editUser')->with('edituser', $edit_user)->with('role', $role)->with(compact('admin_name'));
    }
    public function UpdateUser(Request $request, $id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $data = array();
        $data['username'] = $request->username;
        $data['password'] = md5($request->password);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['role'] = $request->role;
        DB::table('users')->where('id', $id)->update($data);
        Session::put('message', 'Cập nhập người dùng thành công');
        return Redirect::to('/allusers')->with(compact('admin_name'));
    }
    // admin bill
    public function getAllBillInAdmin()
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        $order = DB::table('bills')
            ->join('users', 'users.id', '=', 'bills.user_id')
            ->select('bills.*', 'users.name');
        $order = $order->orderBy("bills.id", "Desc");
        $order = $order->paginate(15);

        return view('admin.layouts.AllBills')->with(compact('order'))->with(compact('admin_name'));
    }
    public function DeleteBill($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();
        DB::table('bills')->where('id', $id)->delete();
        Session::put('message', 'xóa người dùng ' . "bills.id" . ' thành công');
        return Redirect::to('/allbills')->with(compact('admin_name'));
    }
    public function DetailBill($id)
    {
        $this->AuthLogin();
        $admin_id = Session::get('id');
        $admin_name = DB::table('users')->where('id', $admin_id)->first();

        $order = Bill::where('id', $id)->get();
        foreach ($order as $key) {
            $user_id = $key->user_id;
            $shipping_id = $key->shipping_id;
        }
        $user = User::where('id', $user_id)->first();
        $shipping = shipping::where('shipping_id', $shipping_id)->first();
        $order_detail = Bill_Detail::with('Product')->where('bill_id', $id)->get();

        return view('admin.layouts.DetailBill')->with(compact('order_detail', 'user', 'shipping'))->with(compact('admin_name'));
    }
}
