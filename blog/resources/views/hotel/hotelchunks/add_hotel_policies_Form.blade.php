<form  id="formpolicy" action="{{url('add_hotel_policies_db/'.$hotel_id)}}" method="post" >
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="add">
  <br>
  <div class="theme-payment-page-sections-item">
    <h3 class="theme-payment-page-sections-item-title">Cancellations Policy if Any</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
        <div class="form-group">
          <textarea name="c_text" data-error="#c_text_error" class='required form-control' style="width:100%"></textarea>
          <span class="errors_txs" style="color: red;" id="c_text_error"><br></span>
           @if ($errors->has('c_text'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('c_text') }}</strong>
          </span>
          @endif
         
       </div>
     </div>
   </div>
 </div>
</div>
<?php $mytime = App\Models\Hotel\hotel_policy::create_time_range('5:00', '20:00', '30 mins'); ?>

<div class="theme-payment-page-sections-item">
 
<h3 class="theme-payment-page-sections-item-title">Check In / Check Out Timing</h3>
<div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-label">Check-in From</label><span class="errors_txs" style="color: red;" id="check_in_select"></span>
          <select class="form-control time_check" name="check_inForm" data-error="#check_in_select"  >
            <option value="">Please Select Check In Time</option>
            @foreach($mytime as $timedelay)
            <option value="{{$timedelay}}">{{$timedelay}}</option>@endforeach
          
          </select>
           @if ($errors->has('check_inForm'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('check_inForm') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-6" >  
        <div class="form-group">
          <label class="form-label">Check-in To:</label>
          <span class="errors_txs" style="color: red;" id="check_in_to"></span>
          <select class="form-control time_check" name="check_inTo" data-error="#check_in_to"  >
            <option value="">Please Select Check In Time</option>
            @foreach($mytime as $timedelay)
            <option value="{{$timedelay}}">{{$timedelay}}</option>@endforeach
            
          </select>
           @if ($errors->has('check_inTo'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('check_inTo') }}</strong>
          </span>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="col-md-6" >
        <div class="form-group">
          <label class="form-label">Check-out From (optional):</label>
          <span class="errors_txs" style="color: red;" id="check_out_from"></span>
          <select class="form-control time_check_2nd"  name="check_OutForm" data-error="#check_OutForm"  >
            <option >Please Select Check Out Time</option>
            @foreach($mytime as $timedelay)
            <option value="{{$timedelay}}">{{$timedelay}}</option>@endforeach
            
          </select>
           @if ($errors->has('check_OutForm'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('check_OutForm') }}</strong>
          </span>
          @endif
        </div>
      </div>
      <div class="col-md-6" >
        <div class="form-group">
          <label class="form-label">Check-out To (optional):</label>

          <span class="errors_txs" style="color: red;" id="check_OutTo"></span>
          <select class="form-control time_check_2nd" name="check_OutTo" data-error="#check_OutTo">
           <option >Please Select Check Out To Time</option>
           @foreach($mytime as $timedelay)
           <option value="{{$timedelay}}">{{$timedelay}}</option>@endforeach
           
         </select>
          @if ($errors->has('check_OutTo'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('check_OutTo') }}</strong>
          </span>
          @endif
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<div class="theme-payment-page-sections-item">
  <h3 class="theme-payment-page-sections-item-title">Do You Provide Extra Bed Option ?</h3>
    <span class="errors_txs" style="color: red;" id="extra_bed"></span>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
    
      <div class="col-md-6" >
       <label class="radio-inline">
        <input type="radio" name="accommodate_children" data-error="#extra_bed"  value="YES">YES Charges Apply
      </label>
    </div>
    <div class="col-md-6">
     <label class="radio-inline">
      <input type="radio" name="accommodate_children" data-error="#extra_bed" value="NO">NO , We Don't Allow
    </label>
  </div>
   @if ($errors->has('accommodate_children'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('accommodate_children') }}</strong>
          </span>
          @endif
</div>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
 <h3 class="theme-payment-page-sections-item-title">Do you allow pets?</h3>
  <span class="errors_txs" style="color: red;" id="allow_pets"></span>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
      <div class="col-md-6" >
       <label class="radio-inline">
        <input type="radio" name="allow_pets" data-error="#allow_pets"  value="YES">YES Charges Apply
      </label>
    </div>
    <div class="col-md-6">
     <label class="radio-inline">
      <input type="radio" name="allow_pets" data-error="#allow_pets" value="NO">NO We Dont'Allow
    </label>
  </div>
   @if ($errors->has('allow_pets'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('allow_pets') }}</strong>
          </span>
          @endif
</div>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
    <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Save Data And Move To Next Step</button>
   </div>
</form>
