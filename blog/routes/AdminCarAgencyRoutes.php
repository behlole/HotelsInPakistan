<?php
Route::group(['middleware' => ['auth','verified','role:admin']], function () {

Route::get('CarAgency_Pending','Admin\AdminCarController@CarAgency_Pending');

Route::get('search_CarAgency_by_pending','Admin\AdminCarController@search_CarAgency_by_pending');

Route::post('CarAgency_Pending_Approval','Admin\AdminCarController@CarAgency_Pending_Approval');


Route::get('CarAgency_Approved','Admin\AdminCarController@CarAgency_Approved');

Route::post('Perform_CarAgency_Featured_And_Hide','Admin\AdminCarController@Perform_CarAgency_Featured_And_Hide');

Route::get('Search_Car_Approved_or_Hide','Admin\AdminCarController@Search_Car_Approved_or_Hide');


//Car Premiume Listing By City
Route::get('CarAgency_Premiume_Listing_By_City','Admin\AdminCarController@CarAgency_Premiume_Listing_By_City');


Route::post('Perform_Premiume_By_City_Car','Admin\AdminCarController@Perform_Premiume_By_City_Car');

Route::get('Search_Car_Premiume','Admin\AdminCarController@Search_Car_Premiume');


});