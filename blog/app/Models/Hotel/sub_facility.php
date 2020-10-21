<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class sub_facility extends Model
{
    //
	use Uuids;
	public $incrementing = false;


	public static function for_search_features_sidebar_home(){
		$data=sub_facility::where('home_search','=',1)->orderBy('name','DESC')->get();
		return $data;
	} 
	public static function for_search_features_sidebar_hotel(){

		$data=sub_facility::where('hotel_search','=',1)->orderBy('name','DESC')->get();
		return $data;
	} 
}
