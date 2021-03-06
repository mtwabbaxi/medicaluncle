@extends('layouts.app')
@section('content')
     <!-- main header end -->
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Shop</h1>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- shop start -->
    <div class="cv-shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cv-shop-box">
                        <div class="cv-shop-title">
                            <h2 class="cv-sidebar-title">Showing results</h2>
                            <p><span>Total : </span>{{ $products->count() }}</p>
                        </div>
                        <div class="cv-product-all wow fadeIn" data-wow-delay="0.5s">
                            <div class="cv-gallery-grid">
                                @foreach ($products as $product)
                                    <div class="cv-product-box cv-product-item cv-hand">
                                        <div class="cv-product-img">
                                            <img src="{{ url('storage/'.$product->image) }}" alt="image" class="img-fluid"/>
                                            <div class="cv-product-button">
                                                <a href="{{ url('product/'.$product->id) }}" class="cv-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 461.312 461.312">
                                                    <g>
                                                        <path d="M230.656,156.416c-40.96,0-74.24,33.28-74.24,74.24s33.28,74.24,74.24,74.24s74.24-33.28,74.24-74.24
                                                            S271.616,156.416,230.656,156.416z M225.024,208.64c-9.216,0-16.896,7.68-16.896,16.896h-24.576
                                                            c0.512-23.04,18.944-41.472,41.472-41.472V208.64z"></path>
                                                    </g>
                                                    <g>
                                                        <path d="M455.936,215.296c-25.088-31.232-114.688-133.12-225.28-133.12S30.464,184.064,5.376,215.296
                                                            c-7.168,8.704-7.168,21.504,0,30.72c25.088,31.232,114.688,133.12,225.28,133.12s200.192-101.888,225.28-133.12
                                                            C463.104,237.312,463.104,224.512,455.936,215.296z M230.656,338.176c-59.392,0-107.52-48.128-107.52-107.52
                                                            s48.128-107.52,107.52-107.52s107.52,48.128,107.52,107.52S290.048,338.176,230.656,338.176z"></path>
                                                    </g>
                                                </svg> View detail</a>
                                                <a href="{{ url('buyer/add-to-cart/'.$product->id) }}" class="cv-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                        <g>
                                                            <path d="M507.519,116.384C503.721,111.712,498.021,109,492,109H129.736l-1.484-13.632l-0.053-0.438C121.099,40.812,74.583,0,20,0
                                                                C8.954,0,0,8.954,0,20s8.954,20,20,20c34.506,0,63.923,25.749,68.512,59.928l23.773,218.401C91.495,327.765,77,348.722,77,373
                                                                c0,0.167,0.002,0.334,0.006,0.5C77.002,373.666,77,373.833,77,374c0,33.084,26.916,60,60,60h8.138
                                                                c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59s59-26.468,59-59c0-6.645-1.104-13.036-3.138-19h86.277
                                                                c-2.034,5.964-3.138,12.355-3.138,19c0,32.532,26.467,59,59,59c32.533,0,59-26.468,59-59c0-32.532-26.467-59-59-59H137
                                                                c-11.028,0-20-8.972-20-20c0-0.167-0.002-0.334-0.006-0.5c0.004-0.166,0.006-0.333,0.006-0.5c0-11.028,8.972-20,20-20h255.331
                                                                c35.503,0,68.084-21.966,83.006-55.962c4.439-10.114-0.161-21.912-10.275-26.352c-10.114-4.439-21.912,0.161-26.352,10.275
                                                                C430.299,300.125,411.661,313,392.331,313h-240.39L134.09,149h333.308l-9.786,46.916c-2.255,10.813,4.682,21.407,15.495,23.662
                                                                c1.377,0.288,2.75,0.426,4.104,0.426c9.272,0,17.59-6.484,19.558-15.92l14.809-71C512.808,127.19,511.317,121.056,507.519,116.384
                                                                z M399,434c10.477,0,19,8.523,19,19s-8.523,19-19,19s-19-8.523-19-19S388.523,434,399,434z M201,434c10.477,0,19,8.524,19,19
                                                                c0,10.477-8.523,19-19,19s-19-8.523-19-19S190.523,434,201,434z"></path>
                                                        </g>
                                                    </svg>
                                                add to Cart</a>
                                            </div>
                                        </div>
                                        <div class="cv-product-data">
                                            <a href="javascript:;" class="cv-price-title">{{ $product->name }}</a>
                                            <p class="cv-pdoduct-price">Rs. {{ number_format($product->price) }}</p>
                                            <p class="cv-pdoduct-price"> {{ App\User::where('id',$product->user_id)->first()->name }} </p>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cv-shop-sidebar">
                        <div class="cv-widget cv-search">
                            <h2 class="cv-sidebar-title">Product Search</h2>
                            <form action="{{ url('products') }}" method="POST">
                                @csrf
                                <input type="text" name="searchTerm" required placeholder="Product Search"/>
                                <button class="cv-btn">search</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop end -->
   {{-- @include('related-products') --}}
@endsection
   

