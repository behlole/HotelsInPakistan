<?php
namespace App\Http\Controllers\Room;
use Illuminate\Http\Request;
use App\Models\Hotel\Hotel;
use App\Models\Room\room;
use App\Models\Room\roomtype;
use App\Models\Room\roomname;
use App\Models\Hotel\features_list;
use App\Models\Hotel\feature;
use Storage;
use App\Models\Room\room_pics;
use Illuminate\Support\Facades\Auth;
use App\Models\Room\bed_options;
use App\Models\Hotel\hotel_facility;
use App\Models\Hotel\sub_facility;
use App\Models\Hotel\selected_facilty;
use Session;
use File;
use DB;
use App\Models\Room\selectedroomfacility;
use App\Http\Controllers\Controller;
class RoomController extends Controller
{
	public function add_folder_pic($room_id){
			$data=time()+1200;
			$imageUpload = new room_pics;
			$imageUpload->foldername = $data;
			$imageUpload->room_id = $room_id;
			$imageUpload->save();
		}
//add new room
	function addrooms($hotel_id){
		$roomtype=roomtype::all();
		$data=bed_options::all();
		$hotels=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		$hotel_name=$hotels[0]->hotel_name;
		$rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->leftJoin('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.hotel_id','=', $hotel_id)->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')->get();
		return view('rooms/addrooms/add_room',compact('hotel_id','rooms','roomtype','data','hotel_name'));
	}
	//add new room to db post request
	function add_new_room_to_db(Request $request,$hotel_id){
		
		$this->validate($request, [
			'room_name_id' => 'required',
			'smookin_policy' => 'required',
			'no_of_rooms' => 'required|numeric',
			'custom_name' => 'string|max:255',
			'room_size' => 'required',
			'room_unit' => 'required',
			'room_price_night' => 'numeric',
		]);
		$room =new room;
		$room->room_name_id=$request->room_name_id;
		$room->smookin_policy=$request->smookin_policy;
		$room->room_size=$request->room_size;
		$room->room_unit=$request->room_unit;
		$room->no_of_rooms=$request->no_of_rooms;
		$room->custom_name=$request->custom_name;
		$room->hotel_id=$hotel_id;
		$room->room_price_night=$request->room_price_night;
		$room->room_status=0;
		if($request->extra_bed_options==1){
			$check=0;
			$check1=0;
			$check2=0;
			$check3=0;
			$str="";
			if($request->room_bed_count_option_1=="YES"){
				$room->option_1=$request->option_name_1;
				$room->option_1no=$request->option_number_1;
				$check++;
			}else{
				$str=$str.'PLEASE SELECT BED OPTION';
			}
			if($request->room_bed_count_option_2=="YES"){
				$room->option_2=$request->option_name_2;
				$room->option_2no=$request->option_number_2;
				$check++;
			}
			else{
				$str=$str.'PLEASE SELECT BED OPTION';
			}
			if($request->room_bed_count_option_3=="YES"){
				$room->option_3=$request->option_name_3;
				$room->option_3no=$request->option_number_3;
				$check++;
			}
			else{
				$str=$str.'PLEASE SELECT BED OPTION';
			}
			
			if($check>=1){
				$check1=0;
			}else{
				$check1=1;
			}
			if($request->discount_opts=="0"){
				$check2=1;
				$str=$str.'PLEASE SELECT DISCOUNT OPTION EITHER NO OR YES';
			}
			else{
				if($request->discount_opts=="YES"){
					if($request->discount<=0){
						$check3=1;
						$str=$str.'PLEASE INPUT GREATER THEN 0 VALUE';
					}
					if(!$request->discount_cond){
						$check3=1;
						$str=$str.'PLEASE INPUT CORRECT DISCOUNT CONDTIONS';
					}
					if($check3==0){
						$room->discount_cond=$request->discount_cond;
						$room->discount=$request->discount;
						$room->discount_chk=$request->discount_opts;
					}
				}
				else{
					$room->discount_chk=$request->discount_opts;
				}
			}
			if($check1==0 && $check2==0 && $check3==0){
				$room->total_people=$request->total_people;
				$room->save();
				$this->add_folder_pic($room->id);
				return redirect('add_room_features/'.$room->id);
			}
			else{
				return redirect()->back()->with('status_err', $str);

			}
		}
		else{
			$room->save();
			$this->add_folder_pic($room->id);
			return redirect('add_room_features/'.$room->id);

		}
		
	}
// add room features
	function add_room_features($room_id)
	{
		$rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->where('rooms.id','=', $room_id)->select('rooms.*','roomnames.room_name as roomname')->get();
		return view('rooms/addrooms/add_room_features',compact('rooms','room_id'));
	}
// post request of features	
	function add_room_ammenties(Request $request,$room_id){
         
		if($request->select_facilitie){
			DB::table('selectedroomfacilities')->where('selectedroomfacilities.room_id','=', $room_id)->delete();
			foreach ($request->select_facilitie as $select) {
				$select_facilitie=new selectedroomfacility;
				$select_facilitie->selected_facility_room=$select;
				$select_facilitie->room_id=$room_id;
				$select_facilitie->save();
			}
			if($request->form_check=="add"){
				return redirect('add_room_pics/'.$room_id);
		}
		if($request->form_check=="edit"){
			return redirect()->back()->with('status', 'Ammenties Updated SuccessFully');
		}

		}else{
			return redirect()->back()->with('danger', 'Please Select Some Features');
		}
		
	}
// adding new room pics
	function add_room_pics($room_id){
		
		$rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->join('hotels','rooms.hotel_id','=','hotels.id')->where('rooms.id','=', $room_id)->select('rooms.*', 'roomnames.room_name as roomname','hotels.hotel_name as hotel_name','hotels.id as hotel_id')->get();
		$hotel_id=$rooms[0]->hotel_id;
		$room_pics=room::join('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.id','=', $room_id)->select('room_pics.*')->get();
		
		$count_pics=0;

		return view('rooms/addrooms/add_room_pic',compact('count_pics','rooms','room_pics','room_id','hotel_id'));

	}
//ajax call
	function add_room_pics_db(Request $request,$room_id){
		$data="";
		$join=room::join('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.id','=', $room_id)->select('room_pics.*')->get();
		if(count($join)>0){
			$room_pics= room_pics::find($join[0]->id);
		}
		$image = $request->file('file');
		$imageName = $image->getClientOriginalName();
		$image->move(public_path('roomiamges/' . $join[0]->foldername . '/'),$imageName);
		if($join[0]->main_header==NULL){
			$room_pics->main_header=$imageName;
			$room_pics->save();
			$room_pics_check = room::find($room_id);
			$room_pics_check->photos =1;
			$room_pics_check->save(); 
		}
		return response()->json(['success'=>$imageName]);
	}
//add room loop for hotel 
	function add_rooms($hotel_id){
		$hotels=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		$hotel_name=$hotels[0]->hotel_name;
		$rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->leftJoin('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.hotel_id','=', $hotel_id)->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')->get();
		return view('rooms/addrooms/add_another_room',compact('hotel_id','rooms','hotel_name'));

	}			
//update room
	function room_update($room_id){
		$rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->join('hotels','rooms.hotel_id','=','hotels.id')->where('rooms.id','=', $room_id)->select('rooms.*', 'roomnames.room_name as roomname','hotels.hotel_name as hotel_name','hotels.id as hotel_id')->get();
		$roomtype=roomtype::all();
		$data=bed_options::all();

		return view('rooms/editroom/room_update_info',compact('rooms','roomtype','data','room_id'));
	}
	// update room function
	function update_room_info(Request $request){
		
		
		$this->validate($request, [
			'room_name_id' => 'required',
			'smookin_policy' => 'required',
			'no_of_rooms' => 'required|numeric',
			'custom_name' => 'string|max:255',
			'room_size' => 'required',
			'room_unit' => 'required',
			'room_price_night' => 'numeric',
		]);
		$room =room::find($request->room_id);
		$room->room_name_id=$request->room_name_id;
		$room->smookin_policy=$request->smookin_policy;
		$room->room_size=$request->room_size;
		$room->room_unit=$request->room_unit;
		$room->no_of_rooms=$request->no_of_rooms;
		$room->custom_name=$request->custom_name;
		$room->hotel_id=$request->hotel_id;
		$room->room_price_night=$request->room_price_night;
		$room->room_status="0";
		if($request->updated_room_bed_option_js=="1"){
			$check=0;
			$check1=0;
			$check2=0;
			$check3=0;
			$str="";
			if($request->room_bed_count_option_1=="YES"){
				$room->total_people=$request->total_people;	
				$room->option_1=$request->option_name_1;
				$room->option_1no=$request->option_number_1;
				$check++;
			}else{
				$room->option_1=null;
				$room->option_1no=null;
			}
			if($request->room_bed_count_option_2=="YES"){
				$room->option_2=$request->option_name_2;
				$room->option_2no=$request->option_number_2;
				$check++;
			}
			else{
				$room->option_2=null;
				$room->option_2no=null;
			}
			if($request->room_bed_count_option_3=="YES"){
				$room->option_3=$request->option_name_3;
				$room->option_3no=$request->option_number_3;
				$check++;
			}
			else{
				$room->option_3=null;
				$room->option_3no=null;
			}
			if($check>=1){
				$check1=0;
			}else{
				$check1=1;
			}
			if($request->discount_opts=="NO"){
				$room->discount_cond=null;
				$room->discount=null;
				$room->discount_chk=$request->discount_opts;
				
			}
			else{
				if($request->discount_opts=="YES"){
					if($request->discount<=0){
						$check3=1;
						$str=$str.'PLEASE INPUT GREATER THEN 0 VALUE';
					}
					if(!$request->discount_cond){
						$check3=1;
						$str=$str.'PLEASE INPUT CORRECT DISCOUNT CONDTIONS';
					}
					if($check3==0){
						$room->discount_cond=$request->discount_cond;
						$room->discount=$request->discount;
						$room->discount_chk=$request->discount_opts;
					}
				}
				else{
					$room->discount_cond=$request->discount_cond;
				}
			}
			if($check1==0 && $check2==0 && $check3==0){
			
				$room->save();
				return redirect()->back()->with('status', 'Room updated SuccessFully ');

			}
			else{
				return redirect()->back()->with('status_err', $str);
			}
		}
		else{
			$room->option_1=null;
			$room->option_1no=null;
			$room->option_2=null;
			$room->option_2no=null;
			$room->option_3=null;
			$room->option_3no=null;
			$room->discount_cond=null;
			$room->discount=null;
			$room->discount_chk=null;
			$room->total_people=null;
			$room->save();
			return redirect()->back()->with('status', 'Room updated SuccessFully ');
		}
	} // function update end

	function editRoomAmenties($room_id){

     $rooms=room::join('roomnames','rooms.room_name_id','=','roomnames.id')->where('rooms.id','=', $room_id)->select('rooms.*','roomnames.room_name as roomname')->get();
		
Session::put('room_id', $room_id);
$room_selected_feature = DB::table('hotel_facilities')
		->join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')
		->leftJoin('selectedroomfacilities', function($join){
			$join->on('sub_facilities.id','=','selectedroomfacilities.selected_facility_room')
			->where('selectedroomfacilities.room_id','=', Session::get('room_id'));
		})->select('sub_facilities.*','hotel_facilities.*','hotel_facilities.id as main_id','sub_facilities.id as sub_facilities_id','selectedroomfacilities.selected_facility_room as selected_facility_room')->where('hotel_facilities.room_show','=', "YES")->orderBy('hotel_facilities.facilities_type')->get();
		if(Session::has('hotel_id')){
			session()->forget('hotel_id');
		}

return view('rooms/editroom/editRoomAmenties',compact('rooms','room_selected_feature','room_id'));
	}//function End
	
	function editRoomPictures($room_id){
		$room_pics=room::join('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.id','=', $room_id)->select('room_pics.*')->get();
		
		$count_pics=0;

		return view('rooms/editroom/editRoomPictures',compact('count_pics','room_pics','room_id'));

	}
	
	function pic_delete_room($removeid,$room_id){
		$room_pics=room::join('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.id','=', $room_id)->select('room_pics.*')->get();
        

		$dirpath='roomiamges/'.$room_pics[0]->foldername;

		if( File::delete($dirpath.'/'.$removeid)){

		}
		else{

		}
		$count_pics=0;

		return view('rooms.roomEditChunks.room_update_pic_div',compact('room_pics','count_pics','room_id'));
	}
	function MakeRoomPicFeatured($Fearured_id,$room_id,$room_pic_id){
	
		$count_pics=0;
		$update_pic = room_pics::find($room_pic_id);
		$update_pic->main_header=$Fearured_id;
		$update_pic->save();
		$room_pics=room::join('room_pics','rooms.id','=','room_pics.room_id')->where('rooms.id','=', $room_id)->select('room_pics.*')->get();

		return view('rooms.roomEditChunks.room_update_pic_div',compact('room_pics','count_pics','room_id'));


	}
	
	function room_listings($hotel_id)
	{
		$hotels=Hotel::where('id','=',$hotel_id)->get();
		$roomtype=roomtype::all();
		$data=bed_options::all();
		return view('rooms/room_listing',compact('hotels','roomtype','data'));
	}
	

  function getroomnames($id )
	{
    	
    	$data=roomtype::join('roomnames','roomtypes.id','=','roomnames.room_type_id')->where('room_type_id','=', $id)->select('roomnames.*','roomtypes.bed_size_option as bed_size_option')->get();

		return response()->json($data);
	}



}
