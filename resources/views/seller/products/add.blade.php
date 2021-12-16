@extends('seller.layouts.main')
@section('content')

<section class="content" style="margin: 25px; background: #ffffff;">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> {{ App\User::find(auth::id())->name }} </a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Add Product</a></li>
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

									<form action="{{ url('seller/products/add') }}" method="post" enctype="multipart/form-data">
										@csrf
										
										<div class="form-group">  
											<label for="">Name</label>                                  
											<input type="text" class="form-control" name="name" required placeholder="Enter Product Name" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">Category</label> <br>                                 
											<select name="category_id" class="" style="width: 100%">
												<option selected>Select Category</option>
												@foreach ($categories as $category)
													<option value="{{ $category->id }}"> {{ $category->name }} </option>
												@endforeach
											</select>
										</div> <br>
	
										<div class="form-group">  
											<label for="">Price</label>                                  
											<input type="text" class="form-control" required name="price" placeholder="Enter Product Price" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">SKU</label>                                  
											<input type="text" class="form-control" required name="sku" placeholder="Enter Product SKU" />
										</div> <br>

										<div class="form-group">  
											<label for="">Stock</label>                                  
											<input type="number" class="form-control" required name="stock" placeholder="Enter amount of product in stock" />
										</div> <br>
	
										<div class="form-group">  
											<label for="">Image</label>                                  
											<input type="file" class="form-control" required name="image" />
										</div> <br>

										<div class="form-group">
											<div class="form-line">
												<label for=""> Excerpt </label>
												<textarea rows="2" class="form-control no-resize" required id="excerpt" name="excerpt" placeholder="Please type short excerpt..."></textarea>
												<span style="float:right" id="charsLeft">100 chars left</span>
											</div>
										</div>
	
										<div class="form-group">
											<div class="form-line">
												<label for=""> Description </label>
												<textarea rows="4" class="form-control no-resize" required name="description" placeholder="Please type what you want..."></textarea>
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
