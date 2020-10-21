<form  action="{{url('add_home_features_db/'.$home_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="edit">
  
  <br><br>
  @if (session('success'))
 <div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
  <div class="theme-payment-page-sections-item">
   <br><br>
   <h3 class="theme-payment-page-sections-item-title">Internet Is Available to Guests ? </h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">

     @foreach($selected_features as $internet_options)
     <?php
     $show_Div=0;
            //for staff language check
     $selected_languages=unserialize($internet_options->language);
     ?>
     <div class="col-md-12">
      <span class="errors_txs" style="color: red;" id="internet_error"><br></span>
      <div class="form-group">
        <label class="radio-inline">
          <input type="radio" name="netcheck" id="netcheck" <?php 
          if($internet_options->net_options=="Free"){
            echo "checked";
            $show_Div=1;
          }
          ?>  value="Free" required>Free Internet Include In the Pricesss
        </label>
        <label class="radio-inline">
          <input type="radio" name="netcheck" id="netcheck" <?php 
          if($internet_options->net_options=="Paid"){
            echo "checked";
            $show_Div=1;
          }
          ?> value="Paid">Paid ,Pay Extra Charges
        </label>
        <label class="radio-inline">
          <input type="radio" name="netcheck" id="netcheck" <?php 
          if($internet_options->net_options=="No"){
            echo "checked";}
            ?> value="No">Not Available
          </label>

          <div id="net_options" style="<?php if($show_Div==0){?> display: none; <?php } ?>margin-top:10px;" >
            <span class="errors_txs" style="color: red;" id="internet_error_2"><br></span>
            <h5 class="theme-sidebar-section-features-list-title">Select Internet Medium</h5>
            <label class="radio-inline">
              <input type="radio" name="netcheckopt" data-error="#internet_error_2" <?php 
              if($internet_options->internet_type=="Cable"){
                echo "checked";
              }
              ?> value="Cable">Cable
            </label>
            <label class="radio-inline">
              <input type="radio" name="netcheckopt" data-error="#internet_error_2" <?php 
              if($internet_options->internet_type=="Wifi"){
                echo "checked";
              }
              ?> value="Wifi">Wifi
            </label>
          </div>
        </div>
      </div>

      <div class="col-md-8" id="net_options1" style="<?php if($show_Div==0){?> display: none; <?php } ?>">

      <span class="errors_txs" style="color: red;" id="internet_error_3"></span>
        <h5 class="theme-sidebar-section-features-list-title">Range Of Internet,Please Select One Option</h5>
        <div class="form-group">
          <label class="radio-inline">
            <input type="radio" data-error="#internet_error_3" name="range" <?php 
            if($internet_options->range=="All Rooms"){
              echo "checked";
            }
            ?> value="All Rooms">All Rooms
          </label>
          <label class="radio-inline">
            <input type="radio" data-error="#internet_error_3" name="range" 
            <?php 
            if($internet_options->range=="Some Rooms"){
              echo "checked";
            }
            ?> value="Some Rooms">Some Rooms
          </label>
          <label class="radio-inline">
            <input type="radio" data-error="#internet_error_3" name="range" 
            <?php 
            if($internet_options->range=="Public Rooms"){
              echo "checked";

            }
            ?> value="Public Rooms">Public Rooms
          </label>
          <label class="radio-inline">
            <input type="radio" data-error="#internet_error_3" name="range" 
            <?php 
            if($internet_options->range=="Entire Property"){
              echo "checked";
            }
            ?>
            value="Entire Property">Entire Property
          </label>
          <br>
        </div>
      </div>
      <div class="col-md-4" id="net_options_payement" style="<?php 
      if($internet_options->net_options=="Free"||$internet_options->net_options=="No"){?> display:none; <?php } ?>">
      <h5 class="theme-sidebar-section-features-list-title">Please Enter Extra Internet Charges</h5>
      <div class="form-group">
        <input type="number" min="100" data-error="#internet_error_4" name="net_options_payement" class="form-control">

      <span class="errors_txs" style="color: red;" id="internet_error_4"></span>
      </div>
    </div>
    @endforeach
    
  </div>
</div>           
</div>
<div class="theme-payment-page-sections-item">

 <h3 class="theme-payment-page-sections-item-title">Is Parking Available? </h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
   @foreach($selected_features as $parking)
   <?php
   $show_Div_2=0;
   ?>
   <div class="col-md-12">

      <span class="errors_txs" style="color: red;" id="parking_error"></span><br>
     <div class="form-group">
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" <?php 
        if($parking->parking_opt=="Free"){
          echo "checked";
          $show_Div_2=1;
        }
        ?> value="Free"  required>Yes,Free
      </label>
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" <?php 
        if($parking->parking_opt=="Paid"){
          echo "checked";
          $show_Div_2=1;
        }
        ?>  value="Paid">Yes,Paid
      </label>
      <label class="radio-inline">
        <input type="radio" name="parkcheck" data-error="#parking_error" <?php 
        if($parking->parking_opt=="No"){
          echo "checked";
        }
        ?> value="No" select>Not Available
      </label>


    </div>
  </div>
  <br>
  <div id="park_options" style="<?php if($show_Div==0){?> display: none; <?php } ?>">
    <div class="col-md-12" style="margin-top: 10px;">
    <span class="errors_txs" style="color: red;" id="parking_reservation"></span>
      <h5 class="theme-sidebar-section-features-list-title">Please Check Parking Reservation needed or Not</h5>
      <label class="radio-inline">
        <input type="radio" name="reservation" data-error="#parking_error" <?php 
        if($parking->reservetion=="Yes"){
          echo "checked";
        }
        ?> value="Yes">Reservation Needed
      </label>
      <label class="radio-inline">
        <input type="radio" name="reservation" data-error="#parking_error" <?php 
        if($parking->reservetion=="No"){
          echo "checked";
        }
        ?> value="No">No Reservetion Needed
      </label>
    </div>

    <div class="col-md-12" style="margin-top: 10px;">

       <span class="errors_txs" style="color: red;" id="parking_nature"></span>
      <h5 class="theme-sidebar-section-features-list-title">Parking is Public or Private ?</h5>
      <label class="radio-inline">
        <input type="radio" data-error="#parking_nature" name="nature" 
        <?php 
        if($parking->parking_type=="Public"){
          echo "checked";
        }
        ?>
        value="Public">Public 
      </label>
      <label class="radio-inline">
        <input type="radio" data-error="#parking_nature" name="nature" 
        <?php 
        if($parking->parking_type=="Private"){
          echo "checked";
        }
        ?>
        value="Private">Private
      </label>
    </div>
    
    <div class="col-md-8" style="margin-top: 10px;">
      <h5 class="theme-sidebar-section-features-list-title">Parking Site ?<span class="errors_txs" style="color: red;" id="parking_site_error"></span></h5>
      <label class="radio-inline">
        <input type="radio" data-error="#parking_site_error" name="site" <?php 
        if($parking->parking_site=="On Site"){
          echo "checked";
        }
        ?> value="On Site">On Site
      </label>
      <label class="radio-inline">
        <input type="radio" data-error="#parking_site_error" name="site" <?php 
        if($parking->parking_site=="Off Site"){
          echo "checked";
        }
        ?> value="Off Site">Off Site
      </label>
    </div>
  </div>
  
  <div class="col-md-4" id="parking_options_payement" style="<?php 
  if($parking->parking_opt=="Free"||$parking->parking_opt=="No"){?> display:none; <?php } ?>">
  <h5 class="theme-sidebar-section-features-list-title">Per Day Parking Chargres<h6><span class="errors_txs" style="color: red;" id="per_day_parking"></span></h6></h5>
  <div class="form-group"><input type="number" name="perdaypark" class="form-control">
  </div>
</div>
@endforeach

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

        <select id="select_lang" data-placeholder="Choose a Language..." class="form-control  js-example-tags" name="lang[]"  multiple="multiple" required>
         <?php $mylang = App\Models\Hotel\language::language_names();
         $checked=0;
         ?>  
         @foreach($mylang as $lang)
         <?php $checked=0; ?>
         @foreach($selected_languages as $selectedByUser)
         <?php if($selectedByUser==$lang->lang_name){ 
          $checked=1;
          ?>
        <?php } ?>
        @endforeach
        <?php 
        if($checked==1){ ?>
          <option selected value="{{$lang->lang_name}}">{{$lang->lang_name}}</option>
        <?php }else{ ?>
          <option  value="{{$lang->lang_name}}">{{$lang->lang_name}}</option>
        <?php } ?>

        @endforeach

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
       @foreach($home_sel_features as $f)
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
             if($f->sub_facilities_id==$f->selected_facility){
            ?>

            <input type="checkbox" checked="" name="select_facilitie[]" value="{{$f->sub_facilities_id}}">
            &nbsp;&nbsp;{{$f->name}}
            <br>

            <?php
          }else{ ?>
            <input type="checkbox" name="select_facilitie[]" value="{{$f->sub_facilities_id}}">
            &nbsp;&nbsp;{{$f->name}}
            <br>
      <?php
          }
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