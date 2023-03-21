<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class mainController extends Controller
{
    public function index(){
        return view('shop.main');
    }
    public function about()
    {
return view('shop.about');
    }
    public function shop()
    {
        return view('shop.shop');
    }
    public function contact()
    {
        return view('shop.contact');


    }
    public function checkout()
    {
        return view('shop.checkout');


    }
}

