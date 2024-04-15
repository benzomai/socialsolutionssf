@extends('layouts.app')

@section('content')
<section class="section login-section">
    <div class="row m-0 p-0 d-flex flex-lg-row flex-sm-column-reverse flex-column-reverse justify-content-center">
        <div class="col-lg-6 col-md-12  mt-lg-0 mt-sm-4">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-11 col-lg-8">
                    <div class="card p-4">
                        <h4>Login to SocialSolutions</h4>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                
                                <div class="form-group">
                                    <label for="email" class="col-12 col-form-label">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group mt-4">
                                    <label for="password" class="col-md-12">{{ __('Password') }}</label>
        
                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group mt-3">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            @if (Route::has('password.request'))
                                            <small><a class="btn btn-link text-right" style="font-size: 14px;" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a></small>
                                        @endif
                                        </div>
                                    </div>
                                    
                                </div>
        
                                <div class="form-group  mt-3">

                                        <button type="submit" class="btn btn-yellow col-12">
                                            {{ __('Login') }}
                                        </button>
    
                                     
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 login-right">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <a class="login-logo text-center" href="{{ route('login') }}"><img src="../assets/img/socsol-logo-white.png" /></a>
                    <h3 class="mt-3 text-light text-center">The Social Media Subscription That Powers Your Business</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
        </div>
    </div>
</div>
@endsection
