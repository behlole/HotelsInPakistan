<?php
Route::group(['middleware' => ['auth','verified']], function () {

//add new restuarants

	Route::get('/add_new_restaurant' , 'Resturant\RestaurantListingController@add_new_restaurant');
 //post request 
	Route::post('/add_res_listing_db' , 'Resturant\RestaurantListingController@add_res_listing_db');
 //add_restaurant_details
	Route::get('add_restaurant_details/{id}','Resturant\RestaurantListingController@add_restaurant_details');
//post request 
	Route::post('add_restaurant_details_db/{id}','Resturant\RestaurantListingController@add_restaurant_details_db');
//add pictures
	Route::get('add_restaurant_pictures/{id}','Resturant\RestaurantListingController@add_restaurant_pictures');
//ajax request

	Route::post('add_restaurant_pictures_db/{id}','Resturant\RestaurantListingController@add_restaurant_pictures_db');
//restuarnts_finished_listing
	Route::get('restuarnts_finished_listing/{id}','Resturant\RestaurantListingController@restuarnts_finished_listing');
//update basic info
	Route::get('restuarants_edit/{id}','Resturant\RestaurantListingController@restuarants_edit');	
//post request
	Route::post('update_restaurant/{id}','Resturant\RestaurantListingController@update_restaurant');

//details update
	Route::get('editResDetails/{id}','Resturant\RestaurantListingController@editResDetails');	
//update is same as inseret but form check is differenrt

	Route::get('editResPics/{id}','Resturant\RestaurantListingController@editResPics');	

//ajax Request to delete and featured pic
	Route::get('picdelete_res/{removid}/{id}','Resturant\RestaurantListingController@picdelete_res');
	Route::get('MakeResFeatured/{Fearured_id}/{res_id}/{res_pic_id}','Resturant\RestaurantListingController@MakeResFeatured'); 


	//for listed resturants 
Route::get('/view_all_my_resturants' , 'Resturant\RestaurantListingController@view_all_my_resturants');


Route::get('/CompleteResListing/{resturant_id}' , 'Resturant\RestaurantListingController@CompleteResListing');




});


// Route::get('add_hotel_intro/{id}', 'HotelController@add_hotel_intro');
