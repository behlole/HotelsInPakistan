<?php

Route::get('welcome_to_cars','Car\CarHome@welcome_to_cars');

Route::post('search_all_cars','Car\CarHome@search_all_cars');

Route::get('all_car_by_agency/{id}','Car\CarHome@all_car_by_agency');



//if all serches  are going to be done by users...master query for all varaiables 
Route::get('Car_Serach_By_Filter/{city_names}/{vehicle_types}/{brands}/{ratting}/{dateorder}/{maxprice}/{minprice}', 'Car\CarHome@Car_Serach_By_Filter');

Route::get('getCarByName/{hotel_name}', 'Car\CarHome@getCarByName');