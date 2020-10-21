@extends('layout.master')
@section('content')
@include('home.UserChunks.SearchChunks')
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
              <h5 class="theme-search-results-sidebar-section-title">Search Home By Name</h5>
              <div class="theme-search-results-sidebar-section-search">

               <input id="serchbyname" type="text" class="serchbyname theme-search-results-sidebar-section-search-input" placeholder="Search By Home Name" />
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
            <h5 class="theme-search-results-sidebar-section-title">Home TYPE</h5>
            <div class="theme-search-results-sidebar-section-checkbox-list">
              <div class="theme-search-results-sidebar-section-checkbox-list-items">
                <?php $myArray = array("Cottage", "Resort","Apartment", "Lodges","Villas","Private Homes" , "Other"); ?>
                @foreach($myArray as $home_type)
                <div  class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                  <label class="icheck-label">
                    <input type="checkbox" class="serchboxserc icheck home_type" id="checkme" name="serchcheck[]"  value="{{$home_type}}">
                    <span class="icheck-title">{{$home_type}}</span>
                  </label>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="theme-search-results-sidebar-section">
            <h5 class="theme-search-results-sidebar-section-title">Home Features</h5>
            <div class="theme-search-results-sidebar-section-checkbox-list">
              <div class="theme-search-results-sidebar-section-checkbox-list-items">

                @foreach($sub_facility as $for_search_hom)
                <div  class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                  <label class="icheck-label">
                    <input type="checkbox" class="serchboxserc icheck home_features" id="checkmeDoc" name="serchcheckss[]"  value="{{$for_search_hom->id}}">
                    <span class="icheck-title">{{$for_search_hom->name}}</span>
                  </label>
                </div>
                @endforeach
              </div>
            </div>
          </div>
          @include('Ads.Result_Page_Left')
        </div>
      </div>
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
        <li id="serchprogress" >
          
        </li>
      </ul>
    </div>

    <div class="theme-search-results" id="loadme">
      @include('home.UserChunks.DivLoadHomeData')
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
  var max=50000;
  var min=1000;
  var home_type = [];
  var home_features = [];
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
        
        Serch_for_home();

        
      });


    
    $('.home_type').on('ifChanged', function(e) {

      var isChecked = e.currentTarget.checked;

      if (isChecked == true) {
        home_type = [];i=0;
        $('.home_type:checked').each(function () {
          home_type[i++] = $(this).val();

        });



      } else{
        $('.home_type:checked').each(function () {
          home_type[i++] = $(this).val();
        });
      }
      Serch_for_home();
    });


    $('.home_features').on('ifChanged', function(e) {

      var isChecked = e.currentTarget.checked;
      home_features = [];i=0;

      if (isChecked == true) {
        $('.home_features:checked').each(function () {
          home_features[i++] = $(this).val();
        }); 


      }else{
        $('.home_features:checked').each(function () {
          home_features[i++] = $(this).val();
        });
      }
      Serch_for_home();
    });


    $('#dateDescending').on('click',function () {
      $('#dateDescending').addClass("active");
      $('#dateAscending').toggleClass('active');
      dateorder="desc";
      Serch_for_home();
    });
    $('#dateAscending').on('click',function () {
      $('#dateAscending').addClass("active");
      $('#dateDescending').toggleClass('active');
      dateorder="asc";
      Serch_for_home();
    });
    $('#hightolow').on('click',function () {
      $('#hightolow').addClass("active");
      $('#lowtohigh').toggleClass('active');
      ratting="hightolow";
      Serch_for_home();
    });
    $('#lowtohigh').on('click',function () {
      $('#lowtohigh').addClass("active");
      $('#hightolow').toggleClass('active');
      ratting="lowtohigh";
      Serch_for_home();
    });
    
    $("#serchbyname").keyup(function() {
     if($(this).val()!=""){
      
      SearchHomeByName();
    }else{
      
    }
    
  }); 
    $('#city_name').change(function(){
     Serch_for_home();
     $("#onpagecity").text($("#city_name :selected").text());
   });



    function Serch_for_home(){

      $('#progress_div').show();
      $('#sorry_div').hide();
      
      setInterval(function(){
        $("#logopakistan").fadeOut("slow");
        $("#logopakistan").fadeIn("slow");
      }, 2000)

      function serchme(){

       
         var home_type_db = JSON.stringify( home_type );
         var home_features_db = JSON.stringify( home_features );

         $.ajax({
          url: "{{url('Home_Serach_By_Filter')}}/"+$('#city_name').val()+ '/' +  home_type_db + '/' +  home_features_db+ '/' + ratting+ '/' + dateorder + '/' +max+ '/' + min,
          type: "get",
          success: function(data) {
            $('#progress_div').hide();
            $('#loadme').empty();
            $('#loadme').html(data);

          }
        });
       
 }
 setTimeout(serchme, 4000);
   }//serch function end



   function SearchHomeByName(){

     $('#progress_div').show();
     setInterval(function(){
      $("#logopakistan").fadeOut("slow");
      $("#logopakistan").fadeIn("slow");
    }, 2000)
     $('#sorry_div').hide();
     function homeName(){
      $.ajax({
        url: "{{url('getHomeByName')}}/"+$('#serchbyname').val(),
        type: "get",
        success: function(data) {
          $('#progress_div').hide();
          $('#loadme').empty();
          $('#loadme').html(data);
        }
      });
    }
    setTimeout(homeName, 4000);
  }

});

</script>
@endsection





