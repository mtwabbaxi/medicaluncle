@extends('buyer.layouts.main')
@section('content')
	<h4 style="margin-top: 50px"><b>Products in This Requests</b></h4>
	<hr>
	@if (session('msg'))
		<span class="alert alert-success">{{ session('msg') }}</span>
	@endif

	<div class="row" style="margin-top: 25px">
		@foreach ($products as $product)
		<?php $prod = App\Product::find($product->product_id); ?>
			<div class="col-md-4 col-lg-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top product-listimg" src="{{ asset('storage/'.$prod->image) }}" alt="{{ $prod->name }}"  /> 
					<div class="card-body">
						<a href="{{ url('buyer/products/'.$prod->id) }}">
							<h5 class="card-title" style="min-height: 60px;font-weight:bold"> {{ $prod->name }} </h5>
						</a>
						<h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 30px;">{{ App\Category::find($prod->category_id)->name }}</h6>
						<p class="card-text" style="height: 50px;">{{ substr($prod->excerpt, 0, 100) }} </p>
						<p class="card-text priceTag">₨.{{ number_format($product->product_price) }} </p>
						<form action="{{ url('buyer/vendor-requests/add-to-cart/'.$prod->id.'/'.$product->bid_id) }}" method="post">@csrf
							<button class="btn left-side abtn" style="margin-bottom: 15px">Add to Cart</button>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div> 
	
	
@endsection
