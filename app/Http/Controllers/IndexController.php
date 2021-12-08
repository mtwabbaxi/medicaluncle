<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Contact;
use App\Blog;

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

    
    public function postContact(Request $req){

        $req->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'message' => 'required',
        ]);

        if($req->name != null && $req->email != null && $req->message != null){
            $contact = new Contact;
            $contact->name = $req->name;
            $contact->email = $req->email;
            $contact->message = $req->message;
            $contact->save();
            return redirect()->back()->with('msg','Your message has been sent successfully!')->with('msgType','info');
        } else {
            return redirect()->back()->with('msg','Please, fill all form fields!')->with('msgType','error');
        }
    }

    public function blogs(){
        $blogs = Blog::orderBy('id','DESC')->get();;
        return view('blogs',compact('blogs'));
    }

    public function blogDetail($id){
        $blog = Blog::find($id);
        return view('blog-single',compact('blog'));
    }
}
