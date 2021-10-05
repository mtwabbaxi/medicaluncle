<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    public function shop(){
        $products = Product::orderBy('id','DESC')->get();
        return view('shop',compact('products'));
    }

    public function productDetail($id){
        $product = Product::find($id);
        return view('product-single',compact('product'));
    }

    public function searchProduct(Request $req){
        $searchTerm = $req->searchTerm;
        $products = Product::Where('name', 'like', '%' . $searchTerm . '%')->get();
        return view('shop',compact('products'));
    }

    public function categoryDetail($id){
        $products = Product::where('category_id',$id)->get();
        return view('shop',compact('products'));
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
