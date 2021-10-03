<div class="cv-login">
    <div class="modal fade" id="loginModel">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="cv-login-close close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="cv-login-box">
                        <div class="cv-login-wlcm-box">
                            <div class="cv-login-wlcm">
                                <h2>Sign Up</h2>
                                <p>If you don't have a personal account please sign up</p>
                                <a href="javascript:;" data-toggle="modal" data-target="#signUpModal" data-dismiss="modal" aria-label="Close" class="cv-btn">Sign up</a>
                            </div>
                        </div>
                        <div class="cv-login-form">
                            <h2>Sign in to your account</h2>
                            <p>Use your email for login</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input  type="email" class="@error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" placeholder="Email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <input id="password" 
                                    type="password" 
                                    class=" @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="Password"
                                    required 
                                    autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                @if (Route::has('password.request'))
                                <a class="pa-forgot-password" aria-label="Close" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                                <button type="submit" class="cv-btn">Sign in</button>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>