<?php
namespace App\Models\Car;
use Illuminate\Database\Eloquent\Model;

class PremiumeAgency extends Model
{
    //

public static function city_name($prop_id) 
     {
     	$data=PremiumeAgency::join('city_names','premiume_agencies.city_id','=','city_names.id')->where('premiume_agencies.prop_id','=', $prop_id)->select('city_names.*','city_names.city_name as city')->get();
     	return $data;
     }


}
