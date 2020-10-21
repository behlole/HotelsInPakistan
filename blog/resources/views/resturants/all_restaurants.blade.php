@extends('layout.master')
@section('content')
@include('resturants.UserChunks.headerSerach')
<div class="theme-page-section theme-page-section-dark theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static" id="sticky-parent" data-gutter="20">
      <div class="col-md-3 ">
        <div class="sticky-col _mob-h">
          <div class="theme-search-results-sidebar">
            <div class="theme-search-results-sidebar-map-view _mb-10 theme-search-results-sidebar-map-view-primary">
              <a class="theme-search-results-sidebar-map-view-link" href="#"></a>
              <div class="theme-search-results-sidebar-map-view-body">
               @foreach($city_data as $c)
               <p class="theme-search-results-sidebar-map-view-sign" id="onpagecity" >{{$c->city_name}}
               </p>
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
              <h5 class="theme-search-results-sidebar-section-title">Search Restaurant  By Name</h5>
              <div class="theme-search-results-sidebar-section-search">
                <input id="serchbyname" type="text" class="serchbyname theme-search-results-sidebar-section-search-input" placeholder="Restaurants name" />
              </div>
            </div><div class="theme-search-results-sidebar-section">
              <h5 class="theme-search-results-sidebar-section-title">RESTAURANTS TYPE</h5>
              <div class="theme-search-results-sidebar-section-checkbox-list">
                <div class="theme-search-results-sidebar-section-checkbox-list-items">
                  @foreach($restaurant_types as $typesforsearch)
                  <div  class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                    <label class="icheck-label">
                      <input type="checkbox" class="icheck res_types" id="checkme" name="serchcheck[]"  value="{{$typesforsearch->id}}"><span class="icheck-title">{{$typesforsearch->restaurant_type_names}}</span>
                    </label>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('Ads.Result_Page_Left')
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
       @include('resturants.UserChunks.DivLoadRestaurantData')
     </div>
   </div>
 @include('Ads.Result_Page_Right')
</div>
</div>
</div>
@endsection
@section('javabee')


<script type="text/javascript">

  var ratting="hightolow";
  var dateorder="desc";
  var res_types = [];

  $(document).ready(function () {

    $('.res_types').on('ifChanged', function(e) {

      var isChecked = e.currentTarget.checked;

      if (isChecked == true) {
        res_types = [];i=0;
        $('.res_types:checked').each(function () {
          res_types[i++] = $(this).val();

        });



      } else{
        $('.res_types:checked').each(function () {
          res_types[i++] = $(this).val();
        });
      }

      Serch_for_restaurant();
    });




    $('#dateDescending').on('click',function () {
      $('#dateDescending').addClass("active");
      $('#dateAscending').toggleClass('active');
      dateorder="desc";
      Serch_for_restaurant();
    });
    $('#dateAscending').on('click',function () {
      $('#dateAscending').addClass("active");
      $('#dateDescending').toggleClass('active');
      dateorder="asc";
      Serch_for_restaurant();
    });
    $('#hightolow').on('click',function () {
      $('#hightolow').addClass("active");
      $('#lowtohigh').toggleClass('active');
      ratting="hightolow";
      Serch_for_restaurant();
    });
    $('#lowtohigh').on('click',function () {
      $('#lowtohigh').addClass("active");
      $('#hightolow').toggleClass('active');
      ratting="lowtohigh";
      Serch_for_restaurant();
    });
    
    $("#serchbyname").keyup(function() {
     if($(this).val()!=""){

      SearchRestaurantByName();
    }else{

    }

  }); 
    $('#city_name').change(function(){
     Serch_for_restaurant();
     $("#onpagecity").text($("#city_name :selected").text());
   });



    function Serch_for_restaurant(){

      $('#progress_div').show();
      $('#sorry_div').hide();

      setInterval(function(){
        $("#logopakistan").fadeOut("slow");
        $("#logopakistan").fadeIn("slow");
      }, 2000)

      function serchme(){
         var res_types_db = JSON.stringify( res_types );

         $.ajax({
          url: "{{url('Restaurant_Serach_By_Filter')}}/"+$('#city_name').val()+ '/' +  res_types_db + '/' + ratting+ '/' + dateorder,
          type: "get",
          success: function(data) {
            $('#progress_div').hide();
            $('#loadme').empty();
            $('#loadme').html(data);

          }
        });
     }
     setTimeout(serchme, 3000);
   }//serch function end



   function SearchRestaurantByName(){

     $('#progress_div').show();
     setInterval(function(){
      $("#logopakistan").fadeOut("slow");
      $("#logopakistan").fadeIn("slow");
    }, 2000)
     $('#sorry_div').hide();
     function ResName(){
      $.ajax({
        url: "{{url('getResByName')}}/"+$('#serchbyname').val(),
        type: "get",
        success: function(data) {
          $('#progress_div').hide();
          $('#loadme').empty();
          $('#loadme').html(data);
        }
      });
    }
    setTimeout(ResName, 3000);
  }

});
</script>
@endsection




