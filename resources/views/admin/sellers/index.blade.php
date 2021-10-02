@extends('admin.layouts.main')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Sellers</h1>
    <div class="card shadow mb-4">

        @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
        @endif

        <div class="card-header py-3">
            {{-- <a href="{{ url('#') }}" class="btn btn-primary" style="float:right"> <i class="fa fa-add"></i>  Add Seller </a> --}}
            <h6 class="m-0 font-weight-bold text-primary">All Sellers</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Products</th>
                        <th>Email</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= 0; ?>
                    @foreach ($sellers as $seller)
                    <?php $i++; ?>
                    <tr>
                        <td> {{ $i }} </td>
                        <td>{{ $seller->name }}</td>
                        <td>{{ App\Product::where('user_id',$seller->id)->count() }}</td>
                        <td>{{ $seller->email }}</td>
                        <td>{{ $seller->gender }}</td>            
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
          
@endsection