@extends('buyer.layouts.main')
@section('content')

@if (session('msg'))
	<div class="alert alert-warning" role="alert">
		<strong> {{ session('msg') }} </strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
		</button>
	</div>
@endif

<div class="row">
	<div class="col-md-6 col-sm-7 col-xs-12">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
				<img src="{{ url('assets/images/mainbanner1.png') }}" alt="Los Angeles">
				</div>

				<div class="item">
				<img src="{{ url('assets/images/mainbanner2.png') }}" alt="Chicago">
				</div>
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
	<div class="col-md-6 col-sm-5 col-xs-12 appear-animation bounceInDown appear-animation-visible" style="border: 5px black">
		<div class="postrequest-leftslider text-center">
			<h3>Hi, Buyer</h3>
			<p>Get offers from sellers for your need</p>
			<a href="rfq" class="btn" style="background: #3cbcff">Request For Quotation</a>
		</div>

		<div class="container mt-4">
			<div class="row">
				<div class="col-md-4 col-lg-4 col-sm-12">
					<section class="panel panel-featured-bottom panel-featured-secondary">
						<div class="panel-body">
							<div class="widget-summary text-center">
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Sellers</h4>
										<div class="info">
											<strong class="amount">{{ App\User::where('role','seller')->count() }}</strong>
										</div>
									</div>							
								</div>
							</div>
						</div>
					</section>
				</div>

				<div class="col-md-4 col-lg-4 col-sm-12">
					<section class="panel panel-featured-bottom panel-featured-secondary">
						<div class="panel-body">
							<div class="widget-summary text-center">
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">Total Products</h4>
										<div class="info">
											<strong class="amount">{{ App\Product::count() }}</strong>
										</div>
									</div>							
								</div>
							</div>
						</div>
					</section>
				</div> 
			</div>
		</div>

	</div>
</div>



<div class="row">
	<div class="col-sm-12" style="margin-top:25px ">
		<h2 class="pageheading-topseller">Top Sellers<span></span></h2>
	</div>
	<div class="topseller-allproducts mb-5">
		<?php $i=0; ?>
		@foreach ($sellers as $seller)
		<?php $i++; ?>
			<div class="col-sm-6 col-md-6 col-lg-3">
				<div class="topseller-singleproduct">
					<div class="topseller-singleorders">
						<span class="numberval">{{ $i }}</span>
						<span class="numbercount">{{ $seller->total }} Orders</span>
					</div>
					<img src="" alt="">
					<p>{{ App\User::find($seller->seller_id)->name }}</p>
					<h4><span>From: </span>Islamabad</h4>
				</div>
			</div>
		@endforeach
	</div>
</div>

<div class="row featureusedpro" style="padding-top:40px">
	<div class="recentlyaddedproindex">
		<h2 class="pageheading-topseller">Previous<span> Product Choices</span></h2>
		@foreach ($products as $product) 
		<div class="col-md-4 col-lg-3 col-sm-6">
			<div class="card" style="width: 18rem;height: 350px;border:2px solid rgba(0,0,0,.125) !important">
				<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 
				<div class="card-body">
					<a href="{{ url('buyer/products/'.$product->id) }}">
						<h5 class="card-title" style="min-height: 60px;font-weight:bold;min-height:auto !important;"> {{ $product->name }} </h5>
					</a>
					<span class="ffrating">
						{{ round(App\Review::where('product_id',$product->id)->where('seller_id',$product->user_id)->avg('rating'),1)}} 
						<span class="fa fa-star checked" style="color: #f44336"></span>
					</span>
					<h6 class="card-text" style="font-size:10px; min-height:45px">{{ App\User::find($product->user_id)->name }}</h6>
					<h6 class="card-text" style="font-style: italic; font-size:10px">{{ App\Category::find($product->category_id)->name }}</h6>
					<p class="card-text priceTag">₨.{{ number_format($product->price) }} </p>
					<a class=" btn left-side abtn" href="{{ url('buyer/add-to-cart/'.$product->id) }}">Add to Cart</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>


@endsection