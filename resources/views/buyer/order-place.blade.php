@extends('buyer.layouts.main')
@section('content')

<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border: 0px !important">
                
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="{{ url('assets/order.jpg') }}" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Order Placed</strong></h3>
                        
                        <h4>YOUR ORDER {{ $order_nr }} has been placed :)</h4>
                        <br>
                        <p class="text-bold">
                            Congratulations! Your Order is completed and have been placed successfully.
                        </p>
                         <a href="{{ url('buyer/products') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">
                             Continue shopping
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection