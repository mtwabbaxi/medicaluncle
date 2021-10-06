<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Catalog;
use App\Order;
use App\Order_Product;
use Auth;
use Hash;

class SellerController extends Controller
{
    public function index() {
        $products = Product::where('user_id',Auth::id())->orderBy('id','DESC')->limit('8')->get();
        $catalogs = Catalog::where('user_id',Auth::id())->orderBy('id','DESC')->limit('8')->get();
        return view('seller.index', compact('products','catalogs'));
    }

    public function pendingOrders(){
        $orders = Order::where('seller_id',Auth::id())->where('status','OrderPlaced')->get();
        return view('seller.orders.pending',compact('orders'));
    }

    public function pendingOrderProducts($id){
        $order = Order::find($id);
        if($order !=null && $order->seller_id == Auth::id()){
            $orderNumber = $order->order_no;
            $products = Order_Product::where('order_no',$orderNumber)->where('seller_id',Auth::id())->get();
            return view('seller.orders.products',compact('products','order'));
        }else {
            return redirect()->back()->with('msg','You dont have this order');
        } 
    }

    // public function markAsDeleivered($orderId, $prodID){
    //     $order = Order::find($orderId);
    //     if($order !=null && $order->seller_id == Auth::id()){
    //         $orderNumber = $order->order_no;
    //         $product = Order_Product::where('order_no',$orderNumber)
    //                                     ->where('seller_id',Auth::id())
    //                                     ->where('product_id',$prodID)
    //                                     ->where('status','Pending')
    //                                     ->first();
    //         $product->status = 'Delivered';
    //         $product->save();

    //         // Check more items
    //         $products = Order_Product::where('order_no',$orderNumber)
    //                                     ->where('seller_id',Auth::id())
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

    public function markAsSent($orderId, $prodID){
        $order = Order::find($orderId);
        if($order !=null && $order->seller_id == Auth::id()){
            $orderNumber = $order->order_no;
            $product = Order_Product::where('order_no',$orderNumber)
                                        ->where('seller_id',Auth::id())
                                        ->where('product_id',$prodID)
                                        ->where('status','Pending')
                                        ->first();
            $product->vendor_status = 'Sent';
            $product->save();
            return redirect()->back()->with('msg','Successfully Sent to Warehourse');
        }else {
            return redirect()->back()->with('msg','You dont have this order');
        } 
    }

    public function completedOrders(){
        $orders = Order::where('seller_id',Auth::id())
                        ->where('status','Completed')
                        ->orderBy('id','DESC')
                        ->get();
        return view('seller.orders.completed',compact('orders'));
    }

    public function completedOrderProducts($id){
        $order = Order::find($id);
        if($order !=null && $order->seller_id == Auth::id()){
            $orderNumber = $order->order_no;
            $products = Order_Product::where('order_no',$orderNumber)
                                    ->where('seller_id',Auth::id())
                                    ->where('status','Delivered')
                                    ->get();
            return view('seller.orders.products',compact('products','order'));
        }else {
            return redirect()->back()->with('msg','You dont have this order');
        } 
    }

    
    public function profile(){
        $seller = User::find(Auth::id());
        return view('seller.profile',compact('seller'));
    }

    public function insertProfile(Request $req){
      
        $seller = User::find(Auth::id());
        $password = $req->password;
        $cpassword = $req->cpassword;
        if($password != null){
            if($password == $cpassword){
                $seller->password = Hash::make($password);
            } else {
                return redirect()->back()->with('msg',"Password doesn't matched");
            }
        }
        $seller->name = $req->name;
        $seller->email = $req->email;
        $seller->phonenumber = $req->phonenumber;
        $seller->gender = $req->gender;
        $seller->save();
        return redirect()->back()->with('msg','Successfully Updated');
    }


    public function buyerRequests(){
        return view('seller.buyer-requests');
    }

    public function history(){
        return view('seller.history');
    }

    
}
