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
}
