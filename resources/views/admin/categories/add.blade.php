@extends('admin.layouts.main')
@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Category</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('admin/products/category/add') }}" method="post">
                    @csrf
                    <div class="form-group">  
                        <label for="">Name</label>                                  
                        <input type="text" class="form-control" required name="name" placeholder="Enter Category Name" />
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