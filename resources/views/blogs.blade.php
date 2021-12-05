@extends('layouts.app')
@section('content')

 <!-- breadcrumb start -->
 <div class="cv-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cv-breadcrumb-box">
                    <h1>Blogs</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- blog start -->
<div class="cv-blog-page spacer-top spacer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="cv-blog-page-box">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="cv-blog-box">
                                <div class="cv-blog-img">
                                    <img src="https://via.placeholder.com/350x250" alt="image" class="img-fluid"/>
                                </div>
                                <div class="cv-blog-data">
                                    <a href="javascript:;" class="cv-blog-date">25 May 2020</a>
                                    <a href="{{ url('blog/1') }}" class="cv-blog-title">Quis nostrud exercitation ullamco</a>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="cv-blog-sidebar">
                    <div class="cv-widget cv-search">
                        <h2 class="cv-sidebar-title">Search</h2>
                        <form>
                            <input type="text" placeholder="Search Here"/>
                            <button class="cv-btn">search</button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog end -->

@endsection