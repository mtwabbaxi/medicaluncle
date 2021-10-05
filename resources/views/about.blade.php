@extends('layouts.app')
@section('content')

  <!-- breadcrumb start -->
  <div class="cv-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cv-breadcrumb-box">
                    <h1>About Us</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb end -->
<!-- about start -->
<div class="cv-about" style="margin-bottom:50px">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="cv-about-img spacer-top">
                    <img src="{{ url('nassets/images/banner.jpg') }}" alt="image" class="img-fluid"/>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="cv-about-content" style="margin-top: 50px;">
                   
                    <p>
                        The purpose of medicaluncle is to make the purchase of medical Equipments for local businesses and hospitals more accessible, 
                        currently most businesses and hospitals buy their medical Equipments from out of the country either using Alibaba or 
                        their contacts, which take a lot of time and they usually get their Equipments in months which is not ideal. 
                    </p>
                    <p>
                        With our system in place local sellers can provide them the same Equipment within days and they can also provide them services in 
                        setting up those Equipments, with our system the whole process of buying medical equipment will be much more accessible for all, 
                        and that is why we want to make this project.
                    </p>
                    <h2>Our Expertise</h2>
                    <ul>
                        <?php $categories = App\Category::all(); ?>
                        @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                        @endforeach
                    </ul>
                    <div class="cv-dr-box">
                        <div class="cv-dr-name">
                            <h3>Mr. Tanveer Ahmed</h3>
                            <p>Our Supervisor</p>
                        </div>
                        <div class="cv-dr-signature">
                            <img src="nassets/images/signature.png" alt="image" class="img-fluid"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection