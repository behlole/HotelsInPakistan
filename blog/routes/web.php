<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/








//caruser


Route::get('booking_room/{id}','Hotel\HotelController@booking_room');
Route::post('room_booking_confirmed/{id}','Hotel\HotelController@booking_room_confiremd');

Route::post('destination_show', 'Hotel\HotelController@searchhotel');
Route::get('/logout', 'Auth\LoginController@logout');
Route::group(['verify' => false], function () {

	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
	Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
	Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});

Route::group(['verify' => true], function () {

	Auth::routes(['verify' => true]);
});



