<?php

namespace App\Models\Car;


use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class brand extends Model
{
    //
     use Uuids;
     public $incrementing = false;

    public static function brand_name($var1) {

    	$brand_type=brand::where('id','=', $var1)->select('brand_type')->first();

    	return $brand_type->brand_type;

    	
    // do something
}


}
