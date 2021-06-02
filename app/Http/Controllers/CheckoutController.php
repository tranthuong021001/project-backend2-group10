<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

session_start();

class CheckoutController extends Controller
{
    //hàm trả về from điền thông tin đơn hàng
    public function show_order(){
        return view('frontend.checkout');
    }

    //hàm trả về from đăng nhập
    public function login_checkout(){
        return view('frontend.login.loginform');
    }

    //hàm đăng kí tài khoảng mới
    public function add_customer(Request $request){
        $data = array();

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;

        $id = DB::table('users')->insertGetId($data);

        Session::put('id', $id);
        Session::put('name', $request->name);
        return Redirect('/checkout');
    }
    
    public function checkout(){
        return Redirect('/show-order');
    }
}
