<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class language extends Model
{
    //

     public static function language_names() {
    	$data=language::all();

       return $data;
   }
}
