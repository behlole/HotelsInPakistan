@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection
<style type="text/css">
  .errors_txs_room{
    display: block;
  }
</style>
@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <ul class="nav nav-tabs">
            @include('rooms.roomEditChunks.listingUrl')
        </ul>
        
        <div class="tab-content" >
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('rooms.roomEditChunks.room_Edit_pics')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('rooms.roomchunks.rightsidebarroom')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('java')
@include('chunks.dropzoneforroomEdit')
@include('chunks.previuosButtonBreak')
<script type="text/javascript">
  $( document ).ready(function() {
    valueget();
    });
    function valueget(){
    if($('#pic_count').val()==10){

      $('#dropzone_div').hide();
      $('#btn_upload').hide();
      
        
    }else{
        $('#dropzone_div').show();
        $('#btn_upload').show();
    }
    $('#count_show').text(10-$('#pic_count').val());
}
   
  $(document).on("click", ".clickme", function(){
    $remove_item=$(this).attr('id');
    $room_id=$('#room_id').val();
    var r = confirm("Are You Sure To delete this File");
    if (r == true) {
     $.ajax({
      url: "{{url('pic_delete_room')}}/"+$(this).attr('id') + '/' +  $room_id,
      type: "GET",
      success: function(data) {

        $("#laodmepics").html("");

        $("#laodmepics").html(data);
         valueget();
        }
      });
   }
 });
   $(document).on("click", ".clickmefeatured", function(){
    $remove_item=$(this).attr('id');
     $room_id=$('#room_id').val();
     $room_pic_id=$('#room_pic_id').val();
     console.log($room_pic_id);
    var r = confirm("Are You Sure To Make it Featured Image");
    if (r == true) {
     $.ajax({
      url: "{{url('MakeRoomPicFeatured')}}/"+$(this).attr('id') + '/' +  $room_id + '/' +  $room_pic_id,
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

@endsection
