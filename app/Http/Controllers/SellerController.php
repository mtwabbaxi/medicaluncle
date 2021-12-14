<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Catalog;
use App\Order;
use App\Order_Product;
use App\Notification;
use Auth;
use Hash;
use Charts;
use DB;

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

    public function analytics(){
        $products = Product::where('user_id',Auth::id())->get();
        $productsName = [];
        $productSales = [];
        
        foreach($products as $product){
            array_push($productsName, $product->name);
        }

        $order_products = Order_Product::where('seller_id',Auth::id())->get();
        $sales = Charts::database($order_products, 'bar', 'highcharts')
                                ->title("Totals Sales")
                                ->elementLabel("Sales")
                                ->dimensions(1000, 500)
                                ->responsive(true)
                                ->groupByMonth(date('Y'), true);

        // products sales
        foreach($products as $product){
            array_push($productSales, Order_Product::where('product_id',$product->id)->count());
        }
        $psales = Charts::database($order_products, 'pie', 'highcharts')
                                ->title("Totals Sales")
                                ->elementLabel("Sales")
                                ->labels($productsName)
                                ->values($productSales)
                                ->dimensions(1000, 500)
                                ->responsive(true);

        $total_earning = Order_Product::where('seller_id',Auth::id())->where('status','Delivered')->sum('totalPrice');

        $today_earning = Order_Product::where('seller_id',Auth::id())
                                        ->whereDate('created_at', DB::raw('CURDATE()'))
                                        ->where('status','Delivered')
                                        ->sum('totalPrice');


        $monthly_earning = Order_Product::where('seller_id',Auth::id())
                                        ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))
                                        ->where('status','Delivered')
                                        ->sum('totalPrice');
        
                                


        return view('seller.analytics.home',compact('products','sales','psales','total_earning','today_earning','monthly_earning'));
    }

    public function productAnalytics($id){
        if($id == null){
            return abort(403);
        }
        $product = Product::find($id);
        if($product->user_id != Auth::id()){
            return abort(403);
        }

        $orders = Order_Product::where('product_id',$product->id)->where('seller_id',Auth::id())->orderBy('id','DESC')->limit(20)->get();
        $order_products = Order_Product::where('product_id',$product->id)
                                        ->where('seller_id',Auth::id())
                                        ->where(DB::raw("(DATE_FORMAT(created_at,'%m'))"),date('m'))
                                        ->get();
       
        $monthly = Charts::database($order_products, 'bar', 'highcharts')
                            ->title("Monthly Sale")
                            ->elementLabel("Sales")
                            ->dimensions(1000, 500)
                            ->responsive(true)
                            ->groupByDay();

        $yearly = Charts::database($order_products, 'line', 'highcharts')
                        ->title("Yearly Sale")
                        ->elementLabel("Sales")
                        ->dimensions(1000, 500)
                        ->responsive(true)
                        ->groupByMonth(date('Y'), true);

        return view('seller.analytics.product',
        compact('product','orders','yearly','monthly'));
    }

    public function notifications(){
        $notifications = Notification::all();
        return view('seller.notification.index',compact('notifications'));
    }
    public function addNotification(){
        return view('seller.notification.add');
    }
    public function insertNotification(Request $req){
        $req->validate([
            'title'=> 'required',
            'description'=> 'required',
            'image' => 'required|mimes:jpg,jpeg,png,pdf|max:4096',
            'image' => 'required|max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
            'image' => 'max:4096',
            'image.*' => 'image|mimes:png,jpeg,jpg',
        ]);
        $notification = new Notification;
        if($req->image != null) {
            $filename = $req->file('image')->getClientOriginalName();
            $genID = substr(sha1(time()), 0, 9);
            $finalName = $genID . "_" . $filename;
            $notification->image = $finalName;
            $req->file('image')->storeAs('public', $finalName);
        }

        $notification->seller_id = Auth::id();
        $notification->title = $req->title;
        $notification->description = $req->description;
        $notification->save();
        return redirect()->back()->with('msg','Successfully Published!');
    }

    public function viewNotification($id){
        if($id != null){
            $notification = Notification::find($id);
            if($notification != null){
                if($notification->seller_id == Auth::id()){
                    return view('seller.notification.single',compact('notification'));
                } else {
                    return redirect()->back()->with('msg','Unable to View!');
                }
            } else {
                return redirect()->back()->with('msg','Notification not found!');
            }
        } else {
            return redirect()->back()->with('msg','id not exists');
        }
    }


    public function deleteNotification($id){
        if($id != null){
            $notification = Notification::find($id);
            if($notification != null){
                if($notification->seller_id == Auth::id()){
                    $notification->delete();
                    return redirect()->back()->with('msg','Successfully Deleted!');
                } else {
                    return redirect()->back()->with('msg','Unable to Delete!');
                }
            } else {
                return redirect()->back()->with('msg','Notification not found!');
            }
        } else {
            return redirect()->back()->with('msg','id not exists');
        }
    }
    
}
