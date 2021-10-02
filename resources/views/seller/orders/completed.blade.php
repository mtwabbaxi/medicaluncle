@extends('seller.layouts.main')
@section('content')
    @foreach ($orders as $order)
    <div class="col-md-4 col-sm-6 col-xs-12 pr-0">
        <section class="panel panel-horizontal">
            <div class="panel-body p-lg"> 
            <h3 class="text-semibold mt-sm ml-2" 
                style="font-size: 20px; margin-bottom: 0 !important" > 
                ORDER-{{ $order->order_no }} 
            </h3>
                <a class="ml-2" 
                    href="{{ url('seller/complete-orders/'.$order->id.'/products') }}">
                    View Products
                </a>
            </div>
        </section>
    </div>
    @endforeach
@endsection