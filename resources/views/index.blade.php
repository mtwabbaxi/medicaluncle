@extends('layouts.app')
@section('content')

<div class="cv-ellipsis">
    <div class="cv-preloader">
        <div></div>
    </div>
</div> 

    @include('index.banner')
    @include('index.product-gallery')
    @include('index.kit')
    @include('index.offer')
    @include('index.offer-2')
	{{-- @include('index.counter') --}}
    {{-- @include('index.blog-section') --}}
    @include('index.login')
	@include('index.sign-up')

@endsection