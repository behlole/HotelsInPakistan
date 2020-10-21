<?php
namespace App\Http\Controllers\Resturant;
use Illuminate\Http\Request;
use App\city_name;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Storage;
use File;
use App\notifiction;
use Notification;
use App\User;
use Carbon\Carbon;
use App\Models\Restaurant\restlist;
use App\Models\Restaurant\respic;
use App\Models\Restaurant\restaurant_type;
use App\Models\Restaurant\restaurant_reviews;
use App\Models\Restaurant\restaurant_type_name;
use App\Http\Controllers\Controller;
use App\Notifications\MyFirstNotification;

class RestaurantListingController extends Controller
{

    // add new restuarnts
	function add_new_restaurant(){

		$restypes=restaurant_type_name::types_name();

		return view('resturants/addrestaurant/add_new_restaurant',compact('restypes'));
	}
  // add new restuarnts post request
	public function add_res_listing_db(Request $request)
	{
		
		$this->validate($request, [
			'restaurant_name' => 'required|max:255',
			'restaurant_type' => 'required',
			'restaurant_email' => 'required|max:255|email',
			'city' => 'required|max:255',
			'contact' => 'required|numeric',
			'alt_contact' => 'numeric|nullable',
			'landline' => 'numeric|nullable',
			'restaurant_website' => 'max:255|nullable',
			'fb_page' => 'max:255|nullable',
			'addr_1' => 'max:255|nullable',
			'lat'=>'required',
			'long'=>'required',
			'google_map_address'=>'required'
		]);
		$Property = new restlist;
		$Property->restaurant_name = $request->restaurant_name;
		$Property->restaurant_email = $request->restaurant_email;
		$Property->city = $request->city;
		$Property->contact = $request->contact;
		$Property->alt_contact = $request->alt_contact;
		$Property->landline = $request->landline;
		$Property->restaurant_website = $request->restaurant_website;
		$Property->fb_page = $request->fb_page;
		$Property->lat = $request->lat;
		$Property->long = $request->long;
		$Property->google_map_address = $request->google_map_address;
		$Property->restaurant_status="0";
		$Property->addr_1 = $request->addr_1;
		$Property->uid =  Auth::user()->id;
		$Property->save();
		foreach ($request->restaurant_type as $type) {
			$create_data_types = new restaurant_type;
			$create_data_types->restaurant_type_id=$type;
			$create_data_types->restaurant_id=$Property->id;
			$create_data_types->save();

		}
		$data = restlist::all()->count();
		$data=$data.time();
		$result = \File::makeDirectory('resimg/' . $data . '/', 0777, true, true);

		$imageUpload = new respic;
		$imageUpload->pic = $data;
		$imageUpload->resid = $Property->id;
		$imageUpload->save();

		return redirect('add_restaurant_details/'.$Property->id);

	}
	  // add new restuarnts deatils
	function add_restaurant_details($restaurant_id){


		$res_data=restlist::where('restlists.id','=', $restaurant_id)->get();

		return view('resturants/addrestaurant/add_new_restaurant_details',compact('res_data','restaurant_id'));
	}
//post request by Ck Editors
	function add_restaurant_details_db(Request $request,$restaurant_id){


		$Property =  restlist::find($restaurant_id);
		$Property->details=$request->editor1;
		$Property->detail_check=1;
		$Property->save();
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Restaurant is Updated Successfully');

		}
		if($request->form_check=="add"){
			return redirect('add_restaurant_pictures/'.$restaurant_id);
		}
		

	}
	function add_restaurant_pictures($restaurant_id){

		$res_data=restlist::where('restlists.id','=', $restaurant_id)->get();

		return view('resturants/addrestaurant/add_restaurant_pictures',compact('res_data','restaurant_id'));
	}
	function add_restaurant_pictures_db(Request $request,$restaurant_id){
		$data="";
		$join=restlist::join('respics','restlists.id','=','respics.resid')->where('restlists.id','=', $restaurant_id)->select('respics.*')->get();
		if(count($join)>0){
			$respic= respic::find($join[0]->id);
		}
		$image = $request->file('file');
		$imageName = $image->getClientOriginalName();
		$image->move(public_path('resimg/' . $join[0]->pic . '/'),$imageName);
		if($join[0]->main_pic==NULL){

			$respic->main_pic=$imageName;
			$respic->save();
			$respic_check = restlist::find($restaurant_id);
			$respic_check->photo_check =1;
			$respic_check->save(); 
		}
		return response()->json(['success'=>$imageName]);

	}
	function restuarnts_finished_listing($restaurant_id){
          //complete listing check
		$restlist_check= restlist::find($restaurant_id);
		if($restlist_check->photo_check==1&&$restlist_check->detail_check==1){
       	  //if already sent check for security
			$notifiction_check =  notifiction::where('notifictions.res_id','=', $restaurant_id)->where('notifictions.notifictions_type','=', "NewListing")->get();
			if(count($notifiction_check)==0){



				$details = [
					'greeting' => "Hi ,You are getting fot the Property You listed on HotelsInPakistan ".$restlist_check->restaurant_name,
					'body' => 'This is my first notification from HotelsInPakistan',
					'thanks' => 'Thank you for using HotelsInPakistan!',
					'actionText' => 'View My Site',
					'actionURL' => url('/')
				];

				$user = User::find(Auth::user()->id);
				Notification::send($user, 
					(new MyFirstNotification($details))->delay(Carbon::now()->addSeconds(3))
				);
				$res_data=restlist::join('respics','restlists.id','=','respics.resid')->join('city_names','restlists.city','=','city_names.id')->where('restlists.id','=', $restaurant_id)->select('restlists.*', 'respics.pic', 'respics.main_pic','city_names.city_name as city','city_names.id as city_id')->get();

				return view('resturants/addrestaurant/finishedListing',compact('res_data','restaurant_id'));

			}else{
				echo "Unfair Mean 1";
			}

		}else{
			echo "Unfair Mean 2";
		}

	}

//res edit function
	function restuarants_edit($restaurant_id){

		$res_data=restlist::join('city_names','restlists.city','=','city_names.id')->where('restlists.id','=', $restaurant_id)->select('restlists.*','city_names.city_name as city','city_names.id as city_id')->get();
		$restypes_name=restaurant_type_name::types_name();

		$res_types=restaurant_type::where('restaurant_id','=', $restaurant_id)->get();

		return view('resturants/editResturants/restuarants_edit',compact('res_data','restaurant_id','res_types','restypes_name'));

	}
	//post request of update
	function update_restaurant(Request $request,$restaurant_id){

		$this->validate($request, [
			'restaurant_name' => 'required|max:255',
			'restaurant_type' => 'required',
			'restaurant_email' => 'required|max:255|email',
			'city' => 'required|max:255',
			'contact' => 'required|numeric',
			'alt_contact' => 'numeric|nullable',
			'landline' => 'numeric|nullable',
			'restaurant_website' => 'max:255|nullable',
			'fb_page' => 'max:255|nullable',
			'addr_1' => 'max:255|nullable',
			'lat'=>'required',
			'long'=>'required',
			'google_map_address'=>'required'
		]);
		$Property = restlist::find($restaurant_id);
		$Property->restaurant_name = $request->restaurant_name;
		$Property->restaurant_email = $request->restaurant_email;
		$Property->city = $request->city;
		$Property->contact = $request->contact;
		$Property->alt_contact = $request->alt_contact;
		$Property->landline = $request->landline;
		$Property->restaurant_website = $request->restaurant_website;
		$Property->fb_page = $request->fb_page;
		$Property->lat = $request->lat;
		$Property->long = $request->long;
		$Property->google_map_address = $request->google_map_address;
		$Property->addr_1 = $request->addr_1;
		$Property->restaurant_status=0;
		$Property->uid =  Auth::user()->id;
		$Property->save();
		if($request->restaurant_type){
			DB::table('restaurant_types')->where('restaurant_types.restaurant_id','=', $restaurant_id)->delete();
			foreach ($request->restaurant_type as $type) {
				$create_data_types = new restaurant_type;
				$create_data_types->restaurant_type_id=$type;
				$create_data_types->restaurant_id=$Property->id;
				$create_data_types->save();

			}
		}

		return redirect()->back()->with('success', 'Restaurant is Updated Successfully');
	}

	function editResDetails($restaurant_id){
		$res_data=restlist::join('city_names','restlists.city','=','city_names.id')->where('restlists.id','=', $restaurant_id)->select('restlists.*','city_names.city_name as city','city_names.id as city_id')->get();
		$res_types=restaurant_type::where('restaurant_id','=', $restaurant_id)->get();

		return view('resturants/editResturants/editResDetails',compact('res_data','restaurant_id','res_types'));

	}
	function editResPics($restaurant_id){
		$count_pics=0;
		$pic_data=restlist::join('respics','restlists.id','=','respics.resid')->where('restlists.id','=', $restaurant_id)->select('restlists.*', 'respics.pic', 'respics.main_pic','respics.id as res_parent_id')->get();
		return view('resturants/editResturants/editResPics',compact('pic_data','restaurant_id','count_pics'));
	}

	function picdelete_res($removeid,$restaurant_id){
		$count_pics=0;
		$pic_data=restlist::join('respics','restlists.id','=','respics.resid')->where('restlists.id','=', $restaurant_id)->select('restlists.*', 'respics.pic', 'respics.main_pic','respics.id as res_parent_id')->get();
		$dirpath='resimg/'.$pic_data[0]->pic;
		if( File::delete($dirpath.'/'.$removeid)){}
			return view('resturants.editResChunks.updatepics_div',compact('restaurant_id','pic_data','count_pics'));
	}
	function MakeResFeatured($Fearured_id,$restaurant_id,$res_parent_id){
		$count_pics=0; 
		$respic = respic::find($res_parent_id);
		$respic->main_pic=$Fearured_id;
		$respic->save();
		$pic_data=restlist::join('respics','restlists.id','=','respics.resid')->where('restlists.id','=', $restaurant_id)->select('restlists.*', 'respics.pic', 'respics.main_pic','respics.id as res_parent_id')->get();

		
		return view('resturants.editResChunks.updatepics_div',compact('restaurant_id','pic_data','count_pics'));
	}


	function view_all_my_resturants(){

		$data=restlist::join('respics','restlists.id','=','respics.resid')
		->where('restlists.uid','=', Auth::user()->id)
		->select('restlists.*', 'respics.pic', 'respics.main_pic','respics.id as res_parent_id')
		->get();


return view('resturants.UserDashBoard.view_all_my_resturants',compact('data'));
 
	}

	function CompleteResListing($restaurant_id){

		$data=restlist::find($restaurant_id);
     	if(!$data->detail_check){
        return redirect('add_restaurant_details/'.$restaurant_id);
     	}
     	else if(!$data->photo_check){
     		return redirect('add_restaurant_pictures/'.$restaurant_id);
     	}
        else{
     	return redirect('/');
     }
 }

}
