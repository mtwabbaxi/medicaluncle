@extends('buyer.layouts.main')
@section('content')

@foreach ($rfqs as $rfq)
    <div class="col-md-3 col-sm-6 col-xs-12 pr-0">
        <section class="panel panel-horizontal">
            <div class="panel-body p-lg">
                <h5 class="text-semibold mt-sm">{{ $rfq->rfq_no }}</h5>
                <a href="">View Respective Vendors Requests</a>
            </div>
        </section>
    </div>
@endforeach

@endsection