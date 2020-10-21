<?php
// welcome page of home
Route::get('welcome_to_home','Home\HomeController@welcome_to_home');

// seraching of homes
Route::post('search_all_home','Home\HomeController@search_all_home');


//if all serches  are going to be done by users...master query for all varaiables 
Route::get('Home_Serach_By_Filter/{city_names}/{home_type}/{home_features}/{ratting}/{dateorder}/{maxprice}/{minprice}', 'Home\HomeController@Home_Serach_By_Filter');


Route::get('getHomeByName/{home_name}', 'Home\HomeController@getHomeByName');


Route::get("home_details/{id}",["uses"=>"Home\HomeController@home_details","middleware"=>"CheckHotelStatus"]);





