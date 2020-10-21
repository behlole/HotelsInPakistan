<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class PremiumListing extends Model
{
    //


    public static function city_name($prop_id) 
     {
     	$data=PremiumListing::join('city_names','premium_listings.city_id','=','city_names.id')->where('premium_listings.prop_id','=', $prop_id)->select('city_names.*','city_names.city_name as city')->get();
     	return $data;
     }

}
