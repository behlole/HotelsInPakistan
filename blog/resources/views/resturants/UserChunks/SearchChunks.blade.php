
 <form  action="{{url('search_all_restaurants')}}" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="theme-search-area-form" id="hero-search-form">
                <div class="row" data-gutter="none">
                  <div class="col-md-4 ">
                    <div class="theme-search-area-section first theme-search-area-section-curved" >
                      <div class="theme-search-area-section-inner" style="border:none;">

                        <select class="theme-search-area-section-input  restaurant_city form-control"  name="city" style="width: 100%;" ></select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 ">
                    <div class="row" data-gutter="none">
                      <div class="col-md-4 ">
                        <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr" style="margin-left: 2px;">
                          <div class="theme-search-area-section-inner" style="">
                            <select name="restaurant_type"  class="theme-search-area-section-input 
                            " style="">
                            <option style="" value="All">All Type</option>@foreach($restaurant_types as $typesforsearch)
                            <option style="" value="{{$typesforsearch->id}}">{{$typesforsearch->restaurant_type_names}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 ">
                      <div class="theme-search-area-section theme-search-area-section-curved theme-search-area-section-sm theme-search-area-section-bg-white theme-search-area-section-no-border theme-search-area-section-mr">
                        <div class="theme-search-area-section-inner" style="">
                          <select name="ratting""  class="theme-search-area-section-input 
                          " style="">
                          <option style="" value="0">All Rattings</option>
                          <option style="" value="1.0">1.0</option>
                          <option style="" value="2.0">2.0</option>
                          <option  style="" value="3.0">3.0</option>
                          <option style="" value="4.0">4.0</option>
                          <option style="" value="5.0">5.0</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 ">
                  <button class="theme-search-area-submit _mt-0 theme-search-area-submit-curved theme-search-area-submit-sm theme-search-area-submit-no-border">Search</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>