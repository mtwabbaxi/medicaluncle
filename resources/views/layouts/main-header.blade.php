<div class="cv-header-style3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-4 col-md-4 col-sm-4 col-3">
                <div class="cv-nav-bar">
                    <div class="cv-menu">
                        <ul>
                            <li ><a href="{{ url('/') }}"> <i class="fa fa-home"></i> Home</a> </li>
                            <li><a href="{{ url('shop') }}"> <i class="fa fa-store"></i> Shop</a></li>
                            <li><a href="{{ url('about') }}"> <i class="fa fa-info-circle"></i> About</a></li>
                            <li><a href="{{ url('blogs') }}"> <i class="fa fa-blog"></i> Blog</a></li>
                            <li><a href="{{ url('contact') }}"> <i class="fa fa-address-book"></i> Contact</a></li>
                           
                            {{-- <li><a href="service.html">Service</a></li>
                            <li class="cv-children-menu"><a href="javascript:;">Pages</a>
                                <ul class="cv-sub-mmenu">
                                    <li><a href="blog-single.html">Blog single</a></li>
                                    <li><a href="product-single.html">Product single</a></li>
                                    <li><a href="account.html">My account</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul>
                            </li> --}}
                           
                        </ul>
                    </div>
                </div>
                <div class="cv-toggle-nav">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-sm-6">
                <div class="cv-search-wrap" style="max-width: 650px !important">
                    <form action="{{ url('products') }}" method="POST">
                        @csrf
                        <input type="text" name="searchTerm" required placeholder="Product Search"/>
                        <button class="cv-btn"> <i class="fa fa-search"></i> search</button>
                    </form>
                </div>
            </div>
            <div class="col-xl-2 col-9">
                <div class="cv-header-wooInfo">
                    <ul>
                       
                        <li>
                            <a href="javascript:void(0);" class="cv-head-user" data-toggle="modal" data-target="#loginModel">
                             <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14.031">
                                   <path d="M11.962,8.941 C11.255,8.235 10.432,7.700 9.512,7.348 C10.531,6.560 11.123,5.346 11.108,4.055 C11.096,2.964 10.657,1.940 9.870,1.171 C9.093,0.411 8.073,-0.006 6.995,-0.006 C6.977,-0.006 6.959,-0.006 6.940,-0.006 C4.702,0.024 2.880,1.866 2.880,4.102 C2.880,5.374 3.473,6.571 4.477,7.348 C3.557,7.700 2.734,8.235 2.027,8.941 C0.853,10.113 0.130,11.663 -0.007,13.306 C-0.023,13.491 0.040,13.674 0.164,13.811 C0.289,13.947 0.467,14.025 0.655,14.025 C1.001,14.025 1.284,13.763 1.314,13.416 C1.561,10.496 4.056,8.209 6.994,8.209 C9.933,8.209 12.428,10.496 12.676,13.416 C12.705,13.763 12.989,14.025 13.338,14.025 C13.522,14.025 13.699,13.947 13.824,13.812 C13.949,13.676 14.011,13.492 13.997,13.307 C13.859,11.663 13.136,10.113 11.962,8.941 ZM9.782,4.009 C9.807,4.786 9.519,5.516 8.969,6.067 C8.418,6.619 7.699,6.905 6.902,6.885 C5.438,6.837 4.254,5.655 4.206,4.194 C4.181,3.418 4.469,2.688 5.019,2.137 C5.570,1.584 6.291,1.290 7.087,1.319 C8.551,1.366 9.735,2.548 9.782,4.009 Z"></path>
                                </svg>
                             </span>
                             <span class="cv-head-woo-text">Register / Login</span>
                          </a>
                        </li>
                        
                    </ul>
                 </div>
            </div>
        </div>
    </div>
</div>