<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class resad extends Model
{
    //
     use Uuids;
public $incrementing = false;

public static function ads_image_find($var1,$var2) {


    	
        $myArray = array("all", $var2);
        
    	 $data_pic=resad::where('ads_status_for_home','=', 1)->whereIn('ads_result_page_home',$myArray)->select('resads.ads_pic as ads_pic','resads.ads_folder as ads_folder','resads.*')->inRandomOrder()->take(1)->get();
        

    
    	return $data_pic;
    

    	
    // do something
}
public static function ads_image_find_results($var1,$var2) {


    	
        $myArray = array("all", $var2);
        
    	 $data_pic=resad::where('ads_status_for_home','=', 1)->whereIn('ads_result_page_home',$myArray)->select('resads.ads_pic as ads_pic','resads.ads_folder as ads_folder','resads.*')->inRandomOrder()->take(3)->get();
        

    
    	return $data_pic;
    

    	
    // do something
}



}
