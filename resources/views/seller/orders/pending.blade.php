@extends('seller.layouts.main')
@section('content')
    @if (!$orders->isEmpty())
        @foreach ($orders as $order)
        <div class="col-md-4 col-sm-6 col-xs-12 pr-0">
            <section class="panel panel-horizontal">
                <div class="panel-body p-lg"> 
                <h3 class="text-semibold mt-sm ml-2" 
                    style="font-size: 20px; margin-bottom: 0 !important" > 
                    ORDER-{{ $order->order_no }} 
                </h3>
                    <a class="ml-2" 
                        href="{{ url('seller/pending-orders/'.$order->id.'/products') }}">
                        View Products
                    </a>
                </div>
            </section>
        </div>
        @endforeach
    @else
    <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 0px !important">
                    
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="{{ url('assets/order.jpg') }}" width="130" height="130" class="img-fluid mb-4 mr-3">
                            <h3><strong>No Pending Orders</strong></h3>
                            
                            <h4>Your All Pending orders are completed :)</h4>
                            <br>
                           
                             <a href="{{ url('seller/complete-orders') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">
                                 Check out complete Orders!
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection