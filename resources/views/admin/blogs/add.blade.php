@extends('admin.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Medical Uncle</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
        </div>
        <div class="card-body">
            
           <div class="row">
               <div class="col-md-12">
                <form action="{{ url('admin/blogs/add') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Enter Title </label>
                        <div class="input-group">
                            <input type="text" name="title" required class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Thumbnail </label>
                        <div class="input-group">
                            <input type="file" name="image" required class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Excerpt </label>
                        <div class="input-group">
                            <textarea name="description"  class="form-control" required id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Description </label>
                        <div class="input-group">
                            <textarea name="description" class="form-control"  required id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    
                   
                    <div>
                        <button type="submit" class="btn btn-info btn-block">Add</button>
                    </div>
                </form> 
               </div>
           </div>
        </div>
    </div>
</div>

@endsection

      
