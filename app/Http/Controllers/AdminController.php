<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Catalog; 
use App\Order; 
use App\Order_Product; 
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

    
    public function statusOrders($status){
        if($status == 'pending'){
            $status = 'OrderPlaced';
        } else {
            $status = 'Completed';
        }
        $orders = Order::where('status',$status)->orderBy('id','DESC')->get();
        return view('admin.orders.orders',compact('orders','status'));
    }

    
    public function ordersProducts($orderId){
        $order_no = Order::find($orderId)->order_no;
        $products = Order_Product::where('order_no',$order_no)->get();
        return view('admin.orders.products',compact('products','orderId'));
    }

    public function updateOrderProductStatus($orderId, $prodId, $prodStatus){
        $orderNoOfOrder = Order::find($orderId)->order_no;
        $seller_id = Product::find($prodId)->user_id;
        $order = Order::where('seller_id',$seller_id)->where('order_no',$orderNoOfOrder)->first();
        if($order != null && $order->seller_id ==$seller_id){
            $orderNumber = $order->order_no;
            $product = Order_Product::where('order_no',$orderNumber)
                                        ->where('product_id',$prodId)
                                        ->where('seller_id',$seller_id)
                                        ->where('status','Pending')->orWhere('status','Shipped')
                                        ->first();
            if($prodStatus == 'd'){
                $product->status = 'Delivered';
                $product->save();

                // Check more items
                $products = Order_Product::where('order_no',$orderNumber)
                                        ->where('seller_id',$seller_id)
                                        ->where('status','Pending')
                                        ->get();
                if($products->isEmpty()){
                    $order->status = 'Completed';
                    $order->save();
                }
                return redirect()->back()->with('msg','Successfully Marked as Delivered');
            } else {
                $product->status = 'Shipped';
                $product->save();
                return redirect()->back()->with('msg','Successfully Marked as Shipped');
            }
        } else {
            return 'talha';
        }
    }

    // public function markAsDeleivered($orderId, $prodID){
    //     $order = Order::find($orderId);
    //     $seller_id = Product::find($prodID)->user_id;
        
    //     if($order !=null && $order->seller_id ==$seller_id){
    //         $orderNumber = $order->order_no;
    //         $product = Order_Product::where('order_no',$orderNumber)
    //                                     ->where('product_id',$prodID)
    //                                     ->where('seller_id',$seller_id)
    //                                     ->where('status','Pending')
    //                                     ->first();
    //         $product->status = 'Delivered';
    //         $product->save();

    //         // Check more items
    //         $products = Order_Product::where('order_no',$orderNumber)
    //                                     ->where('seller_id',$seller_id)
    //                                     ->where('status','Pending')
    //                                     ->get();
    //         if($products->isEmpty()){
    //             $order->status = 'Completed';
    //             $order->save();
    //         }
    //         return redirect()->back()->with('msg','Successfully Marked as Delivered');
    //     }else {
    //         return redirect()->back()->with('msg','You dont have this order');
    //     } 
    // }



    

}
