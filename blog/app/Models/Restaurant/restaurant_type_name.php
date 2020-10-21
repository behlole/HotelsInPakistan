<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class restaurant_type_name extends Model
{
    //
     use Uuids;
    public $incrementing = false;


    public static function types_name() {
    	$data=restaurant_type_name::all();

       return $data;
   }
   public static function selected_types_name($restaurant_id){
   	$data=restaurant_type_name::join('restaurant_types','restaurant_type_names.id','=','restaurant_types.restaurant_type_id')->where('restaurant_types.restaurant_id','=',$restaurant_id)->get();
   	return $data;


		
   }
  
}
