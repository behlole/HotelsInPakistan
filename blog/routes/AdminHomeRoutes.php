<?php
Route::group(['middleware' => ['auth','verified','role:admin']], function () {

Route::get('Home_Pending','Admin\AdminHomeController@Home_Pending');

Route::get('search_home_by_pending','Admin\AdminHomeController@search_home_by_pending');

Route::post('Perform_Home_Pending_Approval','Admin\AdminHomeController@Perform_Home_Pending_Approval');


Route::get('Home_Approved','Admin\AdminHomeController@Home_Approved');

Route::post('Perform_Home_Featured_And_Hide','Admin\AdminHomeController@Perform_Home_Featured_And_Hide');

Route::get('Search_Home_Approved_or_Hide','Admin\AdminHomeController@Search_Home_Approved_or_Hide');


//Home Premiume Listing By City
Route::get('Home_Premiume_Listing_By_City','Admin\AdminHomeController@Home_Premiume_Listing_By_City');


Route::post('Perform_Premiume_By_City_HOME','Admin\AdminHomeController@Perform_Premiume_By_City_HOME');

Route::get('Search_Home_Premiume','Admin\AdminHomeController@Search_Home_Premiume');


});