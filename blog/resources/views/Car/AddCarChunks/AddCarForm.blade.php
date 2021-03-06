
<form  action="{{ URL('new_car_listing_db',$car_operator_id) }}" method="post" id="upload"  enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <br><br>

  @foreach ($errors->all() as $error)
  <div>{{ $error }}</div>
  @endforeach

  <div class="theme-payment-page-sections-item">
   <h3 class="theme-payment-page-sections-item-title">Enter Car Basic Information</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20" id="errorTxt">

      <div class="row fmx" >
       <div class="col-md-6 ">
        <div class="form-group">
          <label for="sel1">Car Title</label>
          <input  type="text" class="form-control" name="car_title" placeholder="Enter Car Title" value="{{ old('car_title') }}">
          <span class="errors_txs" style="color: red;" id="car_title"></span>
          @if ($errors->has('car_title'))
          <span class="help-block" style="color:red;">
            <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('car_title') }}</strong>
          </span>
          @endif
        </div>
        
      </div>
      <div class="col-md-6">
       <div class="form-group">
         <label for="sel1">Vehicle Type</label>
         <select class="form-control"  name="vehicle_type" required>
          <option value="">Please Select Vehicle Type</option>
          <?php if(old('vehicle_type'))
           { ?>
            <option value={{old('vehicle_type')}} >
            {{App\Models\Car\vehicle_type::vehicle_name(old('vehicle_type'))}}</option>

          <?php } ?>


          @foreach($vehicle_type as $d)
          <?php if(old('vehicle_type')!=$d->id){ ?>
            <option value="{{$d->id}}">{{$d->vehicle_type}}</option>
          <?php } ?>

          @endforeach
        </select>
        <span class="errors_txs" style="color: red;" id="vehicle_type"></span>
        @if ($errors->has('vehicle_type'))
        <span class="help-block" style="color:red;">
          <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('vehicle_type') }}</strong>
        </span>
        @endif
      </div>
    </div>
  </div>
  <div class="row fmx">
    <div class="col-md-6">
      <div class="form-group">
       <label for="sel1">Please Select Vehicle Brands</label>

       <select class="form-control"  name="brand" required>
        <option value="">Please Select Vehicle Brands</option>
        <?php if(old('brand')){ ?>
          <option value="{{ old('brand') }}">{{App\Models\Car\brand::brand_name(old('brand'))}}</option>
        <?php } ?>
        @foreach($brand as $d)
        <?php if(old('brand')!=$d->id){ ?>
          <option value="{{$d->id}}">{{$d->brand_type}}</option>
        <?php } ?>
        @endforeach
      </select>
      <span class="errors_txs" style="color: red;" id="brand"></span>
      @if ($errors->has('brand'))
      <span class="help-block" style="color:red;">
        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('brand') }}</strong>
      </span>
      @endif
    </div>
  </div>
  
  <div class="col-md-6">
    <div class="form-group">
     <label for="sel1">MODEL</label>
     <input type="number" class="form-control" min="1900" max="2099" step="1" placeholder="Please Enter Model Year i.e 2019" name="model" value="{{old('model')}}" />
     <span class="errors_txs" style="color: red;" id="model"></span>
     @if ($errors->has('model'))
     <span class="help-block" style="color:red;">
      <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('model') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row fmx" >

  <div class="col-md-6" style="padding: 20px;">
    <div class="form-group">
      <label for="sel1">Select Car Main Image</label>
      <input type='file' id="imgInp" / name="logo"   accept=".png, .jpg, .jpeg">
      <span class="errors_txs" style="color: red;" id="logo"></span>
    </div>
  </div>
  
  <div class="col-md-6">


    <img style="width:100px;
    height: 100px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);" id="blah" src="{{ URL::asset('img/50x50.png')}}" alt="your image" class="img-responsive center-block" />

    <p style="text-align: center;color: #76818b;
    font-weight: 700;
    -webkit-transition: 0.2s;
    transition: 0.2s;
    line-height: 28px;
    height: 24px;
    font-size: 14px;
    z-index: 1;" for="sel1">Car Main Picture</p>
  </div>
</div>
</div>
</div>
</div>


<div class="theme-payment-page-sections-item">
 <h3 class="theme-payment-page-sections-item-title">Enter Car Details</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="row fmx" >
     <div class="col-md-6 ">
       <div class="form-group">
         <label for="sel1">Enter No of Bags</label>
         <input type="number" class="form-control" min="1" max="100" step="1" placeholder="Please Enter No Of Bags" name="bags" value="{{old('bags')}}" />
         <span class="errors_txs" style="color: red;" id="bags"></span>
         @if ($errors->has('bags'))
         <span class="help-block" style="color:red;">
          <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('bags') }}</strong>
        </span>
        @endif
      </div>
    </div>
    <div class="col-md-6 ">
      <div class="form-group">
       <label for="sel1">PKR Price For One Day</label>
       <input type="number" class="form-control" min="500" max="50000" step="1" placeholder="Please Enter Price PKR For One Day" name="car_price" value="{{old('car_price')}}" />
       <span class="errors_txs" style="color: red;" id="car_price"></span>
       @if ($errors->has('car_price'))
       <span class="help-block" style="color:red;">
        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('car_price') }}</strong>
      </span>
      @endif
    </div>

  </div>
</div>
<div class="row fmx" >
  <div class="col-md-6">
   <div class="form-group">
     <label for="sel1">No of Cars In Fleet</label>
     <input type="number" class="form-control" min="1" max="1000" step="1" placeholder="Please Enter No Of Cars in a Fleet" name="no_of_cars" value="{{old('no_of_cars')}}" />
     <span class="errors_txs" style="color: red;" id="no_of_cars"></span>
     @if ($errors->has('no_of_cars'))
     <span class="help-block" style="color:red;">
      <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('no_of_cars') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
   <label for="sel1">Please Select Transmission Type</label>
   <select class="form-control"  name="transmission_type" required>
    <option value="">Please Select Trasmition Type</option>

    <?php $myArray = array("Auto", "Mannual"); ?>  
    <?php if(old('transmission_type')){ ?>
      <option value="{{ old('transmission_type') }}">{{ old('transmission_type') }}</option>

    <?php } ?>
    @foreach($myArray as $d)
    <?php if(old('transmission_type')!=$d){ ?>
      <option value="{{$d}}">{{$d}}</option>

    <?php } ?>
    @endforeach


  </select>
  <span class="errors_txs" style="color: red;" id="transmission_type"></span>
  @if ($errors->has('transmission_type'))
  <span class="help-block" style="color:red;">
    <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('transmission_type') }}</strong>
  </span>
  @endif
</div>

</div>
</div>
<div class="row fmx" >
  <div class="col-md-6">
   <div class="form-group">
     <label for="sel1">Please Select Fuel Type</label>
     <select class="form-control" name="fuel" required>
      <option value="">Please Select Fuel Type</option>
      <?php $myArray = array("Petrol", "Diesel" ,"CNG" ,"Hybrid"); ?>  
      <?php if(old('fuel')){ ?>
        <option value="{{ old('fuel') }}">{{ old('fuel') }}</option>
      <?php } ?>
      @foreach($myArray as $d)
      <?php if(old('fuel')!=$d){ ?>
        <option value="{{$d}}">{{$d}}</option>
      <?php } ?>
      @endforeach
    </select>
    <span class="errors_txs" style="color: red;" id="fuel"></span>
    @if ($errors->has('fuel'))
    <span class="help-block" style="color:red;">
      <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('fuel') }}</strong>
    </span>
    @endif
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="sel1">Enter No Of Passengers</label>
    <input type="number" class="form-control" min="1" max="1000" step="1" placeholder="Please Enter No Of Passengers" name="passengers" value="{{old('passengers')}}" />
    <span class="errors_txs" style="color: red;" id="passengers"></span>
    @if ($errors->has('passengers'))
    <span class="help-block" style="color:red;">
      <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('passengers') }}</strong>
    </span>
    @endif
  </div>
</div>
</div>
<div class="row fmx">
  <div class="col-md-6">
    <div class="form-group">
      <label for="sel1">Please Select AC Type</label>
      <select class="form-control"  name="ac" required>
        <option value="">Please Select AC Type</option>
        <?php $myArray = array("AC", "NON AC"); ?>  
        <?php if(old('ac')){ ?>
          <option value="{{ old('ac') }}">{{ old('ac') }}</option>
        <?php } ?>
        @foreach($myArray as $d)
        <?php if(old('ac')!=$d){ ?>
          <option value="{{$d}}">{{$d}}</option>
        <?php } ?>
        @endforeach
      </select>
      <span class="errors_txs" style="color: red;" id="ac"></span>
      @if ($errors->has('ac'))
      <span class="help-block" style="color:red;">
        <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('ac') }}</strong>
      </span>
      @endif
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
 <h3 class="theme-payment-page-sections-item-title">Tell Us More About This Car,i.e PickUp Points</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
   <div class="col-md-12">
    <div class="form-group">
     <label for="sel1">PickUp Points</label>
     <textarea placeholder="Please Enter Your details" class='required' data-error="#details" class="form-control" rows="5" id="comment" name="c_text" style="width:100%">
      {{old('details')}}
    </textarea>
   
    @if ($errors->has('details'))
    <span  style="color:red;">
      <strong>{{ $errors->first('details') }}</strong>
    </span>
    @endif
  </div>

</div>
 <span class="errors_txs" style="color: red;" id="c_text"></span>
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
