<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class restaurant_reviews extends Model
{
    //
public $table = "restaurant_reviews";

  use Uuids;
     public $incrementing = false;

}
