<?php
Route::group(['middleware' => ['auth','verified','role:admin']], function () {

Route::get('Hotel_Pending','Admin\AdminHotelController@Hotel_Pending');

Route::get('search_hotel_by_pending','Admin\AdminHotelController@search_hotel_by_pending');

Route::post('Perform_Hotel_Pending_Approval','Admin\AdminHotelController@Perform_Hotel_Pending_Approval');


Route::get('Hotel_Approved','Admin\AdminHotelController@Hotel_Approved');

Route::post('Perform_Hotel_Featured_And_Hide','Admin\AdminHotelController@Perform_Hotel_Featured_And_Hide');

Route::get('Search_Hotel_Approved_or_Hide','Admin\AdminHotelController@Search_Hotel_Approved_or_Hide');


//Hotel Premiume Listing By City
Route::get('Hotel_Premiume_Listing_By_City','Admin\AdminHotelController@Hotel_Premiume_Listing_By_City');


Route::post('Perform_Premiume_By_City','Admin\AdminHotelController@Perform_Premiume_By_City');
Route::get('Search_Hotel_Premiume','Admin\AdminHotelController@Search_Hotel_Premiume');



});