<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city_name extends Model
{
    //


    public static function city_name_find($var1) {


    	$data=city_name::where('id','=', $var1)->select('city_name as city')->first();

    	return $data->city;

    	
    // do something
}
}
