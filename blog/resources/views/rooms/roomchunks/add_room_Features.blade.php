<form  action="{{url('add_room_ammenties/'.$room_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="form_check" value="add">
  <div class="theme-payment-page-sections-item" style="margin-top: 20px;">
<h3 class="theme-payment-page-sections-item-title">Add Room Amenities</h3>

 <span class="errors_txs" style="color: red;" id="fac_error"></span>
    <div class="theme-payment-page-form">
      <div class="row" data-gutter="20">
      	<div class="col-md-12">
      <?php $i=0;$name=""; 
      $facility_for_Selection = App\Models\Hotel\hotel_facility::all_room_facility(); 
      ?>
       @foreach($facility_for_Selection as $f)
       <?php if($i==0){$name=$f->facilities_type;
        $i++;
        ?> <div class="col-md-4 ">
          <p class="theme-item-page-facilities-item-body">
            <input type="checkbox" name="select_facilitie[]" value="{{$f->sub_facilities_id}}">&nbsp;{{$f->name}}
           <br>
         <?php }
         else{
          if($name==$f->facilities_type){
            ?>
            <input type="checkbox" name="select_facilitie[]" value="{{$f->sub_facilities_id}}">&nbsp;{{$f->name}}
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