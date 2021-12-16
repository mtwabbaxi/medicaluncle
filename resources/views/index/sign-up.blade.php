<div class="cv-login">
    <div class="modal fade" id="signUpModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="cv-login-close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="cv-login-box">
                        <div class="cv-login-wlcm-box">
                            <div class="cv-login-wlcm">
                                <h2>Sign In</h2>
                                <p>If you have a personal account, please sign in</p>
                                <a href="javascript:;" data-toggle="modal" data-target="#loginModel" data-dismiss="modal" aria-label="Close" class="cv-btn">Sign in</a>
                            </div>
                        </div>
                        <div class="cv-login-form">
                            <h2>Create Account</h2>
                            <p>Use your email for registration</p>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <select name="role" required id="" >
                                    <option value="seller">Seller</option>
                                    <option value="customer" selected>Customer/Buyer</option>
                                </select>

                                <input id="name" type="text" placeholder="Full Name" 
                                class="@error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="email" 
                                type="email" 
                                class="@error('email') is-invalid @enderror" placeholder="Email"
                                name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                                <input id="password" placeholder="Password"
                                type="password" 
                                class="@error('password') is-invalid @enderror" 
                                name="password" required autocomplete="new-password">
                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                                  
                                <input 
                                id="password-confirm" 
                                placeholder="Confirm Password"
                                type="password"  
                                name="password_confirmation" required autocomplete="new-password">

                                <select name="gender" required>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>


                               <div class="row">
                                <div class="col-md-3" >
                                    <input type="text" disabled  value="+92" required>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" placeholder="Phone number" maxlength="10" name="phonenumber" required>
                                </div>
                               </div>

                                
                                    
                                <button type="submit" class="cv-btn">Sign up</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>