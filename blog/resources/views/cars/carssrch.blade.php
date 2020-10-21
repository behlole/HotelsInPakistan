 <div class="_mob-h">
                @foreach($cars as $c)
                <?php  $varath = 'cars_image/'.$c->car_folder.'/'.$c->car_pic;

                    $varath2 = 'caropr_image/'.$c->car_opr_folder.'/'.$c->ageny_logo;

                      ?>

                <div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
                  <div class="theme-search-results-item-preview">
                    <a class="theme-search-results-item-mask-link" href="{{ URL('car_details',$c->caropr_id) }}"></a>
                    <div class="row" data-gutter="20">
                      <div class="col-md-4 ">
                        <div class="theme-search-results-item-img-wrap">
                          <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" alt="Image Alternative text" title="Image Title"/>
                        </div>

                        <ul class="theme-search-results-item-car-feature-list">
                          <li>
                            <i class="fa fa-male"></i>
                            <span>{{$c->passengers}}</span>
                          </li>
                          <li>
                            <i class="fa fa-suitcase"></i>
                            <span>{{$c->bags}}</span>
                          </li>
                          <li>
                            <i class="fa fa-cog"></i>
                            <span>{{$c->transmission_type}}</span>
                          </li>
                          <li>
                            <i class="fa fa-snowflake-o"></i>
                            <span>{{$c->ac}}</span>
                          </li>
                        </ul>

                               
                             
                      </div>

                      <div class="col-md-5 ">
                        <h5 class="theme-search-results-item-title _fw-b _mb-20 _fs theme-search-results-item-title-lg">{{$c->car_title}}</h5>
                        <div class="theme-search-results-item-car-location">
                          <i class="fa fa-plane theme-search-results-item-car-location-icon"></i>
                          <div class="theme-search-results-item-car-location-body">
                            <p class="theme-search-results-item-car-location-title">{{$c->details}}</p>
                            <p class="theme-search-results-item-car-location-subtitle">{{$c->city}}</p>
                          </div>
                        </div>
                        <ul class="theme-search-results-item-car-list">
                          <li>
                            <i class="fa fa-check"></i>{{$c->model}}
                          </li>
                          <li>
                            <i class="fa fa-check"></i>{{$c->brand}}
                          </li>
                           <li>
                            <i class="fa fa-check"></i>{{$c->fuel}}
                          </li>
                        </ul>
                       



                      </div>
                      <div class="col-md-3 ">
                        <div class="theme-search-results-item-book">
                          <div class="theme-search-results-item-price">
                            <p class="theme-search-results-item-price-tag">PKR {{$c->car_price}}</p>
                            <p class="theme-search-results-item-price-sign">Per Day</p>
                          </div>
                        
                        </div>

                        <div class="theme-search-results-item-book">
                           <img style="float: right;margin-top: 30px;" class="theme-search-results-item-flight-section-airline-logo" src="<?php echo($varath2);  ?>" alt="{{$c->caropr_name}}" title="Image Title"/>
                          
                            <div class="theme-search-results-item-price">
                            
                          </div>
                        </div>



                      </div>

                    </div>
                      <p style="color: black;float: right;font-weight: 600" class="theme-search-results-item-price-sign">{{$c->caropr_name}}</p>

                  </div>


                </div>
                @endforeach
                 {{$cars->links()}}
              </div>
              <div class="_desk-h">
                 @foreach($cars as $c)
                <?php  $varath = 'cars_image/'.$c->car_folder.'/'.$c->car_pic;

                    $varath2 = 'caropr_image/'.$c->car_opr_folder.'/'.$c->ageny_logo;

                      ?>
               
               
                <div class="theme-search-results-item _br-3 _mb-20 _bsh-xl theme-search-results-item-grid">
                  <div class="_h-30vh theme-search-results-item-img-wrap-inner">
                    <img class="theme-search-results-item-img" src="<?php echo($varath);  ?>" alt="Image Alternative text" title="Image Title"/>

                  </div>
                  <div class="theme-search-results-item-grid-body _pt-0">
                    <a class="theme-search-results-item-mask-link" href="{{ URL('car_details',$c->caropr_id) }}"></a>
                    <div class="theme-search-results-item-grid-header">
                      <h5 class="theme-search-results-item-title _fs">{{$c->car_title}}</h5>
                    </div>
                    <div class="theme-search-results-item-grid-caption">
                      <div class="row" data-gutter="10">
                        <div class="col-xs-9 ">
                          <div class="theme-search-results-item-car-location">
                            <i class="fa fa-plane theme-search-results-item-car-location-icon"></i>
                            <div class="theme-search-results-item-car-location-body">
                              <p class="theme-search-results-item-car-location-title">{{$c->details}}</p>
                              <p class="theme-search-results-item-car-location-subtitle">{{$c->city}}</p>
                               <p class="theme-search-results-item-car-location-subtitle">{{$c->caropr_name}}</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-3 ">
                          <div class="theme-search-results-item-price">
                            <p class="theme-search-results-item-price-tag">PKR {{$c->car_price}}</p>
                            <p class="theme-search-results-item-price-sign">Per Day</p>
                          </div>
                            <img style="float: right;" class="theme-search-results-item-img" src="<?php echo($varath2);  ?>" alt="Image Alternative text" title="Image Title"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    @endforeach
                {{$cars->links()}}
              </div>