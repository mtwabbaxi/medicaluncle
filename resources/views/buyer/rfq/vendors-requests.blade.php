@extends('buyer.layouts.main')
@section('content')

<h5 style="margin-top: 0px;"><b>Vendors Requests</b></h5> <hr>

 <div style="margin-top: 35px">
    @foreach ($bids as $bid)
    <div class="col-md-12 col-sm-6 col-xs-12 pr-0">
        <section class="panel panel-horizontal">
            <div class="panel-body p-lg">
                <h5 style="margin-left: 10px"><b>{{ App\User::find($bid->seller_id)->name }}</b></h5>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <p style="margin-left: 10px "><b> {{ App\User::find($bid->seller_id)->email }} </b></p>
                    </div>
                    <div class="col-3">
                        <p> Total Products: <b> {{ App\Bid_product::where('bid_id',$bid->id)->count() }} </b></p>
                    </div>
                    <div class="col-3">
                        <p> Total Price:  <b> Rs. {{ App\Bid_product::where('bid_id',$bid->id)->sum('product_price') }} </b></p>
                    </div>
                    <div class="col-3">
                        <a href="{{ url('buyer/view-quotation/'.$bid->id) }}" class="btn btn-success"><i class="fa fa-eye"> View Quotation</i></a>
                        <a href="{{ url('buyer/view-products/'.$bid->id) }}" class="btn btn-info"><i class="fa fa-eye"> View Products</i></a>
                    </div>
                </div>
            </div>
        </section>

    </div>
    @endforeach
 </div>


@endsection