<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class destination extends Model
{
    //
     use Uuids;


public $incrementing = false;
   

public static function des_image_find($var1) {


    	

    	 $data_pic=destination::where('des_status','=', 1)->where('des_city','=', $var1)->select('destinations.ads_folder as ads_folder','destinations.des_pic as des_pic')->get();

    	return $data_pic;

    	
    // do something
}

}
