@extends('admin.layouts.main')
@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Products</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Products</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('seller/products/add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">  
                        <label for="">Name</label>                                  
                        <input type="text" class="form-control" name="name" required placeholder="Enter Product Name" />
                    </div> <br>
                
                    <div class="form-group">  
                        <label for="">Category</label> <br>                                 
                        <select name="category_id"  class="form-control" >
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
@endsection