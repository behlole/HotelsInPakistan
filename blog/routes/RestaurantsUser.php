<?php
//welcome to restaurant page
Route::get('/welcome_to_restaurant' , 'Resturant\RestaurantController@welcome_to_restaurant');


Route::match(['get', 'post'], 'search_all_restaurants',[
        'as' => 'search_all_restaurants',
        'uses' => 'Resturant\RestaurantController@search_all_restaurants' ]);
//single details
// Route::get('resturants_single_details/{id}', 'Resturant\RestaurantController@resturants_single_details');


Route::get("resturants_single_details/{id}",["uses"=>"Resturant\RestaurantController@resturants_single_details","middleware"=>"CheckResturantStatus"]);


//ajax
Route::get('restaurant_search_by_types/{city_names}/{arr}/{ratting}/{dateorder}', 'Resturant\RestaurantController@restaurant_search_by_types');

Route::get('get_only_restaurant_by_ratting_date/{city_names}/{ratting}/{dateorder}', 'Resturant\RestaurantController@get_only_restaurant_by_ratting_date');

Route::get('getResByName/{serchbyname}', 'Resturant\RestaurantController@getResByName');

// Resturant_review post request
Route::post('Resturant_review/{id}', 'Resturant\RestaurantController@Resturant_review');

