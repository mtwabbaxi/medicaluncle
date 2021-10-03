<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function shop(){
        return view('shop');
    }

    public function productDetail(){
        return view('product-single');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function blogs(){
        return view('blogs');
    }

    public function blogDetail(){
        return view('blog-single');
    }
}
