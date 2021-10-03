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
                    <img src="https://via.placeholder.com/360x520" alt="image" class="img-fluid"/>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="cv-about-content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <h2>Our Expertise</h2>
                    <ul>
                        <li>Heart Surgery</li>
                        <li>Eye Surgery</li>
                        <li>Brain Hemorrhage</li>
                        <li>Respiratory problems</li>
                        <li>Internal Injury</li>
                        <li>Cancer disease</li>
                        <li>Neurologist</li>
                        <li>Heart Surgery</li>
                        <li>Eye Surgery</li>
                        <li>Brain Hemorrhage</li>
                        <li>Dental Problem</li>
                        <li>Respiratory problems</li>
                        <li>Internal Injury</li>
                        <li>Cancer disease</li>
                        <li>Neurologist</li>
                        <li>Dental Problem</li>
                    </ul>
                    <div class="cv-dr-box">
                        <div class="cv-dr-name">
                            <h3>Dr. Martin Guptil</h3>
                            <p>Heart Surgeon</p>
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