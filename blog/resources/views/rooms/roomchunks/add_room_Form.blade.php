<form  action="{{url('add_new_room_to_db/'.$hotel_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="add">

  <div class="theme-payment-page-sections-item" style="margin-top: 10px;">

   
    <h3 class="theme-payment-page-sections-item-title">Room Basic</h3>
    <div class="theme-payment-page-form">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label" class="form-label">Room Type:</label>
            <select id="roomtype_id" name="room_type" data-error="#roomtype_error" class="form-control" style="">
              <option value="">Please select</option>
              @foreach($roomtype as $r)
              <option value="{{$r->id}}">{{$r->roomtypes}}</option>
              @endforeach
            </select>
             <span class="errors_txs_room" style="color: red;" id="roomtype_error"></span>
            <div class="help-block with-errors"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label" class="form-label">Room Name</label>
            <select id="room_name" name="room_name_id" class="form-control">
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <span class="errors_txs_room" style="color: red;" id="custom_name"></span>
            <label class="form-label" class="form-label">Custom Name(Optional)</label>
            <input type="text" name="custom_name" class="form-control">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
              <span class="errors_txs_room" style="color: red;" id="no_of_rooms"></span>
            <label class="form-label" class="form-label">No Of Rooms</label>
            <input type="number" name="no_of_rooms" class="form-control " min="1" placeholder="" value="1" ">
          </div></div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="form-label" for="last">Smooking Policy</label>
              <select id="no_smoking" name="smookin_policy" class="form-control  " style="">
                <option value="Non-smoking">Non-smoking</option>
                <option value="Smoking">Smoking</option>
                <option value="I have both smoking and non-smoking options for this room type">I have both smoking and non-smoking options for this room type</option></select>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="theme-payment-page-sections-item" id="bed_options"  style="display: none;margin-top: -20px;">
        <input type="hidden" name="room_bed_count_option_1" id="room_bed_count_option_1" value="NO">
         <input type="hidden" name="room_bed_count_option_2" id="room_bed_count_option_2" value="NO">
          <input type="hidden" name="room_bed_count_option_3" id="room_bed_count_option_3" value="NO">
        <input type="hidden"  id="extra_bed_options" name="extra_bed_options">
        
       <h3 class="theme-payment-page-sections-item-title">Room Layout And Bed Size</h3>
       <div class="theme-payment-page-form">
        <div class="row" data-gutter="20">
          <div class="col-md-12">
            <div class=" col-md-6 ">
              <div class="form-group">
                 
                <label class="form-label" for="first">What Kind Of Beds Available</label> <span class="errors_txs_room" style="color: red;" id="option_name_1"></span>
                <select class="form-control " name="option_name_1" id="first_bed" >
                   <option  value="" selected="">Select the Kind of Bed</option>
                  @foreach($data as $h)
                  <option value="{{$h->id}}" guest_space="{{$h->guest_space}}">
                    {{$h->bed_name}}
                    &nbsp;&nbsp;{{$h->bed_size}}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
               
                <label class="form-label">Select the number of beds</label>   <span class="errors_txs_room" style="color: red;" id="option_number_1"></span>
                <select id="first_bed_number" name="option_number_1" class="form-control  bed_number js-pc-bedding-changes">
                  <option value="" >Select the number of beds</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-12" id="2nd" style="display: none;">
           <div class=" col-md-6 ">
            <div class="form-group">
              <label class="form-label" for="first">What Kind Of Beds Available</label><span class="errors_txs_room" style="color: red;" id="option_name_2"></span>
             
              <select class="form-control " name="option_name_2" id="bed_name_2nd" >
                 <option  value="">Select the Kind of Bed</option>
                @foreach($data as $h)
                <option value="{{$h->id}}" guest_space="{{$h->guest_space}}">
                  {{$h->bed_name}}
                  &nbsp;&nbsp;{{$h->bed_size}}
                </option>
                @endforeach
              </select>
            </div>

          </div><div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Select the number of beds</label>
              <span class="errors_txs_room" style="color: red;" id="option_number_2"></span>
              <select id="bed_number_2nd" name="option_number_2" class="form-control  bed_number js-pc-bedding-changes">
                <option value="" >Select the number of beds</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-12" id="3rd" style="display: none;">
         <div class=" col-md-6 ">
          <div class="form-group">
            <label class="form-label" for="first">What Kind Of Beds Available</label>
             <span class="errors_txs_room" style="color: red;" id="option_name_3"></span>
            <select class="form-control " name="option_name_3" id="bed_name_3rd" >
              <option  value="">Select the Kind of Bed</option>
              @foreach($data as $h)
              <option value="{{$h->id}}" guest_space="{{$h->guest_space}}">
                {{$h->bed_name}}
                &nbsp;&nbsp;{{$h->bed_size}}
              </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">Select the number of beds</label>
            <span class="errors_txs_room" style="color: red;" id="option_number_3"></span>
            <select id="bed_number_3rd" name="option_number_3" class="form-control  bed_number js-pc-bedding-changes">
              <option value="" >Select the number of beds</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group" style="float: right;">
          <label class="form-label">Total Number Of Guests</label>
          <span><input disabled="" type="number" name="total_people" class="form-control " id="no_of_guests" value="0">
          </span>
        </div>
        <button type="button" id="another_bed" class="add_another_bed_link btn btn-link addbed">
          <i class="fa fa-plus" ></i>&nbsp;Add another bed
        </button>
        <button type="button" id="rem_bed"  style="display: none; color:red;" class="add_another_bed_link btn btn-link rem_bed">
          <i class="fa fa-trash" ></i>&nbsp;Remove Bed
        </button>
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
        <input  type="number" name="room_size" class="form-control ">
        <select class="form-control " name="room_unit" style="width:200px;">
          <option value="Square Meters" selected="">Square Meters</option>
          <option value="Square Feet">Square Feet</option>
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
      <input  type="number" name="room_price_night" class="form-control ">
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
<div class="theme-payment-page-sections-item" id="offer_low_div" style="display: none;margin-top: -20px;">
  
  
  <h3 class="theme-payment-page-sections-item-title">Discount,Give details About Discount</h3>
  <div class="theme-payment-page-form">
    <div class="row"> 
          <div class="col-md-6">
            <span class="errors_txs_room" style="color: red;" id="discount_opts"></span>
            <select class="form-control " id="discount" name="discount_opts">
              <option value="">Do You Offer Discount</option>
              <option value="YES" >Yes,I offer Discount</option>
              <option value="NO">No,I did't allow discount</option>
            </select>
          </div>
        </div>
        <div style="display: none;" id="discount_opt">
          <div class="form-group">
          <label class="form-label">Discount Condition</label>
          <span class="errors_txs_room" style="color: red;" id="discount_cond_error"></span>
          <textarea name="discount_cond" class="form-control" placeholder="Describe Discount Condition..."></textarea>
          <label class="form-label">Discount Amount</label>
           <span class="errors_txs_room" style="color: red;" id="discount_amount_error"></span>
          <input style="width: 40%"  type="number" name="discount" class="form-control" placeholder="Discount Price"  >
        </div>
      </div>
    </div>
</div>
<div class="theme-payment-page-sections-item">
  <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" name="submit" class="btn btn-success">Save Data And Move To Next Step</button>
</div>
</form>

