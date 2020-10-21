<?php
Route::group(['middleware' => ['auth','verified']], function () {
	//new listing form and post request
	Route::get('new_agency_listing', 'Car\CarAgencyListing@new_agency_listing');
	Route::post('new_agency_listing_db', 'Car\CarAgencyListing@new_agency_listing_db');

   // car deatils 
	Route::get('car_opr_details/{id}', 'Car\CarAgencyListing@car_opr_details');
	Route::post('add_deatils_car_agency_db/{id}', 'Car\CarAgencyListing@add_deatils_car_agency_db');


    Route::get('add_cars_loop/{id}', 'Car\CarAgencyListing@add_cars_loop');
    Route::post('new_car_listing_db/{id}', 'Car\CarAgencyListing@new_car_listing_db');		


//car other images

    
    Route::get('add_cars_picture/{id}', 'Car\CarAgencyListing@add_cars_picture');
    Route::post('add_cars_pictures_db/{id}', 'Car\CarAgencyListing@add_cars_pictures_db');
//
    //form looping for add new cars
    Route::get('car_loop_form/{id}', 'Car\CarAgencyListing@car_loop_form');

    //car update routes
  Route::get('car_update/{id}', 'Car\CarAgencyListing@car_update');
  Route::post('car_update_db/{id}', 'Car\CarAgencyListing@car_update_db');
 //car uptae id
  Route::get('editCarPics/{id}', 'Car\CarAgencyListing@editCarPics');
  //ajax request


Route::get('picdelete_cars/{removid}/{id}','Car\CarAgencyListing@picdelete_cars');



//edit agency
Route::get('editCarAgency/{agency_id}', 'Car\CarAgencyListing@editCarAgency');
Route::post('Car_Agency_Update/{id}', 'Car\CarAgencyListing@Car_Agency_Update');
Route::get('editAgencyDetails/{id}', 'Car\CarAgencyListing@editAgencyDetails');




Route::get('view_cars', 'Car\CarAgencyListing@view_cars');

	});