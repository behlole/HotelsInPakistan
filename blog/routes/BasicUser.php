<?php

//for adding of reviews to hotel and home

Route::get('/', 'User\UserController@welcome')->name('home');


Route::post('add_hotel_review/{id}', 'User\UserController@add_hotel_review');

//city serching
Route::get('select2-autocomplete-ajax', 'User\UserController@dataAjax');



Route::post('car_agency_review/{id}', 'User\UserController@car_agency_review');


Route::get('External_links/{links}', 'User\UserController@External_links');


