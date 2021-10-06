@extends('seller.layouts.main')
@section('content')

<style>
    .text-gray {
    color: #aaa
}

#productImageShow {
    height: 170px;
    width: 140px
}

.headingofSection {
    font-weight: bold !important;
}

</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="col-lg-12 mx-auto">
                <ul class="list-group shadow">
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <span class="headingofSection">Order Number</span>  <hr>
                                <h5 class="mt-0 font-weight-bold mb-2 medium">  {{ $order->order_no }} </h5>


                                <div class="mt-4">
                                    <span class="font-weight-bold">Shipping Address </span> <hr>  
                                    <h5 class="mt-0 font-weight-bold mb-2 small">   {{ $order->shipping_address }}</h5>
                                </div>

                                <div class="mt-4">
                                    <span class="font-weight-bold">Customer Contact </span> <hr>  
                                    <h4 class="mt-0 font-weight-bold mb-2 small">   {{ $order->name }}</h4>
                                    <h4 class="mt-0 font-weight-bold mb-2 small">   {{ $order->phonenumber }}</h4>
                                    <h4 class="mt-0 font-weight-bold mb-2 small">   {{ $order->email }}</h4>
                                </div>

                               
                        </div> 
                    </li> 
                </ul> 
            </div>
        </div>
        <div class="col-lg-8 mx-auto">
            <ul class="list-group shadow">
                @foreach ($products as $product)
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                                <h5 class="mt-0 font-weight-bold mb-2"> 
                                    {{ App\Product::find($product->product_id)->name }} 
                                </h5>
                                <p class="font-italic text-muted mb-0 small">
                                    {{ App\Product::find($product->product_id)->excerpt }}
                                </p>
                                <p class="font-italic text-muted mb-0 small">
                                    by: <h6 class="card-text" style="font-size:10px; min-height:15px">
                                        {{ App\User::find(App\Product::find($product->product_id)->user_id)->name }}
                                    </h6>
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 class="font-weight-bold my-2 small">x {{$product->quantity}}</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <h6 style="text-transform: none;">Per Product: <span style="font-weight: bold;">&nbsp; Rs. {{$product->product_price}}</span></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                     <h6 style="text-transform: none;">Total Price: &nbsp; Rs. {{$product->totalPrice}}</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                   <h2> <span class="badge badge-pill badge-warning" style="padding: 11px 16px; font-size:20px"> {{ $product->status }} </span></h2>
                               </div>
                               <hr>
                               @if ($product->vendor_status != "Sent" )
                                <div class="d-flex align-items-center justify-content-between mt-1">
                                    <form action="{{ url('seller/pending-orders/'.$order->id.'/'.$product->product_id.'/deliever') }}" method="post">
                                        @csrf
                                            <button 
                                            type="submit" 
                                            style="color:white;background: #F44336;" 
                                            onclick="return confirm('Are you sure you want to Mark this Product as Delievered?');"
                                            class="btn" >
                                            Send to Warehourse?
                                        </button>
                                        </form>
                                
                                    </div>
                                @else 
                                 <span class="badge badge-warning">Sent to Warehourse successfully!</span>
                                @endif
                            </div>
                            <img id="productImageShow" 
                            src="{{ url('storage/'.App\Product::find($product->product_id)->image) }}" 
                            alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2"
                            >
                        </div> 
                    </li> 
                @endforeach
            </ul> 
        </div>
    </div>
</div>

@endsection
