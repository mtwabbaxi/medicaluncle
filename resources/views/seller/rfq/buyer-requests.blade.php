@extends('seller.layouts.main')
@section('content')

<h5 style="margin-top: 0px;"><b>Buyer Requests</b></h5> <hr>

 <div style="margin-top: 35px">
    @foreach ($rfqs as $rfq)
    <div class="col-md-12 col-sm-6 col-xs-12 pr-0">
        <section class="panel panel-horizontal">
            <div class="panel-body p-lg">
                <p>{{ $rfq->message }}</p>
                <hr>
                <div class="row">
                    <div class="col-3">
                        <p><b> {{ $rfq->rfq_no }} </b></p>
                    </div>
                    <div class="col-3">
                        <p><b> {{ App\User::find($rfq->buyer_id)->name }} </b></p>
                    </div>
                    <div class="col-3">
                        <p><b> {{ $rfq->city }} </b></p>
                    </div>
                    <div class="col-3">
                        <a href="{{ url('seller/view-quotation/'.$rfq->id) }}" class="btn btn-success"><i class="fa fa-eye"> View Quotation</i></a>

                        @if (App\Bid::where('request_id',$rfq->id)->where('seller_id',auth::id())->first()->status == 0)
                        <a href="{{ url('seller/response-requests/'.$rfq->id) }}" 
                            onclick="return confirm('Are you sure you want to continue?');"  
                            class="btn btn-primary">Send Response</a>
                        @else
                            <button class="btn btn-secondary">Sent!</button>
                        @endif    
                    </div>
                    
                </div>
            </div>
        </section>

    </div>
    @endforeach
 </div>
@endsection