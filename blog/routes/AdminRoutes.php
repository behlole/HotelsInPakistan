<?php
Route::group(['middleware' => ['auth','verified','role:admin']], function () {
Route::get('/adminpannel','Admin\MasterAdmin@welcome_to_admin');
//Ads Routes
Route::get('/Hotel_Ads','Admin\AdminAdsController@Hotel_Ads');
Route::get('/Home_Ads','Admin\AdminAdsController@Home_Ads');
Route::get('/Restaurant_Ads','Admin\AdminAdsController@Restaurant_Ads');
Route::get('/Car_Ads','Admin\AdminAdsController@Car_Ads');
Route::post('perform_multiple_ads','Admin\AdminAdsController@perform_multiple_ads');
Route::post('add_ads_db','Admin\AdminAdsController@add_ads_db');
Route::get('/Update_ads/{id}','Admin\AdminAdsController@Update_ads');
Route::post('update_ads_db','Admin\AdminAdsController@update_ads_db');

//Destination Routes
Route::get('Top_Destination','Admin\DestinationController@Top_Destination');
Route::post('Add_Destination','Admin\DestinationController@Add_Destination');
Route::get('Update_destination/{id}','Admin\DestinationController@Update_destination');
Route::post('Update_Destination_db','Admin\DestinationController@Update_Destination_db');
Route::post('perform_multiple_destination_opertions','Admin\DestinationController@perform_multiple_destination_opertions');

//Room Options

Route::get('Add_Room_Options','Admin\AdminRoomController@Add_Room_Options');
Route::post('Add_bed_options','Admin\AdminRoomController@Add_bed_options');

//add room types

Route::get('Add_Room_Types','Admin\AdminRoomController@Add_Room_Types');
Route::get('Add_Room_Name/{id}','Admin\AdminRoomController@Add_Room_Name');
Route::post('Add_Room_Name_db','Admin\AdminRoomController@Add_Room_Name_db');

//Add Hotel/Home/Room Features
Route::get('Add_Features','Admin\AdminFeatureController@Add_Features');
Route::post('Add_new_Feature_to_db','Admin\AdminFeatureController@Add_new_Feature_to_db');
Route::get('Add_Facilities_Options/{id}','Admin\AdminFeatureController@Add_Facilities_Options');

//Add Car brands,Types

Route::get('Add_Car_Brands','Admin\CarAdmin@Add_Car_Brands');
Route::post('Add_Car_Brands_db','Admin\CarAdmin@Add_Car_Brands_db');
Route::get('Add_Car_types','Admin\CarAdmin@Add_Car_types');
Route::post('Add_Car_Types_db','Admin\CarAdmin@Add_Car_Types_db');

//Add_Restaurant_types
Route::get('Add_Restaurant_types','Admin\RestaurantAdmin@Add_Restaurant_types');
Route::post('Add_Restaurant_Types_db','Admin\RestaurantAdmin@Add_Restaurant_Types_db');

});