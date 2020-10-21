<?php
Route::group(['middleware' => ['auth','verified']], function () {
//add new room
	Route::get('addrooms/{id}', 'Room\RoomController@addrooms');
	Route::post('add_new_room_to_db/{hotel_id}','Room\RoomController@add_new_room_to_db');
 // add new features
	Route::get('add_room_features/{id}', 'Room\RoomController@add_room_features');
//post features
	Route::post('add_room_ammenties/{id}', 'Room\RoomController@add_room_ammenties');

//add_room_pics
	Route::get('add_room_pics/{id}','Room\RoomController@add_room_pics');
// ajax request dropzone js post
	Route::post('add_room_pics_db/{id}', 'Room\RoomController@add_room_pics_db');

//add loop of rooms
	Route::get('add_rooms/{id}','Room\RoomController@add_rooms'); 

//room_update
	Route::get('room_update/{id}','Room\RoomController@room_update');
	Route::post('update_room_info','Room\RoomController@update_room_info');

//editRoomAmenties
	Route::get('editRoomAmenties/{id}','Room\RoomController@editRoomAmenties');
//post route is same as add

//update pics
	Route::get('editRoomPictures/{id}','Room\RoomController@editRoomPictures');
	
	
	Route::get('pic_delete_room/{removid}/{id}','Room\RoomController@pic_delete_room');
	Route::get('MakeRoomPicFeatured/{Fearured_id}/{room_id}/{room_pic_id}','Room\RoomController@MakeRoomPicFeatured');

	
Route::get('getroomnames/{id}','Room\RoomController@getroomnames');
	
});