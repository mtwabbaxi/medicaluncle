@extends('buyer.layouts.main')
@section('content')
<!-- start: page -->
<div class="row">
    @if (session('msg'))
        <div class="alert alert-warning" role="alert">
            <strong> {{ session('msg') }} </strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
            </button>
        </div>
    @endif
</div>

<div class="row">
   @foreach ($notifications as $notification)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <section class="panel invendor-newsletter">
                    <header class="panel-heading bg-white">
                        <div class="">
                            <a href="{{ url('buyer/notification/view/'.$notification->id) }}">
                                <img class="newsletter-rightimg"  src="{{ asset('storage/'.$notification->image) }}" />
                            </a>
                        </div>
                    </header>

                    <div class="panel-body">
                        <p class="text-center" style="font-size: 21px;font-weight: bolder; color: black;"> 
                            <a href="{{  url('buyer/notifications/view/'.$notification->id)  }}">
                                {{ $notification->title }}
                            </a> 
                        </p>
                    </div>
            </section>
        </div>
   @endforeach
</div>
@endsection