<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use App\Catalog; 
use App\Order; 
use App\Order_Product; 
use App\Contact; 
use App\Blog; 
use Auth;
use Hash;
use Charts;
use DB;

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
        $buyers = User::where('role','customer')->get();
        return view('admin.buyers.index', compact('buyers'));
    }

    public function orders(){
        $order_products = Order_Product::where('status','Delivered')->get();
        $sales = Charts::database($order_products, 'bar', 'highcharts')
                                ->title("Totals Sales")
                                ->elementLabel("Sales")
                                ->dimensions(1000, 500)
                                ->responsive(true)
                                ->groupByMonth(date('Y'), true);
        return view('admin.orders.index',compact('sales'));
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
           if($product->vendor_status == null){
                return redirect()->back()->with('msg','Sorry, you cant process, vendor sending status is pending.');
           }
                                  
            if($prodStatus == 'd'){
                if($product->status != "Shipped"){
                    return redirect()->back()->with('msg','Sorry, you cant process, you cant deliever without shipping.');
               }


                $product->status = 'Delivered';
                $productOwn = Product::find($prodId);
                $productOwn->stock = $productOwn->stock - $product->quantity;
                $productOwn->save();
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

    public function blogs(){
        $blogs = Blog::orderBy('id','DESC')->get();;
        return view('admin.blogs.index',compact('blogs'));
    }

    
    public function addBlog(){
        return view('admin.blogs.add');
    }

    public function insertBlog(Request $req){
        $req->validate([
            'title'=> 'required',
            'excerpt'=> 'required',
            'description'=> 'required',
            'image' => 'required|mimes:jpg,jpeg,png|max:4096',
        ]);

        $blog = new Blog;
        $blog->title = $req->title;
        $blog->excerpt = $req->excerpt;
        $blog->description = $req->description;

        $filename = $req->file('image')->getClientOriginalName();
        $genID = substr(sha1(time()), 0, 9);
        $finalName = $genID . "_" . $filename;
        $blog->image = $finalName;
        $req->file('image')->storeAs('public', $finalName);

        $blog->save();
        return redirect('admin/blogs')->with('msg','Successfully Added');
    }

    public function viewBlog(){
        return view('admin.blogs.index');
    }

    public function deleteBlog($id){
        $blog = Blog::find($id);
        if($blog != null){
            $blog->delete();
        }
        return redirect('admin/blogs')->with('msg','Successfully Deleted');
    }

    public function contacts(){
        $contacts = Contact::orderBy('id','DESC')->get();
        return view('admin.contacts',compact('contacts'));
    }


}
