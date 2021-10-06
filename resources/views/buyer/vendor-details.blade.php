@extends('buyer.layouts.main')
@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="emp-profile">
            <div class="row">
                <div class="col-md-3">

                    <div class="profile-img" style="margin-bottom: 40px">
                        <img src="{{ url('assets/images/userimg.png') }}" alt="">
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <label>Name</label>
                        </div>
                        <div class="col-md-3">
                            <p> {{ $seller->name }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Address</label>
                        </div>
                        <div class="col-md-3">
                            <p> Islamabad </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Email</label>
                        </div>
                        <div class="col-md-3">
                            <p> {{ $seller->email }} </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-3">
                            <p>{{ $seller->phonenumber }}</p>
                        </div>
                    </div>

                    {{-- Deals in --}}
                    <div class="profile-work mt-4">
                        <h4>Deals In</h4>
                        @foreach ($categories->unique('category_id') as $category)
                            <li> {{ App\Category::find($category->category_id)->name }} </li>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="container mt-4">
                        <h2> All Products </h2> 
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 col-lg-3 col-sm-6">
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top product-listimg" src="{{ url('storage/'.$product->image) }}"/>
                                        <div class="card-body">
                                            <h5 class="card-title prolistcardtext"> {{ $product->name }} </h5>
                                            <p class="card-text prolistcarddesc"> {{ $product->excerpt }} </p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ url('buyer/products/'.$product->id) }}" class=" btn btn-primary text-uppercase">View Detail</a>
                                        </div>
                                    </div>
                                </div> 
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
					
@endsection