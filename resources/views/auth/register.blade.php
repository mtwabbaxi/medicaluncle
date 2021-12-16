@extends('layouts.app')

@section('content')

    <div class="container  mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
            
                <div class="card">
                    <div class="card-header" style="background: #3cbcff; color:white;">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                {{-- <label for="role" class="col-md-2 col-form-label text-md-right">Role</label> --}}
                                <div class="col-md-12">
                                  <select name="role" id="" >
                                      <option value="seller">Seller</option>
                                      <option value="customer" selected>Customer/Buyer</option>
                                  </select>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                    
                                <div class="col-md-12">
                                    <input id="name" type="text"  @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                    placeholder="Enter name"
                                    required autocomplete="name" autofocus>
                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}
                    
                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Enter email address"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}
                    
                                <div class="col-md-12">
                                    <input id="password" placeholder="Enter Password" type="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
                    
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" placeholder="Enter confirm password"  name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                {{-- <label for="" class="col-md-4 col-form-label text-md-right"> Gender </label> --}}
                                <div class="col-md-12">
                               <select name="gender" >
                                   <option value="male">Male</option>
                                   <option value="female">Female</option>
                               </select>
                            </div>
                            </div>
                            
                            <div class="form-group row">
                                {{-- <label for="phonenumber" class="col-md-4 col-form-label text-md-right">Phone number</label> --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="text" disabled  value="+92" required>
                                        </div>
                                        <div class="col-md-10 ">
                                                <input type="number" maxlength="10" minlength="10" placeholder="Enter phonenumber"  name="phonenumber" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            
                    
                        
                            <div class="form-group row mb-0">
                                <div class="col-md-12">
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
<script src="js/particles.min.js"></script>
<script src="js/particle.js"></script>
@endsection
