<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use App\Catalog;
use App\Order;
use App\Notification;
use DB;
use Auth;
use Hash;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $products = Product::orderBy('id','DESC')->limit('8')->get();
        $catalogs = Catalog::orderBy('id','DESC')->limit('8')->get();
        $sellers  = Order::groupBy('seller_id')
                            ->select('seller_id', DB::raw('count(*) as total'))
                            ->orderBy('total','DESC')
                            ->get();

        return view('buyer.index', compact('products','catalogs','sellers'));
    }

    public function products(){
        $firstPrice = Input::get('firstPrice');
        $lastPrice = Input::get('lastPrice');
        $getRating = Input::get('rating');
        $products = Product::orderBy('id','DESC')->get();
        if($firstPrice != null && $lastPrice != null){
            $products = Product::whereBetween('price', [$firstPrice, $lastPrice])->orderBy('price','DESC')->get();
        }elseif($firstPrice != null && $lastPrice != null && $getRating != null){
            $products = Product::whereBetween('price', [$firstPrice, $lastPrice])
                                ->orderBy('price','DESC')
                                ->where('rating','>=',$getRating)
                                ->where('rating','<',$getRating+1)
                                ->get();
        }

        if($getRating != null){
            $products = Product::where('rating','>=',$getRating)->where('rating','<',$getRating+1)->orderBy('id','DESC')->get();
        }
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

    public function vendorDetails($id){
        $seller = User::where('id',$id)->where('role','seller')->first();
        $categories = Product::where('user_id',$id)->get('category_id');
        $products = Product::where('user_id',$id)->get();
        return view('buyer.vendor-details', compact('seller','categories','products'));
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

    
    public function searchProduct(Request $req){
        $searchTerm = $req->searchTerm;
        if($searchTerm != null){
            $products = Product::Where('name', 'like', '%' . $searchTerm . '%')->get();
            return view('buyer.products.index',compact('products'));
        } else {
            return redirect()->back()->with('msg','Please add search term');
        }
    }

    public function notifications(){
        $notifications = Notification::all();
        return view('buyer.notification.index',compact('notifications'));
    }

    public function viewNotification($id){
        if($id != null){
            $notification = Notification::find($id);
            if($notification != null){
                return view('buyer.notification.single',compact('notification'));
            } else {
                return redirect()->back()->with('msg','Notification not found!');
            }
        } else {
            return redirect()->back()->with('msg','id not exists');
        }
    }
    
}
