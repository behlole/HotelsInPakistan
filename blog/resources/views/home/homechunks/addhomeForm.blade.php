<form  action="/add_home_listing" method="post" id="upload">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br><br>
  <div class="theme-payment-page-sections-item">
   <h3 class="theme-payment-page-sections-item-title">Enter Home Basic Information</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20" id="errorTxt">
      <div class="row fmx" >
      <div class="col-md-6 ">
        <div class="form-group">
          <label class="form-label">Home Name</label>
          <input id="password" type="text" class="form-control" name="hotel_name" placeholder="Home Name" value="{{old('hotel_name')}}" data-error="#home_name_error">
          <span class="errors_txs" style="color: red;" id="home_name_error"></span>
          @if ($errors->has('hotel_name'))
          <span  style="color:red;">
            <strong>{{ $errors->first('hotel_name') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-6 ">
       <div class="form-group">
        <label for="sel1">Home Price Per Night</label>
        <input id="password" type="number" class="form-control" name="home_price" placeholder="Home Price Per Night"  data-error="#home_price"  value="{{old('home_price')}}">
          <span class="errors_txs" style="color: red;" id="home_price"></span>
        @if ($errors->has('home_price'))
        <span  style="font-size:12px;color:red;">
          <strong>{{ $errors->first('home_price') }}</strong>
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
          <?php
          if(old('city')){
            ?>
            <option value="{{old('city')}}">{{App\city_name::city_name_find(old('city'))}}</option>
            <?php
          }
          ?>
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
        <label for="sel1">Home Type</label>
        <select class="form-control" name="yourRole" required data-error="#home_type">
          <?php $myArray = array("Cottage", "Resort","Apartment", "Lodges","Villas","Private Homes" , "Other"); ?>  
          <?php if(old('yourRole')){ ?>
            <option value="{{ old('yourRole') }}">{{ old('yourRole') }}</option>

          <?php } ?>
          @foreach($myArray as $d)
          <?php if(old('yourRole')!=$d){ ?>
            <option value="{{$d}}">{{$d}}</option>
          <?php } ?>
          @endforeach
        </select>
        <span class="errors_txs" style="color: red;" id="home_type"></span>
        @if ($errors->has('yourRole'))
        <span  style="font-size:12px;color:red;">
          <strong>{{ $errors->first('yourRole') }}</strong>
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
     <input id="password" type="text" class="form-control" data-error="#contact_number"  name="contact" placeholder="Please Enter Contact Number" value="{{old('contact')}}">
     <span class="errors_txs" style="color: red;" id="contact_number"></span>
     @if ($errors->has('contact'))
     <span  style="font-size:12px;color:red;">
      <strong>{{ $errors->first('contact') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6 ">
  <div class="form-group">
   <label for="sel1">Secondary Contact (Optional )</label>
   <input id="password" type="text" data-error="#contact_number_secondary" class="form-control" name="altcontact" placeholder="Secondary Contact if Any" value="{{old('altcontact')}}">

<span class="errors_txs" style="color: red;" id="contact_number_secondary"></span>
   @if ($errors->has('altcontact'))
   <span  style="color:red;">
    <strong>{{ $errors->first('altcontact') }}</strong>
  </span>
  @endif
</div>

</div>
</div>
<div class="row fmx" >
<div class="col-md-6">
  <div class="form-group">
   <label for="sel1">Landline (Optional)</label>
   <input id="password" type="text"   class="form-control" data-error="#landline_number" name="landline" placeholder="Please Enter Landline Number" value="{{old('landline')}}">
 <span class="errors_txs" style="color: red;" id="landline_number"></span>
   @if ($errors->has('landline'))
   <span  style="color:red;">
    <strong>{{ $errors->first('landline') }}</strong>
  </span>
  @endif
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
   <label for="sel1">Home Email</label>
   <input id="password" data-error="#home_email" type="email"  class="form-control" name="email" placeholder="Please Enter Home Email" value="{{old('email')}}">
    <span class="errors_txs" style="color: red;" id="home_email"></span>
   @if ($errors->has('email'))
   <span  style="color:red;">
    <strong>{{ $errors->first('email') }}</strong>
  </span>
  @endif
</div>

</div>
</div>
<div class="row fmx" >
<div class="col-md-6">
  <div class="form-group">
   <label for="sel1">Website (Optional)</label>
   <input id="password" type="text" class="form-control" data-error="#website" name="website" placeholder="Please Enter Website URL" value="{{old('website')}}">
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
   <label for="sel1">Facebook Page (Optional)</label>
   <input id="password" type="text" class="form-control" data-error="#fb" name="facebookPage" placeholder="Please Enter Facebook Page Link" value="{{old('facebookPage')}}">
   <span class="errors_txs" style="color: red;" id="fb"></span>
   @if ($errors->has('facebookPage'))
   <span  style="color:red;">
    <strong>{{ $errors->first('facebookPage') }}</strong>
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

     <textarea placeholder="Please Enter Your Address" data-error="#address" rows="3" class="form-control" name="address" style="width:100%">
      {{old('address')}}
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
    <input type="text" class="form-control" id="location_name" readonly="" placeholder="">
  </div>

</div>
<div class="row" style="display:none;">
  <label for="location_name">Latitude</label>
  <input type="text" id="lat" name="lat"   class="form-control" readonly="" >

  <label for="location_name">Longituide</label>
  <input type="text" id="long" name="long"  class="form-control"  readonly="">


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
      <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Save Data And Move To Next Step</button>
    </div>
  </div>
</form>
