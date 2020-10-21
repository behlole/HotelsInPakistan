<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\PremiumListing;
use App\city_name;
use App\User;
use App\province;
use DB;

class AdminHomeController extends Controller
{

	function Home_Pending(){

		$data=Hotel::join('city_names','hotels.city','=','city_names.id')
		->where('hotels.hotel_status','=', 0)
		->where('hotels.propcheck','=', 2)
		->select('hotels.*','city_names.city_name as city')
		->get();
		return view('Admin/Home/Home_Pending',compact('data'));


  //return view('admindashpanel/hoteldash/hotel_pending',compact('data','sub_facility'));
	}

	function search_home_by_pending(Request $request){
		$matchThese = ['hotels.features' => 1, 'hotels.policies' => 1, 'hotels.photos' => 1, 'hotels.payments' => 1];
		$from= date('y-01-01');
		$to = date('y-m-d');
		if($request->from){
			$from=$request->from;
			if($request->to){
				$to=$request->to;

			}else{
				$to = date('y-m-d');
			}
		}
		if($request->profile_check==1){
			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 0)
				->where('hotels.propcheck','=', 2)
				->where($matchThese)
				->where('hotels.details','!=',NULL)
				->select('hotels.*','city_names.city_name as city')
				->where('hotels.city','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 0)
				->where('hotels.propcheck','=', 2)
				->where($matchThese)
				->where('hotels.details','!=',NULL)
				->select('hotels.*','city_names.city_name as city')
				->whereBetween('hotels.created_at', array($from,$to))
				->get();

			}
			return view('Admin/Home/Home_Pending',compact('data'));

		}else{
			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 0)
				->where('hotels.propcheck','=', 2)
				->orwhere('hotels.details','=',NULL)
				->orwhere('hotels.features','=',NULL)
				->orwhere('hotels.policies','=',NULL)
				->orwhere('hotels.photos','=',NULL)
				->orwhere('hotels.payments','=',NULL)
				->where('hotels.city','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 0)
				->where('hotels.propcheck','=', 2)
				->orwhere('hotels.details','=',NULL)
				->orwhere('hotels.features','=',NULL)
				->orwhere('hotels.policies','=',NULL)
				->orwhere('hotels.photos','=',NULL)
				->orwhere('hotels.payments','=',NULL)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}

			return view('Admin/Home/Home_Pending',compact('data'));
		}

	}

	function Perform_Home_Pending_Approval(Request $request){
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = Hotel::find($value);
			$data->hot_listing = "NO";
			$data->hotel_status = 1;
			$data->save();
		}
		return redirect()->back()->with('status_ok', ' Approved');
	}


	function Home_Approved(){
		$data=Hotel::join('city_names','hotels.city','=','city_names.id')
		->whereBetween('hotels.hotel_status', array(1,4))
		->where('hotels.propcheck','=', 2)
		->select('hotels.*','city_names.city_name as city')
		->get();
		return view('Admin/Home/Home_Approved',compact('data'));

	}

	function Perform_Home_Featured_And_Hide(Request $request){
		
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = Hotel::find($value);
			$data->hot_listing = "NO";
			
			$data->hotel_status = $request->make_hide;
			
			if($request->make_featured){
				$data->hot_listing = $request->make_featured;
			}

			$data->save();
		}

		return redirect('/Home_Approved')->with('status_ok', 'Home Status Updated');
	}


	function Search_Home_Approved_or_Hide(Request $request){
		$from= date('y-01-01');
		$to = date('y-m-d');
		if($request->from){
			$from=$request->from;
			if($request->to){
				$to=$request->to;

			}else{
				$to = date('y-m-d');
			}
		}

		if($request->profile_check==1){

			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 1)
				->where('hotels.propcheck','=', 2)
				->where('hotels.city','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=',1)
				->where('hotels.propcheck','=', 2)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();

			}


		}else{
			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=', 4)
				->where('hotels.propcheck','=', 2)
				->where('hotels.city','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->where('hotels.hotel_status','=',4)
				->where('hotels.propcheck','=', 2)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();

			}

		}

		return view('Admin/Home/Home_Approved',compact('data'));

	}

  //Hotel_Premiume_Listing_By_City					

	function Home_Premiume_Listing_By_City(){

		$data=Hotel::join('city_names','hotels.city','=','city_names.id')
		->whereBetween('hotels.hotel_status', array(1,4))
		->where('hotels.propcheck','=', 2)
		->select('hotels.*','city_names.city_name as city')
		->get();


		$premium_listings=PremiumListing::join('hotels','premium_listings.prop_id','=','hotels.id')->where('hotels.propcheck','=', 2)->join('city_names','premium_listings.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();


		return view('Admin/Home/Home_Premiume',compact('data','premium_listings'));

	}

	function Search_Home_Premiume(Request $request){

		$from= date('y-01-01');
		$to = date('y-m-d');
		if($request->from){
			$from=$request->from;
			if($request->to){
				$to=$request->to;

			}else{
				$to = date('y-m-d');
			}
		}

		if($request->profile_check==1){

			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->whereBetween('hotels.hotel_status', array(1,4))
				->where('hotels.propcheck','=', 2)
				->where('hotels.city','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->whereBetween('hotels.hotel_status', array(1,4))
				->where('hotels.propcheck','=', 2)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();

			}


		}else{
			if($request->city){
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->join('premium_listings','hotels.id','=','premium_listings.prop_id')
				->whereBetween('hotels.hotel_status', array(1,4))
				->where('hotels.propcheck','=', 2)
				->where('premium_listings.city_id','=',$request->city)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();
			}else{
				$data=Hotel::join('city_names','hotels.city','=','city_names.id')
				->whereBetween('hotels.hotel_status', array(1,4))
				->where('hotels.propcheck','=', 2)
				->whereBetween('hotels.created_at', array($from,$to))
				->select('hotels.*','city_names.city_name as city')
				->get();

			}

		}

		$premium_listings=PremiumListing::join('hotels','premium_listings.prop_id','=','hotels.id')->where('hotels.propcheck','=', 2)->join('city_names','premium_listings.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();

		return view('Admin/Home/Home_Premiume',compact('data','premium_listings'));

	}

	function Perform_Premiume_By_City_HOME(Request $request){
		$this->validate($request, [
			'check_list' => 'required',
			'city'  => 'required'
		]);
		$check=0;
		if($request->make_premiume==1){
			foreach ($request->check_list as $key => $value) {
				$find=PremiumListing::where('prop_id','=',$value)->get();
				if($find){
					$check=0;
					foreach ($find as $findvalue){ 
						if($findvalue->city_id==$request->city){
							$check=1;
						}
					}
					if($check==0){
						$new= new PremiumListing;
						$new->prop_id=$value;
						$new->city_id=$request->city;
						$new->save();
					}
				}else{
					$new= new PremiumListing;
					$new->prop_id=$value;
					$new->city_id=$request->city;
					$new->save();

				}
				
			}
		}
		if($request->make_premiume==0){
			foreach ($request->check_list as $key => $value) {
				$find=PremiumListing::where('prop_id','=',$value)->get();

				if($find){
					foreach ($find as $findvalue) {
						if($findvalue->city_id==$request->city){
							
							$finddel=PremiumListing::find($findvalue->id);
							$finddel->delete();
							

						}
					}
				}
				
			}
		}
		return redirect('/Home_Premiume_Listing_By_City')->with('status_ok', 'Home Status Updated');

	}
}

