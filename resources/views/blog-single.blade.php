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
                        <img src="https://via.placeholder.com/730x400" alt="image" class="img-fluid"/>
                    </div>
                    <div class="cv-blog-data">
                        <a href="javascript:;" class="cv-blog-date">25 May 2020</a>
                        <h2 class="cv-blog-title">Quis nostrud exercitation ullamco</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>  
                    </div>
                    <div class="cv-blog-flex">
                        <div class="cv-blog-simg">
                            <img src="https://via.placeholder.com/350x250" alt="image" class="img-fluid"/>
                        </div>
                        <div class="cv-blog-simg">
                            <img src="https://via.placeholder.com/350x250" alt="image" class="img-fluid"/>
                        </div>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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