@extends('seller.layouts.main')
@section('content')

<section class="content" style="margin: 25px; background: #ffffff;">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Update Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{ App\User::find(auth::id())->name }} </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Update Product</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
            <div class="row clearfix" >
                <div class="col-lg-12 col-md-12 col-sm-12">
					@if (session('msg'))
					<div class="alert alert-warning" role="alert">
						 <strong> {{ session('msg') }} </strong> 
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
						 </button>
					 </div>
					@endif
                    <div class="card">
                        <div class="body" style="min-height: 1px">
                            <div class="row clearfix">
                                <div class="col-sm-12">

									<form action="{{ url('seller/products/update/'.$product->id) }}" method="post" enctype="multipart/form-data">
										@csrf
										
										<div class="form-group">  
											<label for="">Name</label>                                  
											<input type="text" class="form-control" value="{{ $product->name }}" name="name" required placeholder="Enter Product Name" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">Category</label> <br>                                 
											<select name="category_id" class="" style="width: 100%">
												<option selected value="{{$product->category_id}}">{{ App\Category::find($product->category_id)->name }}</option>
												<option disabled>-----</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}"> {{ $category->name }} </option>
												@endforeach
											</select>
										</div> <br>
	
										<div class="form-group">  
											<label for="">Price</label>                                  
											<input type="text" class="form-control" value="{{ $product->price }}" required name="price" placeholder="Enter Product Price" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">SKU</label>                                  
											<input type="text" class="form-control" value="{{ $product->sku }}" required name="sku" placeholder="Enter Product SKU" />
										</div> <br>

										<div class="form-group">  
											<label for="">Stock</label>                                  
											<input type="number" class="form-control" required name="stock" value="{{ $product->stock }}" placeholder="Enter amount of product in stock" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">Images</label>   
											<div class="row">
												<div class="col-md-3 col-lg-3 col-sm-3"><span class="text-danger">*</span>
													<img src="{{ asset('storage/'.$product->image) }}" height="70" width="50" alt=""> 
													<input type="file" class="form-control" required name="image" />
												</div>
												<div class="col-md-3 col-lg-3 col-sm-3"> <span class="text-danger">Optional</span>
													@if ($product->image2 != null)
													<img src="{{ asset('storage/'.$product->image2) }}" height="70" width="50" alt=""> 
													@endif
													<input type="file" class="form-control"  name="image2" />
												</div>
												<div class="col-md-3 col-lg-3 col-sm-3"> <span class="text-danger">Optional</span>
													@if ($product->image3 != null)
													<img src="{{ asset('storage/'.$product->image3) }}" height="70" width="50" alt=""> 
													@endif
													<input type="file" class="form-control"  name="image3" />
												</div>
												<div class="col-md-3 col-lg-3 col-sm-3"> <span class="text-danger">Optional</span>
													@if ($product->image4 != null)
													<img src="{{ asset('storage/'.$product->image4) }}" height="70" width="50" alt=""> 
													@endif
													<input type="file" class="form-control"  name="image4" />
												</div>
											</div> 
										</div> 

										<br>
										<div class="form-group">  
											<label for="">Sizes</label>   
											<div class="row">
												<div class="col-md-4 col-lg-4 col-sm-4">
													Large<input type="checkbox" class="form-control" checked={{ $product->l == "1" }} name="l" />
												</div>
												<div class="col-md-4 col-lg-4 col-sm-4">
													Medium<input type="checkbox" class="form-control" checked={{ $product->m == "1" }} name="m" />
												</div>
												<div class="col-md-4 col-lg-4 col-sm-4">
													Small<input type="checkbox" class="form-control" checked={{ $product->s == "1" }} name="s" />
												</div>
											</div> 
										</div> 
										<br>

										<div class="form-group">
											<div class="form-line">
												<label for=""> Excerpt </label>
												<textarea rows="2" class="form-control no-resize" required id="excerpt" name="excerpt" placeholder="Please type short excerpt...">{{$product->excerpt}}</textarea>
												<span style="float:right" id="charsLeft">100 chars left</span>
											</div>
										</div>
	
										<div class="form-group">
											<div class="form-line">
												<label for=""> Description </label>
												<textarea rows="4" class="form-control no-resize" required name="description" placeholder="Please type what you want...">{{ ltrim($product->description) }}</textarea>
											</div>
										</div>

										<div class="form-group">
											<button class="btn btn-block btn-lg btn-success">Submit</button>
										</div>


									</form>
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

	const textarea = document.getElementById("excerpt");
	console.log(textarea);
	textarea.addEventListener("input", event => {
		const target = event.currentTarget;
		const maxLength = 100;
		const currentLength = target.value.length;
		const charsLeftSpan = document.querySelector('#charsLeft');
		if (currentLength >= maxLength) {
			textarea.addEventListener('keydown', function(e) {
				const key = e.key; 
				if (key === "Backspace" || key === "Delete") {
					textarea.readOnly = false;
				} 
			});
			charsLeftSpan.innerText =  `Its overup ${currentLength - maxLength} up`;
			textarea.readOnly = true;
		
		} else {
			charsLeftSpan.innerText =  `${maxLength - currentLength} chars left`;
		}
	});
	</script>
	
	
	
	


@endsection
