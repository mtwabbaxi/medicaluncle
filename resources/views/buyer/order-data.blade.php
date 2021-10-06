@extends('buyer.layouts.main')
@section('content')

<div class="row">
    <div class="col-md-7">
        <section class="content" style="margin: 25px; background: #ffffff;">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Buyer Information</h2>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <div class="row clearfix" >
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            @if (session('msg'))
                            <div class="alert alert-warning" role="alert">
                                 <strong> {{ session('msg') }} </strong> 
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                     <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                                 </button>
                             </div>
                            @endif
                            <div class="card">
                                <div class="body" style="min-height: 1px">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
        
                                            <form action="{{ url('buyer/order/confirm') }}" method="post">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Name<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required placeholder="Type Name" required/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Email<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required placeholder="Type Email" required/>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Phone number<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phonenumber" class="form-control" value="{{ $user->phonenumber }}" required placeholder="Type Password" required/>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Shipping Address<span class="required">*</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea  rows="3" name="shippingAddress" class="form-control" required placeholder="Enter your Shipping Address" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Payment Mode<span class="required"></span></label>
                                                    <div class="col-sm-9">
                                                        <input type="radio" name="payment_mode" value="cod" id="" checked> Cash on Delievery
                                                    </div>
                                                </div>
                                        </div> 
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-5">
        <section class="content" style="margin: 25px; background: #ffffff;">
            <div class="body_scroll">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <h2>Order Information</h2>
                        </div>
                    </div>
                </div>
                
                <div class="container-fluid">
                    <div class="row clearfix" >
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2 class="h6 d-flex flex-wrap justify-content-between align-items-center px-4 py-3 bg-light">
                                <span>Products</span>
                            </h2>
                            <!-- Item-->
                
                            @foreach ($products as $product)
                            <?php $p = App\Product::find($product->product_id); ?>
                            <div class="d-sm-flex justify-content-between my-4 pb-4 border-bottom">
                                <div class="media d-block d-sm-flex text-center text-sm-left">
                                    <a class="cart-item-thumb mx-auto mr-sm-4" href="#">
                                        <img src="{{ url('storage/'.$p->image) }}" width="70" height="100" alt="Product">
                                    </a>
                                    <div class="media-body pt-3">
                                        <h3 class="product-card-title font-weight-semibold border-0 pb-0"><a href="#"> {{ $p->name }} </a></h3>
                                        Per item Price <div class="font-size-lg text-primary pt-2">   Rs. {{ $p->price }} pkr</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        
                        <button type="submit" 
                        class="btn btn-success btn-block" 
                        onclick="return confirm('Are you sure you want to confirm order?');"
                        name="submit"> Confirm Order </button>
                    </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection