@extends('seller.layouts.main')
@section('content')
	<h4 style="margin-top: 2px"><b>Products Quotation</b></h4>
	<hr>
	@if (session('msg'))
		<span class="alert alert-success">{{ session('msg') }}</span>
	@endif

	<div class="row" style="margin-top: 25px">
		@foreach ($products as $product)
			<div class="col-md-4 col-lg-3 col-sm-6">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 
					<div class="card-body">
						<a href="{{ url('seller/products/'.$product->id) }}">
							<h5 class="card-title" style="min-height: 60px;font-weight:bold"> {{ $product->name }} </h5>
						</a>
						<h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 30px;">{{ App\Category::find($product->category_id)->name }}</h6>
						<p class="card-text" style="height: 50px;">{{ substr($product->excerpt, 0, 100) }} </p>
						<form action="{{ url('seller/response-requests/addProduct/'.$bidId.'/'.$product->id) }}" method="post">
							@csrf
							<div class="form-group">
								<label for=""><b>Quote Price</b></label>
								<input type="number" name="product_price" value="{{$product->price}}" class="form-control" required id="">
							</div>
							<button type="submit" class="btn btn-success left-side abtn btn-block"> <i class="fa fa-plus"></i> Add </button>
						</form>
					</div>
				</div>
			</div>
		@endforeach
	</div> 
	
	
@endsection
