@extends('seller.layouts.main')
@section('content')

	<div class="col-md-12 col-xs-12 pl-0" style="margin-right: 4px">
		<a href="{{ url('seller/products/add') }}" class="btn btn-sm btn-primary text-center">Add Products</a>
	<div>
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
						<p class="card-text" style="height: 75px;">{{ substr($product->excerpt, 0, 100) }} </p>
						<a href="{{ url('seller/products/update/'.$product->id) }}" class="btn btn-success btn-block"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Edit</a>
						<a href=""{{ url('seller/products/delete/'.$product->id) }}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger btn-block"><i style="font-size:17px" class="fa">&#xf014;</i></i>&nbsp; Delete</a>
					</div>
				</div>
			</div>
		@endforeach
	</div> 
	
	
@endsection
