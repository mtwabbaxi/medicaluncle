@extends('layouts.app')
@section('content')

<!-- breadcrumb start -->
<div class="cv-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cv-breadcrumb-box">
                    <h1>Blog Single</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blog Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- blog start -->
<div class="cv-blog-single spacer-top spacer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cv-blog-single-box">
                    <div class="cv-blog-img">
                        <img src="{{ url('storage/'.$blog->image) }}" height="730" width="400" alt="image" class="img-fluid"/>
                    </div>
                    <div class="cv-blog-data">
                        <a href="javascript:;" class="cv-blog-date">{{ date('d/m/Y', strtotime($blog->created_at)) }}</a>
                        <a href="{{ url('blog/'.$blog->id) }}" class="cv-blog-title">{{ $blog->title }}</a>
                        <p>{{ $blog->description }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog end -->

@endsection