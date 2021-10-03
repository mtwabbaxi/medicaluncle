@extends('seller.layouts.main')
@section('content')

<div class="row">
	
	

	<div class="col-lg-12 col-md-12 col-sm-6">
		<div class="row">
			<div class="col-md-3 col-lg-3 col-xl-12">
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

			<div class="col-md-3col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-secondary mt-2">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Total Orders</h4>
										<div class="info">
											<strong class="amount"> {{ App\Order::where('seller_id',Auth::id())->count() }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-3 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-success">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Completed Orders</h4>
										<div class="info">
											<strong class="amount"> {{ App\Order::where('seller_id',Auth::id())->where('status','Completed')->count() }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-3 col-lg-3 col-xl-3">
				<section class="panel panel-featured-left panel-featured-success">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col">
								<div class="summary">
									<center>
										<h4 class="title">Pending Orders</h4>
										<div class="info">
											<strong class="amount"> {{ App\Order::where('seller_id',Auth::id())->where('status','Pending')->count() }} </strong>
										</div>
									</center>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

			<div class="col-md-3 col-lg-3 col-xl-3">
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

			
		</div>
	</div>
</div>



<div class="row" style="padding-top:40px">
	<div class="recentlyaddedproindex">
		<h2 style="color: #3cbcff;border-bottom: 2px solid #3cbcff;font-weight:bold">Recently Added Products</h2>
		@foreach ($products as $product)
		<div class="col-md-4 col-lg-3 col-sm-6">
			<div class="card" style="width: 18rem;height: 300px;border:2px solid rgba(0,0,0,.125) !important">
				<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 

				<div class="card-body">
					<a href="#">
						<h5 class="card-title" style="min-height: 60px;font-weight:bold"> {{ $product->name }} </h5>
					</a>
					<h6 class="card-text" style="font-style: italic; font-size:10px">{{ App\Category::find($product->category_id)->name }}</h6>

					<p class="card-text" style="background: #3cbcff;
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
		<h2 style="color: #3cbcff;border-bottom: 2px solid #3cbcff;font-weight:bold">Recently Added Catalogs</h2>
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