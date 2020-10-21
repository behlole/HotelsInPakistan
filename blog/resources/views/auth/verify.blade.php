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

                          <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Welcome To HotelsInPakistan ,Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.

                </div>


                         </div>     

                   
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

