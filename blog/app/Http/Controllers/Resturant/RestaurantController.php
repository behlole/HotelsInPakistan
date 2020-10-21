<?php

namespace App\Http\Controllers\Resturant;
use Illuminate\Http\Request;
use App\Models\Restaurant\restlist;
use App\Models\Restaurant\respic;
use App\city_name;
use DB;
use Illuminate\Support\Facades\Auth;
use Storage;
use File;
use Session;
use App\Models\Restaurant\restaurant_type;
use App\Models\Restaurant\restaurant_reviews;
use App\Models\Ads\ListingAd;
use App\Models\Restaurant\restaurant_type_name;
use App\Http\Controllers\Controller;
class RestaurantController extends Controller
{
	public function select_values(){
		$select= ['restlists.*','respics.main_pic','respics.pic','city_names.city_name as city',DB::raw("COUNT(restaurant_reviews.id) as total_reviews"),
		DB::raw('AVG(restaurant_reviews.rattings) as ratings_average')];

		return $select;
	}

	public function comon_joins(){
		$comon_joins=restlist::join('respics','restlists.id','=','respics.resid')
		->join('city_names','restlists.city','=','city_names.id')
		->leftjoin('restaurant_reviews','restlists.id','=','restaurant_reviews.reslist_id')
		->where('restaurant_status','!=', 0)
		->where('restaurant_status','!=', 4);
		return $comon_joins;		
	}
	function welcome_to_restaurant(){

		$re_data=restlist::join('city_names','restlists.city','=','city_names.id')
		->join('respics','restlists.id','=','respics.resid')
		->join('restaurant_premiumes','restaurant_premiumes.prop_id','=','restlists.id')
		->leftjoin('restaurant_reviews','restlists.id','=','restaurant_reviews.reslist_id')
		->where('restaurant_status','=', 1)
		->select($this->select_values())
		->groupBy('restlists.id')
		->get();


		$hot_data=restlist::join('city_names','restlists.city','=','city_names.id')
		->join('respics','restlists.id','=','respics.resid')
		
		->leftjoin('restaurant_reviews','restlists.id','=','restaurant_reviews.reslist_id')
		->where('restlists.hot_status','=', "YES")
		->where('restaurant_status','=', 1)
		->select($this->select_values())
		->groupBy('restlists.id')->get();

		$restaurant_types=restaurant_type_name::all();

		return view('resturants/welcome_to_restaurant',compact('re_data','hot_data','restaurant_types'));
	} // welcome to res End


	function search_all_restaurants(Request $request){

		$city_data = city_name::where('id','=', $request->city)->get();

		if($request->city){
			$city=$request->city;
		}else{
			$city=0;
		}
		if(!$request->city){
			$request->city=0;
		}
		$data=$this->comon_joins();

		if($request->city!=0){
			$data->leftJoin('restaurant_premiumes', function($join) use ($request){
				$join->on('restlists.id','=','restaurant_premiumes.prop_id')
				->where('restaurant_premiumes.city_id','=', $request->city);
			})
			->where('city_names.id','=',$request->city);

		}
		if($request->restaurant_type!="All"){
			$data->join('restaurant_types','restlists.id','=','restaurant_types.restaurant_id')
			->where('restaurant_types.restaurant_type_id','=',$request->restaurant_type);
		}
		if($request->ratting!=0){
			$data->where('restaurant_reviews.rattings','<=',$request->ratting);
		}
		$data->select($this->select_values());
		if($request->city!=0){
			$data->addSelect(
				DB::raw("COUNT(restaurant_premiumes.prop_id) as premium_listing_checks"))
			->orderBy('premium_listing_checks','DESC');
		}else{
			$data->orderBy('restlists.created_at', 'DESC')
			->orderBy('ratings_average', 'DESC');
		}
		$data=$data->groupBy('restlists.id')
		->paginate(20);
		$restaurant_types=restaurant_type_name::all();	
		$ListingAd_Right=ListingAd::Ads_For_Result_Page_Right('restaurant');
		$ListingAd_Left=ListingAd::Ads_For_Result_Page_Left('restaurant');
		$inlistingAds=ListingAd::Ads_in_listing('restaurant');
		return view('resturants/all_restaurants',compact('data','restaurant_types','city_data','ListingAd_Right','ListingAd_Left','inlistingAds'));

	}

	function resturants_single_details($restaurant_id){

		$data=$this->comon_joins()
		->where('restlists.id','=', $restaurant_id)
		->select($this->select_values())
		->get();

		$restlist_review=restaurant_reviews::where('restaurant_reviews.reslist_id','=', $restaurant_id)->get();

		$restaurant_types=restaurant_type_name::selected_types_name($restaurant_id);
		$ads=ListingAd::single_page_ads('restaurant');
		return view('resturants/resturants_single_details',compact('data','restlist_review','restaurant_types','ads'));

	}
	public function Restaurant_Serach_By_Filter($city_names,$res_types_db,$ratting,$dateorder){
		if($ratting=="hightolow"){
			$ratting_check="DESC";
		}else{
			$ratting_check="ASC";
		}
		$myArray = json_decode($res_types_db);
		$data=$this->comon_joins();
		if(count($myArray)>0){
			$data->join('restaurant_types','restlists.id','=','restaurant_types.restaurant_id')->whereIn('restaurant_types.restaurant_type_id',$myArray);
		}
		if($city_names!=0){
			$data->leftJoin('restaurant_premiumes', function($join) use ($city_names){
				$join->on('restlists.id','=','restaurant_premiumes.prop_id')
				->where('restaurant_premiumes.city_id','=', $city_names);
			})
			->where('city_names.id','=',$city_names);
		}
		$data->select($this->select_values());
		if($city_names!=0){
			$data->addSelect(
				DB::raw("COUNT(restaurant_premiumes.prop_id) as premium_listing_checks"));
		}else{
			$data->orderBy('premium_listing_checks','DESC')
			->groupBy('restlists.id');
		}
		$data=$data->paginate(20);

		$data->withPath('/search_all_restaurants');

		if(count($data)!=0){
			return view('resturants/UserChunks/DivLoadRestaurantData',compact('data'));
		}else{
			return view('resturants/UserChunks/SorryNoResults');
		}
		
	}


	public function getResByName($byname){


		$data=$this->comon_joins();
		if($byname!=""){
			$data->where('restlists.restaurant_name', 'LIKE', '%'. $byname .'%');
		}
		$data=$data->select($this->select_values())
		->orderBy('ratings_average', 'DESC')
		->orderBy('restlists.created_at', 'DESC')
		->paginate(20);
		$data->withPath('/search_all_restaurants');

		if(count($data)!=0){
			return view('resturants/UserChunks/DivLoadRestaurantData',compact('data'));
		}else{
			return view('resturants/UserChunks/SorryNoResults');
		}

	}

	public function Resturant_review(Request $request,$id){
		$this->validate($request, [
			'f_name' => 'max:255',
			'phone' => 'required|numeric|min:11',
			'email' => 'required|email',
			'rattings' => 'numeric',
			'comments' => 'required|max:255',
			'verify' => 'required',
		]);
		if($request->verify!=6){
			return redirect()->back()->with('status_err', 'Answer Is Not Correct');
		}
		$restlist_review = new restaurant_reviews;
		$restlist_review->name = $request->f_name;
		$restlist_review->phone = $request->phone;
		$restlist_review->email = $request->email;
		$restlist_review->rattings = $request->rattings;
		$restlist_review->coments = $request->comments;
		$restlist_review->reslist_id = $id;
		$restlist_review->save();
		return redirect()->back()->with('status', 'Review Submitted');
	}



	function stop_listing($id){
		$data = restlist::find($id);
		$data->restaurant_status = "4";
		$data->save(); 
		return redirect('view_resturants')->with('status', 'Resturants Listing Is Hide From Users');
	}

	function show_listing($id){
		$data = restlist::find($id);
		$data->restaurant_status = "1";
		$data->save(); 
		return redirect('view_resturants')->with('status', 'Resturants Listing Is Live Now');
	}

	function del_listing($id){
		$data = restlist::find($id);
		$data_pic=respic::where('respics.resid','=', $id);
		$data_pic->delete();
		$data->delete(); 
		return redirect('view_resturants')->with('status', 'Resturants Listing Is Deleted');
	}





}
