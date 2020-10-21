<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Car\car_opr;
use App\Models\Car\PremiumeAgency;
use App\city_name;
use App\Models\Car\cars;
use DB;
use App\Http\Controllers\Controller;

class AdminCarController extends Controller
{
    //
	function CarAgency_Pending(){
		$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
		->select('car_oprs.*','city_names.city_name as city',
			DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
		->where('car_opr_status','=', 0)
		->groupBy('car_oprs.id')
		->get();

		return view('Admin/CarAgency/CarAgency_Pending',compact('data'));
	}

	function CarAgency_Pending_Approval(Request $request){
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = car_opr::find($value);
			$data->car_opr_status = 1;
			$data->save();
		}
		return redirect()->back()->with('status_ok', ' Approved');
	}


	function search_CarAgency_by_pending(Request $request){

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
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.city','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->where('car_oprs.details','!=', NULL)
				->where('car_oprs.car_opr_status','=', 0)
				->groupBy('car_oprs.id')
				->get();

				
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->whereBetween('car_oprs.created_at', array($from,$to))
				->where('car_oprs.details','!=', NULL)
				->where('car_oprs.car_opr_status','=', 0)
				->groupBy('car_oprs.id')
				->get();


			}
			return view('Admin/CarAgency/CarAgency_Pending',compact('data'));

		}else{
			if($request->city){
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.city','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->where('car_oprs.details','=', NULL)
				->where('car_oprs.car_opr_status','=', 0)
				->groupBy('car_oprs.id')
				->get();
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->whereBetween('car_oprs.created_at', array($from,$to))
				->where('car_oprs.details','=', NULL)
				->where('car_oprs.car_opr_status','=', 0)
				->groupBy('car_oprs.id')
				->get();
			}

			return view('Admin/CarAgency/CarAgency_Pending',compact('data'));
		}

	}


	function CarAgency_Approved(){

		$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
		->select('car_oprs.*','city_names.city_name as city',
			DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
		->whereBetween('car_oprs.car_opr_status', array(1,4))
		->groupBy('car_oprs.id')
		->get();
		return view('Admin/CarAgency/CarAgency_Approved',compact('data'));

	}

	function Perform_CarAgency_Featured_And_Hide(Request $request){
		
		$this->validate($request, [
			'check_list' => 'required',

		]);

		foreach ($request->check_list as $key => $value) {
			$data = car_opr::find($value);
			$data->hot_status = "NO";
			
			$data->car_opr_status = $request->make_hide;
			
			if($request->make_featured){
				$data->hot_status = $request->make_featured;
			}

			$data->save();
		}

		return redirect('/CarAgency_Approved')->with('status_ok', 'Agnecy Status Updated');
	}


	function Search_Car_Approved_or_Hide(Request $request){
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
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->where('car_oprs.city','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();

			}


		}else{
			if($request->city){
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,4)
				->where('car_oprs.city','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,4)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();

			}

		}

		return view('Admin/CarAgency/CarAgency_Approved',compact('data'));

	}

	function CarAgency_Premiume_Listing_By_City(){

		$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
		->select('car_oprs.*','city_names.city_name as city',
			DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
		->whereBetween('car_oprs.car_opr_status', array(1,4))
		->groupBy('car_oprs.id')
		->get();


		$premium_listings=PremiumeAgency::join('car_oprs','premiume_agencies.prop_id','=','car_oprs.id')->join('city_names','premiume_agencies.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();


		return view('Admin/CarAgency/CarAgency_Premiume',compact('data','premium_listings'));

	}


	function Perform_Premiume_By_City_Car(Request $request){
		$this->validate($request, [
			'check_list' => 'required',
			'city'  => 'required'
		]);
		$check=0;
		if($request->make_premiume==1){
			foreach ($request->check_list as $key => $value) {
				$find=PremiumeAgency::where('prop_id','=',$value)->get();
				if($find){
					$check=0;
					foreach ($find as $findvalue){ 
						if($findvalue->city_id==$request->city){
							$check=1;
						}
					}
					if($check==0){
						$new= new PremiumeAgency;
						$new->prop_id=$value;
						$new->city_id=$request->city;
						$new->save();
					}
				}else{
					$new= new PremiumeAgency;
					$new->prop_id=$value;
					$new->city_id=$request->city;
					$new->save();

				}
				
			}
		}
		if($request->make_premiume==0){
			foreach ($request->check_list as $key => $value) {
				$find=PremiumeAgency::where('prop_id','=',$value)->get();

				if($find){
					foreach ($find as $findvalue) {
						if($findvalue->city_id==$request->city){
							
							$finddel=PremiumeAgency::find($findvalue->id);
							$finddel->delete();
							

						}
					}
				}
				
			}
		}
		return redirect('/CarAgency_Premiume_Listing_By_City')->with('status_ok', 'CarAgency Status Updated');

	}


function Search_Car_Premiume(Request $request){

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
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->where('car_oprs.city','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();

			}


		}else{
			if($request->city){

				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->join('premiume_agencies','car_oprs.id','=','premiume_agencies.prop_id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->where('premiume_agencies.city_id','=',$request->city)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();
			}else{
				$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
				->join('premiume_agencies','car_oprs.id','=','premiume_agencies.prop_id')
				->leftjoin('cars','car_oprs.id','=','cars.car_opr_id')
				->select('car_oprs.*','city_names.city_name as city',
					DB::raw("COUNT(cars.id) as total_cars"),DB::raw("COUNT(cars.id) as total_cars"),DB::raw('MIN(cars.car_price) AS car_price'))
				->where('car_oprs.car_opr_status','=' ,1)
				->whereBetween('car_oprs.created_at', array($from,$to))
				->groupBy('car_oprs.id')
				->get();
			}

		}

		$premium_listings=PremiumeAgency::join('car_oprs','premiume_agencies.prop_id','=','car_oprs.id')->join('city_names','premiume_agencies.city_id','=','city_names.id')->select('city_names.*','city_names.city_name as city',
			DB::raw("COUNT(city_names.id) as total_listing"))->groupBy('city_names.id')->get();

		return view('Admin/CarAgency/CarAgency_Premiume',compact('data','premium_listings'));

	}

}
