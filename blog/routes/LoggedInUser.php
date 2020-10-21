<?php
Route::group(['middleware' => ['auth','verified']], function () {

	//Hotel And Room Start
		Route::get('/welcome_to_listing' , 'User\UserController@welcome_to_listing')->name('welcome_to_listing');

	Route::post('/my_profile_update' , 'User\UserController@my_profile_update');
	Route::get('/my_profile_password' , 'User\UserController@my_profile_password');

	Route::post('/my_profile_update_password' , 'User\UserController@my_profile_update_password');

	Route::get('/my_profile' , 'User\UserController@my_profile');

	

	Route::get('/all_listing_by_users' , 'User\UserController@all_listing_by_users')->name('add_listing');

	
	
//after login
Route::get('/home', 'User\UserController@index')->name('home');


//Hotels
Route::get('/hotel','User\UserController@showHotel');
Route::get('/hotel/add','User\UserController@addHotel');
Route::get('/booking_history/{status?}','User\UserController@showBookingHistory');
Route::get('/booking_report/{status?}','User\UserController@showBookingReport');
Route::get('/wishlist','User\UserController@showWishlist');

//Space

Route::get('/space','User\UserController@showSpace');
Route::get('/space/add','User\UserController@addSpace');
Route::get('/space/availability','User\UserController@showAvailability');
Route::get('/space/booking_report/{status?}','User\UserController@bookingSpaceReport');



//User details

Route::get('/enquiry-report','User\UserController@enquiry');


Route::post('/resturents','User\UserController@showResturents');
	
});