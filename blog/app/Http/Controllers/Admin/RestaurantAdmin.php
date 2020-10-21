<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Restaurant\restaurant_type_name;
use App\Http\Controllers\Controller;
class RestaurantAdmin extends Controller
{
    function Add_Restaurant_types()
    {
    	$data=restaurant_type_name::all();
		return view('Admin/Resturant/Add_Restaurant_types',compact('data'));
    }

    function Add_Restaurant_Types_db(Request $request){
    	
    	$this->validate($request, [
			'restaurant_type_names' => 'required|unique:restaurant_type_names',
		]);
		$restaurant_type =  new restaurant_type_name;
		$restaurant_type->restaurant_type_names = $request->restaurant_type_names;
		$restaurant_type->save();
		return redirect()->back()->with('status_ok', 'Type Added');
    }
}
