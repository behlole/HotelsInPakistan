<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Car\vehicle_type;
use App\Models\Car\brand;
class CarAdmin extends Controller
{
	public function Add_Car_Brands()
	{
		$data=brand::all();
		return view('Admin/Car/Add_Car_Brands',compact('data'));
	}
	public function Add_Car_Brands_db(Request $request)
	{
		$this->validate($request, [
			'brand_type' => 'required|unique:brands',
		]);
		$brand =  new brand;
		$brand->brand_type = $request->brand_type;
		$brand->save();
		return redirect()->back()->with('status_ok', 'Brand Added');

	}
	public function Add_Car_Types()
	{
		$data=vehicle_type::all();
		return view('Admin/Car/AddCarType',compact('data'));
	}
	public function Add_Car_Types_db(Request $request)
	{
		$this->validate($request, [
			'vehicle_type' => 'required|unique:vehicle_types',
		]);
		$vehicle_type =  new vehicle_type;
		$vehicle_type->vehicle_type = $request->vehicle_type;
		$vehicle_type->save();
		return redirect()->back()->with('status_ok', 'Type Added');
	}
	
}
