<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
}
