<form  action="{{url('add_home_features_db/'.$home_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="add">
  <div class="theme-payment-page-sections-item">
   <br><br>
   <h3 class="theme-payment-page-sections-item-title">Internet Is Available to Guests ? </h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
        <span class="errors_txs" style="color: red;" id="internet_error"><br></span>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" name="netcheck" id="netcheck" value="Free" required>Free Internet Include In the Pricesss
          </label>
          <label class="radio-inline">
            <input type="radio" name="netcheck" id="netcheck" value="Paid">Paid ,Pay Extra Charges
          </label>
          <label class="radio-inline">
            <input type="radio" name="netcheck" id="netcheck" value="No">Not Available
          </label>
          <div id="net_options" style="display: none;margin-top:10px;" >
           <span class="errors_txs" style="color: red;" id="internet_error_2"><br></span>
           <h5 class="theme-sidebar-section-features-list-title">Select Internet Medium</h5>
           <label class="radio-inline">
            <input type="radio" name="netcheckopt" data-error="#internet_error_2" value="Cable">Cable
          </label>
          <label class="radio-inline">
            <input type="radio" name="netcheckopt" data-error="#internet_error_2" value="Wifi">Wifi
          </label>
        </div>
      </div>
    </div>
    <div class="col-md-8" id="net_options1" style="display: none;">
      <span class="errors_txs" style="color: red;" id="internet_error_3"></span>
      <h5 class="theme-sidebar-section-features-list-title">Range Of Internet,Please Select One Option</h5>
      <div class="form-group">
        <label class="radio-inline">
          <input type="radio" name="range" data-error="#internet_error_3" value="All Rooms">All Rooms
        </label>
        <label class="radio-inline">
          <input type="radio" name="range" data-error="#internet_error_3" value="Some Rooms">Some Rooms
        </label>
        <label class="radio-inline">
          <input type="radio" name="range" data-error="#internet_error_3" value="Public Rooms">Public Rooms
        </label>
        <label class="radio-inline">
          <input type="radio" name="range" data-error="#internet_error_3" value="Entire Property">Entire Property
        </label>
        <br>
      </div>
    </div>
    <div class="col-md-4" id="net_options_payement" style="display: none;">
     <h5 class="theme-sidebar-section-features-list-title">Please Enter Extra Internet Charges</h5>
     <div class="form-group">
      <input type="number" data-error="#internet_error_4" min="100" max="10000" name="net_options_payement" class="form-control">
      <span class="errors_txs" style="color: red;" id="internet_error_4"></span>
    </div>
  </div>
</div>
</div>           
</div>
<div class="theme-payment-page-sections-item">
  <h3 class="theme-payment-page-sections-item-title">Is Parking Available? </h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
      <span class="errors_txs" style="color: red;" id="parking_error"></span><br>
     <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" value="Free" required>Yes,Free
      </label>
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" value="Paid">Yes,Paid
      </label>
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" value="No" select>Not Available
      </label>
    </div>
  </div>
  <br>
  <div id="park_options" style="display: none;">
    <div class="col-md-12" style="margin-top: 10px;">
       <span class="errors_txs" style="color: red;" id="parking_reservation"></span>
      <h5 class="theme-sidebar-section-features-list-title">Please Check Parking Reservation needed or Not</h5>
      <label class="radio-inline">
        <input type="radio" name="reservation" data-error="#parking_error" value="Yes">Reservation Needed
      </label>
      <label class="radio-inline">
        <input type="radio" name="reservation" data-error="#parking_error" value="No">No Reservetion Needed
      </label>
    </div>
    <div class="col-md-12" style="margin-top: 10px;">
       <span class="errors_txs" style="color: red;" id="parking_nature"></span>
      <h5 class="theme-sidebar-section-features-list-title">Parking is Public or Private ?</h5>
      <label class="radio-inline">
        <input type="radio" name="nature" data-error="#parking_nature" value="Public">Public 
      </label>
      <label class="radio-inline">
        <input type="radio" name="nature" data-error="#parking_nature" value="Private">Private
      </label>
    </div>
    <div class="col-md-8" style="margin-top: 10px;">
      <h5 class="theme-sidebar-section-features-list-title" >Parking Site ? <span class="errors_txs" style="color: red;" id="parking_site_error"></span></h5>

      <label class="radio-inline">
        <input type="radio" name="site" data-error="#parking_site_error" value="On Site">On Site
      </label>
      <label class="radio-inline">
        <input type="radio" name="site" data-error="#parking_site_error" value="Off Site">Off Site
      </label>
    </div>
  </div>
  <div class="col-md-4" id="parking_options_payement" style="display: none;">
   <h5 class="theme-sidebar-section-features-list-title">Per Day Parking Chargres</h5>
   <h6><span class="errors_txs" style="color: red;" id="per_day_parking"></span></h6>
   <div class="form-group"><input data-error="#per_day_parking" type="number" max="5000" min="50" name="perdaypark" class="form-control">
   </div>
 </div>
</div>
</div>           
</div>
<div class="theme-payment-page-sections-item">
  <h3 class="theme-payment-page-sections-item-title">Select Staff Language </h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
      <div class="form-group">
        <span class="form-label">Please Select Staff Languages </span>
        <select id="select_lang" data-placeholder="Choose a Language..." class="form-control  js-example-tags" name="lang[]"  multiple="multiple">
         <?php $mylang = App\Models\Hotel\language::language_names();  ?>  
         @foreach($mylang as $lang)
         <option value="{{$lang->lang_name}}">{{$lang->lang_name}}</option>@endforeach
       </select>
       <span class="errors_txs" style="color: red;" id="lang_error"></span>
     </div>
   </div>
 </div>
</div>
</div>  
<div class="theme-payment-page-sections-item">
 <span class="errors_txs" style="color: red;" id="fac_error"></span>
 <h3 class="theme-payment-page-sections-item-title">Facilities that are Popular with Guests</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
     <?php $i=0;$name=""; ?>
     <?php $facility_for_Selection = App\Models\Hotel\hotel_facility::all_hotel_facility();?>@foreach($facility_for_Selection as $f)
     <?php if($i==0){
      $name=$f->facilities_type;
      $i++;
      ?> 
      <div class="col-md-4">
       <i class="{{$f->fa_main}}"></i>
       <h5 class="theme-item-page-facilities-item-title"><?php echo $f->facilities_type; ?></h5>
       <p class="theme-item-page-facilities-item-body">
         <input type="checkbox" name="select_facilitie[]"  value="{{$f->sub_facilities_id}}">&nbsp;&nbsp;{{$f->name}}
         <label class="features_checkbox"><span class="checkmark"></span></label>
         <br>
       <?php }
       else{
        if($name==$f->facilities_type){
          ?>
          <input type="checkbox" name="select_facilitie[]" value="{{$f->sub_facilities_id}}">&nbsp;&nbsp;{{$f->name}}
          <br>
          <?php
        }
        else{
          $name=$f->facilities_type;
          $i=0;
          ?>
        </p>
      </div>
      <?php
    }
  }
  ?>
  @endforeach
</div>
<?php if($i>0){
 echo "</div>";
}
?>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
  <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Save Data And Move To Next Step</button>
</div>
</form>