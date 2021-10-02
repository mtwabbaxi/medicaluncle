@extends('admin.layouts.main')
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Customers</h1>
    <div class="card shadow mb-4">

        @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
        @endif

        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Customers</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact #</th>
                        <th>Email</th>
                        <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i= 0; ?>
                    @foreach ($buyers as $buyer)
                    <?php $i++; ?>
                    <tr>
                        <td> {{ $i }} </td>
                        <td>{{ $buyer->name }}</td>
                        <td>{{ $buyer->phonenumber }}</td>                        
                        <td>{{ $buyer->email }}</td>
                        <td>{{ $buyer->gender }}</td>            
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
          
@endsection