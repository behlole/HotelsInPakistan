<?php
namespace App\Http\Controllers\Car;
use Illuminate\Http\Request;
use App\Models\Car\car_opr;
use App\Models\Car\brand;
use App\Models\Car\vehicle_type;
use App\city_name;
use App\Models\Car\cars;
use App\Models\Car\car_review;
use App\User;
use File;
use DB;
use App\resad;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CarHome extends Controller
{
	public function select_values(){

		$select= ['car_oprs.*','car_oprs.caropr_name as caropr_name','car_oprs.uploadHeaderPhoto as ageny_logo','car_oprs.car_opr_folder as car_opr_folder','city_names.city_name as city',
		DB::raw("COUNT(car_reviews.id) as total_reviews"),
		DB::raw('AVG(car_reviews.rattings) as ratings_average')];

		return $select;
	}
	public function car_select_values(){

		$select= ['cars.*','city_names.city_name as city','car_oprs.caropr_name as caropr_name','car_oprs.id as caropr_id','car_oprs.uploadHeaderPhoto as ageny_logo','car_oprs.car_opr_folder as car_opr_folder',
		DB::raw("COUNT(car_reviews.id) as total_reviews"),
		DB::raw('AVG(car_reviews.rattings) as ratings_average'),'vehicle_types.vehicle_type as vehicle_type_name','brands.brand_type as brand_type_name'];

		return $select;
	}
	public function car_select_values_single(){

		$select= ['cars.*','vehicle_types.vehicle_type as vehicle_type_name','brands.brand_type as brand_type_name'];

		return $select;
	}
	public function welcome_to_cars()
	{
		$data=car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->leftjoin('car_reviews','car_oprs.id','=','car_reviews.agency_id')
		->where('car_opr_status','=', 1)
		->select($this->select_values())
		->groupBy('car_oprs.id')
		->distinct('car_oprs.id')
		->get();

		return view('Car/welcome_to_cars',compact('data'));
	}

	public function search_all_cars(Request $request)
	{
		$city_data = city_name::where('id','=', $request->city)->get();
		if($request->city){
			$city=$request->city;
		}else{
			$city=0;
		}
		$vehicle_type=vehicle_type::all();
		$brand=brand::all();
		$ads=resad::ads_image_find_results('result','cars');
		$cars=cars::join('brands','cars.brand','=','brands.id')
		->join('vehicle_types','cars.vehicle_type','=','vehicle_types.id')
		->join('car_oprs','cars.car_opr_id','=','car_oprs.id')
		->leftjoin('car_reviews','car_oprs.id','=','car_reviews.agency_id')
		->leftjoin('city_names','car_oprs.city','=','city_names.id')
		->select($this->car_select_values());
		if($request->city){
			$cars->where('city_names.id','=', $request->city);
		}
		$cars=$cars->where('car_oprs.car_opr_status','!=', 0 )
		->where('cars.car_status','!=', 0 )
		->groupBy('cars.id')
		->paginate(20);


		return view('Car/all_cars',compact('cars','vehicle_type','brand','city_data','ads')); 

	}
	public function all_car_by_agency($id)
	{
		$cars_opr=car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->join('cars','car_oprs.id','=','cars.car_opr_id')
		->leftjoin('car_reviews','car_oprs.id','=','car_reviews.agency_id')
		->where('car_oprs.id','=', $id)
		->select($this->select_values())
		->groupBy('car_oprs.id')
		->get();


		$cars=cars::join('brands','cars.brand','=','brands.id')
		->join('vehicle_types','cars.vehicle_type','=','vehicle_types.id')
		->join('car_oprs','cars.car_opr_id','=','car_oprs.id')->where('car_oprs.id','=', $id)->where('cars.car_status','!=', "0" )->select($this->car_select_values_single())->get();

		$car_price=car_opr::join('cars','car_oprs.id','=','cars.car_opr_id')->where('cars.car_status','!=', "0" )->min('cars.car_price');



		$agency_rv=car_review::orderBy('created_at', 'DESC')->where('car_reviews.agency_id','=', $id)->get();
		$ads=resad::ads_image_find('single','cars');

		return view('Car/all_car_by_agency',compact('cars_opr','cars','agency_rv','car_price','ads'));

	}


	public function Car_Serach_By_Filter($city_names,$vehicle_types,$brands,$ratting,$dateorder,$max_price,$min_price){

		if($ratting=="hightolow"){
			$ratting_check="DESC";
		}else{
			$ratting_check="ASC";
		}
		$vehicle_types=json_decode($vehicle_types, true);
		$brands=json_decode($brands, true);

		$cars=cars::join('brands','cars.brand','=','brands.id')
		->join('vehicle_types','cars.vehicle_type','=','vehicle_types.id')
		->join('car_oprs','cars.car_opr_id','=','car_oprs.id')
		->leftjoin('car_reviews','car_oprs.id','=','car_reviews.agency_id')
		->leftjoin('city_names','car_oprs.city','=','city_names.id')
		->select($this->car_select_values());
		if($city_names!=0){
			$cars->where('city_names.id','=',$city_names);
		}
		$cars->where('car_oprs.car_opr_status','!=', 0 )
		->where('cars.car_status','!=', 0 );
		if(count($vehicle_types)>0){
			$cars->whereIn('vehicle_types.id',$vehicle_types);
		}
		if(count($brands)>0){
			$cars->whereIn('brands.id',$brands);
		}
		$cars=$cars->whereBetween('cars.car_price', [$min_price, $max_price])
		->orderBy('cars.created_at', $dateorder)
		->orderBy('ratings_average', $ratting_check)
		->groupBy('cars.id')
		->paginate(20);
		$cars->withPath('/search_all_hotel');
		if(count($cars)!=0){
			return view('Car/UserChunks/DivLoadCarData',compact('cars'));
		}else{
			return view('Car/UserChunks/SorryNoResults');
		}


	}

	public function getCarByName($byname){

		$cars=cars::join('brands','cars.brand','=','brands.id')
		->join('vehicle_types','cars.vehicle_type','=','vehicle_types.id')
		->join('car_oprs','cars.car_opr_id','=','car_oprs.id')
		->leftjoin('car_reviews','car_oprs.id','=','car_reviews.agency_id')
		->leftjoin('city_names','car_oprs.city','=','city_names.id')
		->select($this->car_select_values());
		if($byname!=""){
			$cars->where('cars.car_title', 'LIKE', '%'. $byname .'%');
		}
		$cars=$cars->where('car_oprs.car_opr_status','!=', 0 )
		->where('cars.car_status','!=', 0 )
		->orderBy('cars.created_at', 'DESC')
		->groupBy('cars.id')
		->paginate(20);

		$cars->withPath('/search_all_hotel');
		if(count($cars)!=0){
			return view('Car/UserChunks/DivLoadCarData',compact('cars'));
		}else{
			return view('Car/UserChunks/SorryNoResults');
		}

	} 

}
