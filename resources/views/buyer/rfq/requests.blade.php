@extends('buyer.layouts.main')
@section('content')

@foreach ($rfqs as $rfq)
    <div class="col-md-3 col-sm-6 col-xs-12 pr-0">
        <section class="panel panel-horizontal">
            <div class="panel-body p-lg">
                <h5 class="text-semibold mt-sm">{{ $rfq->rfq_no }}</h5>
                <a href="{{ url('buyer/vendor-requests/'.$rfq->id) }}" class="btn btn-sm btn-primary">View Vendors Requests</a>
                @if ($rfq->expire == 0)
                    
                <a href="{{ url('buyer/request/expire/'.$rfq->id) }}" class="btn btn-danger btn-sm">Mark as Expire</a>
                @else
                    <button class="btn btn-sm btn-success">Expired</button>
                @endif
            </div>
        </section>
    </div>
@endforeach

@endsection