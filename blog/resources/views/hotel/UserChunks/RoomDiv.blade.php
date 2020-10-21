<div id="booking-scroll">
  
    <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
    <div class="theme-search-area _p-30 _bg-p _mb-30 _br-3 theme-search-area-white">
      <div class="row">
        <div class="col-md-3 ">
          <div class="theme-search-area-header theme-search-area-header-sm">
            <h1 class="theme-search-area-title">Choose Your Room</h1>
            <p class="theme-search-area-subtitle">best prices guaranteed</p>
          </div>
        </div>
        <div class="col-md-9 ">
          <div class="theme-search-area-form">
            <div class="row" data-gutter="10">
              <div class="col-md-11 ">
                <div class="row" data-gutter="10">
                  <div class="col-md-3 ">
                    <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                      <div class="theme-search-area-section-inner">
                        <i class="theme-search-area-section-icon lin lin-calendar"></i>
                        <input class="theme-search-area-section-input datePickerStart _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" placeholder="Check-in"/ name="Check_in">
                        <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 ">
                    <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved">
                      <div class="theme-search-area-section-inner">
                        <i class="theme-search-area-section-icon lin lin-calendar"></i>
                        <input class="theme-search-area-section-input datePickerEnd _mob-h" value="<?php echo date("d-m-Y"); ?>" type="text" placeholder="Check-out"/ name="Check_out">
                        <input class="theme-search-area-section-input _desk-h mobile-picker" value="<?php echo date("d-m-Y"); ?>" type="date"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 ">
                    <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="Rooms">
                      <div class="theme-search-area-section-inner">
                        <i class="theme-search-area-section-icon lin lin-tag"></i>
                        <input class="theme-search-area-section-input" value="1 Room" type="text"/ name="no_of_rooms">
                        <div class="quantity-selector-box" id="HotelSearchRooms">
                          <div class="quantity-selector-inner">
                            <p class="quantity-selector-title">Rooms</p>
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
                  <div class="col-md-3 ">
                    <div class="theme-search-area-section theme-search-area-section-sm theme-search-area-section-no-border theme-search-area-section-fade-white theme-search-area-section-curved quantity-selector" data-increment="Guests">
                      <div class="theme-search-area-section-inner">
                        <i class="theme-search-area-section-icon lin lin-people"></i>
                        <input class="theme-search-area-section-input" value="2 Guests" type="text"/ name="no_of_guest">
                        <div class="quantity-selector-box" id="HotelSearchGuests">
                          <div class="quantity-selector-inner">
                            <p class="quantity-selector-title">Guests</p>
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
                <button id="search_room_button" class="theme-search-area-submit _mt-0 theme-search-area-submit-sm theme-search-area-submit-no-border theme-search-area-submit-curved">
                  <img src="" id="his_loading" width="35" height="30" style="display: none;">
                  <i class="theme-search-area-submit-icon fa fa-pencil" id="room_find_button"></i>
                  <span class="_desk-h">Search</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="theme-item-page-rooms-table _p-30 _bg-w _mb-mob-30">
  <table class="table">
    <thead>
      <tr>
        <th>Room type</th>
        <th>Max</th>
        <th>Options</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody id="room_table_body">
      @include('hotel.UserChunks.room_table_and_ajax')
  </tbody>
</table>
</div>