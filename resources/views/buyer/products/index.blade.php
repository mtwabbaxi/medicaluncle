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
		<div class="col-xl-12 col-md-12 col-sm-12">
			<div class="cv-search-wrap" >
				<form action="{{ url('buyer/search-products') }}" method="POST">
					@csrf
					<div class="col-md-10 col-sm-10 col-xl-10">
					<input type="text" class="form-control" name="searchTerm" required placeholder="Product Search"/>

					</div>
					<div class="col-md-2 col-sm-2 col-xl-2">
					<button class="cv-btn btn-block btn btn-info"> <i class="fa fa-search"></i> Search</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row" style="margin-top: 25px">
		<div class="col-lg-9 col-md-10 col-sm-10">
			@if (!$products->isEmpty())
				@foreach ($products as $product)
					<div class="col-md-6 col-lg-6 col-sm-3">
						<div class="card" style="width: 18rem;">
							<img class="card-img-top product-listimg" src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}"  /> 
							<div class="card-body">
								<a href="{{ url('buyer/products/'.$product->id) }}">
									<h5 class="card-title" style="font-weight:bold"> {{ $product->name  }} </h5> 
									<span class="badge badge-warning">{{$product->stock == null ? "Out of stock" : $product->stock." in stock"  }} </span> <br>
								</a>
								<h6 class="card-text" style="font-size:10px; min-height:45px;font-weight:bold;">
									{{ App\User::find($product->user_id)->name }}
									@if (App\User::find($product->user_id)->role == 'admin')
									<svg viewBox="0 0 24 24" aria-label="Verified account" style="max-width: 15px;max-height: 15px;color: green;fill:green">
										<g>
										<path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path>
										</g>
										</svg>	
									@endif
									<span class="ffrating" style="font-size: 15px">
										{{ round(App\Review::where('product_id',$product->id)->where('seller_id',$product->user_id)->avg('rating'),1)}} 
										<span class="fa fa-star checked" style="color: #f44336"></span>
									</span>
								</h6>
								
								
								
								<h6 class="card-text" style="font-style: italic; font-size:10px;min-height: 10px;">{{ App\Category::find($product->category_id)->name }}</h6>
								<p class="card-text" style="height: 75px;">{{ substr($product->excerpt, 0, 100) }} </p>
								<p class="card-text priceTag">₨.{{ number_format($product->price) }} </p>
								@if ($product->stock != null)
								<a class=" btn left-side abtn" href="{{ url('buyer/add-to-cart/'.$product->id) }}">Add to Cart</a>
								@else
								<a class=" btn left-side abtn" disabled href="{{ url('#') }}">Add to Cart</a>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			@else
				<div class="container-fluid mt-100">
					<div class="row">
						<div class="col-md-12">
							<div class="card" style="border: 0px !important">
								<div class="card-body cart">
									<div class="col-sm-12 empty-cart-cls text-center"> 
										<h3><strong>No product found :)</strong></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3">
			{{-- filter by rating --}}
			<h2>Filter by Rating</h2>
			<form action="{{ url('#') }}" method="GET">
				
				<div class="row">
					<div class="col-lg-4">
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
					</div>
					<div class="col-lg-5" style="margin-left: -25px">
						<label for="five" style="cursor:pointer">5 Stars</label><input type="submit" hidden id="five" name="rating" value="5"><br>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
					</div>
					<div class="col-lg-5" style="margin-left: -25px">
						<label for="four" style="cursor:pointer">4 Stars</label><input type="submit" hidden id="four" name="rating" value="4"> <br>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
					</div>
					<div class="col-lg-5" style="margin-left: -25px">
						<label for="three" style="cursor:pointer">3 Stars</label><input type="submit" hidden id="three" name="rating" value="3"> <br>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						<span class="fa fa-star checked" style="color: #f44336">  </span>
						<span class="fa fa-star checked" style="color: #f44336">  </span>
					</div>
					<div class="col-lg-5" style="margin-left: -25px">
						<label for="two" style="cursor:pointer">2 Stars</label><input type="submit" hidden id="two" name="rating" value="2"> <br>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4">
						<span class="fa fa-star checked" style="color: #f44336">  </span>
					</div>
					<div class="col-lg-5" style="margin-left: -25px">
						<label for="one" style="cursor:pointer">1 Star</label><input type="submit" hidden id="one" name="rating" value="1"> <br>
					</div>
				</div> <br><br>

				<h2>Filter by Prices</h2>
				<div class="row offset-1" class="text-center">
					<h5 style="cursor:pointer" style="margin-left:25px">
						<a class="text-secondary" href="{{ url('buyer/products?firstPrice=50001&lastPrice=5000000') }}">Above 50000</a><br>
						<a class="text-secondary" href="{{ url('buyer/products?firstPrice=20000&lastPrice=49000') }}">20000-50000</a> <br>
						<a class="text-secondary" href="{{ url('buyer/products?firstPrice=10000&lastPrice=19999') }}">10000-19999</a> <br>
						<a class="text-secondary" href="{{ url('buyer/products?firstPrice=1000&lastPrice=9999') }}">1000-9999</a> <br>
						<a class="text-secondary" href="{{ url('buyer/products?firstPrice=100&lastPrice=999') }}">100-999</a> <br>
					</h5>
				</div>
			</form>
		</div>
	</div> 
	
	
@endsection
