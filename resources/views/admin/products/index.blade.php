@extends('admin.layouts.main')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Products</h1>
    <div class="card shadow mb-4">
        @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
        @endif
        <div class="card-header py-3">
        <a href="{{ url('admin/products/add') }}" class="btn btn-primary" style="float:right"> <i class="fa fa-add"></i>  Add Product </a>
        <a href="{{ url('admin/products/category') }}" class="btn btn-primary mr-2" style="float:right"> <i class="fa fa-add"></i>  View Categories </a>
        <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
    </div>

    <div class="card-body">
        
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Sku</th>
                <th>Excerpt</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 0; ?>
            @foreach ($products as $product)
            <?php $i++; ?>
            <tr>
                <td>{{ $i }}</td>
                <td><img src="{{ asset('storage/'.$product->image) }}" width="70" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ App\Category::find($product->category_id)->name }}</td>
                <td>Rs. {{ $product->price }}</td>
                <td>{{ $product->sku }}</td>
                <td>{{ $product->excerpt }}</td>
               
                
            
            </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>
    </div>
          

@endsection