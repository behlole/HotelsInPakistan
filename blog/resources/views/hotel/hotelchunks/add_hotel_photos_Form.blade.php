
  <div class="theme-payment-page-sections-item">
    <br><br>
    <h3 class="theme-payment-page-sections-item-title">Upload Gallery Images Of Your Property</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
        <div class="form-group">
       <p style="color: red;" id="dropzone_error_txt"></p>
      <form  enctype="multipart/form-data" method="POST" action="{{url('add_hotel_pic/'.$hotel_id)}}" 
      class="dropzone" id="dropzone">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="hotel_id" name="hotel_id" value="{{$hotel_id}}">
      <div class="dz-message"><h2>Drop files here or click to upload.</h2>
      </div>
    </form>
    <br>
    <p style="color: red;">First image Will Be Featured Or Cover Pic</p>
    
  </div>
     </div>
   </div>
 </div>
</div>
<div class="theme-payment-page-sections-item">
    <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="btn_upload" class="btn btn-success" ="">Save Data And Move To Next Step</button>
   </div>

