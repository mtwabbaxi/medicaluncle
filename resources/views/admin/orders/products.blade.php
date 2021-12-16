@extends('admin.layouts.main')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Order Products</h6>
        </div>
      <div class="card-body">
        @if (session('msg'))
            <div class="alert alert-danger">{{ session('msg') }}</div>
        @endif
        <div class="table-responsive">
          <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Serial #</th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Vendor</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Vendor Status</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach ($products as $product)
                <?php $i++; ?>
                <tr>
                    <td>{{ $i }}</td>
                    <td>
                        <img src="{{ url('storage/'.App\Product::find($product->product_id)->image) }}" class="img-fluid" style="height: 50px; width:50px" alt="">
                    </td>
                    <td>{{ App\Product::find($product->product_id)->name }}</td>
                    <td>Rs. {{ $product->product_price }}</td>
                    <td>{{ App\User::find($product->seller_id)->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->totalPrice }}</td>
                    <td>
                        @if ($product->vendor_status == 'Sent')
                        <span class="badge badge-warning">Sent to Warehouse</span>
                        @else
                        Pending
                        @endif
                    </td>
                   
                    <td>{{ $product->status }}</td>

                    <td>

                     

                        @if ($product->status != 'Delivered')
                        @if ($product->status != 'Shipped')
                          <a href="{{ url('admin/order/'.$orderId.'/'.$product->product_id.'/s') }}" 
                            class="btn btn-info btn-sm"
                            onclick="return confirm('Are you sure you want to Mark this Product as Shipped?');"
                            >
                            Mark as Shipped
                          </a>
                        @endif
                        
                        <a href="{{ url('admin/order/'.$orderId.'/'.$product->product_id.'/d') }}" 
                          class="btn btn-success btn-sm"
                          onclick="return confirm('Are you sure you want to Mark this Product as Delievered?');"
                          >
                          Mark as Delievered
                        </a>
                        @else
                            Delivered
                        @endif
                    </td>
                </tr>

                @endforeach
              

            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection