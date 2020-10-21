@extends('layout.master')

@section('content')

             @include('chunks.foruser')
      <div class="theme-hero-area-body">
        <div class="theme-page-section _pt-100 theme-page-section-xl">
          <div class="container">
            <div class="row">

              <div class="col-md-4 col-md-offset-4">
                <div class="theme-login theme-login-white">
                  <div class="theme-login-header">
                    <h1 class="theme-login-title">Sign In</h1>
                    <p class="theme-login-subtitle">Login into your account</p>
                  </div>
                  <div class="theme-login-box">
                    <div class="theme-login-box-inner">

                      
                         <form class="theme-login-form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <div class="form-group theme-login-form-group">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group theme-login-form-group">
                            <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                           <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                        </div>
                        <div class="form-group">
                          <div class="theme-login-checkbox">
                            <label class="icheck-label">
                             <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                            </label>
                          </div>
                        </div>
                          @if(Session::has('alert'))
<div class="alert alert-danger">
    {{ Session::get('alert') }}
    @php
    Session::forget('alert');
    @endphp
</div>
@endif`
                        
                         <button class="btn btn-uc btn-dark btn-block btn-lg" type="submit" >Login</button>

                      </form>
                      
                     
                    </div>
                    <div class="theme-login-box-alt">
                      <p>Don't have an account? &nbsp;
                        <a href="/register">Sign up.</a>
                      </p>
                    </div>
                  </div>
                  <p class="theme-login-terms">By logging in you accept our
                    <a href="#">terms of use</a>
                    <br/>and
                    <a href="#">privacy policy</a>.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('chunks.foruserend')
@endsection
