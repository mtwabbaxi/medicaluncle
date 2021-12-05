@extends('buyer.layouts.main')
@section('content')

<style>
    .card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    margin-top: 20px;
    margin-bottom: 90px;
    border-radius: 10px
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 20%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after,
#progressbar li:nth-child(4):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #3cbcff
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}

.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>

<div class="container px-1 px-md-4 py-5 mx-auto">

    <form action="{{ url('buyer/track-order') }}" method="post">
        @csrf
       <div class="row">
           <div class="col-lg-11 col-md-11 col-sm-11">
                <div class="form-group">
                    <label for="">Enter your Order#</label>
                    <input type="text" name="order_no" required class="form-control" id="">
                </div>
           </div>
           <div class="col-lg-1 col-md-1 col-sm-1">
                <div class="form-group">
                    <button type="submit" class="btn" style="color:white; background:#3cbcff; margin-top:29px">Track</button>
                </div>
           </div>
       </div>
    </form>
    

    @if ($order != null)
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5>ORDER <span class="text-primary font-weight-bold">{{ $order->order_no }}</span></h5>
                </div>
            </div>
            <hr>
             <!-- Add class 'active' to progress -->

             @foreach ($products as $product)
             <div class="product" style="">
                <center>
                    <h3 style="margin-top: 20px; margin-bottom: -20px">
                        <b>{{ App\Product::find($product->product_id)->name }}</b> 
                        <span style="font-size: 20px"> by <a href="{{ url('buyer/vendors/'.$product->seller_id) }}">{{ App\User::find($product->seller_id)->name }}</a> </span> 
                    </h3>
                </center> 
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <ul id="progressbar" class="text-center">
                            @if ($product->status == 'Pending' && $product->vendor_status == null)
                                <li class="active step0"></li> 
                                <li class="active step0"></li> 
                                <li class="step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            @elseif($product->status == 'Pending' && $product->vendor_status == 'Sent')
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                                <li class="step0"></li>
                            @elseif($product->status == 'Shipped' && $product->vendor_status == 'Sent')
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="step0"></li>
                            @elseif($product->status == 'Delivered' && $product->vendor_status == 'Sent')
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                                <li class="active step0"></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="row justify-content-between top">
                    
                    <div class="row d-flex icon-content" style="margin-left: 20px"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Product<br>Placed</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content" style="margin-left: 20px"> <img class="icon" src="https://i.imgur.com/GiWFtVu.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Product<br>Packing</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content" style="margin-left: 20px"> <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Product<br>Sent to Warehouse</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content" style="margin-left: 20px"> <img class="icon" src="https://i.imgur.com/u1AzR7w.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Product<br>Shipped</p>
                        </div>
                    </div>
                    <div class="row d-flex icon-content" style="margin-left: 20px"> <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                        <div class="d-flex flex-column">
                            <p class="font-weight-bold">Product<br>Delievered</p>
                        </div>
                    </div>
                </div>
            </div><hr>
             @endforeach

           
        </div>
    @endif

    
    
</div>

@endsection