<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel\destination;
use App\city_name;
use File;
class DestinationController extends Controller
{
    //

	function Top_Destination()
	{
		$data=destination::join('city_names','destinations.des_city','=','city_names.id')->select('destinations.*','city_names.city_name as city')->get();
		return view('Admin/Destination/Destination_Lists',compact('data'));
	}

	function Add_Destination(Request $request){
		$this->validate($request, [
			'title' => 'required',
			'city' => 'required',
			'des_image' => 'required',
		]);
		$destination = new destination;
		$destination->title = $request->title;
		$destination->des_city = $request->city;
		$destination->des_status = 1;
		$pic = $request->des_image;
		$data=time();
		$result = \File::makeDirectory('destination/' . $data . '/', 0777, true, true);
		$str = preg_replace('/\s+/', '', $pic->getClientOriginalName());
		$mainpic=time().'.'.$str;
		$upload_success = $pic->move('destination/' . $data . '/', $mainpic);
		$destination->des_pic=$mainpic;
		$destination->des_folder=$data;
		$destination->save();
		return redirect()->back()->with('status_ok', 'Destionation Added');
	}

	function Update_destination($id){

		$data=destination::join('city_names','destinations.des_city','=','city_names.id')->select('destinations.*','city_names.city_name as city','city_names.id as city_id')->where('destinations.id','=',$id)->get();
		return view('Admin/Destination/Update_destination',compact('data'));

	}
	function Update_Destination_db(Request $request){
		$destination = destination::find($request->des_id);

		if($request->title){
			$destination->title = $request->title;
		}
		$destination->des_city = $request->city;
		if($request->des_image){
			$dirpath='destination/'.$destination->des_folder.'/'.$destination->des_pic;
			if( File::delete($dirpath)){
				$pic = $request->des_image;
				$str = preg_replace('/\s+/', '', $pic->getClientOriginalName());
				$mainpic=time().'.'.$str;
				$upload_success = $pic->move('destination/' . $destination->des_folder . '/', $mainpic);
				$destination->des_pic=$mainpic;
			}
		}
		$destination->save(); 
		return redirect()->back()->with('status_ok', 'Destination  Updated');
	}

	function perform_multiple_destination_opertions(Request $request){
		$this->validate($request, [
			'check_list' => 'required',

		]);

		if($request->delete){
			if($request->answer=="mkr@11204"){
				foreach ($request->check_list as $key => $value) {
					$destination = destination::find($value);
					$dirpath='destination/'.$destination->des_folder;

					File::deleteDirectory($dirpath);
                    $destination->delete();
				}
			}
		}else{
			foreach ($request->check_list as $key => $value) {
			$destination = destination::find($value);
			$destination->des_status=$request->des_status;
			$destination->save();
			}


		}
return redirect()->back()->with('status_ok', 'Destination  Updated');

	}	
}
