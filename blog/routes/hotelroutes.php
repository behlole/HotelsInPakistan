<?php
Route::group(['middleware' => ['auth','verified']], function () {
//add new hotel
	Route::get('/hotel_listings' , 'Hotel\HotelListingController@hotel_listing');
	Route::post('add_hotel_listing', 'Hotel\HotelListingController@add_hotel_listing');
 //Ck editor 
	Route::get('add_hotel_details/{id}','Hotel\HotelListingController@add_hotel_details');
	Route::post('add_hotel_details_db/{id}', 'Hotel\HotelListingController@add_hotel_details_db');
//home features

	Route::get('add_hotel_features/{id}','Hotel\HotelListingController@add_hotel_features');
	Route::post('add_hotel_features_db/{id}', 'Hotel\HotelListingController@add_hotel_features_db');
//home_policies
	Route::get('add_hotel_poloicies/{id}','Hotel\HotelListingController@add_hotel_poloicies');
	Route::post('add_hotel_policies_db/{id}', 'Hotel\HotelListingController@add_hotel_policies_db');
	 //home_photos

	Route::get('add_hotel_photos/{id}','Hotel\HotelListingController@add_hotel_photos');
	Route::post('add_hotel_pic/{id}', 'Hotel\HotelListingController@add_hotel_pic');

  //home_payments

	Route::get('add_hotel_payment/{id}','Hotel\HotelListingController@add_hotel_payment');
	Route::post('add_hotel_payemnts_db/{id}', 'Hotel\HotelListingController@add_hotel_payemnts_db');
 //home update basic info
	Route::get('updatehotelinfo/{id}','Hotel\HotelListingController@updatehotelinfo');
	Route::post('update_hotel_info/{id}', 'Hotel\HotelListingController@update_hotel_info');	
//ck update	
	Route::get('editHotelDetails/{id}','Hotel\HotelListingController@editHotelDetails');

 //update features of home
    Route::get('editHotelFeatures/{id}','Hotel\HotelListingController@editHotelFeatures');	
  //update post is same as add new features just form check is edit
   //edit home policies 
    Route::get('editHotelPolicies/{id}','Hotel\HotelListingController@editHotelPolicies');

  //editHomePhoto
    //editHomePhoto
    Route::get('editHotelPhoto/{id}','Hotel\HotelListingController@editHotelPhoto');
    //ajax call to delete home pics
    Route::get('picdelete_hotel/{removid}/{id}','Hotel\HotelListingController@picdelete_hotel');
    Route::get('MakeHotelFeatured/{Fearured_id}/{home_id}/{hotel_pic_parent_id}','Hotel\HotelListingController@MakeHotelFeatured');

    //edit payment
   Route::get('editHotelPayments/{id}','Hotel\HotelListingController@editHotelPayments');


   //view all hotel add by user
   Route::get('/view_hotels' , 'Hotel\HotelListingController@view_hotels');

});


// Route::get('add_hotel_intro/{id}', 'HotelController@add_hotel_intro');
