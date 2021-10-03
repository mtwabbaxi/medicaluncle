
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
                            <img src="https://via.placeholder.com/225x225" alt="image" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="cv-prod-content">
                            <h2 class="cv-price-title">Plastic face shield</h2>
                            <p class="cv-pdoduct-price"><del>$170</del> $165</p>
                            <div class="cv-prod-category">
                                <span>Category :</span>
                                <a href="#" class="cv-prod-category"> Face Mask</a>,
                                <a href="#" class="cv-prod-category"> Body Cover</a>
                            </div>
                           
                        </div>
                        <div class="cv-prod-count">
                            <div class="cv-cart-quantity">
                                <button class="cv-sub"></button>
                                <input type="number" value="1" min="1">
                                <button class="cv-add"></button>
                            </div>
                            <button class="cv-btn">add to cart</button>
                        </div>
                    </div>
                    <div class="col-md-12">    
                        <div class="cv-prod-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                        </div>
                    </div>
                </div>
               
            </div>
           
        </div>
    </div>
</div>
<!-- shop end -->
    
@endsection

    
   
