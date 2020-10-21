<?php

Route::get('welcome_to_hotel','Hotel\HotelController@welcome_to_hotel');



Route::post('search_all_hotel','Hotel\HotelController@search_all_hotel');



//if all serches  are going to be done by users...master query for all varaiables 
Route::get('Hotel_Serach_By_Filter/{city_names}/{home_type}/{hotel_features}/{ratting}/{dateorder}/{maxprice}/{minprice}', 'Hotel\HotelController@Hotel_Serach_By_Filter');

Route::get('getHotelByName/{hotel_name}', 'Hotel\HotelController@getHotelByName');


Route::get("hotel_details/{id}",["uses"=>"Hotel\HotelController@hotel_details","middleware"=>"CheckHotelStatus"]);


Route::get('search_for_hotel_room/{check_in}/{check_out}/{no_of_rooms}/{no_of_guest}/{hotel_id}','Hotel\HotelController@search_for_hotel_room');



