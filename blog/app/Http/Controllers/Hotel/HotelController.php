<?php

namespace App\Http\Controllers\Hotel;
use App\Models\Hotel\Hotel;
use App\Models\Room\room;
use App\Models\Room\roomtype;
use App\Models\Room\roomname;
use App\Models\Hotel\features_list;
use App\Models\Hotel\feature;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hotel\hotel_payment;
use App\Models\Hotel\hotel_pics;
use App\Models\Hotel\hotel_policy;
use App\city_name;
use App\Models\Hotel\hotel_review;
use App\Models\Hotel\hotel_facility;
use App\Models\Hotel\sub_facility;
use App\Models\Hotel\selected_facilty;
use Session;
use App\App\Models\Hotel\selected_facilityhotel;
use App\Models\Ads\ListingAd;
use File;
use DB;
use App\Models\Restaurant\restlist;
use App\Models\Car\cars;
use App\Http\Controllers\Controller;
class HotelController extends Controller
{

  public function select_values(){
    $select= ['hotels.*',
    'hotel_pics.foldername',
    'hotel_pics.main_header',
    'hotels.created_at as creation_date',
    'city_names.city_name as city',
    DB::raw("COUNT(hotel_reviews.id) as total_reviews"),
    DB::raw('AVG(hotel_reviews.rattings) as ratings_average'),
    DB::raw('MIN(rooms.room_price_night) AS room_price_night')];

    return $select;
  }

  function welcome_to_hotel(){

    $re_data=hotel::join('city_names','hotels.city','=','city_names.id')
    ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
    ->join('premium_listings','premium_listings.prop_id','=','hotels.id')
    ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
    ->leftjoin('rooms','hotels.id','=','rooms.hotel_id')
    ->where('hotels.propcheck','=', 1)
    ->where('hotels.hotel_status','=',1)
    ->orderBy('hotels.created_at', 'DESC')
    ->select($this->select_values())
    ->orderBy('ratings_average', 'DESC')
    ->groupBy('hotels.id')
    ->inRandomOrder()
    ->take(5)
    ->get();


    
    $hot_data=hotel::join('city_names','hotels.city','=','city_names.id')
    ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
    ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
    ->leftjoin('rooms','hotels.id','=','rooms.hotel_id')
    ->where('hotels.propcheck','=', 1)
    ->where('hotels.hot_listing','=', "YES")
    ->where('hotels.hotel_status','=',1)
    ->orderBy('hotels.created_at', 'DESC')
    ->select($this->select_values())
    ->orderBy('ratings_average', 'DESC')
    ->groupBy('hotels.id')
    ->get();
    
    return view('hotel/welcome_to_hotel',compact('hot_data','re_data'));
  }


  function search_all_hotel(Request $request){
    if($request->des_session){
      Session::put('des_session', $request->des_session);
    }
    else{
      session()->forget('des_session');
    }
    $city_data = city_name::where('id','=', $request->city)->get();
    if($request->city||$request->des_session){
      $city=$request->city;
    }else{
      $city=0;
    }

    $data=hotel::join('city_names','hotels.city','=','city_names.id')
    ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
    ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
    ->leftjoin('rooms','hotels.id','=','rooms.hotel_id');

    if($city!=0){
      $data->leftJoin('premium_listings', function($join) use ($city){
        $join->on('hotels.id','=','premium_listings.prop_id')
        ->where('premium_listings.city_id','=', $city);
      });
      $data->where('city_names.id','=',$city);
    }

    $data->where('hotels.propcheck','=', 1)
    ->where('hotel_status','!=', 0)
    ->where('hotel_status','!=', 4)
    ->select($this->select_values());

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

  $sub_facility=sub_facility::for_search_features_sidebar_hotel();
  $ListingAd_Right=ListingAd::Ads_For_Result_Page_Right('hotel');
  $ListingAd_Left=ListingAd::Ads_For_Result_Page_Left('hotel');
  $inlistingAds=ListingAd::Ads_in_listing('hotel');
  
  return view('hotel/all_hotels',compact('data','city_data','sub_facility','ListingAd_Right','ListingAd_Left','inlistingAds'));
}

public function Hotel_Serach_By_Filter($city_names,$hotel_type,$hotel_features,$ratting,$dateorder,$max_price,$min_price){
  if($ratting=="hightolow"){
    $ratting_check="DESC";
  }else{
    $ratting_check="ASC";
  }
  $hotel_type=json_decode($hotel_type, true);
  $hotel_features=json_decode($hotel_features, true);

  $data=hotel::join('city_names','hotels.city','=','city_names.id')
  ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
  ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
  ->leftjoin('rooms','hotels.id','=','rooms.hotel_id');

  if($city_names!=0){
    $data->leftJoin('premium_listings', function($join) use ($city_names){
      $join->on('hotels.id','=','premium_listings.prop_id')
      ->where('premium_listings.city_id','=', $city_names);
    });
    $data->where('city_names.id','=',$city_names);
  }
  if(count($hotel_features)>0){
    $data->join('selected_facilityhotels','hotels.id','=','selected_facilityhotels.hotel_id')
    ->whereIn('selected_facilityhotels.selected_facility',$hotel_features);
  }
  if(count($hotel_type)>0){
     $data->whereIn('hotels.yourRole',$hotel_type);
  }   
  $data->where('hotels.propcheck','=', 1)
  ->where('hotel_status','!=', 0)
  ->where('hotel_status','!=', 4)
  ->select($this->select_values())
  ->whereBetween('room_price_night', [$min_price, $max_price]);

  if($city_names!=0){
    $data->addSelect(
      DB::raw("COUNT(premium_listings.prop_id) as premium_listing_checks"))
    ->orderBy('premium_listing_checks','DESC');
  }else{
    $data->orderBy('hotels.created_at', $dateorder)
    ->orderBy('ratings_average', $ratting_check);
  }
  $data=$data->groupBy('hotels.id')
  ->paginate(20);
  $data->withPath('/search_all_hotel');

  if(count($data)!=0){
    $inlistingAds=ListingAd::Ads_in_listing('hotel');
    return view('hotel/UserChunks/DivLoadHomeData',compact('data','inlistingAds'));
  }else{
    return view('hotel/UserChunks/SorryNoResults');
  }
}

public function getHotelByName($byname){
  if($byname==""){
    $data=hotel::join('city_names','hotels.city','=','city_names.id')
    ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
    ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
    ->leftjoin('rooms','hotels.id','=','rooms.hotel_id')
    ->where('hotels.propcheck','=', 1)
    ->where('hotel_status','!=', 0)
    ->where('hotel_status','!=', 4)
    ->orderBy('hotels.created_at', 'DESC')
    ->select($this->select_values())
    ->groupBy('hotels.id')
    ->paginate(20);

  }else{
    $data=hotel::join('city_names','hotels.city','=','city_names.id')
    ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
    ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
    ->leftjoin('rooms','hotels.id','=','rooms.hotel_id')
    ->where('hotels.propcheck','=', 1)
    ->where('hotel_status','!=', 0)
    ->where('hotel_status','!=', 4)
    ->where('hotels.hotel_name', 'LIKE', '%'. $byname .'%')
    ->orderBy('hotels.created_at', 'DESC')
    ->select($this->select_values())
    ->groupBy('hotels.id')
    ->paginate(20);
  }
  $data->withPath('/search_all_hotel');
  if(count($data)!=0){
    $inlistingAds=ListingAd::Ads_in_listing('hotel');
    return view('hotel/UserChunks/DivLoadHomeData',compact('data','inlistingAds'));
  }else{
    return view('hotel/UserChunks/SorryNoResults');
  }

} 

function hotel_details($hotel_id){

  $data=hotel::join('city_names','hotels.city','=','city_names.id')
  ->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')
  ->leftjoin('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')
  ->leftjoin('rooms','hotels.id','=','rooms.hotel_id')
  ->where('hotels.id','=',$hotel_id)
  ->select($this->select_values())->get();

  $hotel_room=room::join('room_pics','rooms.id','=','room_pics.room_id')
  ->join('roomnames','rooms.room_name_id','=','roomnames.id')
  ->where('rooms.hotel_id','=', $hotel_id)
  ->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')
  ->orderBy('rooms.id')
  ->get();

  $amenities_array=array();$i=0;
  foreach ($hotel_room as $value) {

    $amenities=sub_facility::join('selectedroomfacilities','sub_facilities.id','=','selectedroomfacilities.selected_facility_room')->where('selectedroomfacilities.room_id','=', $value->id)->select('sub_facilities.name as room_ammenty','sub_facilities.sub_icon as sub_icon','selectedroomfacilities.room_id as parent_id')->get();

    if($amenities){
      $amenities_array[$i++]=$amenities;

    }
  }


  $hotel_reviews=hotel::join('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')->where('hotels.id','=',$hotel_id)->select('hotel_reviews.*')->get();

  $features=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.id','=',$hotel_id)->select('features.*')->get();

  $hotel_sel_features=hotel_facility::join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')->join('selected_facilityhotels','sub_facilities.id','=','selected_facilityhotels.selected_facility')->where('selected_facilityhotels.hotel_id','=',$hotel_id)->orderBy('hotel_facilities.facilities_type')->get();

  $hotel_policy=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotel_policies.hotel_id','=',$hotel_id)->select('hotel_policies.*','hotel_policies.check_inTo as chkinto')->get();


  $ads=ListingAd::single_page_ads('hotel');
  return view('hotel/single_hotel_details',compact('data','hotel_reviews','features','hotel_room','hotel_sel_features','hotel_policy','hotel_id','ads','amenities_array'));
}



function search_for_hotel_room($check_in,$check_out,$no_of_rooms,$no_of_guest,$hotel_id){

 $hotel_room=room::join('room_pics','rooms.id','=','room_pics.room_id')
 ->join('roomnames','rooms.room_name_id','=','roomnames.id')
 ->where('rooms.hotel_id','=', $hotel_id)
 ->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')
 ->orderBy('rooms.id')
 ->get();

 $amenities_array=array();$i=0;
 foreach ($hotel_room as $value) {

  $amenities=sub_facility::join('selectedroomfacilities','sub_facilities.id','=','selectedroomfacilities.selected_facility_room')->where('selectedroomfacilities.room_id','=', $value->id)->select('sub_facilities.name as room_ammenty','sub_facilities.sub_icon as sub_icon','selectedroomfacilities.room_id as parent_id')->get();

  if($amenities){
    $amenities_array[$i++]=$amenities;

  }
}
return view('hotel/UserChunks/room_table_and_ajax',compact('hotel_room','amenities_array'));

}

public function booking_room_confiremd($room_id,Request $request){
  if(Session::has('nights')){

  }
  Session::put('room_id', $room_id);
  Session::put('nights', $request->nights);
  Session::put('guests', $request->guests);
  Session::put('chech_in', $request->checkin);
  Session::put('check_out', $request->checkout);
  $rooms=room::join('room_pics','rooms.id','=','room_pics.room_id')->join('roomnames','rooms.room_name_id','=','roomnames.id')->where('rooms.id','=', $room_id)->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')->get();

  return view('hotel/room_booked_summmary',compact('rooms'));
}

public function booking_room($room_id)
{
  $rooms=room::join('room_pics','rooms.id','=','room_pics.room_id')->join('roomnames','rooms.room_name_id','=','roomnames.id')->where('rooms.id','=', $room_id)->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')->get();
  $selected_facilty=room::join('selected_facilties','rooms.id','=','selected_facilties.room_id')->where('rooms.id','=', $room_id)->select('selected_facilties.*')->get();
  return view('hotel/single_room_details',compact('rooms','selected_facilty'));
}



function admin_hotel_details_approvel($hotel_id)
{
  $province=city_name::orderBy('city_name', 'asc')->get();

  $data=hotel::join('city_names','hotels.city','=','city_names.id')->join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=',$hotel_id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','city_names.city_name as city')->get();



  $hotel_room=room::join('room_pics','rooms.id','=','room_pics.room_id')->join('roomnames','rooms.room_name_id','=','roomnames.id')->where('rooms.hotel_id','=', $hotel_id)->select('rooms.*','room_pics.foldername as foldername','room_pics.main_header as main_header','roomnames.room_name as roomname')->get();



  $hotel_reviews=hotel::join('hotel_reviews','hotels.id','=','hotel_reviews.hotel_id')->where('hotels.id','=',$hotel_id)->select('hotel_reviews.*')->get();


  $features=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.id','=',$hotel_id)->select('features.*')->get();



  $features2=hotel_facility::join('selected_facilties','hotel_facilities.id','=','selected_facilties.facilty_main_id')->where('selected_facilties.hotel_id','=', $hotel_id)->select('selected_facilties.*','hotel_facilities.*')->get();

  $hotel_policy=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotel_policies.hotel_id','=',$hotel_id)->select('hotel_policies.*','hotel_policies.check_inTo as chkinto')->get();


  return view('hotel/admin_hotel_details_approvel',compact('data','hotel_reviews','features','hotel_room','features2','hotel_policy'));
}

function all_hotels(){
  $hotels=Hotel::all();
  return view('hotel/all_hotels',compact('hotels'));
}



}
