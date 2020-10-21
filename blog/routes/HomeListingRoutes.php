<?php
Route::group(['middleware' => ['auth','verified']], function () {
   //add new home
	Route::get('home_listing','Home\HomeListingController@home_listing');
	Route::post('add_home_listing', 'Home\HomeListingController@add_home_listing');

    //Ck editor 
	Route::get('add_home_details/{id}','Home\HomeListingController@add_home_details');
	Route::post('add_home_details_db/{id}', 'Home\HomeListingController@add_home_details_db');

    //home features

	Route::get('add_home_features/{id}','Home\HomeListingController@add_home_features');
	Route::post('add_home_features_db/{id}', 'Home\HomeListingController@add_home_features_db');
	

	//home_policies
	Route::get('add_home_poloicies/{id}','Home\HomeListingController@add_home_poloicies');
	Route::post('add_home_policies_db/{id}', 'Home\HomeListingController@add_home_policies_db');
    //home_photos

	Route::get('add_home_photos/{id}','Home\HomeListingController@add_home_photos');
	Route::post('add_home_pic/{id}', 'Home\HomeListingController@add_home_pic');
   //home_payments

	Route::get('add_home_payment/{id}','Home\HomeListingController@add_home_payment');
	Route::post('add_home_payemnts_db/{id}', 'Home\HomeListingController@add_home_payemnts_db');
   //home update basic info
	Route::get('editHomeinfo/{id}','Home\HomeListingController@editHomeinfo');
	Route::post('update_home_info/{id}', 'Home\HomeListingController@update_home_info');
  
  //home_edit details // update route is same as as 
    Route::get('editHomeDetails/{id}','Home\HomeListingController@editHomeDetails');

    //update features of home
    Route::get('editHomeFeatures/{id}','Home\HomeListingController@editHomeFeatures');
     //update post is same as add new features just form check is edit
   //edit home policies 
    Route::get('editHomePolicies/{id}','Home\HomeListingController@editHomePolicies');

  //editHomePhoto
    Route::get('editHomePhoto/{id}','Home\HomeListingController@editHomePhoto');
    //ajax call to delete home pics
    Route::get('picdelete_home/{removid}/{id}','Home\HomeListingController@picdelete_home');
    Route::get('MakeHomeFeatured/{Fearured_id}/{home_id}/{hotel_pic_parent_id}','Home\HomeListingController@MakeHomeFeatured');

  //edit payment
   Route::get('editHomePayments/{id}','Home\HomeListingController@editHomePayments');

 //view all home By User
   Route::get('view_all_home','Home\HomeListingController@view_all_home');

// complete Pending Section of Listing    
	
Route::get('CompleteHomeListing/{id}','Home\HomeListingController@CompleteHomeListing');

});