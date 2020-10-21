  <form  action="{{url('search_all_cars')}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data" style="color:black;">
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