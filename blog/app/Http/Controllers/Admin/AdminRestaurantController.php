<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Restaurant\restlist;
use App\Models\Restaurant\restaurant_premiume;
use App\city_name;
use App\User;
use App\province;
use DB;
use App\Http\Controllers\Controller;
class AdminRestaurantController extends Controller
{

	function Restaurant_Pending(){

		$data=restlist::join('city_names','restlists.city','=','city_names.id')
		->where('restlists.restaurant_status','=',0)
		->select('restlists.*','city_names.city_name as city')
		->get();

		return view('Admin/Resturant/Resturant_Pending',compact('data'));


  //return view('admindashpanel/hoteldash/hotel_pending',compact('data','sub_facility'));
	}

	function search_Resturant_by_pending(Request $request){
		$matchThese = ['restlists.photo_check' => 1, 'restlists.detail_check' => 1];

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
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',0)
				->where('restlists.details','!=',NULL)
				->where($matchThese)
				->where('restlists.city','=',$request->city)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();

			}else{
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',0)
				->where('restlists.details','!=',NULL)
				->where($matchThese)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();


			}
			return view('Admin/Resturant/Resturant_Pending',compact('data'));

		}else{
			if($request->city){
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',0)
				->where('restlists.details','=',NULL)
				->orwhere('restlists.photo_check','=',NULL)
				->orwhere('restlists.detail_check','=',NULL)
				->where('restlists.city','=',$request->city)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();
			}else{
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',0)
				->where('restlists.details','=',NULL)
				->orwhere('restlists.photo_check','=',NULL)
				->orwhere('restlists.detail_check','=',NULL)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();
			}

			return view('Admin/Resturant/Resturant_Pending',compact('data'));
		}

	}

	
	function Resturant_Pending_Approval(Request $request){
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = restlist::find($value);
			$data->hot_status = "NO";
			$data->restaurant_status = 1;
			$data->save();
		}
		return redirect()->back()->with('status_ok', ' Approved');
	}

	function Restaurant_Approved(){
		$data=restlist::join('city_names','restlists.city','=','city_names.id')
		->whereBetween('restlists.restaurant_status', array(1,4))
		->select('restlists.*','city_names.city_name as city')
		->get();

		return view('Admin/Resturant/Resturant_Approved',compact('data'));

	}

	function Search_Restaurant_Approved_or_Hide(Request $request){


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
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',1)
				->where('restlists.city','=',$request->city)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();

			}else{
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',1)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();


			}
			return view('Admin/Resturant/Resturant_Approved',compact('data'));

		}else{
			if($request->city){
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',4)
				->where('restlists.city','=',$request->city)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();
			}else{
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.restaurant_status','=',4)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();
			}

			return view('Admin/Resturant/Resturant_Approved',compact('data'));
		}

	}


	function Perform_Restaurant_Featured_And_Hide(Request $request){
		
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = restlist::find($value);
			$data->hot_status = "NO";
			
			$data->restaurant_status = $request->make_hide;
			
			if($request->make_featured){
				$data->hot_status = $request->make_featured;
			}

			$data->save();
		}

		return redirect('/Restaurant_Approved')->with('status_ok', 'Resturant Status Updated');
	}


	function Restaurant_Premiume_Listing_By_City(){

		$data=restlist::join('city_names','restlists.city','=','city_names.id')
		->whereBetween('restlists.restaurant_status', array(1,4))
		->select('restlists.*','city_names.city_name as city')
		->get();


		$premium_listings=restaurant_premiume::join('restlists','restaurant_premiumes.prop_id','=','restlists.id')->join('city_names','restaurant_premiumes.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();


		return view('Admin/Resturant/Resturant_Premiume',compact('data','premium_listings'));
	}

	function Perform_Restaurant_Premiume_By_City(Request $request){
		$this->validate($request, [
			'check_list' => 'required',
			'city'  => 'required'
		]);
		$check=0;
		if($request->make_premiume==1){
			foreach ($request->check_list as $key => $value) {
				$find=restaurant_premiume::where('prop_id','=',$value)->get();
				if($find){
					$check=0;
					foreach ($find as $findvalue){ 
						if($findvalue->city_id==$request->city){
							$check=1;
						}
					}
					if($check==0){
						$new= new restaurant_premiume;
						$new->prop_id=$value;
						$new->city_id=$request->city;
						$new->save();
					}
				}else{
					$new= new restaurant_premiume;
					$new->prop_id=$value;
					$new->city_id=$request->city;
					$new->save();

				}
				
			}
		}
		if($request->make_premiume==0){
			foreach ($request->check_list as $key => $value) {
				$find=restaurant_premiume::where('prop_id','=',$value)->get();

				if($find){
					foreach ($find as $findvalue) {
						if($findvalue->city_id==$request->city){
							
							$finddel=restaurant_premiume::find($findvalue->id);
							$finddel->delete();
							

						}
					}
				}
				
			}
		}
		return redirect('/Restaurant_Premiume_Listing_By_City')->with('status_ok', 'Restaurant Status Updated');

	}


	function Search_Restaurant_Premiume(Request $request){

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
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->where('restlists.city','=',$request->city)
				->whereBetween('restlists.restaurant_status', array(1,4))
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();

			}else{
				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->whereBetween('restlists.restaurant_status', array(1,4))
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();
			}


		}else{
			if($request->city){

				$data=restlist::join('city_names','restlists.city','=','city_names.id')
				->join('restaurant_premiumes','restlists.id','=','restaurant_premiumes.prop_id')
				->whereBetween('restlists.restaurant_status', array(1,4))
				->where('restaurant_premiumes.city_id','=',$request->city)
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();

			}else{
				$data=Hotel::join('city_names','restlists.city','=','city_names.id')
				->whereBetween('restlists.restaurant_status', array(1,4))
				->whereBetween('restlists.created_at', array($from,$to))
				->select('restlists.*','city_names.city_name as city')
				->get();

			}

		}

		$premium_listings=restaurant_premiume::join('restlists','restaurant_premiumes.prop_id','=','restlists.id')->join('city_names','restaurant_premiumes.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();

		return view('Admin/Resturant/Resturant_Premiume',compact('data','premium_listings'));

	}

    //
}
