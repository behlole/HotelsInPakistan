@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection
@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <ul class="nav nav-tabs">
           @include('hotel.edithotelchunks.listingurl')
          </ul>
          <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('hotel.edithotelchunks.editHotelPhotosForm')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        @include('hotel.hotelchunks.rightsidebarhotel')
      </div>
    </div>
  </div>
</div>
@endsection
@section('javabee')

<script type="text/javascript">
  $( document ).ready(function() {
    valueget();
      
});
    function valueget(){
    if($('#pic_count').val()==10){
       
        $('#dropzone_div').hide();
        $('#dropzone_div_button').hide();
        
    }else{
        $('#dropzone_div').show();
        $('#dropzone_div_button').show();
    }
    $('#count_show').text(10-$('#pic_count').val());
}
   
  $(document).on("click", ".clickme", function(){
    $remove_item=$(this).attr('id');
    $hotel_id=$('#hotel_id').val();
    var r = confirm("Are You Sure To delete this File");
    if (r == true) {
     $.ajax({
      url: "{{url('picdelete_hotel')}}/"+$(this).attr('id') + '/' +  $hotel_id,
      type: "GET",
      success: function(data) {

        $("#laodmepics").empty();
        $("#laodmepics").html(data);
         valueget();
        }
      });
   }
 });
  $(document).on("click", ".clickmefeatured", function(){
    $remove_item=$(this).attr('id');
     $hotel_id=$('#hotel_id').val();
     $hotel_pic_parent_id=$('#hotel_pic_parent_id').val();
     console.log($hotel_pic_parent_id);
    var r = confirm("Are You Sure To Make it Featured Image");
    if (r == true) {
     $.ajax({
      url: "{{url('MakeHotelFeatured')}}/"+$(this).attr('id') + '/' +  $hotel_id + '/' +  $hotel_pic_parent_id,
      type: "GET",
      success: function(data) {
        $("#laodmepics").empty();
          $("#laodmepics").html(data);
           valueget();
        }
      });
   }
 });
</script>
@include('chunks.dropzoneforhotelEdit')
@endsection

