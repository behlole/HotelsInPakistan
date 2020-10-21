<?php

namespace App\Models\Hotel;
use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class hotel_facility extends Model
{
    //
     use Uuids;
     public $incrementing = false;


     public static function all_hotel_facility() 
     {
     	$data=hotel_facility::join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')->select('sub_facilities.*','hotel_facilities.*','hotel_facilities.id as main_id','sub_facilities.id as sub_facilities_id')->where('hotel_facilities.room_show','=', "NO")->orderBy('hotel_facilities.id', 'desc')->orderBy('hotel_facilities.facilities_type')->get();
     	return $data;
     }
     public static function all_room_facility() 
     {
     	$data=hotel_facility::join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')
          ->select('sub_facilities.*','hotel_facilities.*','hotel_facilities.id as main_id','sub_facilities.id as sub_facilities_id')->where('hotel_facilities.room_show','=', "YES")
          ->orderBy('hotel_facilities.facilities_type')->get();
     	return $data;
     }


   
}
