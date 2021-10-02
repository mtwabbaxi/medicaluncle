<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Catalog;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function profile()
    {
        $user = User::find(Auth::id());
        return view('admin.profile', compact('user'));
    }
    public function profileUpdate(Request $req)
    {
        $user = User::find(Auth::id());
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();
        return redirect('admin/profile')->with('msg', 'Profile Changed Successfully.');
    }
    public function changePassword()
    {
        $user = User::find(Auth::id());
        return view('admin.change-password', compact('user'));
    }
    public function changePasswordUpdate(Request $req)
    {
        $user = User::find(Auth::id());

        if (Hash::check($req->currentPassword, $user->password)) {
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect('admin/profile')->with('msg', 'Password Changed Successfully.');
        } else {
            return redirect('admin/profile')->with('msg', 'Your Current Password didnt Match.');
        }
    }

    public function sellers(){
       $sellers = User::where('role','seller')->get();
       return view('admin.sellers.index', compact('sellers'));
    }

    public function products(){
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    
    public function addProduct(){
       $categories = Category::all();
        return view('admin.products.add',compact('categories'));
    }

    public function catalogs(){
        $catalogs = Catalog::all();
        return view('admin.catalogs.index',compact('catalogs'));
    }

    public function addCatalog(){
        $categories = Category::all();
         return view('admin.catalogs.add',compact('categories'));
     }

    public function buyers(){
        $buyers = User::where('role','buyer')->get();
        return view('admin.buyers.index', compact('buyers'));
    }

    public function orders(){
        return view('admin.orders.index');
    }

    

}
