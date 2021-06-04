<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session as FacadesSession;

session_start();

class CheckoutController extends Controller
{
    //hàm trả về from điền thông tin đơn hàng
    public function show_order()
    {
        return view('frontend.checkout');
    }

    //hàm trả về from đăng nhập
    public function login_checkout()
    {
        return view('frontend.login.loginform');
    }



    //hàm đăng kí tài khoảng mới
    public function add_customer(Request $request)
    {
        $data = array();

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = md5($request->password);
        $data['phone'] = $request->phone;

        $customer_id = DB::table('users')->insertGetId($data);

        Session::put('id', $customer_id);
        Session::put('name', $request->name);
        return Redirect('/');
    }

    public function checkout()
    {
        return Redirect('/');
    }

    public function order_success()
    {
        return Redirect('/checkout');
    }
    //hàm đặt hàng
    public function order(Request $request)
    {
        //kiểm tra nếu giỏ hàng trống thì ko cho đặt hàng
        if (Cart::count() > 0) {
            $data = array();
            $data['shipping_name'] = $request->shipping_name;
            $data['shipping_email'] = $request->shipping_email;
            $data['shipping_address'] = $request->shipping_address;
            $data['shipping_phone'] = $request->shipping_phone;
            $data['shipping_note'] = $request->shipping_note;
            $shipping_id = DB::table('shipping__infos')->insertGetId($data);
            Session::put('shipping_id', $shipping_id);

        //sau khi đặt hàng xong thì xóa sản phẩm trong giỏ hàng
        $content = Cart::content();
        foreach($content as $value){
            Cart::update($value->rowId, 0);
        }
            return Redirect('/order-success');
        }
        else{
            return Redirect('/');
        }

        // $updated = DB::update('update bills set total_money = ' . 100 . ' where id = ?', [1]);
    }


    //hàm tạo bill
    public function show(Request $request)
    {
        $content = Cart::content();
        var_dump($content);
        //tạo bill
        $data = array();
        $data['user_id'] = 1;
        $id = DB::table('bills')->insertGetId($data);
        echo 'id của bảng bill ' . $id;
        Session::put('id', $id);
        Session::put('user_id', 1);


        foreach ($content as $value) {
            //  echo $value->id . '<br>';
            // echo $value->name . '<br>';
            // echo $value->price . '<br>';
            $subtotal = $value->price * $value->qty;
            //echo $subtotal;


            $data = array();
            $data['bill_id'] = $id;
            $data['product_id'] = $value->id;
            $data['amount'] = $value->qty;
            $data['total_money'] = $subtotal;
            $id_bill_details = DB::table('bill_details')->insertGetId($data);

            Session::put('id', $id_bill_details);
            Session::put('bill_id', $id);
        }


        //cập nhật tổng tiền bảng bills
        $updated = DB::update('update bills set total_money = ' . Cart::subtotal() . ' where id = ?', $id);


        foreach ($content as $value) {
            echo $value->id . '<br>';
            echo $value->name . '<br>';
            echo $value->price . '<br>';
            $subtotal = $value->price * $value->qty;
            echo $subtotal;
        }
        // foreach ($content as $value) {
        //     echo 'bill';
        //     echo $content->lenght.'<br';
        //     echo $value->name.'<br';

        //     echo $value->price.'<br';
        //     $subtotal = $value->price * $value->qty;
        //     echo $subtotal;

        // }


    }



    //hàm đăng xuất
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/login-checkout');
    }
    //hàm đăng nhập
    public function login_account(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->password);
        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('id', $result->id);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-checkout');
        }
    }
}
