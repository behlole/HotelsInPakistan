<form  action="{{url('add_room_ammenties/'.$room_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="edit">
  <div class="theme-payment-page-sections-item" style="margin-top: 20px;">
<h3 class="theme-payment-page-sections-item-title">Update Room Amenities</h3>
@if (session('status'))
 <div class="alert alert-success">
  {{ session('status') }}
</div>
@endif
 <span class="errors_txs" style="color: red;" id="fac_error"></span>
    <div class="theme-payment-page-form">
      <div class="row" data-gutter="20">
      	<div class="col-md-12">
           <?php $i=0;$name=""; ?> 
       @foreach($room_selected_feature as $f)
       <?php if($i==0){
        $name=$f->facilities_type;
        $i++;
        ?> 
        <div class="col-md-4">
         <i class="{{$f->fa_main}}"></i>
         <h5 class="theme-item-page-facilities-item-title"><?php echo $f->facilities_type; ?></h5>
         <p class="theme-item-page-facilities-item-body">
          

         <?php }
         
          if($name==$f->facilities_type){
             if($f->sub_facilities_id==$f->selected_facility_room){
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