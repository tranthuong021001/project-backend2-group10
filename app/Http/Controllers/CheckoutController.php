<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\User;
use Carbon\Carbon;
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
    //hàm trả về trang checkout.blade.php
    public function return_checkout_file(){
        return view('frontend.checkout');
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

            $content = Cart::content();
            //tạo bill sau khi đặt hàng
            $bill = array();
            $bill['user_id'] = Session::get('id');
            $bill['shipping_id'] = $shipping_id;
            $id = DB::table('bills')->insertGetId($bill);

            //tạo bill details
            foreach ($content as $value) {
                $subtotal = $value->price * $value->qty;
                $billDetail = array();
                $billDetail['bill_id'] = $id;
                $billDetail['product_id'] = $value->id;
                $billDetail['amount'] = $value->qty;
                $billDetail['total_money'] = $subtotal;
                DB::table('bill__details')->insertGetId($billDetail);
            }

            //cập nhật tổng tiền bảng bills
            $total_money = Cart::subtotal(0, 0, '');
            DB::update('update bills set total_money = ' . $total_money . ' where id = ?', [$id]);

            return Redirect('/checkout');
        } else {
            return Redirect('/');
        }
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
            //lưu id người dùng vào session
            Session::put('id', $result->id);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-checkout');
        }
    }

    //hàm đánh giá sản phẩm
    public function rating_product(Request $request){
        //lấy tên người đánh giá
        $rating_name = User::find(Session::get('id'));
        echo $rating_name->name;

        $rating_product = array();
        $rating_product['product_id'] = $request->product_id;
        $rating_product['user_id'] = Session::get('id');
        $rating_product['rating_comment'] = $request->product_comment;
        $rating_product['rating_name'] = $rating_name->name;
        $rating_product['created_at'] = Carbon::now()->toDateString();
        DB::table('ratings')->insert($rating_product);
        //đánh giá sản phẩm xong thì xóa sp khỏi giỏi hàng
        $rowId = $request->product_rowId;
        Cart::update($rowId, 0);

        return Redirect('/checkout');
    }
}
