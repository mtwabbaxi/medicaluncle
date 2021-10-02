@extends('seller.layouts.main')
@section('content')

<div class="row">
	
	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="row">
			<div class="col-md-12">
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
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-12">
		<div class="row">

			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel panel-featured-left panel-featured-secondary mt-2">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Total Added Products</h4>
										<div class="info">
											<strong class="amount"> {{ App\Product::where('user_id',Auth::id())->count() }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel panel-featured-left panel-featured-secondary mt-2">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Total Product Categories</h4>
										<div class="info">
											<strong class="amount"> {{ App\Category::count() }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel panel-featured-left panel-featured-tertiary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Total Catalogs</h4>
										<div class="info">
											<strong class="amount">{{ App\Catalog::where('user_id',Auth::id())->count() }}</strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-12 col-lg-12 col-xl-12">
				<section class="panel panel-featured-left panel-featured-success">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Completed Orders</h4>
										<div class="info">
											<strong class="amount"> 0 </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>



<div class="row" style="padding-top:40px">
	<div class="recentlyaddedproindex">
		<h2 style="color: #f44336;border-bottom: 2px solid #f44336;font-weight:bold">Recently Added Products</h2>
		@foreach ($products as $product)
		<div class="col-md-4 col-lg-3 col-sm-6">
			<div class="card" style="width: 18rem;height: 300px;border:2px solid rgba(0,0,0,.125) !important">
				<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 

				<div class="card-body">
					<a href="#">
						<h5 class="card-title" style="min-height: 60px;font-weight:bold"> {{ $product->name }} </h5>
					</a>
					<h6 class="card-text" style="font-style: italic; font-size:10px">{{ App\Category::find($product->category_id)->name }}</h6>

					<p class="card-text" style="background: #f44336;
					padding: 4px;
					color: white;
					border: 1px;
					border-radius: 5px 2px;
					font-weight: bold;
					display: initial;">₨.{{ $product->price }} </p>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div class="row" style="padding-top:40px">
	<div class="recentlyaddedproindex">
		<h2 style="color: #f44336;border-bottom: 2px solid #f44336;font-weight:bold">Recently Added Catalogs</h2>
		@foreach ($catalogs as $catalog)
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
				<section class="panel invendor-newsletter">
					<a href="{{ asset('storage/catalogs/'.$catalog->pdf) }}" download>
						<header class="panel-heading bg-white">
							<div class="">
							<img class="newsletter-rightimg"  src="{{ asset('storage/'.$catalog->image) }}" />
							</div>
						</header>

						<div class="panel-body">
							<p class="text-center" style="font-size: 21px;
							font-weight: bolder;
							color: black;"> {{ $catalog->name }} </p>
					</a>
							<p style="font-size: 12px;padding: 20px;"> {{ $catalog->excerpt }} </p>
						</div>
				
				</section>
			</div>
   		@endforeach
	</div>
</div>

@endsection