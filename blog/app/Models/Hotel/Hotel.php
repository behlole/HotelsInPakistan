<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class Hotel extends Model
{
    //
     use Uuids;
     public $incrementing = false;


     public static function hotel_price_start($var1) {


    	$data=city_name::where('id','=', $var1)->select('city_name as city')->get();

    	return $data[0]->city;

    	
    // do something
}


}
