@extends('buyer.layouts.main')
@section('content')
<!-- start: page -->

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <section class="panel invendor-newsletter">
                    <header class="panel-heading bg-white">
                        <div class="">
                            <img class="newsletter-rightimg"  src="{{ asset('storage/'.$notification->image) }}" />
                        </div>
                    </header>

                    <div class="panel-body">
                        <p class="text-center" style="font-size: 21px;
                        font-weight: bolder;
                        color: black;"> {{ $notification->title }} </p>
                
                       <p>{{ $notification->description }}</p>
                        
                    </div>
            </section>
        </div>
</div>

@endsection