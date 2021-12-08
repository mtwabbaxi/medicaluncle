<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Cart_Product;
use App\Order;
use App\Order_Product;
use App\Product;
use App\User;
use App\Review;
use Auth;

class OrderController extends Controller
{
    public function addToCart($id){

        $user_id = Auth::id();
        $cart_id = null;
        $msg = null;
    
        // check already have cart
        $checkCart = Cart::where('user_id',$user_id)->first();
        if($checkCart == null){
            $newCart = new Cart;
            $newCart->user_id = $user_id;
            $newCart->save();
            $cart_id = $newCart->id;
        } else {
            $cart_id = $checkCart->id;
        }


        // check product is present
        $checkProduct = Product::find($id);
        if($checkProduct != null){

            // already exist in cart
            $checkAlready = Cart_Product::where('product_id', $checkProduct->id)->first();
            if($checkAlready != null){
                return redirect('buyer/cart')
                        ->with('msg','Your Product is already in cart, Please increase quantity if you want to order more!')
                        ->with('errorType','danger');
            }

            $cart_product = new Cart_Product;
            $cart_product->cart_id = $cart_id;
            $cart_product->product_id = $checkProduct->id;
            $cart_product->quantity = "1";
            $cart_product->product_price = $checkProduct->price;
            $cart_product->totalPrice = $checkProduct->price;
            $cart_product->seller_id = $checkProduct->user_id;
            $cart_product->save();
            $msg = 'Successfully Saved into Cart!';
        } else {
            $msg = 'Product not Found, Please Check another product';
        }
        return redirect()->back()->with('msg',$msg);

    }

    public function cart(){
        $cart = Cart::where('user_id',Auth::id())->first();
        $products= null;
        if($cart != null){
            $products = Cart_Product::where('cart_id',$cart->id)->get();
        }
        return view('buyer.cart',compact('products','cart'));
        
    }

    public function cartQuantityUpdate(Request $req, $id){
        $cart_product = Cart_Product::find($id);
        if($cart_product){
            $cart_product->quantity = $req->quantity;
            
            if($cart_product->quantity <= 0){
                $cart_product->delete();
                return redirect()->back()->with('msg','Product not found in the cart!')->with('errorType','danger');
            }
            $cart_product->totalPrice = $cart_product->quantity * $cart_product->product_price;
            $cart_product->save();
        } else {
            return redirect()->back()->with('msg','Product not found in the cart!')->with('errorType','danger');
        }
        return redirect()->back()->with('msg','Successfully Updated the Cart!')->with('errorType','success');
    }

    public function removeProduct($id){
        $cart_product = Cart_Product::find($id);
        if($cart_product){
            $cart_product->delete();
        } else {
            return redirect()->back()->with('msg','Product not found in the cart!')->with('errorType','danger');
        }
        return redirect('buyer/cart')->with('msg','Successfully Remove from the Cart!')->with('errorType','success');
    }

    public function orderConfirm(){
        $user = User::find(Auth::id());
        $cart = Cart::where('user_id',Auth::id())->first();
        $products= null;
        if($cart != null){
            $products = Cart_Product::where('cart_id',$cart->id)->get();
        }
        return view('buyer.order-data',compact('user','products'));
    }

    public function confirmOrder(Request $req){
        // check validation
        if($req->name == null || $req->email == null | $req->phonenumber == null || $req->shippingAddress == null || $req->payment_mode == null ){
            return redirect()->back()->with('msg','Please fill all buyer details');
        }

        // Generate OrderID
        $previousOrderId = 0;
        $latestOrder = Order::orderBy('created_at','DESC')->first();
        if($latestOrder != null){
            $previousOrderId = $latestOrder->id;
        }
        $order_nr = '#'.str_pad($previousOrderId + 1, 8, "0", STR_PAD_LEFT);

        // checking cart
        $cartID = Cart::where('user_id',Auth::id())->first()->id;
        if($cartID != null){
            // checking cartproducts
            $cart_products = Cart_Product::where('cart_id',$cartID)->get();

            // copy product from cart_product to order_product
            foreach ($cart_products as $product) {
                $orderProduct = new Order_Product;
                $orderProduct->order_no = $order_nr;
                $orderProduct->product_id = $product->product_id;
                $orderProduct->product_price = $product->product_price;
                $orderProduct->quantity = $product->quantity;
                $orderProduct->totalPrice = $product->totalPrice;
                $orderProduct->seller_id = $product->seller_id;
                $orderProduct->save();

                // check already have order with current seller
                $checkingOrder = Order::where('order_no',$order_nr)->where('seller_id',$product->seller_id)->first();
                if($checkingOrder == null){
                    // Generate new Order
                    $order = new Order;
                    $order->order_no = $order_nr;
                    $order->buyer_id = Auth::id();
                    $order->name = $req->name;
                    $order->email = $req->email;
                    $order->phonenumber = $req->phonenumber;
                    $order->payment_mode = $req->payment_mode;
                    $order->shipping_address = $req->shippingAddress;
                    $order->status = "OrderPlaced";
                    $order->seller_id = $product->seller_id;
                    $order->save();
                }
                $product->delete();
            }
            return view('buyer.order-place',compact('order_nr'));
        } else {
            return redirect()->back()->with('msg','You dont have any items in cart, Please Add.');
        }
    }

    public function pendingOrders(){
        $orders = Order::where('buyer_id',Auth::id())->where('status','OrderPlaced')->orderBy('id','DESC')->get();
        return view('buyer.orders.pending',compact('orders'));
    }

    public function completedOrders(){
        $orders = Order::where('buyer_id',Auth::id())->where('status','Completed')->orderBy('id','DESC')->get();
        return view('buyer.orders.completed',compact('orders'));
    }

    public function pendingOrderProducts($id){
        $order = Order::find($id);
        if($order !=null || $order->buyer_id == Auth::id()){
            $orderNumber = $order->order_no;
            $products = Order_Product::where('order_no',$orderNumber)->get();
            return view('buyer.orders.products',compact('products','order'));
        }else {
            return redirect()->back()->with('msg','You dont have this order');
        }
    }

    public function trackOrder(){
        $order = null;
        return view('buyer.orders.track',compact('order'));
    }

    public function trackOrderSeriously(Request $req){
        $req->validate([
            'order_no'=> 'required'
        ]);

        $order = Order::where('order_no', $req->order_no)->first();
        if($order != null){
            $products = Order_Product::where('order_no',$req->order_no)->get();
            return view('buyer.orders.track', compact('order','products'));
        } else {
            return redirect()->back()->with('msg','You dont have this order');
        }

    }

    public function writeReview($orderId, $productId){
        if($orderId ==null || $productId==null){
            return redirect()->back()->with('msg','Error Occurred!');
        }
        $order = Order::find($orderId);
        if($order != null && $order->status == 'Completed'){
            $order_product = Order_Product::where('order_no',$order->order_no)->where('product_id',$productId)->first();
            if($order_product != null){
                $product = Product::find($productId);
                return view('buyer.orders.review', compact('order','product')); 
            } else {
                return redirect()->back()->with('msg','This order doesnt contain this product!');
            }
        } else {
            return redirect()->back()->with('msg','Order not complete yet!');
        }
    }

    public function submitReview(Request $req,$orderId, $productId){
        $req->validate([
            'rating'=>'required',
            'review'=>'required',
        ]);

       
        $buyer_id=null;
        $seller_id=null;
        $order = Order::find($orderId);
        if($order != null){
            $seller_id = $order->seller_id;
            $buyer_id = $order->buyer_id;
        } else {
            return redirect()->back()->with('msg','Order not complete yet!');
        }

         // already check
         $check = Review::where('order_id',$orderId)
                        ->where('product_id',$productId)
                        ->where('seller_id',$seller_id)
                        ->where('buyer_id',$buyer_id)
                        ->first();
        if($check != null){
            return redirect()->back()->with('msg','Already reviewed!');
        }

        $review = new Review;
        $review->order_id = $orderId;
        $review->product_id = $productId;
        $review->seller_id = $seller_id;
        $review->buyer_id = $buyer_id;
        $review->rating = $req->rating;
        $review->review = $req->review;
        $review->save();
        return redirect()->back()->with('msg','Review Submitted!');

        return $req->rating;
    }
}
