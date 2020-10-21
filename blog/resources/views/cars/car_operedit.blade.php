@extends('layout.master2')

@section('content')
<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url(./img/carss.jpg);"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
           <h1 class="theme-page-header-title">Welcome To Hotels In Pakistan</h1>
        <p class="theme-page-header-subtitle">You Can List Your Hotel Here and Get Unlimited Benefits</p>
      </div>
    </div>
  </div>
</div> 
 @foreach($cars_opr as $d)
<div class="theme-page-section theme-page-section-lg" >
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-12 " style="border: 2px solid #509aff;padding: 120px;">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <h3 class="theme-payment-page-sections-item-title" style="text-align: center;">Enter CAR RENTAL OPERATOR Details</h3>

            <form  action="{{ URL('update_car_agancy_data')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" name="caropr_id" value="{{$d->caropr_id}}">

              <div class="tab-pane active">

                <div class="row">
                  <div class="col-md-12">
                    <div class="theme-payment-page-form-item form-group">
                      <div class="form-group">
                        <label for="sel1">Car rental operator name:</label>
                        <input  type="text" class="form-control" name="caropr_name" placeholder="Car rental operator name" value="<?php 
                  if($d->caropr_name&&!old('caropr_name')){

                      echo($d->caropr_name);

                      }
                      else{
                        echo old('caropr_name');
                      }

                  ?>" ">
                         @if ($errors->has('caropr_name'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('caropr_name') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                  </div>
                  <div class="row">
                   <div class="col-md-12">
                    <div class="theme-payment-page-form-item form-group">
                      <div class="form-group">
                        <label for="sel1">City Name:</label>
                        <select class="itemName form-control"  name="city" >

                         <?php 

                  if($d->city_id&&!old('city')){

                            ?>
                               <option value="{{$d->city_id}}">{{App\city_name::city_name_find($d->city_id)}}</option>

                               <?php
                    

                      }
                      else{
                       ?>
                         <option value="{{old('city')}}">{{App\city_name::city_name_find(old('city'))}}</option>

                               <?php
                      }

                  ?> />
                  </select>

                         @if ($errors->has('city'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">

                <div class="col-md-6">
                  <div class="theme-payment-page-form-item form-group">
                    <div class="form-group">
                     <label for="sel1">Contact Number:</label>
                     <input  type="text" class="form-control" name="contact" placeholder="Contact Number Mobile OR Landline" value="<?php 
                  if($d->contact&&!old('contact')){

                      echo($d->contact);

                      }
                      else{
                        echo old('contact');
                      }

                  ?>" ">
                    @if ($errors->has('contact'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                   </div>
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="theme-payment-page-form-item form-group">
                  <div class="form-group">
                   <label for="sel1">Alternate Contact:</label>
                   <input  type="text" class="form-control" name="altcontact" placeholder="Contact Number Mobile OR Landline" value="<?php 
                  if($d->altcontact&&!old('altcontact')){

                      echo($d->altcontact);

                      }
                      else{
                        echo old('altcontact');
                      }

                  ?>"">
                   <label style="    font-size: 12px;
                   font-style: oblique;
                   color: grey;">***Optional Value</label>
                  @if ($errors->has('altcontact'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('altcontact') }}</strong>
                                    </span>
                                @endif
                 </div>
               </div>

             </div>
           </div>

           <div class="row">
            <div class="col-md-6">


              <div class="theme-payment-page-form-item form-group">
                <div class="form-group">
                 <label for="sel1">Email:</label>
                 <input  type="email" class="form-control" name="email" placeholder="Email" value="<?php 
                  if($d->email&&!old('email')){

                      echo($d->email);

                      }
                      else{
                        echo old('email');
                      }

                  ?>"">
                    @if ($errors->has('email'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
               </div>
             </div>
           </div>
           <div class="col-md-6">
            <div class="theme-payment-page-form-item form-group">
              <div class="form-group">
               <label for="sel1">Website:</label>
               <input  type="text" class="form-control" name="website" placeholder="Website" value="<?php 
                  if($d->website&&!old('website')){

                      echo($d->website);

                      }
                      else{
                        echo old('website');
                      }

                  ?>"">
               <label style="    font-size: 12px;
               font-style: oblique;
               color: grey;">***Optional Value</label>
                @if ($errors->has('website'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
             </div>
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-6">
          <div class="theme-payment-page-form-item form-group">
            <div class="form-group">
             <label for="sel1">Facebook page if any:</label>
             <input  type="text" class="form-control" name="facebookPage" placeholder="Alternate Contact" value="<?php 
                  if($d->facebookPage&&!old('facebookPage')){

                      echo($d->facebookPage);

                      }
                      else{
                        echo old('facebookPage');
                      }

                  ?>"">
             <label style="    font-size: 12px;
             font-style: oblique;
             color: grey;">***Optional Value</label>
              @if ($errors->has('facebookPage'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('facebookPage') }}</strong>
                                    </span>
                                @endif
           </div>
         </div>
       </div>
       <div class="col-md-6">
        <div class="theme-payment-page-form-item form-group">
          <div class="form-group">
           <label for="sel1">Street:</label>
           <input  type="text" class="form-control" name="street" placeholder="Street" value="<?php 
                  if($d->street&&!old('street')){

                      echo($d->street);

                      }
                      else{
                        echo old('street');
                      }

                  ?>"">
           <label style="    font-size: 12px;
           font-style: oblique;
           color: grey;">***Optional Value</label>
          @if ($errors->has('street'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
         </div>
       </div>
     </div>
   </div>
   <div class="row">
    <div class="col-md-12">
      <div class="theme-payment-page-form-item form-group">
        <div class="form-group">
         <label for="sel1">Address:</label>
         <input  type="text" class="form-control" name="address" placeholder="Address" value="<?php 
                  if($d->address&&!old('address')){

                      echo($d->address);

                      }
                      else{
                        echo old('address');
                      }

                  ?>"">
       
        @if ($errors->has('address'))
                                    <span class="help-block" style="color:red;">
                                        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
       </div>
     </div>

   </div>

 </div>
  <div class="row">

   <div class="col-md-12">
    <div class="theme-payment-page-form-item form-group">

     <label for="sel1">Tell Us More About You :</label>
    <textarea class="form-control" rows="5" id="comment" name="details"><?php 
                  if($d->details&&!old('details')){

                      echo($d->details);

                      }
                      else{
                        echo old('details');
                      }

                  ?></textarea>
     @if ($errors->has('details'))
     <span class="help-block" style="color:red;">
      <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('details') }}</strong>
    </span>
    @endif

  </div>
</div>


</div>
 
<br>
<div class="col-md-12">
  <button type="submit" style="width: 100%;height: 5%;" id="save" name="submit" class="theme-search-area-submit _mt-0 _tt-uc theme-search-area-submit-curved">Save CAR RENTAL AGENCY Data</button>
 
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

@endforeach



@endsection