@foreach($res_data as $d)
<form  action="{{ URL('update_restaurant',$restaurant_id) }}" method="post" id="upload">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br><br>
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <div class="theme-payment-page-sections-item">
   <h3 class="theme-payment-page-sections-item-title">Enter Restaurants Basic Information</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20" id="errorTxt">
      <div class="row fmx" >
        <div class="col-md-12 ">
         <div class="form-group">
           <label for="sel1">Restaurant Name</label>
           <input id="password" type="text" data-error="#res_name" class="form-control" name="restaurant_name" placeholder="Restaurant Name" value="<?php 
           if($d->restaurant_name&&!old('restaurant_name')){
            echo($d->restaurant_name);
          }
          else{
            echo old('restaurant_name');
          }
          ?>"">
          <span class="errors_txs" style="color: red;" id="res_name"></span>
          @if ($errors->has('restaurant_name'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('restaurant_name') }}</strong>
          </span>
          @endif
        </div>
      </div>
      
    </div>
    <div class="row fmx" >
      <div class="col-md-6">
        <div class="form-group">
          <label for="sel1">City NAME</label>
          <select class="itemName form-control" required=""  name="city"  data-error="#city_error">
            @if($d->city&&!old('city')) 
            <option value="{{$d->city_id}}"><?php echo App\city_name::city_name_find($d->city_id); ?></option>
            @else
            <option value="{{old('city')}}">{{App\city_name::city_name_find(old('city'))}}</option>@endif
          </select>
          <span class="errors_txs" style="color: red;" id="city_error"></span>
          @if ($errors->has('city'))
          <span  style="font-size:12px;color:red;">
            <strong>{{ $errors->first('city') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="sel1">Restaurant Type</label>
          <select class="form-control js-example-tags" id="sel1" name="restaurant_type[]" multiple="multiple">

            <?php
            $checked=0;
            ?>  
            @foreach($restypes_name as $type)
            <?php $checked=0; ?>
            @foreach($res_types as $selectedByUser)
            <?php if($selectedByUser->restaurant_type_id==$type->id){ 
              $checked=1;
              ?>
            <?php } ?>
            @endforeach
            <?php 
            if($checked==1){ ?>
              <option selected value="{{$type->id}}">{{$type->restaurant_type_names}}</option>
            <?php }else{ ?>
              <option  value="{{$type->id}}">{{$type->restaurant_type_names}}</option>
            <?php } ?>
            @endforeach
          </select>
          <span class="errors_txs" style="color: red;" id="restaurant_type"></span>
          <span class="select-arrow"></span>
          @if ($errors->has('restaurant_type'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('restaurant_type') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="theme-payment-page-sections-item">
 <h3 class="theme-payment-page-sections-item-title">Enter Contact Information</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="row fmx" >
     <div class="col-md-6">
      <div class="form-group">
        <label for="sel1">Primary Contact Number</label>
        <input id="password" type="text" class="form-control" name="contact"  data-error="#contact_number"  placeholder="Contact" value="<?php 
        if($d->contact&&!old('contact')){

          echo($d->contact);

        }
        else{
          echo old('contact');
        }

        ?>"">
        <span class="errors_txs" style="color: red;" id="contact_number"></span>
        @if ($errors->has('contact'))
        <span class="help-block" style="color:red;">
          <strong>{{ $errors->first('contact') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
       <label for="sel1">Secondary Contact (Optional )</label>
       <input id="password" type="text" class="form-control" data-error="#contact_number_secondary" name="alt_contact" placeholder="Alternate Contact" value="<?php 
       if($d->alt_contact&&!old('alt_contact')){

        echo($d->alt_contact);

      }
      else{
        echo old('alt_contact');
      }

      ?>"">
      <span class="errors_txs" style="color: red;" id="contact_number_secondary"></span>
      @if ($errors->has('alt_contact'))
      <span class="help-block" style="color:red;">
        <strong>{{ $errors->first('alt_contact') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
<div class="row fmx" >
  <div class="col-md-6">
   <div class="form-group">
     <label for="sel1">Landline (Optional)</label>
     <input id="password" type="text" class="form-control" name="landline" placeholder="Landline" value="<?php 
     if($d->landline&&!old('landline')){

      echo($d->landline);

    }
    else{
      echo old('landline');
    }

    ?>"">
    <span class="errors_txs" style="color: red;" id="landline_number"></span>
    @if ($errors->has('landline'))
    <span class="help-block" style="color:red;">
      <strong>{{ $errors->first('landline') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="sel1">Restaurant Email</label>
    <input id="password" type="text" class="form-control" name="restaurant_email" placeholder="Email" value="<?php 
    if($d->restaurant_email&&!old('restaurant_email')){

      echo($d->restaurant_email);

    }
    else{
      echo old('restaurant_email');
    }

    ?>"">
    <span class="errors_txs" style="color: red;" id="restaurant_email"></span>
    @if ($errors->has('restaurant_email'))
    <span class="help-block" style="color:red;">
      <strong>{{ $errors->first('restaurant_email') }}</strong>
    </span>
    @endif
  </div>

</div>
</div>
<div class="row fmx" >
  <div class="col-md-6">
    <div class="form-group">
     <label for="sel1">Website (Optional)</label>
     <input id="password" type="text" class="form-control" data-error="#website" name="restaurant_website" placeholder="Please Enter Website URL" value="<?php 
     if($d->restaurant_website&&!old('restaurant_website')){

      echo($d->restaurant_website);

    }
    else{
      echo old('restaurant_website');
    }

    ?>"">
    <span class="errors_txs" style="color: red;" id="website"></span>
    @if ($errors->has('website'))
    <span  style="color:red;">
      <strong>{{ $errors->first('website') }}</strong>
    </span>
    @endif
  </div>
</div> 
<div class="col-md-6">
 <div class="form-group">
   <label class="form-label">Facebook Page (Optional)</label>
   <input id="password" type="text" class="form-control" data-error="#fb" name="fb_page" placeholder="Facebook Page" value="<?php 
   if($d->fb_page&&!old('fb_page')){

    echo($d->fb_page);

  }
  else{
    echo old('fb_page');
  }

  ?>"">
  <span class="errors_txs" style="color: red;" id="fb"></span>
  @if ($errors->has('fb_page'))
  <span class="help-block" style="color:red;">
    <strong>{{ $errors->first('fb_page') }}</strong>
  </span>
  @endif
</div>
</div>
</div>
</div>
</div>
</div>

<div class="theme-payment-page-sections-item">
 <h3 class="theme-payment-page-sections-item-title">Enter Addres Information</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
   <div class="col-md-12">
    <div class="form-group">
     <label for="sel1">Address (Optional)</label>

     <textarea placeholder="Please Enter Your Address" data-error="#address" rows="3" class="form-control" name="addr_1" style="width:100%">
      <?php 
      if($d->addr_1&&!old('addr_1')){

        echo($d->addr_1);

      }
      else{
        echo old('addr_1');
      }

      ?>
    </textarea>
    <span class="errors_txs" style="color: red;" id="address"></span>
    @if ($errors->has('address'))
    <span  style="color:red;">
      <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-12 ">
  <div class="form-group">
    <label for="location_name">Location</label>
    <input type="text" name="google_map_address" class="form-control" id="location_name" readonly="" placeholder="">
  </div>

</div>
<div class="row" style="display:none;">
  <label for="location_name">Latitude</label>
  <input type="text" id="lat" name="lat"   class="form-control" readonly="" value="<?php 
  if($d->lat&&!old('lat')){

    echo($d->lat);

  }
  else{
    echo old('lat');
  }

  ?>"" >

  <label for="location_name">Longituide</label>
  <input type="text" id="long" name="long"  class="form-control"  readonly="" value="<?php 
  if($d->long&&!old('long')){

    echo($d->long);

  }
  else{
    echo old('long');
  }

  ?>"">


</div>
<div class="col-md-12">
  <label  for="pac-input" style="text-align: center;">Search Your Places Here On Google Map</label>
  <input id="pac-input" class="form-control" type="text" placeholder="Search for places">
  <div  id="MyMapLOC" class="theme-item-page-map google-map" >  
  </div>
  
</div>
</div>
</div>
</div>
<div id="errors"></div>
<div class="theme-payment-page-sections-item">
  <div class="theme-payment-page-booking">
    <div class="theme-payment-page-booking-header">
      <p class="theme-payment-page-booking-subtitle">By clicking Save now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p></div>
      <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success">Save Data And Move To Next Step</button>
    </div>
  </div>
</form>
@endforeach