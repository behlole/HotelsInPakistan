@extends('layout.master')

@section('content')

            @include('chunks.foruser')
      <div class="theme-hero-area-body">
        <div class="theme-page-section _pt-100 theme-page-section-xl">
          <div class="container">
            <div class="row">
              <div class="col-md-offset-2 col-md-8 col-md-offset-2">
                <div class="theme-login theme-login-white">
                  <div class="theme-login-header">
                     
                    <h1 class="theme-login-title">Welcome To HotelsInPakistan</h1>
                    <p class="theme-login-subtitle">{{ __('Verify Your Email Address') }}</p>
                  </div>
                  <div class="theme-login-box">

            

                    <div class="theme-login-box-inner">

                      
                   
                  
                        <div class="form-group theme-login-form-group">

                         
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         </div>     
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                     <div class="form-group theme-login-form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                      

                   
                     
                     
                    </div>
                   
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
     
     
     @include('chunks.foruserend')
@endsection

