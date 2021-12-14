@extends('seller.layouts.main')
@section('content')

<div class="row" style="padding-top:10px">
	<div class="recentlyaddedproindex">
		<h2 style="color: #3cbcff;border-bottom: 2px solid #3cbcff;font-weight:bold">Recent Sales</h2>
            <table class="table table-stripped">
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>OrderID</th>
                    <th>Buyer Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Status</th>
                </tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td>{{ $order->created_at->format('H:i') }}</td>
                        <td>{{ $order->order_no }}</td>
                        <td>{{ App\User::find(App\Order::where('order_no',$order->order_no)->first()->buyer_id)->name}}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->product_price }}</td>
                        <td>{{ $order->totalPrice }}</td>
                        <td>{{ $order->status }}</td>
                       
                    </tr>
                @endforeach
            </table>
	</div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Monthly Sale</div>
                        <div class="panel-body">
                            {!! $monthly->html() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Yearly Sale</div>
                        <div class="panel-body">
                            {!! $yearly->html() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{!! Charts::scripts() !!}
{!! $monthly->script() !!}
{!! $yearly->script() !!}

@endsection