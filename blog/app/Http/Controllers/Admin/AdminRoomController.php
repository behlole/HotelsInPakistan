<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room\bed_options;
use App\Models\Room\roomtype;
use App\Models\Room\roomname;

class AdminRoomController extends Controller
{

	function Add_Room_Options(){
		$data=bed_options::all();
		return view('Admin/Room/Room_Options',compact('data'));

	}
	function Add_bed_options(Request $request){
		$this->validate($request, [
			'bed_name' => 'required|unique:bed_options',
			'bed_size' => 'max:255',
			'guest_space' => 'required',

		]);
		$bed_options =  new bed_options;
		$bed_options->bed_name = $request->bed_name;
		$bed_options->bed_size = $request->bed_size;
		$bed_options->guest_space = $request->guest_space;
		$bed_options->save();

		return redirect('Add_Room_Options')->with('status_ok', 'Room Updated');
	}

	function Add_Room_Types(){
		$data=roomtype::all();
		return view('Admin/Room/Room_Types',compact('data'));

	}

	function Add_Room_Name($type_id){

		$data=roomname::where('room_type_id','=',$type_id)->get();

		return view('Admin/Room/Add_Room_Name',compact('data','type_id'));
	}
	function Add_Room_Name_db(Request $request){
		$this->validate($request, [
			'room_name' => 'required|unique:roomnames',

		]);
		$bed_options =  new roomname;
		$bed_options->room_name = $request->room_name;
		$bed_options->room_type_id = $request->type_id;
		$bed_options->save();
		
 return redirect()->back()->with('status_ok', 'Room Name Added');
	}
}
