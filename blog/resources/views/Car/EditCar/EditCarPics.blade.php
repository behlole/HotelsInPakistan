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
          @include('Car.EditCar.listingUrl')
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections">
            @include('Car.EditCarChunks.EditPicsForm')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('CarAgency.AddCarAgencyChunks.RightSideBar')
        </div>
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
    $car_id=$('#car_id').val();
    var r = confirm("Are You Sure To delete this File");
    if (r == true) {
     $.ajax({
      url: "{{url('picdelete_cars')}}/"+$(this).attr('id') + '/' +  $car_id,
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
@include('Car.javascriptValidation.dropzonejsforUpdateCar')
@include('chunks.previuosButtonBreak')
@endsection
