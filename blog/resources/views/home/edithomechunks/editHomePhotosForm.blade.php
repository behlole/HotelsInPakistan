<br><br>
<div class="theme-payment-page-sections-item" id="dropzone_div" style="display: none;">
 <h3 class="theme-payment-page-sections-item-title">Upload More Pics ,You Can Add only <span id="count_show"></span>&nbsp;More Pics</h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20" >
<form  enctype="multipart/form-data" method="POST" action="{{url('add_home_pic/'.$home_id)}}" 
      class="dropzone" id="dropzone" >
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="hidden" id="home_id" name="home_id" value="{{$home_id}}">
      <div class="dz-message"><h2>Drop files here or click to upload.</h2>
      </div>
    </form>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item">
  <h3 class="theme-payment-page-sections-item-title">Update Picture Or Remove </h3>
 <div class="theme-payment-page-form">
  <div class="row" data-gutter="20">
  	<input type="hidden" id="home_id" value="{{$home_id}}">
    <div class="row" id="laodmepics">
    @include('home.edithomechunks.updatepics_div')
  </div>
</div>
</div>
</div>
<div class="theme-payment-page-sections-item" id="dropzone_div_button" style="display: none;">
  <div class="theme-payment-page-booking">
    <div class="theme-payment-page-booking-header">
      <p class="theme-payment-page-booking-subtitle">By clicking Update now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p></div>
      <button  type="submit" id="btn_upload" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Update Data And Move To Next Step</button>
    </div>
  </div>
