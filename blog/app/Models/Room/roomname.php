<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class roomname extends Model
{
    //
     use Uuids;
     public $incrementing = false;


      public static function roomname_find($var1) {


    	$data=roomname::where('id','=', $var1)->select('roomnames.room_name as room_name')->get();

    	return $data[0]->room_name;

    	
    	
    // do something
}
 public static function bed_options($var1) {


    	$data=bed_options::where('id','=', $var1)->get();

    	return $data;

    	
    	
    // do something
}
}
