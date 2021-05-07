<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;

//khai bao model
use App\Product;

class WelcomeController extends Controller
{
    public function index($id="thao"){
        return $id;
    }
    public function admin($age){
        return 'hello admin!';
    }
    public function login(Request $request){
        return 'hello '.$request->username;
    }
    public function page($page){
        return view('frontend/'.$page);
    }

    public function getAllProduct(){
        $product = Product::all();
        return view('frontend.master', ['product'=>$product]);
    }

    public function getOneProduct(){
        $product = Product::find(1);
        return view('frontend.master', ['product'=>$product]);
    }





}
