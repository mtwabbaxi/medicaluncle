@extends('seller.layouts.main')
@section('content')
<!-- start: page -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <a href="{{ url('seller/catalogs/add') }}" class="btn btn-success btn-block btn-lg">Add Catalog</button> </a> <br>
            <h1 class="newsletter-bigbaseline" style="text-decoration: underline; font-weight: bold;">You have uploaded {{ count($catalogs) }} Catalogs</h1>
    </div>
    
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
                        <a href="{{ url('seller/catalogs/delete/'.$catalog->id) }}" class="btn btn-danger btn-block"> Delete</a>
                    </div>
               
            </section>
        </div>
   @endforeach

</div>


    
@endsection