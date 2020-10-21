<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel\Hotel;
use App\Models\Restaurant\restlist;
use App\city_name;
use App\User;
use App\province;
use App\Models\Room\room;
use App\Models\Car\car_opr;
use App\Models\Car\brand;
use App\Models\Car\vehicle_type;
use App\Models\Car\cars;
class MasterAdmin extends Controller
{
    //

	function welcome_to_admin()
	{

		
		$city=city_name::all()->count();
		$restlist=restlist::all()->count();
		$users=User::all()->count();
		$car_opr=car_opr::all()->count();
		$cars=cars::all()->count();
		$rooms=room::all()->count();

		$Hotel=Hotel::where('hotels.propcheck','=', 1)->count();
		$home=Hotel::where('hotels.propcheck','=', 2)->count();

		return view('Admin/welcome',compact('users','city','restlist','Hotel','rooms','home','car_opr','cars'));
	}

}
