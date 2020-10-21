@extends('useradmin.master')



@section('userdash')
  <div class="sb2-2">
   <div class="tz-2 tz-2-admin">
          <div class="tz-2-com tz-2-main">
            <h4>Update Profile</h4> 
            <div class="tz-2-main-com bot-sp-20">
                <div class="split-row">
              <div class="col-md-12">
                <div class="box-inn-sp ad-mar-to-min">
                  <div class="tab-inn ad-tab-inn">
                    <div class="tz2-form-pay tz2-form-com">
                      <div class="tz2-form-pay tz2-form-com">
                         @if (count($errors) > 0)
         <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
     </div>
 @endif
         
  
                         <form  action="{{url('my_profile_update_password')}}" method="post" id="upload" enctype="multipart/form-data">

                                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="row">
                             Complex Password,Required...minimum 6 digits,Uper Case,Lower Case and Special Character,You will be Logout After Update

                            <div class="input-field col s12">
                              <input type="password" class="validate" name="pass1" value="{{ old('pass1') }}" >
                             
                               @if ($errors->has('pass1'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('pass1') }}</strong>
            </span>
            @endif
                            </div>

                          </div>
                          <div class="row">
                            <div class="input-field col s12 m6">
                              Confirm Password
                              <input type="password" class="validate" value="{{ old('pass2') }}" name="pass2">
                            
                               @if ($errors->has('pass2'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('pass2') }}</strong>
            </span>
            @endif
                            </div>
                             
                            

                           
                          </div>

                         
                          <div class="row">
                            <div class="input-field col s12">
                              
                                <button type="submit" class="btn btn-primary btn-block">Update</button>


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
        </div>
      </div>





@endsection