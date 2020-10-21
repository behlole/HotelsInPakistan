<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class roomtype extends Model
{
    //
     use Uuids;
     public $incrementing = false;

     public static function master_type_id_find($var1) {

     	$data=roomtype::join('roomnames','roomnames.room_type_id','=','roomtypes.id')->where('roomnames.id','=', $var1)->select('roomtypes.roomtypes as master_name','roomtypes.id as master_id','roomtypes.bed_size_option as bed_size_option')->get();

    	return $data;

   

    	
    	
    // do something
}
}
