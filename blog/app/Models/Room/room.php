<?php

namespace App\Models\Room;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class room extends Model
{
    //
     use Uuids;
     public $incrementing = false;

      public static function hotel_price_start($var1) {


    	$data=room::where('hotel_id','=', $var1)->min('room_price_night');

    	return $data;

    	
    	
    // do something
}
}
