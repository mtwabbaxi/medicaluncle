<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use App\Catalog;
use Auth;
use Hash;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $products = Product::orderBy('id','DESC')->limit('8')->get();
        $catalogs = Catalog::orderBy('id','DESC')->limit('8')->get();
        return view('buyer.index', compact('products','catalogs'));
    }

    public function products(){
        $products = Product::orderBy('id','DESC')->get();
        return view('buyer.products.index', compact('products'));
    }
    public function catalogs(){
        $catalogs = Catalog::orderBy('id','DESC')->get();
        return view('buyer.catalogs.index', compact('catalogs'));
    }
    public function vendorLists(){
        $sellers = User::where('role','seller')->get();
        return view('buyer.sellers', compact('sellers'));
    }
    public function profile(){
        $buyer = User::find(Auth::id());
        return view('buyer.profile',compact('buyer'));
    }

    public function insertProfile(Request $req){
      
        $buyer = User::find(Auth::id());
        $password = $req->password;
        $cpassword = $req->cpassword;
        if($password != null){
            if($password == $cpassword){
                $seller->password = Hash::make($password);
            } else {
                return redirect()->back()->with('msg',"Password doesn't matched");
            }
        }
        $buyer->name = $req->name;
        $buyer->email = $req->email;
        $buyer->phonenumber = $req->phonenumber;
        $buyer->gender = $req->gender;
        $buyer->save();
        return redirect()->back()->with('msg','Successfully Updated');
    }
}
