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
                    <div class="image_selected"><img src="{{ url('storage/'.$product->image) }}" alt=""></div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        
                        <div class="product_name"> {{ $product->name }} </div>
                        <div class="product-rating">
                            <span class="badge badge-success"> {{ App\Category::find($product->category_id)->name }} </span> </div>
                        <div> <span class="product_price">Rs. {{ $product->price }} PKR</span></div>
                        <hr class="singleline">
                        <div> {{ $product->description }}</div>
                        <div class="row">
                            <div class="col-xs-6"> 
                                <a href="{{ url('buyer/add-to-cart/'.$product->id) }}" type="button" 
                                    style="background: #f44336; color:white" 
                                    class="btn btn-lg shop-button">
                                    <i class="fa fa-shopping-cart"></i> &nbsp;
                                    Add to Cart
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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