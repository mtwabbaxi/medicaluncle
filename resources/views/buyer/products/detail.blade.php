@extends('buyer.layouts.main')
@section('content')

<div class="super_container">

    @if (session('msg'))
	<div class="alert alert-warning" role="alert">
		<strong> {{ session('msg') }} </strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
		</button>
	</div>
@endif

    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-4 order-lg-2 order-1">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="image_selected"><img src="{{ url('storage/'.$product->image) }}" alt=""></div>
                            </div>
                            @if ($product->image2 != null)
                                <div class="item">
                                    <div class="image_selected">
                                        <img src="{{ url('storage/'.$product->image2) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            @if ($product->image3 != null)
                                <div class="item">
                                    <div class="image_selected">
                                        <img src="{{ url('storage/'.$product->image3) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            @if ($product->image4 != null)
                                <div class="item">
                                    <div class="image_selected">
                                        <img src="{{ url('storage/'.$product->image4) }}" alt="">
                                    </div>
                                </div>
                            @endif
                            
                        </div>
            
                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>


                    
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <div class="product_name"> {{ $product->name }}  </div>
                        <div class="product-rating">
                            <span class="badge badge-success"> {{ App\Category::find($product->category_id)->name }} </span> </div> 
                            <span class="badge badge-warning">{{$product->stock == null ? "Out of stock" : $product->stock." in stock"  }} </span><br>
                            Rating: <b>{{ $rating }} <span class="fa fa-star checked" style="color: #f44336"></span></b> <br>
                            Size : {{ $product->s =="on" ? 'Small' : '' }} {{ $product->m =="on" ? ',Medium' : '' }} {{ $product->l =="on" ? ',Large' : '' }}
                        <div> <span class="product_price">Rs. {{ number_format($product->price) }} PKR</span></div>
                        <hr class="singleline">
                        <div> {{ $product->description }}</div>
                        <div class="row">
                            <div class="col-xs-6"> 
                                @if ($product->stock != null)
                                <a href="{{ url('buyer/add-to-cart/'.$product->id) }}" type="button" 
                                    style="background: #f44336; color:white" 
                                    class="btn btn-lg shop-button">
                                    <i class="fa fa-shopping-cart"></i> &nbsp;
                                    Add to Cart
                                </a> 
                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div style="margin-top: 25px">
        <h4> <b>Reviews</b> </h4><hr>
        <div class="row">
            @foreach ($reviews as $review)
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="card" style="width: 18rem;height:80px">
                        <div class="card-body">
                            <h6 class="card-text"> {{ App\User::find($review->buyer_id)->name }} - 
                                <b>{{ $review->rating }} <span class="fa fa-star checked" style="color: #f44336"></span></b> 
                            </h6> 
                            <p>{{ $review->review }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
    </div>

    <hr>

    <div style="margin-top: 25px">
        <h4> <b>Similar Products</b> </h4><hr>
        <div class="row">
            @foreach ($similarProducts as $prod)
                <div class="col-md-4 col-lg-3 col-sm-6">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top product-listimg" src="{{ asset('storage/'.$prod->image) }}" alt="{{ $product->name }}"  /> 
                        <div class="card-body">
                            <a href="{{ url('buyer/products/'.$prod->id) }}">
                                <h5 class="card-title" style="font-weight:bold"> {{ $prod->name  }} </h5>
                            </a>
                            <h6 class="card-text" style="font-size:10px; min-height:45px;font-weight:bold;">
                                {{ App\User::find($prod->user_id)->name }}
                                @if (App\User::find($prod->user_id)->role == 'admin')
                                <svg viewBox="0 0 24 24" aria-label="Verified account" style="max-width: 15px;max-height: 15px;color: green;fill:green">
                                    <g>
                                    <path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path>
                                    </g>
                                    </svg>	
                                @endif
                            
                            </h6>
                            <h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 10px;">{{ App\Category::find($product->category_id)->name }}</h6>
                            <p class="card-text" style="height: 75px;">{{ substr($prod->excerpt, 0, 100) }} </p>
                            <p class="card-text priceTag">₨.{{ number_format($prod->price) }} </p>
                        <a class=" btn left-side abtn" href="{{ url('buyer/add-to-cart/'.$prod->id) }}">Add to Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<style>

.single_product {
    padding-top: 66px;
    padding-bottom: 140px;
    margin-top: 0px;
    padding: 17px
}

.product_name {
    font-size: 40px;
    font-weight: 800;
    margin-top: 0px
}

.badge {
    display: inline-block;
    padding: 0.50em .4em;
    font-size: 75%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem
}

.product_price {
    display: inline-block;
    font-size: 30px;
    font-weight: 500;
    margin-top: 9px;
    clear: left
}

.singleline {
    margin-top: 1rem;
    margin-bottom: .40rem;
    border: 0;
    border-top: 1px solid rgba(0, 0, 0, .1)
}

.product_description {
    padding-left: 0px
}

.order_info {
    margin-top: 18px
}

.image_selected {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: calc(100% + 15px);
    height: 525px;
    -webkit-transform: translateX(-15px);
    -moz-transform: translateX(-15px);
    -ms-transform: translateX(-15px);
    -o-transform: translateX(-15px);
    transform: translateX(-15px);
    border: solid 1px #e8e8e8;
    box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px

}

.image_selected {
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: calc(100% + 15px);
    height: 525px;
    -webkit-transform: translateX(-15px);
    -moz-transform: translateX(-15px);
    -ms-transform: translateX(-15px);
    -o-transform: translateX(-15px);
    transform: translateX(-15px);
    border: solid 1px #e8e8e8;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 15px
}

.image_selected img {
    max-width: 100%
}


.order_info {
    margin-top: 16px
}


</style>


@endsection