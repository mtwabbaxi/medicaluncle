@extends('buyer.layouts.main')
@section('content')

@if ($products->count() > 0)

@if (session('msg'))
    <div class="container">
        <div class="alert alert-{{ session('errorType') }}"> {{ session('msg') }} </div>
    </div>  
@endif

<div class="container pb-5 mt-n2 mt-md-n3">
    <div class="row">
        <div class="col-md-8">
            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-secondary">
                <span>Products</span>
                <a class="font-size-sm" href="{{ url('buyer/products') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
                    class="feather feather-chevron-left" style="width: 1rem; height: 1rem;">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>Continue shopping</a></h2>
            <!-- Item-->

            @foreach ($products as $product)
            <?php $p = App\Product::find($product->product_id); ?>
            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                <div class="media d-block d-sm-flex text-center text-sm-left">
                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#">
                        <img src="{{ url('storage/'.$p->image) }}" alt="Product">
                    </a>
                    <div class="media-body pt-3">
                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#"> {{ $p->name }} </a></h3>
                        Per item Price <div class="font-size-lg text-primary pt-2">   Rs. {{ $product->product_price }} pkr</div>
                    </div>
                </div>

                <div class="pt-2 pt-sm-0 pl-sm-3 mx-auto mx-sm-0 text-center text-sm-left" style="max-width: 10rem;">
                    <form action="{{ url('buyer/cart/'.$product->id) }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="quantity1">Quantity</label>
                            <input class="form-control form-control-sm" type="number" name="quantity" id="quantity1" value={{ $product->quantity }}>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm btn-block mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw mr-1">
                                <polyline points="23 4 23 10 17 10"></polyline>
                                <polyline points="1 20 1 14 7 14"></polyline>
                                <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
                            Update 
                        </button>
                    </form>

                    <a href="{{ url('buyer/cart/remove/'.$product->id) }}" 
                        class="btn btn-danger btn-sm btn-block mb-2" 
                        type="button"
                        onclick="return confirm('Are you sure you want to remove from cart?');"
                        >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 mr-1">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                        Remove
                    </a>
                </div>
            </div>
            @endforeach

            
            
        </div>
        <!-- Sidebar-->
        <div class="col-xl-3 col-md-4 pt-3 pt-md-0">
            <h2 class="h6 px-4 py-3 bg-secondary text-center">Total price of Order</h2>
            <div class="h3 font-weight-semibold text-center py-3">Rs. {{ number_format(App\Cart_Product::where('cart_id',$cart->id)->sum('totalPrice')) }} pkr</div>
            <hr>
            <h3 class="h6 pt-4 font-weight-semibold"><span class="badge badge-success mr-2">Note</span>Additional comments</h3>
            <textarea class="form-control mb-3" id="order-comments" rows="5"></textarea>
            <a class="btn btn-primary btn-block" href="{{ url('buyer/order/confirm') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2">
                    <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                    <line x1="1" y1="10" x2="23" y2="10"></line>
                </svg>Proceed to Checkout</a>
           
        </div>
    </div>
</div>



@else

<div class="container-fluid mt-100">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="border: 0px !important">
                
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
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
    
@endif


	
@endsection
