
@extends('layouts.app')
@section('content')

<!-- breadcrumb start -->
<div class="cv-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cv-breadcrumb-box">
                    <h1>Product Single</h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li>Product Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- shop start -->
<div class="cv-product-single spacer-top spacer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="cv-pro-thumb-img">
                            <img src="{{ url('storage/'.$product->image) }}" alt="image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="cv-prod-content">
                            <h2 class="cv-price-title">{{ $product->name }}</h2>
                            <p class="cv-pdoduct-price">Rs. {{ $product->price }}</p>
                            <div class="cv-prod-category">
                                <span>Category :</span>
                                <a href="#" class="cv-prod-category"> {{ App\Category::find($product->category_id)->name }}</a>
                            </div>
                           
                        </div>
                        <div class="cv-prod-count">
                            
                            <a href="{{ url('buyer/add-to-cart/'.$product->id) }}" class="cv-btn">add to cart</a>
                        </div>
                    </div>
                    <div class="col-md-12">    
                        <div class="cv-prod-text">
                            <p> {{ $product->description }}</p>
                        </div>
                    </div>
                </div>
               
            </div>
           
        </div>
    </div>
</div>
<!-- shop end -->
    
@endsection

    
   
