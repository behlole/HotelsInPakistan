<?php

namespace App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use App\Uuids;

class car_opr extends Model
{
    //
  use Uuids;

    public $incrementing = false;

     public static function price_find($var1) {


    	
    	$car_price=car_opr::join('cars','car_oprs.id','=','cars.car_opr_id')->where('car_oprs.id','=', $var1)->min('cars.car_price');

    	return $car_price;

    	
    // do something
}
}
