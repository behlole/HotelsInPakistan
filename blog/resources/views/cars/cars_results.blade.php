 
 @extends('layout.master2')


 @section('content')
  <?php $img_check=$img_check_2=$img_check_3=0; ?>
 @foreach(App\resad::ads_image_find_results('result','cars') as $img) 
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
 <div class="theme-hero-area" id="hero-banner">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url(./img/carss.jpg);" ></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="blur-area" data-bg-area="#hero-banner" data-blur-area="#hero-search-form" data-blur="20"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="theme-search-area _pv-100 theme-search-area-stacked theme-search-area-white">
            <div class="theme-search-area-header _ta-c">
              <h1 class="theme-search-area-title">Find Best Car Deals</h1>
              <!--<p class="theme-search-area-subtitle">Search hundreds of travel sites at once</p>-->
            </div>
                   <form  action="{{url('search_cars')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data" style="color:black;">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="theme-search-area-form _bsh-xxl _bsh-light" id="hero-search-form">
                  <div class="row" data-gutter="none">
                    <div class="col-md-3 ">
                      <div class="theme-search-area-section first theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                        <div class="theme-search-area-section-inner">
                         <i class="theme-search-area-section-icon lin lin-calendar"></i>
                            <select class="theme-search-area-section-input abc form-control"  name="city" style="width: 100%;color: black;" ></select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="row" data-gutter="none">
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerStart _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                           <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-calendar"></i>
                              <input class="theme-search-area-section-input datePickerEnd _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" name="date" placeholder="Check-in"/>
                              <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"  />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="row" data-gutter="none">
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr quantity-selector" data-increment="Passenger">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-people"></i>
                              <input class="theme-search-area-section-input" value="2 Passenger" type="text" name="passenger" />
                              <div class="quantity-selector-box" id="HotelSearchGuests">
                                <div class="quantity-selector-inner">
                                  <p class="quantity-selector-title">Total</p>
                                  <ul class="quantity-selector-controls">
                                    <li class="quantity-selector-decrement">
                                      <a href="#">&#45;</a>
                                    </li>
                                    <li class="quantity-selector-current">1</li>
                                    <li class="quantity-selector-increment">
                                      <a href="#">&#43;</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 ">
                          <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr quantity-selector" data-increment="BAGS">
                            <div class="theme-search-area-section-inner">
                              <i class="theme-search-area-section-icon lin lin-people"></i>
                              <input class="theme-search-area-section-input" value="2 BAGS" type="text" name="bags" />
                              <div class="quantity-selector-box" id="HotelSearchGuests">
                                <div class="quantity-selector-inner">
                                  <p class="quantity-selector-title">BAGS</p>
                                  <ul class="quantity-selector-controls">
                                    <li class="quantity-selector-decrement">
                                      <a href="#">&#45;</a>
                                    </li>
                                    <li class="quantity-selector-current">1</li>
                                    <li class="quantity-selector-increment">
                                      <a href="#">&#43;</a>
                                    </li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-1 ">
                      <button class="theme-search-area-submit _mt-0 theme-search-area-submit-curved theme-search-area-submit-sm theme-search-area-submit-no-border">Search</button>
                    </div>
                  </div>
                </div>
              </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
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
                    <h5 class="theme-search-results-sidebar-section-title">Price</h5>
                    <div class="theme-search-results-sidebar-section-price">
                      <input id="price-slider"   name="price-slider" data-min="1000" data-max="50000"/>
                    </div>
                  </div>
                  <div class="theme-search-results-sidebar-section">
                    <h5 class="theme-search-results-sidebar-section-title">Car Type</h5>
                    <div class="theme-search-results-sidebar-section-checkbox-list">
                      <div class="theme-search-results-sidebar-section-checkbox-list-items">
                        
                       
                        @foreach($vehicle_type as $v)
                        <div class="checkbox theme-search-results-sidebar-section-checkbox-list-item">
                          <label class="icheck-label vtype">
                            
                            <input class="serchboxserc icheck" type="checkbox" id="checkme" name="serchcheck[]"  value="{{$v->vehicle_type}}" />
                            <span class="icheck-title">{{$v->vehicle_type}}</span>
                          </label>
                         <!--  <span class="theme-search-results-sidebar-section-checkbox-list-amount">371</span> -->
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
                          
                            <input class="serchboxsercbrnd icheck" type="checkbox" value="{{$b->brand_type}}" />
                            <span class="icheck-title">{{$b->brand_type}}</span>
                          </label>
                         <!--  <span class="theme-search-results-sidebar-section-checkbox-list-amount">195</span> -->
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
                 
               
                   <li id="serchprogress" style="display: none;">
                                 <img id="his_loading" style="width:100px;height: 50px;">
                                   </li>
              
               
              </ul>
            
            </div>
          
            <div class="theme-search-results" id="loadme">
             @include('cars.carssrch')
             
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
       @include('chunks.js')
    <script type="text/javascript">

              var ratting="hightolow";
              var dateorder="desc";
                  $(document).ready(function () {
                 

                $('#dateDescending').on('click',function () {
                $('#dateDescending').addClass("active");
                $('#dateAscending').toggleClass('active');
                dateorder="desc";
                serch();
                });
                 
               
                $('#dateAscending').on('click',function () {
                $('#dateAscending').addClass("active");
                $('#dateDescending').toggleClass('active');
                dateorder="asc";
                serch();
                });
            
               
                $('#hightolow').on('click',function () {
                $('#hightolow').addClass("active");
                $('#lowtohigh').toggleClass('active');
                ratting="hightolow";
                serch();
                });
                 $('#lowtohigh').on('click',function () {
                $('#lowtohigh').addClass("active");
                $('#hightolow').toggleClass('active');
                ratting="lowtohigh";

              serch();
                });
             
                 var arr = [];
                  var arrb = [];
                  var arrbprice = [];
    
 
    $(".vtype").on('click',function () {
      console.log("why");
       $('#serchprogress').show();

                   document.getElementById("his_loading").src="{{ URL::asset('img/loader7.gif') }}";

                   
       function showpanel() {
        
        arr = [];i=0;
        $('.serchboxserc:checked').each(function () {
           
             arr[i++] = $(this).val();
             console.log(arr);

                
       }); 
         serch();

      }
      setTimeout(showpanel, 2000);
    });


 $(".brand").on('click',function () {
      console.log("why brand called");
       $('#serchprogress').show();

                   document.getElementById("his_loading").src="{{ URL::asset('img/loader7.gif') }}";

                   
       function showpanel2() {
        
        arrb = [];i=0;
        $('.serchboxsercbrnd:checked').each(function () {
           
             arrb[i++] = $(this).val();
             console.log(arrb);

                
       }); 
         serch();

      }
      setTimeout(showpanel2, 2000);
    });

 $('#price-slider').change(function(){
                 
             
       $('#serchprogress').show();

                   document.getElementById("his_loading").src="{{ URL::asset('img/loader7.gif') }}";

                   
       function showpanel2price() {
        
        arrbprice = [];$i=0;
        arrbprice[$i++]=$('#price-slider').val();
        console.log(arrbprice);
         serch();

      }
      setTimeout(showpanel2price, 2000);


                   }); 

                  
               

                $("#serchbyname").keyup(function() {
                 
 
               serchbynameajax();


                

              }); 
               


              function serch(){
                console.log("called");
               
                    $('#serchprogress').show();

                   document.getElementById("his_loading").src="{{ URL::asset('img/loader7.gif') }}";

                     $("#his_loading").fadeIn("slow");
                     
              if(arr){
               var arrs = JSON.stringify( arr );
             }else{
              arrs=[];

                 }
                 if(arrb){
               var arrbrand = JSON.stringify( arrb );
             }else{
              arrbrand=[];

                 }
                 if(arrbprice){
               var arrbpricearray = JSON.stringify( arrbprice );
             }else{
              arrbpricearray=[];

                 }
               
                 $.ajax({
             
      url: "{{url('getserchforcars')}}/"+$('#city_name').val()+ '/' +  arrs+ '/' + $("#pagecheck").val()+ '/' + ratting+ '/' + dateorder+ '/' + arrbpricearray+ '/' + arrbrand,
        type: "get",
        
       
        success: function(data) {
         

     $("#his_loading").fadeOut("slow");
        
         

          $('#loadme').empty();
             $('#loadme').html(data);
           
              
          
           
        }

       
    });
              }
              function serchbynameajax(){
             
                 $('#serchprogress').show();

                   document.getElementById("his_loading").src="{{ URL::asset('img/loader7.gif') }}";

                     $("#his_loading").fadeIn("slow");
             
                 $.ajax({
             
       url: "{{url('getserchforhotelrbyname')}}/"+$('#serchbyname').val()+ '/' + $("#pagecheck").val(),
        type: "get",
        
       
        success: function(data) {

     $("#his_loading").fadeOut("slow");
        
         
           $('#loadme').empty();
          
             $('#loadme').html(data);
           
//console.log(data);
          
           
        }

       
    });


              }
   });
                
</script>
    @endsection