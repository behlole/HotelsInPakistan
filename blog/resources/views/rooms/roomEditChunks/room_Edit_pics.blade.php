<br><br>
<div class="theme-payment-page-sections-item" id="dropzone_div" style="display: none;">
 <h3 class="theme-payment-page-sections-item-title">Upload More Pics ,You Can Add only <span id="count_show"></span>&nbsp;More Pics</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20" >
    <p id="dropzone_error_txt" style="color: red;"></p>
<form  enctype="multipart/form-data" method="POST" action="{{url('add_room_pics_db/'.$room_id)}}" 
      class="dropzone" id="dropzone" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="room_id" name="room_id" value="{{$room_id}}">
      <div class="dz-message"><h2>Drop files here or click to upload.</h2>
      </div>
    </form>
      <button style="display: none;" type="submit" id="btn_upload" class="btn _tt-uc btn-primary-inverse btn-sm pull-right" id="save" name="submit" class="btn btn-success">Upload More Picture</button>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
  <h3 class="theme-payment-page-sections-item-title">Update Picture Or Removessss </h3>
 <div class="theme-payment-page-form">
  <div class="row">
    <input type="hidden" id="room_id" value="{{$room_id}}">
    <div class="row" id="laodmepics">
    @include('rooms.roomEditChunks.room_update_pic_div')
  </div>
</div>
</div>
</div>
