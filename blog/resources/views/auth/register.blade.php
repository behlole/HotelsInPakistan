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
                    <h1 class="theme-login-title">Sign Up</h1>
                    <p class="theme-login-subtitle">Register With us</p>
                  </div>
                  <div class="theme-login-box">
                    <div class="theme-login-box-inner">

                      
                   
                            <form class="theme-login-form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                        <div class="form-group theme-login-form-group">
                               <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <div class="form-group theme-login-form-group">
                               

                                <input id="phone" type="text" class="form-control" name="phone" placeholder="Contact No." value="{{ old('phone') }}" required >
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <div class="form-group theme-login-form-group">
                             

                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                           <div class="form-group theme-login-form-group">
                            

                                <input id="password" type="password" class="form-control" placeholder="password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                         
                        <div class="form-group theme-login-form-group">
                          

                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                         
                        </div>
                        
                        
                         <button class="btn btn-uc btn-dark btn-block btn-lg" type="submit" >Signup</button>

                      </form>
                      
                     
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
