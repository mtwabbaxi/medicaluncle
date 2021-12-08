@extends('buyer.layouts.main')
@section('content')

 <!-- Start offer Area -->
 <section class="offer-area section-gap reviewpagetitle" id="offer">
    <div class="container">			
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif		
    @if (session('msg'))
            <span class="alert alert-danger">{{ session('msg') }}</span>
    @endif				
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="reviewpagecompanyname">
                    <img src="../img/o1.png" alt="">
                    <h4> Write a Review for <b><a href="{{ url('buyer/products/'.$product->id) }}">{{ $product->name }}</a></b><br>
                    <span></span>
                    </h4>
                </div>
            </div>
           									
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('buyer/order/review/'.$order->id.'/'.$product->id) }}" method="post">
                    @csrf
                    <div class="form-group">
                       <div class="row">
                            <label for="" style="margin-left: 15px">Rating</label> <b></b>
                       </div>
                        <div class="row">
                            <div class="rate">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Review</label>
                        <textarea name="review" id="" cols="30" class="form-control" rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Submit your review</button>
                </form>
            </div>										
        </div>
    </div>	
</section>
<!-- End offer Area -->

@endsection