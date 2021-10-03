@extends('layouts.app')
@section('content')

<div class="cv-ellipsis">
    <div class="cv-preloader">
        <div></div>
    </div>
</div> 

    @include('banner')
    @include('offer')
	@include('counter')
    @include('product-gallery')
    @include('offer-2')
    @include('kit')
    @include('blog-section')
    @include('login')
	@include('sign-up')

@endsection