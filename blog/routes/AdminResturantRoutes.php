<?php
Route::group(['middleware' => ['auth','verified','role:admin']], function () {

Route::get('Restaurant_Pending','Admin\AdminRestaurantController@Restaurant_Pending');

Route::get('search_Resturant_by_pending','Admin\AdminRestaurantController@search_Resturant_by_pending');

Route::post('Resturant_Pending_Approval','Admin\AdminRestaurantController@Resturant_Pending_Approval');


Route::get('Restaurant_Approved','Admin\AdminRestaurantController@Restaurant_Approved');

Route::post('Perform_Restaurant_Featured_And_Hide','Admin\AdminRestaurantController@Perform_Restaurant_Featured_And_Hide');

Route::get('Search_Restaurant_Approved_or_Hide','Admin\AdminRestaurantController@Search_Restaurant_Approved_or_Hide');


//Restaurant Premiume Listing By City
Route::get('Restaurant_Premiume_Listing_By_City','Admin\AdminRestaurantController@Restaurant_Premiume_Listing_By_City');


Route::post('Perform_Restaurant_Premiume_By_City','Admin\AdminRestaurantController@Perform_Restaurant_Premiume_By_City');
Route::get('Search_Restaurant_Premiume','Admin\AdminRestaurantController@Search_Restaurant_Premiume');



});