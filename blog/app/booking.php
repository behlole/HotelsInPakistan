<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
 use Uuids;
 public $incrementing = false;

	 public static function check_home_booking($var1) {

        $date_check=date("Y-m-d");
    	$data=booking::where('home_id','=', $var1)->where('check_out','>=',$date_check)->count();
    	
        

       if($data==1){

            return "booked";

       }else{
         return "notbooked";
       }
   
    	

    	
    // do something
}
public static function check_home_booking_count($var1) {

        
    	$data=booking::where('home_id','=', $var1)->count();
    	
        return $data;
        
      
    	

    	
    // do something
}
    //
}
