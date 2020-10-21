<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Models\Hotel\selected_facilityhome;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\features_list;
use App\Models\Hotel\feature;
use Storage;
use App\city_name;
use App\Models\Hotel\hotel_review;
use App\Models\Hotel\hotel_payment;
use App\Models\Hotel\hotel_pics;
use App\Models\Hotel\hotel_policy;
use App\Models\Hotel\hotel_facility;
use DB;
use App\Models\Hotel\selected_facilty;
use App\booking;
use App\User;
use App\Models\Ads\ListingAd;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel\sub_facility;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
// welcome to home , for showing of all homes
    public function select_values(){

      $select= ['hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','city_names.city_name as city',DB::raw("COUNT(hotel_reviews.id) as total_reviews"),DB::raw('AVG(hotel_reviews.rattings) as ratings_average')];

      return $select;
    }
    function welcome_to_home(){
      
      $re_data=hotel::join('city_names','hotels.city','=','city_names.id')
      ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
      ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
      ->join('premium_listings','premium_listings.prop_id','=','hotels.id')
      ->where('hotels.propcheck','=', 2)
      ->where('hotels.hotel_status','=',1)
      ->orderBy('hotels.created_at', 'DESC')
      ->select($this->select_values())
      ->orderBy('ratings_average', 'DESC')
      ->groupBy('hotels.id')
      ->get();

      $hot_data=hotel::join('city_names','hotels.city','=','city_names.id')
      ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
      ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
      ->where('hotels.propcheck','=', 2)
      ->where('hotels.hot_listing','=', "YES")
      ->where('hotels.hotel_status','=',1)
      ->orderBy('hotels.created_at', 'DESC')
      ->select($this->select_values())
      ->orderBy('ratings_average', 'DESC')
      ->groupBy('hotels.id')
      ->get();
      return view('home/welcome_to_home',compact('hot_data','re_data'));
    }

//basic route for serching all homes
    function search_all_home(Request $request){
      $city_data = city_name::where('id','=', $request->city)->get();
      if($request->city){
        $city=$request->city;
      }else{
        $city=0;
      }
      $data=hotel::join('city_names','hotels.city','=','city_names.id')
      ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
      ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
      ->where('hotels.propcheck','=', 2)
      ->where('hotel_status','!=', 0)
      ->where('hotel_status','!=', 4);
      if($city!=0){
        $data->leftJoin('premium_listings', function($join) use ($city){
          $join->on('hotels.id','=','premium_listings.prop_id')
          ->where('premium_listings.city_id','=', $city);
        });
        $data->where('city_names.id','=',$city);
      }
      $data->select($this->select_values());
      if($city!=0){
       $data->addSelect(
        DB::raw("COUNT(premium_listings.prop_id) as premium_listing_checks"))
       ->orderBy('premium_listing_checks','DESC');
     }
     else{
      $data->orderBy('hotels.created_at', 'DESC')
      ->orderBy('ratings_average', 'DESC');
    }
    $data=$data->groupBy('hotels.id')
    ->paginate(20);
    $sub_facility=sub_facility::for_search_features_sidebar_home();
    $ListingAd_Right=ListingAd::Ads_For_Result_Page_Right('home');
    $ListingAd_Left=ListingAd::Ads_For_Result_Page_Left('home');
    $inlistingAds=ListingAd::Ads_in_listing('home');
    return view('home/all_home',compact('data','city_data','sub_facility','ListingAd_Right','ListingAd_Left','inlistingAds'));

  }

 // Home Ajax Call
  public function Home_Serach_By_Filter($city,$home_type,$home_features,$ratting,$dateorder,$max_price,$min_price){
   if($ratting=="hightolow"){
    $ratting_check="DESC";
  }else{
    $ratting_check="ASC";
  }
  $home_type=json_decode($home_type, true);
  $home_features=json_decode($home_features, true);

  $data=hotel::join('city_names','hotels.city','=','city_names.id')
  ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
  ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
  ->where('hotels.propcheck','=', 2)
  ->where('hotel_status','!=', 0)
  ->where('hotel_status','!=', 4)
  ->whereBetween('hotels.home_price', [$min_price, $max_price]);

  if($city!=0){
    $data->leftJoin('premium_listings', function($join) use ($city){
      $join->on('hotels.id','=','premium_listings.prop_id')
      ->where('premium_listings.city_id','=', $city);
    });
    $data->where('city_names.id','=',$city);
  }
  if(count($home_features)>0){
    $data->join('selected_facilityhomes','hotels.id','=','selected_facilityhomes.home_id')
    ->whereIn('selected_facilityhomes.selected_facility',$home_features);
  }
  if(count($home_type)>0){
   $data->whereIn('hotels.yourRole',$home_type);
 }
 $data->select($this->select_values());

 if($city!=0){
   $data->addSelect(
    DB::raw("COUNT(premium_listings.prop_id) as premium_listing_checks"))
   ->orderBy('premium_listing_checks','DESC');
 }else{
  $data->orderBy('hotels.created_at', 'DESC')
  ->orderBy('ratings_average', 'DESC');
}
$data=$data->groupBy('hotels.id')
->paginate(20);


$data->withPath('/main_home');
if(count($data)!=0){
  $inlistingAds=ListingAd::Ads_in_listing('hotel');
  return view('home/UserChunks/DivLoadHomeData',compact('data','inlistingAds'));
}else{
  return view('home/UserChunks/SorryNoResults');
}


}

public function getHomeByName($byname){

  $data=hotel::join('city_names','hotels.city','=','city_names.id')
  ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
  ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
  ->where('hotels.propcheck','=', 2)
  ->where('hotel_status','!=', 0)
  ->where('hotel_status','!=', 4)
  ->where('hotels.hotel_name', 'LIKE', '%'. $byname .'%')
  ->orderBy('hotels.created_at', 'DESC')
  ->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','city_names.city_name as city',DB::raw("COUNT(hotel_reviews.rattings) as count_click"))
  ->groupBy('hotels.id')
  ->paginate(20);

  $data->withPath('/main_home');
  if(count($data)!=0){
   $inlistingAds=ListingAd::Ads_in_listing('hotel');
   return view('home/UserChunks/DivLoadHomeData',compact('data','inlistingAds'));
 }else{
  return view('home/UserChunks/SorryNoResults');
}

} 


//single page form home deatils
function home_details($hotel_id){

  $data=hotel::join('city_names','hotels.city','=','city_names.id')
  ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
  ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
  ->where('hotels.id','=',$hotel_id)
  ->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','city_names.city_name as city',DB::raw("COUNT(hotel_reviews.id) as total_reviews"),DB::raw('AVG(hotel_reviews.rattings) as ratings_average'))
  ->get();

  $hotel_reviews=hotel::join('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')->where('hotels.id','=',$hotel_id)->select('hotel_reviews.*')->get();

  $features=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.id','=',$hotel_id)->select('features.*')->get();

  $home_sel_features=hotel_facility::join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')->join('selected_facilityhomes','sub_facilities.id','=','selected_facilityhomes.selected_facility')->where('selected_facilityhomes.home_id','=',$hotel_id)->orderBy('hotel_facilities.facilities_type')->get();

  $id=$hotel_id;

  $hotel_policy=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotel_policies.hotel_id','=',$hotel_id)->select('hotel_policies.*','hotel_policies.check_inTo as chkinto')->get();

  $ads=ListingAd::single_page_ads('home');
  return view('home/single_home_details',compact('data','hotel_reviews','features','hotel_policy','home_sel_features','ads'));
}


public function my_booking(){



  $homebooking=hotel::join('bookings','hotels.id','=','bookings.home_id')->join('city_names','hotels.city','=','city_names.id')->where('bookings.user_id','=',Auth::user()->id)->select('hotels.*','hotels.created_at as creation_date','city_names.city_name as city_name_prop','bookings.*')->get();


  return view('profile/account_history',compact('homebooking'));
}

function getcitynames($province_id){

  $data=city_name::where('provice_id','=',$province_id)->orderBy('city_name', 'asc')->get();

  return response()->json($data);
}


}

