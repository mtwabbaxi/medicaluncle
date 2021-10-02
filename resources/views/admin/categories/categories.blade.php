@extends('admin.layouts.main')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Categories</h1>
    <div class="card shadow mb-4">
        @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
        @endif
        <div class="card-header py-3">
        <a href="{{ url('admin/products/category/add') }}" class="btn btn-primary mr-2" style="float:right"> <i class="fa fa-add"></i>  Add Category </a>
        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
    </div>

    <div class="card-body">
        
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 0; ?>
            @foreach ($categories as $category)
            <?php $i++; ?>
            <tr>
                <td>{{ $i }}</td>
                <td> {{ $category->name }} </td>
                <td>
                    <a 
                        href="{{ url('admin/products/category/delete/'.$category->id) }}" 
                        class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete?');"
                        >
                        Delete
                    </a>
                </td>
               
                
            
            </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>
    </div>
          

@endsection