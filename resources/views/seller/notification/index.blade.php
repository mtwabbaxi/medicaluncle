@extends('seller.layouts.main')
@section('content')
<!-- start: page -->
<div class="row">
    <div class="col-md-12 col-lg-12 col-xl-12">
        <a href="{{ url('seller/notifications/add') }}" class="btn btn-success btn-block btn-lg">Add Notifcation</button> </a> <br>
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
  
   @foreach ($notifications as $notification)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <section class="panel invendor-newsletter">
               
                    <header class="panel-heading bg-white">
                        <div class="">
                       <a href="{{ url('seller/notification/view/'.$notification->id) }}">
                        <img class="newsletter-rightimg"  src="{{ asset('storage/'.$notification->image) }}" />
                       </a>
                        </div>
                    </header>

                    <div class="panel-body">
                        <p class="text-center" style="font-size: 21px;
                        font-weight: bolder;
                        color: black;"> <a href="{{  url('seller/notifications/view/'.$notification->id)  }}">{{ $notification->title }}</a> </p>
               
                       
                        <a href="{{ url('seller/notification/delete/'.$notification->id) }}" 
                            class="btn btn-danger btn-block"
                            onclick="return confirm('Are you sure you want to continue?');"
                            
                            > Delete</a>
                    </div>
            </section>
        </div>
   @endforeach

</div>


    
@endsection