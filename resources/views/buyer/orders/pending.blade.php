@extends('buyer.layouts.main')
@section('content')
     @if ($orders->isEmpty())
     <div class="container-fluid mt-100">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 0px !important">
                    
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                            <h3><strong>You have no orders in pending!</strong></h3>
                            <h4>Add something to make me happy :)</h4>
                             <a href="{{ url('buyer/products') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">
                                 Continue shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     @else
        @foreach ($orders->unique('order_no') as $order)
        <div class="col-md-4 col-sm-6 col-xs-12 pr-0">
            <section class="panel panel-horizontal">
                <div class="panel-body p-lg"> 
                <h3 class="text-semibold mt-sm ml-2" style="font-size: 20px; margin-bottom: 0 !important" > ORDER-{{ $order->order_no }} </h3>
                    <a class="ml-2" href="{{ url('buyer/pending-orders/'.$order->id.'/products') }}">View Products</a>
                </div>
            </section>
        </div>
        @endforeach

               
     @endif

    

@endsection