@extends('admin.layouts.main')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Catalogs</h1>
    <div class="card shadow mb-4">
        @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
        @endif
        <div class="card-header py-3">
        <a href="{{ url('admin/catalogs/add') }}" class="btn btn-primary" style="float:right"> <i class="fa fa-add"></i>  Add Catalog </a>
        <h6 class="m-0 font-weight-bold text-primary">All Catalogs</h6>
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
                <th>Excerpt</th>
            </tr>
            </thead>
            <tbody>
                <?php $i= 0; ?>
            @foreach ($catalogs as $catalog)
            <?php $i++; ?>
            <tr>
                <td>{{ $i }}</td>
                <td><img src="{{ asset('storage/'.$catalog->image) }}" width="70" alt=""></td>
                <td><a style="text-decoration: none;" href="{{ asset('storage/catalogs/'.$catalog->pdf) }}" download>{{ $catalog->name }}</a>
                </td>
                <td>{{ App\Category::find($catalog->category_id)->name }}</td>
              
                <td>{{ $catalog->excerpt }}</td>
               
                
            
            </tr>
            @endforeach

            </tbody>
        </table>
        </div>
    </div>
    </div>
          

@endsection