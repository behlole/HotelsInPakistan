<?php
namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;

class restaurant_premiume extends Model
{
    //


public static function city_name($prop_id) 
     {
     	$data=restaurant_premiume::join('city_names','restaurant_premiumes.city_id','=','city_names.id')->where('restaurant_premiumes.prop_id','=', $prop_id)->select('city_names.*','city_names.city_name as city')->get();
     	return $data;
     }


}
