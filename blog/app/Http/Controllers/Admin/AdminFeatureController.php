<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Hotel\hotel_facility;
use App\Models\Hotel\sub_facility;
use App\Http\Controllers\Controller;
class AdminFeatureController extends Controller
{

	function Add_Features()
	{
		$data=hotel_facility::all();
		return view('Admin/Features/Add_Features',compact('data'));
	}
	function Add_new_Feature_to_db(Request $request){
		
		$this->validate($request, [
			'facilities_type' => 'required',
			'icon_awsome' => 'required'
			]);
		$hotel_facility =  new hotel_facility;
		$hotel_facility->facilities_type = $request->facilities_type;
		$hotel_facility->fa_main = $request->icon_awsome;
		$hotel_facility->save();
		return redirect()->back()->with('success', 'Added');
	}
	function Add_Facilities_Options($facility_id)
	{
		$data=hotel_facility::join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')->where('hotel_facilities.id','=', $facility_id)->select('sub_facilities.*')->get();
		
		return view('Admin/Features/Add_Facilities_Options',compact('data','facility_id'));
	}
	function Add_Sub_Options(Request $request){
		$this->validate($request, [
			'name_opt' => 'required',
			]);
		$sub_facility =  new sub_facility;
		$sub_facility->name = $request->name_opt;
		$sub_facility->parent_id = $request->facility_id;
		$sub_facility->save();
		return redirect()->back()->with('success', 'Added');
	}
}
