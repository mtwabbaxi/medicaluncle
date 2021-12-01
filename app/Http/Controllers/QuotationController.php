<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buyer_rfq;
use App\User;
use App\Bid;
use App\Bid_product;
use App\Product;
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
        return view('buyer.rfq.vendor-requests',compact('rfqs'));
    }

    public function buyerRequests(){
        $rfqs = Buyer_rfq::all();
        return view('seller.rfq.buyer-requests',compact('rfqs'));
    }

    public function responseRequest($id){
        $rfq_no = Buyer_rfq::find($id)->rfq_no;
        // store in bid
        $check= Bid::where('request_id',$id)->where('seller_id',Auth::id())->first();
        $bidId = $check->id;
        if($check == null){
            $bid = new Bid;
            $bid->request_id = $id;
            $bid->seller_id = Auth::id();
            $bid->rfq_no = $rfq_no;
            $bid->save();
            $bidId = $bid->id;
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
}
