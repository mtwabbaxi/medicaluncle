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
	<div class="row" style="margin-top: 25px">

		@foreach ($products as $product)
			<div class="col-md-4 col-lg-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 
					<div class="card-body">
						<a href="{{ url('buyer/products/'.$product->id) }}">
							<h5 class="card-title" style="font-weight:bold"> {{ $product->name }} </h5>
						</a>
						<h6 class="card-text" style="font-size:10px; min-height:45px;font-weight:bold;">{{ App\User::find($product->user_id)->name }}</h6>
						<h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 10px;">{{ App\Category::find($product->category_id)->name }}</h6>
						<p class="card-text" style="height: 75px;">{{ substr($product->excerpt, 0, 100) }} </p>
						<p class="card-text priceTag">₨.{{ $product->price }} </p>
					<a class=" btn left-side abtn" href="{{ url('buyer/add-to-cart/'.$product->id) }}">Add to Cart</a>
					</div>
				</div>
			</div>
		@endforeach
	</div> 
	
	
@endsection
