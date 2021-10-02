@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ url('css/style.css') }}" />
<div class="hero-wrap js-fullheight">
    <div class="overlay"></div>
    <div id="particles-js"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{ asset('assets/images/logo2.png') }}" style="margin-left: 26%;
                margin-bottom: 12px;margin-top: -90px;" alt="">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"> Gender </label>
                                <div class="col-md-6">
                               <select name="gender" class="form-control">
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                               </select>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone number</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="phonenumber" required>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>
                                <div class="col-md-6">
                                  <select name="role" id="" class="form-control">
                                      <option value="seller">Seller</option>
                                      <option value="customer">Customer/Buyer</option>
                                  </select>
                                </div>
                            </div>
                    
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>

                            <hr>


							<p class="text-center">Already have an account?? <a href="{{ url('login') }}">Sign In!</a>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/particles.min.js"></script>
<script src="js/particle.js"></script>
@endsection
