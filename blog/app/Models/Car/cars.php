<?php
namespace App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use App\Uuids;
class cars extends Model
{
	   use Uuids;
    //
	 public $incrementing = false;
}
