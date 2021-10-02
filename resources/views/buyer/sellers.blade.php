@extends('buyer.layouts.main')
@section('content')

<div class="col-md-4 col-sm-6 col-xs-12">
    @foreach ($sellers as $seller)
    <section class="hidden-md panel panel-featured-left panel-featured-primary">
        <div class="panel-body">
            <div class="widget-summary widget-summary-xlg">
                <div class="widget-summary-col widget-summary-col-icon">
                    <div class="summary-icon">
                      <img src="{{ url('assets/images/userimg.png') }}" alt="" style="width: 100%; margin-top: -10px;"> 
                    </div>
                </div>
                <div class="widget-summary-col">
                    <div class="summary">
                        <h4 class="title"> {{ $seller->name }} </h4>
                        <div class="info">
                        </div>
                    </div>
                    <div class="summary-footer">
                        <a href="" class="text-muted text-uppercase">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
</div>

@endsection