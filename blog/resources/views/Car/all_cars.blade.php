 @extends('layout.master')
 @section('content')
 <?php $img_check=$img_check_2=$img_check_3=0; ?>
 @foreach($ads as $img) 
 <?php
 if($loop->iteration==1){
  $adimage='resads/'.$img->ads_folder.'/'.$img->ads_pic;
  $t1=$img->ads_name;
  $img_check=1;
}
if($loop->iteration==2){
  $adimage2='resads/'.$img->ads_folder.'/'.$img->ads_pic;
  $t2=$img->ads_name;
  $img_check_2=1;
}
if($loop->iteration==3){
  $adimage3='resads/'.$img->ads_folder.'/'.$img->ads_pic;
  $t3=$img->ads_name;
  $img_check_3=1;
}
?>
@endforeach
@include('Car.UserChunks.headerSerach')
<input type="text" name="" id="pagecheck" value="list" hidden="">
<div class="theme-page-section theme-page-section-dark theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static" id="sticky-parent" data-gutter="20">
      <div class="col-md-3 ">
        <div class="sticky-col _mob-h">
          <div class="theme-search-results-sidebar">
            <div class="theme-search-results-sidebar-map-view _mb-10 theme-search-results-sidebar-map-view-primary">
              <a class="theme-search-results-sidebar-map-view-link" href="#"></a>
              <div class="theme-search-results-sidebar-map-view-body">
                <i class="fa fa-map-marker theme-search-results-sidebar-map-view-icon"></i>
                @foreach($city_data as $c)
                <p class="theme-search-results-sidebar-map-view-sign" id="onpagecity" >{{$c->city_name}}</p>
                <input type="text" name="" id="city_name" value="{{$c->id}}" hidden="">
                @endforeach
                <?php if(count($city_data)==0){ ?>
                 <p class="theme-search-results-sidebar-map-view-sign" id="onpagecity" >All Pakistan</p>
                 <input type="text" name="" id="city_name" value="0" hidden="">
               <?php } ?>
             </div>
             <div class="theme-search-results-sidebar-map-view-mask"></div>
           </div>
           <div class="theme-search-results-sidebar-sections _mb-20 _br-2 _b-n theme-search-results-sidebar-sections-white-wrap">
            <div class="theme-search-results-sidebar-section">
              <h5 class="theme-search-results-sidebar-section-title">Search Car By Name</h5>
              <div class="theme-search-results-sidebar-section-search">

               <input id="serchbyname" type="text" class="serchbyname theme-search-results-sidebar-section-search-input" placeholder="Car  name" />
               <a class="fa fa-search theme-search-results-sidebar-section-search-btn" href="#"></a>
             </div>
           </div>
            <div class="theme-search-results-sidebar-section">
              <h5 class="theme-search-results-sidebar-section-title">Price</h5>
              <div class="theme-search-results-sidebar-section-price">
                <input id="range_price" name="price-slider" class="price"/>
              </div>
            </div>
            <div class="theme-search-results-sidebar-section">
              <h5 class="theme-search-results-sidebar-section-title">Car Type</h5>
              <div class="theme-search-results-sidebar-section-checkbox-list">
                <div class="theme-search-results-sidebar-section-checkbox-list-items">
                  @foreach($vehicle_type as $v)
                  <div class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                    <label class="icheck-label vtype">
                      <input class="icheck vehicle_type" type="checkbox" id="checkme" name="serchcheck[]"  value="{{$v->id}}" />
                      <span class="icheck-title">{{$v->vehicle_type}}</span>
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="theme-search-results-sidebar-section">
              <h5 class="theme-search-results-sidebar-section-title">Brands</h5>
              <div class="theme-search-results-sidebar-section-checkbox-list">
                <div class="theme-search-results-sidebar-section-checkbox-list-items">
                  @foreach($brand as $b)
                  <div class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                    <label class="icheck-label brand">
                      <input class="serchboxsercbrnd icheck brand_type" type="checkbox" value="{{$b->id}}" />
                      <span class="icheck-title">{{$b->brand_type}}</span>
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php if($img_check==1){ ?>
          <div class="theme-ad theme-ad-dark">
            <a class="theme-ad-link" href="#"></a>
            <p class="theme-ad-sign">{{$t1}}</p>
            <img class="theme-ad-img" src="<?php echo($adimage); ?>" alt="Image Alternative text" title="Image Title"/>
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-md-6-5 ">
      <div class="theme-search-results-sort _mob-h _b-n clearfix">
        <h5 class="theme-search-results-sort-title">Sort by:</h5>
        <ul class="theme-search-results-sort-list">
          <li id="hightolow" class="active">
            <a  >Rating
              <span>High &rarr; Low</span>
            </a>
          </li>
          <li  id="lowtohigh">
            <a >Rating
              <span>Low &rarr; High</span>
            </a>
          </li>

          <li id="dateDescending"  class="active">
            <a  >Date
              <span>Descending</span>
            </a>
          </li>
          <li id="dateAscending">
            <a  >Date
              <span>Ascending</span>
            </a>
          </li>

        </ul>
      </div>
      <div class="theme-search-results" id="loadme">
       @include('Car.UserChunks.DivLoadCarData')
     </div>
   </div>
   <div class="col-md-2-5 ">
    <div class="sticky-col _mob-h">
      <?php if($img_check_2==1){ ?>
        <div class="theme-ad theme-ad-dark">
          <a class="theme-ad-link" href="#"></a>
          <p class="theme-ad-sign">{{$t2}}</p>
          <img class="theme-ad-img" src="<?php echo($adimage2); ?>" alt="Image Alternative text" title="Image Title"/>
        </div>
      <?php } ?>
      <?php if($img_check_3==1){ ?>
        <div class="theme-ad theme-ad-dark">
          <a class="theme-ad-link" href="#"></a>
          <p class="theme-ad-sign">{{$t3}}</p>
          <img class="theme-ad-img" src="<?php echo($adimage3); ?>" alt="Image Alternative text" title="Image Title"/>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@section('javabee')

<script type="text/javascript">

  var ratting="hightolow";
  var dateorder="desc";
  var max=50000;
  var min=1000;
  var vehicle_type = [];
  var brand_type = [];
  $(document).ready(function () {

    var $d3 = $("#range_price");
    $d3.ionRangeSlider({
      type: "double",
      min: 1000,
      max: 50000,
      prefix: "PKR"
    });
    $d3.on("change", function () {

    max = parseInt($("#range_price").data("to")); // reading input value
    min = parseInt($("#range_price").data("from")); // reading input data-from attribute

    Serch_for_Car();
    });

    $('.vehicle_type').on('ifChanged', function(e) {
      
      var isChecked = e.currentTarget.checked;
         vehicle_type = [];i=0;
      if (isChecked == true) {
     
        $('.vehicle_type:checked').each(function () {
          vehicle_type[i++] = $(this).val();
        });
      } else{
        $('.vehicle_type:checked').each(function () {
          vehicle_type[i++] = $(this).val();
        });
      }
      Serch_for_Car();
    });

    $('.brand_type').on('ifChanged', function(e) {

      var isChecked = e.currentTarget.checked;
      brand_type = [];i=0;

      if (isChecked == true) {
        $('.brand_type:checked').each(function () {
          brand_type[i++] = $(this).val();
        }); 
      }else{
        $('.brand_type:checked').each(function () {
          brand_type[i++] = $(this).val();
        });
      }
      Serch_for_Car();
    });

    $('#dateDescending').on('click',function () {
      $('#dateDescending').addClass("active");
      $('#dateAscending').toggleClass('active');
      dateorder="desc";
      Serch_for_Car();
    });
    $('#dateAscending').on('click',function () {
      $('#dateAscending').addClass("active");
      $('#dateDescending').toggleClass('active');
      dateorder="asc";
      Serch_for_Car();
    });
    $('#hightolow').on('click',function () {
      $('#hightolow').addClass("active");
      $('#lowtohigh').toggleClass('active');
      ratting="hightolow";
      Serch_for_Car();
    });
    $('#lowtohigh').on('click',function () {
      $('#lowtohigh').addClass("active");
      $('#hightolow').toggleClass('active');
      ratting="lowtohigh";
      Serch_for_Car();
    });
    
    $("#serchbyname").keyup(function() {
     if($(this).val()!=""){

      SearchCarByName();
    }else{

    }

  }); 
    $('#city_name').change(function(){
     Serch_for_Car();
     $("#onpagecity").text($("#city_name :selected").text());
   });

    function Serch_for_Car(){

   

      $('#progress_div').show();
      $('#sorry_div').hide();

      setInterval(function(){
        $("#logopakistan").fadeOut("slow");
        $("#logopakistan").fadeIn("slow");
      }, 2000)

      function serchme(){
         var vehicle_type_db = JSON.stringify( vehicle_type );
         var brand_type_db = JSON.stringify( brand_type );

         $.ajax({
          url: "{{url('Car_Serach_By_Filter')}}/"+$('#city_name').val()+ '/' +  vehicle_type_db + '/' +  brand_type_db+ '/' + ratting+ '/' + dateorder + '/' +max+ '/' + min,
          type: "get",
          success: function(data) {
            $('#progress_div').hide();
            $('#loadme').empty();
            $('#loadme').html(data);

          }
        });
       
 }
 setTimeout(serchme, 6000);
   }//serch function end

   function SearchCarByName(){

     $('#progress_div').show();
     setInterval(function(){
      $("#logopakistan").fadeOut("slow");
      $("#logopakistan").fadeIn("slow");
    }, 2000)
     $('#sorry_div').hide();
     function CarName(){
      $.ajax({
        url: "{{url('getCarByName')}}/"+$('#serchbyname').val(),
        type: "get",
        success: function(data) {
          $('#progress_div').hide();
          $('#loadme').empty();
          $('#loadme').html(data);
        }
      });
    }
    setTimeout(CarName, 4000);
  }

});

</script>
@endsection