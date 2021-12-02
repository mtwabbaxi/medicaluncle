<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer_rfq;
use App\User;
use App\Bid;
use App\Bid_product;
use App\Product;
use App\Cart;
use App\Cart_Product;
use Auth;

class QuotationController extends Controller
{
    public function rfq(){
        return view('buyer.rfq.rfq');
    }

    public function submitRFQ(Request $req){
        $req->validate([
            'city' => 'required',
            'delievery' => 'required',
            'message' => 'required',
        ]);

        $buyer_name = User::find(Auth::id())->name;
        $quotation_number = strtoupper($buyer_name.'-'."QNO-".substr(sha1(time()), 0, 5));

        $rfq = new Buyer_rfq;
        $rfq->rfq_no = $quotation_number;
        $rfq->city = $req->city;
        $rfq->delievery = $req->delievery;
        $rfq->message = $req->message;
        $rfq->buyer_id = Auth::id();
        $rfq->save();
        return redirect()->back()->with('msg','Request Generated Successfully!');

    }

    public function vendorRequests(){
        $rfqs = Buyer_rfq::where('buyer_id',Auth::id())->get();
        return view('buyer.rfq.requests',compact('rfqs'));
    }

    public function buyerRequests(){
        $rfqs = Buyer_rfq::where('expire',0)->get();
        return view('seller.rfq.buyer-requests',compact('rfqs'));
    }

    public function responseRequest($id){
        $rfq_no = Buyer_rfq::find($id)->rfq_no;
        // store in bid
        $check= Bid::where('request_id',$id)->where('seller_id',Auth::id())->first();
        $bidId = null;
        if($check == null){
            $bid = new Bid;
            $bid->request_id = $id;
            $bid->seller_id = Auth::id();
            $bid->rfq_no = $rfq_no;
            $bid->save();
            $bidId = $bid->id;
        } else {
            $bidId = $check->id;
        }
        $products = Product::where('user_id',Auth::id())->get();
        return view('seller.rfq.products',compact('products','bidId'));

    }

    public function addRequestProduct($bidId, $productId, Request $req){
        $req->validate([
            'product_price'=> 'required'
        ]);


        // check bid already product exists
        $check = Bid_product::where('bid_id', $bidId)->where('product_id',$productId)->first();
        if($check == null){
            $bp = new Bid_product;
            $bp->bid_id = $bidId;
            $bp->product_id = $productId;
            $bp->product_price = $req->product_price;
            $bp->save();
            return redirect()->back()->with('msg','Successfully Added!');
        } else {
            return redirect()->back()->with('msg','Already Added!');
        }
    }

    public function viewQuotation($id){
        $bid = Bid::where('request_id', $id)->where('seller_id',Auth::id())->first();
        $products = Bid_product::where('bid_id', $bid->id)->get();
        $rfq = Buyer_rfq::find($id);
        $buyer = User::find($rfq->buyer_id);
        return view('seller.rfq.quotation',compact('bid','products','rfq','buyer'));
    }

    public function submitQuotation(Request $req, $id){

        $req->validate([
            'delivery' => 'required'
        ]);

        $bid = Bid::where('request_id', $id)->where('seller_id',Auth::id())->first();
        $bid->comment = $req->comment;
        $bid->delivery = $req->delivery;
        $bid->status = 1;
        $bid->save();
        return redirect('seller/buyer-requests');
    }

    public function viewRequests($id){
        $bids = Bid::where('request_id',$id)->get();
        return view('buyer.rfq.vendors-requests',compact('bids'));
    }

    public function viewBuyerQuotation($id){
        $bid = Bid::find($id);
        $products = Bid_product::where('bid_id', $bid->id)->get();
        $rfq = Buyer_rfq::find($bid->request_id);
        $seller = User::find($bid->seller_id);
        return view('buyer.rfq.quotation',compact('bid','products','rfq','seller'));
    }

    
    public function viewBidProducts($id){
        $bid = Bid::find($id);
        $products = Bid_product::where('bid_id', $bid->id)->get();
        return view('buyer.rfq.products',compact('bid','products'));
    }

    public function addToCart(Request $req, $prodID, $bidID){

        // finding quoted price
        $bp = Bid_Product::where('bid_id',$bidID)->where('product_id',$prodID)->first();
        $quotedPrice = null;
        if($bp != null){
            $quotedPrice = $bp->product_price;
        } else {
            return redirect()->back()->with('msg','This product is not in this request');
        }


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
        $checkProduct = Product::find($prodID);
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
            $cart_product->product_price = $quotedPrice;
            $cart_product->totalPrice = $quotedPrice;
            $cart_product->seller_id = $checkProduct->user_id;
            $cart_product->save();
            $msg = 'Successfully Saved into Cart!';
        } else {
            $msg = 'Product not Found, Please Check another product';
        }
        return redirect()->back()->with('msg',$msg);
    }

    public function deleteProduct($id){
        $product = Bid_product::find($id);
        if($product != null){
            $product->delete();
            return redirect()->back()->with('msg','Product Deleted');
        } else {
            return redirect()->back()->with('msg','Product not found!');
        }
    }

    public function markAsExpire($id){
        $rfq = Buyer_rfq::find($id);
        if($rfq != null){
            if($rfq->buyer_id == Auth::id()){
                $rfq->expire = 1;
                $rfq->save();
                return redirect()->back()->with('msg','Successfully Marked as Expire!');
            } else {
                return redirect()->back()->with('msg','Sorry your request are not processed!');
            }
        } else {
            return redirect()->back()->with('msg','Request not found!');
        }
    }

}
