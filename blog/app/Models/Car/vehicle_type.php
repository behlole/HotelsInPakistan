<?php

namespace App\Models\Car;


use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class vehicle_type extends Model
{
    //

   use Uuids;
     public $incrementing = false;


     public static function vehicle_name($var1) {

    	$vehicle_type=vehicle_type::where('id','=', $var1)->select('vehicle_type')->first();

    	return $vehicle_type->vehicle_type;

    	
    // do something
}
}
