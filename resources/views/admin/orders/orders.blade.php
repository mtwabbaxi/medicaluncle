@extends('admin.layouts.main')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $status }} Orders</h6>
        </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial #</th>
                <th>Order Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phonenumber</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach ($orders->unique('order_no') as $order)
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $order->order_no }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phonenumber }}</td>
                        <td>{{ $order->status }}</td>
                        <td><a href="{{ url('admin/orders/'.$order->id.'/products') }}" class="btn btn-primary">View Products</a></td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection