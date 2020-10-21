<?php  $bed_option_count_js=0; ?>
<form  action="{{url('update_room_info/')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="form_check" value="add">
  <input type="hidden" name="room_id" value="{{$d->id}}">
  <input type="hidden" name="hotel_id" value="{{$d->hotel_id}}">
  @if (session('status'))
 <div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

	<div class="theme-payment-page-sections-item">
		<h3 class="theme-payment-page-sections-item-title">Update Room Basic</h3>
		<div class="theme-payment-page-form">
			<div class="row" data-gutter="20">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group">
								<label for="sel1">Room Type:</label>
								<select id="roomtype_id" name="room_type" class="form-control"  style="">
									<?php $room_master_id="";
									$master_name="";
                  $updated_room_bed_option_js=0; ?>
									@foreach(App\Models\Room\roomtype::master_type_id_find($d->room_name_id) as $master)
									<?php 
									$room_master_id=$master->master_id;
									$master_name=$master->master_name;
                  $updated_room_bed_option_js=$master->bed_size_option;
									?>
									@endforeach
									<?php 
									if($room_master_id!=""&&!old('room_type')){ ?>

										<option value={{$room_master_id}}>{{$master_name}}</option>

									<?php } else{
										?>
										<option value="{{old('room_type')}}">{{App\roomname::roomname_find(old('room_type'))}}
										</option>
										<?php
									} ?>
									@foreach($roomtype as $r)
									<?php if($room_master_id!=$r->id){ 
										if(old('room_type')!=$r->id){
											?>
											<option value="{{$r->id}}">{{$r->roomtypes}}</option>
										<?php }
                  }
                  ?>
                  @endforeach
                </select>
                  <input type="hidden" id="updated_room_bed_option_js" name="updated_room_bed_option_js" value="{{$updated_room_bed_option_js}}">
                <span class="errors_txs_room" style="color: red;" id="roomtype_error"></span>
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group">
              <label for="last">Room Name</label>
              <select id="room_name" name="room_name_id" class="form-control  " style="">
               <?php if($d->room_name_id!=""&&!old('room_name_id')){ ?>
                <option value={{$d->room_name_id}}>{{App\Models\Room\roomname::roomname_find($d->room_name_id)}}</option>
              <?php } else{
                ?>
                <option value={{old('room_name_id')}}>{{App\Models\Room\roomname::roomname_find(old('room_name_id'))}}</option>
<?php
} ?>
</select>
</div>
</div> 
</div>
</div> <!-- first row  -->
<div class="row">
	<div class="col-md-12">
   <div class="col-md-6">

    <div class="form-group">
      <label for="last">Custom Name</label>
      <input type="text" name="custom_name" class="form-control" value="<?php 

      if($d->custom_name&&!old('custom_name')){

        echo($d->custom_name);

      }
      else{
        echo old('custom_name');
      }

      ?>"">
    </div>
  </div>
  <div class="col-md-3"> 
    <div class="form-group">
      <span class="errors_txs_room" style="color: red;" id="no_of_rooms"></span>
      <label for="company">No Of Rooms</label>
      <input type="number" name="no_of_rooms" class="form-control " min="1" placeholder="" value="<?php 

      if($d->no_of_rooms&&!old('no_of_rooms')){

        echo($d->no_of_rooms);

      }
      else{
        echo old('no_of_rooms');
      }

      ?>"" ">
    </div>
  </div>

  <div class="col-md-3">

    <div class="form-group">
      <label for="last">Smooking Policy</label>
      <select id="no_smoking" name="smookin_policy" class="form-control  " style="">
       <?php $myArray = array("Non-smoking", "Smoking","I have both smoking and non-smoking options for this room type"); ?>  
       <?php if($d->smookin_policy&&!old('smookin_policy')){ ?>
        <option value="{{ $d->smookin_policy }}">{{ $d->smookin_policy }}</option>

      <?php } ?>
      <?php if(old('smookin_policy')){ ?>
        <option value="{{ old('smookin_policy') }}">{{ old('smookin_policy') }}</option>

      <?php } ?>
      @foreach($myArray as $d2)
      <?php if($d->smookin_policy!=$d2){ 
       if(old('smookin_policy')!=$d2){
        ?>
        <option value="{{$d2}}">{{$d2}}</option>
      <?php }
    }
    ?>
    @endforeach
  </select>
</div>
</div>
</div>
</div> <!-- end 2nd div -->
<?php if($d->option_1){
 
 ?>

  <div class="theme-payment-page-sections-item" id="bed_options">
  <?php }else { ?>
    <div class="theme-payment-page-sections-item" id="bed_options" style="display: none;">
    <?php } ?>
    <input type="hidden" name="room_bed_count_option_1" id="room_bed_count_option_1" value="<?php if($d->option_1no){
      echo "YES";
      $bed_option_count_js++;
    } else{
      echo "NO";
     } ?>">
    <input type="hidden" name="room_bed_count_option_2" id="room_bed_count_option_2" value="<?php if($d->option_2no){
      echo "YES";
      $bed_option_count_js++;
    } else{
      echo "NO";
     } ?>">
    <input type="hidden" name="room_bed_count_option_3" id="room_bed_count_option_3" value="<?php if($d->option_3no){
      echo "YES";
      $bed_option_count_js++;
    } else{
      echo "NO";
     } ?>">
      <input type="hidden"  id="bed_option_count_js" name="bed_option_count_js" value="{{$bed_option_count_js}}">
    <input type="hidden"  id="extra_bed_options" name="extra_bed_options">
    <h3 class="theme-payment-page-sections-item-title">Room Layout And Bed Size</h3>
    <div class="theme-payment-page-form">
      <div class="row" data-gutter="20">
        <div class="col-md-12">
          <div class=" col-md-6 ">
            <div class="form-group">
              <label class="form-label" for="first">What Kind Of Beds Available</label> <span class="errors_txs_room" style="color: red;" id="option_name_1"></span>
              <select class="form-control " name="option_name_1" id="first_bed" >
                <?php if($d->option_1&&!old('option_name_1')){ ?>
                  @foreach(App\Models\Room\roomname::bed_options($d->option_1) as $bed)
                  <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
                    {{$bed->bed_name}}
                    &nbsp;&nbsp;{{$bed->bed_size}}
                  </option>
                  @endforeach
                <?php } 

                if(old('option_name_1')){
                 ?>
                 @foreach(App\Models\Room\roomname::bed_options($d->option_1) as $bed)
                 <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
                  {{$bed->bed_name}}
                  &nbsp;&nbsp;{{$bed->bed_size}}
                </option>
                @endforeach
                <?php
              } ?>
              @foreach($data as $h)
              <?php if($d->option_1!=$h->id){ 
               if(old('option_name_1')!=$h->id){
                ?>
                <option value="{{$h->id}}" guest_space="{{$h->guest_space}}"> {{$h->bed_name}}
                  &nbsp;&nbsp;{{$h->bed_size}}
                </option>
              <?php }
            }
            ?>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-label">Select the number of beds</label>   <span class="errors_txs_room" style="color: red;" id="option_number_1"></span>
          <select id="first_bed_number" name="option_number_1" class="form-control  bed_number js-pc-bedding-changes">
           <?php $myArray = array("1", "2","3","4","5","6","7","8","9","10","11","12"); ?>  
           <?php if($d->option_1no&&!old('option_number_2')){ ?>
            <option value="{{$d->option_1no}}">{{ $d->option_1no }}</option>
          <?php } ?>
          <?php if(old('option_number_1')){ ?>
            <option value="{{ old('option_number_1') }}">{{ old('option_number_1') }}</option>
          <?php } ?>
          @foreach($myArray as $d2)
          <?php if($d->option_1no!=$d2){ 
           if(old('option_number_1')!=$d2){
            ?>
            <option value="{{$d2}}">{{$d2}}</option>
          <?php }
        }
        ?>
        @endforeach
      </select>
    </div>
  </div>
</div>
<?php if($d->option_2no){ ?>
  <div class="col-md-12" id="2nd">
  <?php } else { ?>
    <div class="col-md-12" id="2nd" style="display: none;">
    <?php } ?>
    <div class=" col-md-6 ">
      <div class="form-group">
        <label class="form-label" for="first">What Kind Of Beds Available</label><span class="errors_txs_room" style="color: red;" id="option_name_2"></span>
        <select class="form-control " name="option_name_2" id="bed_name_2nd" >
         <?php if($d->option_2no&&!old('option_name_2')){ ?>
          @foreach(App\Models\Room\roomname::bed_options($d->option_2no) as $bed)

          <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
            {{$bed->bed_name}}
            &nbsp;&nbsp;{{$bed->bed_size}}
          </option>
          @endforeach
        <?php }
        if(old('option_name_2')){
         ?>
         @foreach(App\Models\Room\roomname::bed_options($d->option_2no) as $bed)
         <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
          {{$bed->bed_name}}
          &nbsp;&nbsp;{{$bed->bed_size}}
        </option>
        @endforeach
        <?php
      } ?>
      @foreach($data as $h)
      <?php if($d->option_2no!=$h->id){ 
       if(old('option_name_2')!=$h->id){
        ?>
        <option value="{{$h->id}}" guest_space="{{$h->guest_space}}"> {{$h->bed_name}}
          &nbsp;&nbsp;{{$h->bed_size}}
       </option>
      <?php }
    }
    ?>
    @endforeach
  </select>
</div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label class="form-label">Select the number of beds</label>
    <span class="errors_txs_room" style="color: red;" id="option_number_2"></span>
    <select id="bed_number_2nd" name="option_number_2" class="form-control  bed_number js-pc-bedding-changes">
     <?php $myArray = array("1", "2","3","4","5","6","7","8","9","10","11","12"); ?>  
     <?php if($d->option_2no&&!old('option_number_2')){ ?>
      <option value="{{$d->option_2no}}">{{ $d->option_2no }}</option>

    <?php } ?>
    <?php if(old('option_number_2')){ ?>
      <option value="{{ old('option_number_2') }}">{{ old('option_number_2') }}</option>

    <?php } ?>
    @foreach($myArray as $d2)
    <?php if($d->option_2no!=$d2){ 
     if(old('option_number_2')!=$d2){
      ?>

      <option value="{{$d2}}">{{$d2}}</option>

    <?php }
  }
  ?>
  @endforeach
</select>
</div>
</div>
</div>
<?php if($d->option_3){ ?>
<div class="col-md-12" id="3rd" >
  <?php } else {?>
<div class="col-md-12" id="3rd" style="display: none;">
    <?php } ?>
 <div class=" col-md-6 ">
  <div class="form-group">
    <label class="form-label" for="first">What Kind Of Beds Available</label>
    <span class="errors_txs_room" style="color: red;" id="option_name_3"></span>
    <select class="form-control " name="option_name_3" id="bed_name_3rd" >
      <?php if($d->option_3&&!old('option_name_3')){ ?>
                  @foreach(App\Models\Room\roomname::bed_options($d->option_3) as $bed)
                  <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
        {{$bed->bed_name}}
        &nbsp;&nbsp;{{$bed->bed_size}}
      </option>
      @endforeach
        <?php }
        if(old('option_name_3')){
         ?>
         @foreach(App\Models\Room\roomname::bed_options(old('option_name_3')) as $bed)
         <option value="{{$bed->id}}" guest_space="{{$bed->guest_space}}">
        {{$bed->bed_name}}
        &nbsp;&nbsp;{{$bed->bed_size}}
      </option>
      @endforeach
                 <?php
       } ?>
       @foreach($data as $h)
        <?php if($d->option_3!=$h->id){ 
       if(old('option_name_3')!=$h->id){
        ?>
        <option value="{{$h->id}}" guest_space="{{$h->guest_space}}"> {{$h->bed_name}}
          &nbsp;&nbsp;{{$h->bed_size}}
        </option>
      <?php }
    }
    ?>
    @endforeach
  </select>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label class="form-label">Select the number of beds</label>
    <span class="errors_txs_room" style="color: red;" id="option_number_3"></span>
    <select id="bed_number_3rd" name="option_number_3" class="form-control  bed_number js-pc-bedding-changes">
     <?php $myArray = array("1", "2","3","4","5","6","7","8","9","10","11","12"); ?>  
           <?php if($d->option_3no&&!old('option_number_3')){ ?>
                      <option value="{{$d->option_3no}}">{{ $d->option_3no }}</option>

                    <?php } ?>
           <?php if(old('option_number_3')){ ?>
            <option value="{{ old('option_number_3') }}">{{ old('option_number_3') }}</option>

          <?php } ?>
          @foreach($myArray as $d2)
        <?php if($d->option_3!=$d2){ 
                           if(old('option_number_3')!=$d2){
                          ?>
                           
            <option value="{{$d2}}">{{$d2}}</option>

          <?php }
          }
           ?>
          @endforeach
    </select>
  </div>
</div>
</div>
<div class="col-md-12">
  <div class="form-group" style="float: right;">
    <label class="form-label">Total Number Of Guests</label>
    <span><input readonly="" type="number" name="total_people" class="form-control " id="no_of_guests" value=<?php 
                  if($d->total_people&&!old('total_people')){

                      echo($d->total_people);

                      }
                      else{
                        echo old('total_people');
                      }

                  ?>  >
    </span>
  </div>
  <button type="button" id="another_bed" class="add_another_bed_link btn btn-link addbed">
    <i class="fa fa-plus" ></i>&nbsp;Add another bed
  </button>
  <button type="button" id="rem_bed"  style="<?php if($bed_option_count_js<1){ echo "display: none"; }?> color:red;" class="add_another_bed_link btn btn-link rem_bed">
    <i class="fa fa-trash" ></i>&nbsp;Remove Bed
  </button>
</div>
</div>
</div> 
</div>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item" style="margin-top: -20px;">
 <span class="errors_txs_room" style="color: red;" id="gen_sales_tax"></span>
 <h3 class="theme-payment-page-sections-item-title">Room Price And Size</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
    <div class="col-md-12">
      <div class="row">
       <div class="col-md-12">
        <h2 class="theme-sidebar-section-features-list-title"> Describe Room Size</h2>
      </div>
      <div class="col-md-12">
       <div class="form-inline">
         <span class="errors_txs_room" style="color: red;" id="room_size"></span>
        <input  type="number" name="room_size" class="form-control" value="<?php 
                  if($d->room_size&&!old('room_size')){

                      echo($d->room_size);

                      }
                      else{
                        echo old('room_size');
                      }

                  ?>"">
        <select class="form-control"  name="room_unit" style="width:200px;">
            <?php $myArray = array("YES", "Square Feet"); ?>  
           <?php if($d->room_unit&&!old('room_unit')){ ?>
                      <option value="{{$d->room_unit}}">{{ $d->room_unit }}</option>

                    <?php } ?>
           <?php if(old('room_unit')){ ?>
            <option value="{{ old('room_unit') }}">{{ old('room_unit') }}</option>

          <?php } ?>
          @foreach($myArray as $d2)
        <?php if($d->room_unit!=$d2){ 
                           if(old('room_unit')!=$d2){
                          ?>
                           
            <option value="{{$d2}}">{{$d2}}</option>

          <?php }
          }
           ?>
          @endforeach

        </select>
      </div>
    </div>
  </div>
  <div class="row" >
   <div class="col-md-12" style="margin-top: 10px;">
    <h2 class="theme-sidebar-section-features-list-title" >Base Price Per Night,  Give details About The Rates </h2>
  </div>
  <div class="col-md-12" style="margin-top: 10px;">
    <h5 id="price" style="font-size: 16px;font-weight: bolder;color:#0093d2;" class="theme-sidebar-section-features-list-title"></h5>
     <span class="errors_txs_room" style="color: red;" id="room_price_night"></span>
    <div class="form-inline">
      <input  type="number" name="room_price_night"  class="form-control" value=<?php 
                  if($d->room_price_night && !old('room_price_night')){

                      echo $d->room_price_night;

                      }
                      else{
                        echo old('room_price_night');
                      }

                  ?>>
      <select class="form-control " disabled="" style="width:200px;">
        <option value="0" selected="">PKR</option>
      </select>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php if($d->discount_chk){ ?>
<div class="theme-payment-page-sections-item" id="offer_low_div" style="margin-top: -20px;">
  <?php } else{ ?>
 
<div class="theme-payment-page-sections-item" id="offer_low_div" style="display: none;margin-top: -20px;">
    <?php } ?>
  
  
  <h3 class="theme-payment-page-sections-item-title">Discount,Give details About Discount</h3>
  <div class="theme-payment-page-form">
    <div class="row"> 
          <div class="col-md-6">
            <span class="errors_txs_room" style="color: red;" id="discount_opts"></span>
            <select class="form-control " id="discount" name="discount_opts">
              <?php $myArray = array("YES", "NO"); ?>  
           <?php if($d->discount_chk&&!old('discount_opts')){ ?>
                      <option value="{{$d->discount_chk}}">{{ $d->discount_chk }}</option>

                    <?php } ?>
           <?php if(old('discount_opts')){ ?>
            <option value="{{ old('discount_opts') }}">{{ old('discount_opts') }}</option>

          <?php } ?>
          @foreach($myArray as $d2)
        <?php if($d->discount_chk!=$d2){ 
                           if(old('discount_opts')!=$d2){
                          ?>
                           
            <option value="{{$d2}}">{{$d2}}</option>

          <?php }
          }
           ?>
          @endforeach
     
            </select>
          </div>
        </div>
        <?php if($d->discount_chk){ ?>
        <div  id="discount_opt">
          <?php } else{ ?>
        <div style="display: none;" id="discount_opt">
            <?php } ?>
          <div class="form-group">
          <label class="form-label">Discount Condition</label>
          <span class="errors_txs_room" style="color: red;" id="discount_cond_error"></span>
          <textarea name="discount_cond" class="form-control" placeholder="Describe Discount Condition..."><?php 
                  if($d->discount_cond&&!old('discount_cond')){

                      echo($d->discount_cond);

                      }
                      else{
                        echo old('discount_cond');
                      }

                  ?></textarea>
          <label class="form-label">Discount Amount</label>
           <span class="errors_txs_room" style="color: red;" id="discount_amount_error"></span>
          <input style="width: 40%"  type="number" name="discount" class="form-control" placeholder="Discount Price" value="<?php 
                  if($d->discount&&!old('discount')){

                      echo($d->discount);

                      }
                      else{
                        echo old('discount');
                      }

                  ?>" >
        </div>
      </div>
    </div>
</div>
<div class="theme-payment-page-sections-item">
  <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" name="submit" class="btn btn-success">Save Data And Move To Next Step</button>
</div>
</form>
