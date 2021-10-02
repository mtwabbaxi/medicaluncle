@extends('buyer.layouts.main')
@section('content')   
<div class="row">
  
   @foreach ($catalogs as $catalog)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <section class="panel invendor-newsletter">
                <a href="{{ asset('storage/catalogs/'.$catalog->pdf) }}" download>
                    <header class="panel-heading bg-white">
                        <div class="">
                        <img class="newsletter-rightimg"  src="{{ asset('storage/'.$catalog->image) }}" />
                        </div>
                    </header>

                    <div class="panel-body">
                        <p class="text-center" style="font-size: 21px;
                        font-weight: bolder;
                        color: black;"> {{ $catalog->name }} </p>
                </a>
                        <p style="font-size: 12px;padding: 20px;"> {{ $catalog->excerpt }} </p>
                    </div>
               
            </section>
        </div>
   @endforeach

</div>
@endsection