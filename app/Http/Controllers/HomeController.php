<?php

namespace App\Http\Controllers;
use App\User;
use App\Order_Product;
use App\Product;
use Auth;
use Charts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $email = Auth::user()->email;
        $user = User::where('email',$email)->first();
       
        if ($user->role == 'seller') {
            return redirect('seller/dashboard');
        } elseif ($user->role == 'customer') {
            return redirect('buyer/dashboard');
        } else {
            $products = Product::all();
            $productsName = [];
            $productSales = [];
            
            foreach($products as $product){
                array_push($productsName, $product->name);
            }

            $order_products = Order_Product::where('status','Delivered')->get();
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

            $total_earning = Order_Product::where('status','Delivered')->sum('totalPrice');
            return view('admin.index',compact('total_earning','psales','sales'));
        }
    }
}
