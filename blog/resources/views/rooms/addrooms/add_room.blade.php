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
          <li class="active"><a data-toggle="tab">Introduction</a></li>
          <li><a>Amenties</a></li>
          <li><a>Pictures</a></li>
        </ul>
          @if (session('status_err'))
              <div class="alert alert-success">
                {{ session('status_err') }}
              </div>
              @endif
              @if (count($errors) > 0)
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
        <div class="tab-content" >
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections" style="margin-top: -20px;">
              @include('rooms.roomchunks.add_room_Form')
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

<script type="text/javascript">
  $('#roomtype_id').change(function(){
    var data=$(this).val();
    if($(this).val() != "0"){
      $.ajax({
        url: "{{url('getroomnames')}}/"+data,
        type: "GET",
        dataType:"json",
        success: function(data) {
          var html = "";
          var bed_size_option=0;
          for (var i = 0; i < data.length; i++) {
            html = html + "<option value=" + data[i].id + ">" + data[i].room_name + "</option>";
            bed_size_option=data[i].bed_size_option;
          };
          $("#extra_bed_options").val(bed_size_option);
          $("#room_name").empty();
          $("#room_name").html(html);
          if(bed_size_option==0){
            $('#offer_low_div').hide();
            $('#bed_options').hide();
          }
          if(bed_size_option==1){
            $("#room_bed_count_option_1").val("YES");
            $('#bed_options').show();

            $('#offer_low_div').show();
          }
        }
      });

    }
    else{
      $("#room_name").empty();
    }
  });
  $(document).ready(function(){
    $('#discount').change(function(){
      if($(this).val() == "0"||$(this).val() == "NO")
      {
        $('#discount_opt').hide();
      }
      if($(this).val() == "YES")
      {
        $('#discount_opt').show();
      }
    });
    var check=0;
    var first_bed_number= $('#first_bed_number');
    var first_bed=$('#first_bed');
    var bed_name_2nd=$('#bed_name_2nd');
    var bed_number_2nd=$('#bed_number_2nd');
    var bed_name_3rd=$('#bed_name_3rd');
    var bed_number_3rd=$('#bed_number_3rd');

    function calculate_guest() {
      var first=0;
      var b2=0;
      var b3=0;
      var first_number_multiply=0;
      var second_number_multiply=0;
      var third_number_multiply=0;
      $('#no_of_guests').val(0);
      if($("#first_bed").find('option:selected').attr('guest_space')>=1){
        first=first_bed.find('option:selected').attr('guest_space');
      }
      if($("#bed_name_2nd").find('option:selected').attr('guest_space')>=1){
        
        b2=bed_name_2nd.find('option:selected').attr('guest_space');
      }
      if($("#bed_name_3rd").find('option:selected').attr('guest_space')>=1){
        b3=bed_name_3rd.find('option:selected').attr('guest_space');
     }
     
     if(first_bed_number.val()!==""){
       first_number_multiply=first_bed_number.val();
     }
     if(bed_number_2nd.val()!==""){
      second_number_multiply=bed_number_2nd.val();
    }
    if(bed_number_3rd.val()!==""){
      third_number_multiply=bed_number_3rd.val();
    }
     console.log("first  "+first);
    console.log("second  "+b2);
    console.log("third  "+b3);
   console.log("first count is "+first_number_multiply);
    console.log("second count is "+second_number_multiply);
    console.log("third count is "+third_number_multiply);
    var count=count2=count3=0;
    count=(first*first_number_multiply);
    count2=(b2*second_number_multiply);
    count3=(b3*third_number_multiply);
    
    $('#no_of_guests').val(count+count2+count3);

// $('#no_of_guests').val((Number(first)*Number(first_number_multiply))+(Number(b2)*Number(second_number_multiply))+(Number(b3)*Number(third_number_multiply)));

$('#price').html('Price For '+ $('#no_of_guests').val()+' people');
$('#offer_low').html('Do you offer a lower rate when there are fewer than '+ $('#no_of_guests').val()+'');
}
$('#first_bed_number').change(function(){
  calculate_guest();
});
$('#first_bed').change(function(){
  calculate_guest();
});
$('#bed_number_3rd').change(function(){
  calculate_guest();
});
$('#bed_name_3rd').change(function(){
  calculate_guest();
});
$('#bed_number_2nd').change(function(){
  calculate_guest();
});
$('#bed_name_2nd').change(function(){
  calculate_guest();
});
$(document).on("click", ".addbed", function(){
  check++;
  if(check==0){
    $("#room_bed_count_option_1").val("YES");
  }

  if(check==1){
    $('#rem_bed').show();
    $('#2nd').show();
    $("#room_bed_count_option_2").val("YES");
  }
  if(check==2){
    $('#3rd').show(); 
    $('#another_bed').hide();
    $('#rem_bed').show();
    $("#room_bed_count_option_3").val("YES");
  }

});
$(document).on("click", ".rem_bed", function(){
  if(check==1){
    $('#rem_bed').hide();
    $('#another_bed').show();
    $('#2nd').hide();
    $("#bed_number_2nd").val('0');
    calculate_guest();
    check--;
    $("#room_bed_count_option_2").val("NO");
  }
  if(check==2){
    $('#3rd').hide(); 
    $('#another_bed').show();
    $('#rem_bed').show();
    $("#bed_number_3rd").val('0');
    calculate_guest();
    check--;
    $("#room_bed_count_option_3").val("NO");
  }
});
});
</script>
@include('chunks.previuosButtonBreak')
@include('rooms.javascriptValidation.room')
@endsection
