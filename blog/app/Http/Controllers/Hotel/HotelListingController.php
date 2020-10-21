<?php
namespace App\Http\Controllers\Hotel;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\features_list;
use App\Models\Hotel\selected_facilityhotel;
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
use File;
use DB;
use App\Http\Controllers\Controller;
class HotelListingController extends Controller
{
//to Show page of hotel listing form
	function hotel_listing(){

		return view('hotel/addhotel/addhotel');
	}
//to add new hotel 
	function add_hotel_listing(Request $request){
		$this->validate($request, [
			'hotel_name' => 'max:255|required|string',
			'yourRole' => 'required',
			'contact' => 'required|numeric',
			'altcontact' => 'regex:/^[0-9]+$/|nullable',
			'email' => 'required|email',
			'landline' => 'regex:/^[0-9]+$/|nullable',
			'website' => ['max:255', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/','nullable'],
			'address' => 'max:255|nullable',
			'facebookPage' => 'max:255|nullable',
			'address_2' => 'max:255',
			'google_map_addrs' => 'max:255',
			'city' => 'required|numeric',
			'lat'=>'required',
			'long'=>'required',
		]);
		$hotel = new Hotel;
		$hotel->hotel_name = $request->hotel_name;
		$hotel->yourRole = $request->yourRole;
		$hotel->contact = $request->contact;
		$hotel->altcontact = $request->altcontact;
		$hotel->landline = $request->landline;
		$hotel->website = $request->website;
		$hotel->address = $request->address;
		$hotel->email = $request->email;
		$hotel->facebookPage= $request->facebookPage;
		$hotel->google_map_addrs = $request->google_map_addrs;
		$hotel->city = $request->city;
		$hotel->details= $request->details;
		$hotel->hotel_status =0;
		$hotel->lat=$request->lat;
		$hotel->long=$request->long;
		$hotel->propcheck=1;
		$hotel->uid =  Auth::user()->id;
		$hotel->save();
		$data=time()+1200;
		$imageUpload = new hotel_pics;
		$imageUpload->foldername = $data;
		$imageUpload->hotel_id = $hotel->id;
		$imageUpload->save();
		return redirect('add_hotel_details/'.$hotel->id);
	}
//add new home details
	function add_hotel_details($hotel_id){
       
		$hotels=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		return view('hotel/addhotel/add_hotel_details',compact('hotels','hotel_id'));
	}
	function add_hotel_details_db(Request $request,$hotel_id){

		$this->validate($request, [
			'editor1' => 'required',
		]);
		$home = hotel::find($hotel_id);
		$home->details =$request->editor1;
		$home->save(); 
		if($request->form_check=="add"){
			return redirect('add_hotel_features/'.$hotel_id);
		}
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Hotel Details is Updated Successfully');
		}
	}
//home features

	function add_hotel_features($hotel_id){
		$hotel=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		return view('hotel/addhotel/add_hotel_features',compact('hotel','hotel_id'));
	}
	function add_hotel_features_db(Request $request,$hotel_id){



		if($request->netcheck)
		{
			$netrules = [
				'netcheckopt' => 'required',
				'range' => 'required',

			];

			$customMessages = [

				'netcheckopt.required' => 'Please Select Option Wifi Or Cable Option In Room',
				'range.required' => 'Please Select Range Option In Your Property',
			];

			if($request->netcheck=="Free"){
				$this->validate($request, $netrules, $customMessages);
			}
			$netrulespaid = [
				'netcheckopt' => 'required',
				'range' => 'required',
				'net_options_payement' => 'required|numeric',

			];

			$customMessagespaid = [

				'netcheckopt.required' => 'Please Select Option Wifi Or Cable Option In Room',
				'range.required' => 'Please Select Range Option In Your Property',
				'net_options_payement.required' => 'Net Payement Is Not Valid',
			];

			if($request->netcheck=="Paid"){
				$this->validate($request, $netrulespaid, $customMessagespaid);
			}
		}  
		else{
			$no_net_option = [
				'netcheck' => 'required',


			];

			$no_net_msg = [

				'netcheck.required' => 'Please Select InterNet Option Either Not Available , Paid Or Free  ',

			];
			$this->validate($request, $no_net_option, $no_net_msg);
		}


		if($request->parkcheck)
		{

			$parkrulespaid = [
				'reservation' => 'required',
				'nature' => 'required',
				'site' => 'required',
				'perdaypark' => 'required|numeric'

			];

			$parkrulespaidmsg = [

				'reservation.required' => 'Please Select Reservation Option Either Needed Or Not',
				'nature.required' => 'Please Select Public Or Private Option',
				'site.required' => 'Parking Site Is Requires',
				'perdaypark.required' =>'Parking Per Day Charges Is Requires'
			];


			if($request->parkcheck=="Paid"){
				$this->validate($request, $parkrulespaid, $parkrulespaidmsg);
			}

			$parkFree = [
				'reservation' => 'required',
				'nature' => 'required',
				'site' => 'required',

			];

			$parkFreeMsg = [

				'reservation.required' => 'Please Select Reservation Option Either Needed Or Not',
				'nature.required' => 'Please Select Public Or Private Option',
				'site.required' => 'Parking Site Is Requires',
			];

			if($request->parkcheck=="Free"){
				$this->validate($request, $parkFree, $parkFreeMsg);
			}
		}  
		else{
			$no_park_option = [
				'parkcheck' => 'required',


			];

			$no_park_msg = [

				'parkcheck.required' => 'Please Select Parking Option Either Not Available , Paid Or Free  ',

			];
			$this->validate($request, $no_park_option, $no_park_msg);
		}
		if($request->select_facilitie){
			DB::table('selected_facilityhotels')->where('selected_facilityhotels.hotel_id','=', $hotel_id)->delete();

			foreach ($request->select_facilitie as $select) {
				$select_facilitie=new selected_facilityhotel;
				$select_facilitie->selected_facility=$select;
				$select_facilitie->hotel_id=$hotel_id;
				$select_facilitie->save();
			}
		}else{
			return redirect()->back()->with('danger', 'Please Select Some Features');
		}
		if($request->parkcheck){
			if($request->parkcheck=="No"){
				$reservation="";
				$nature="";
				$site="";
				$perdaypark=0;
				$parkcheck="No";
			}
			if($request->parkcheck=="Paid"){
				$reservation=$request->reservation;
				$nature=$request->nature;
				$site=$request->site;
				$perdaypark=$request->perdaypark;
				$parkcheck="Paid";
			}
			if($request->parkcheck=="Free"){
				$reservation=$request->reservation;
				$nature=$request->nature;
				$site=$request->site;
				$perdaypark="";
				$parkcheck="Free";
			}
		}
		if($request->netcheck){
			if($request->netcheck=="No"){

				$netcheck="No";
				$net_options_payement="";
				$range="";
				$netcheckopt="";
			}
			if($request->netcheck=="Paid"){

				$netcheck="Paid";
				$net_options_payement=$request->net_options_payement;
				$range=$request->range;
				$netcheckopt=$request->netcheckopt;
			}
			if($request->netcheck=="Free"){

				$netcheck="Free";
				$net_options_payement="";
				$range=$request->range;
				$netcheckopt=$request->netcheckopt;
			}
		}
		$join=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->select('features.*')->get();

		if(count($join)>0){
			$feat = feature::find($join[0]->id);
		}else{
			$feat=new feature;
		}
		$feat->net_options=$netcheck;
		$feat->range=$range;
		$feat->internet_type=$netcheckopt;
		$feat->internet_charges=$net_options_payement;
		$feat->parking_opt=$parkcheck;
		$feat->reservetion=$reservation;
		$feat->parking_type=$nature;
		$feat->parking_site=$site;
		$feat->parking_charges=$perdaypark;
		$feat->language=serialize($request->lang);
		$feat->hotel_id=$hotel_id;
		$feat->save();
		$hotel = hotel::find($hotel_id);
		$hotel->features =1;
		$hotel->save(); 
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Hotel Features is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('add_hotel_poloicies/'.$hotel_id);
		}
	}

//add home policy
	function add_hotel_poloicies($hotel_id){

		$hotel=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		return view('hotel/addhotel/add_hotel_poloicies',compact('hotel','hotel_id'));
	}
	function add_hotel_policies_db(Request $request,$hotel_id){
		$this->validate($request, [
			'c_text' => 'required|max:255',
			'check_inForm' => 'required',
			'check_inTo' => 'required',
			'accommodate_children' => 'required',
			'allow_pets' => 'required',
		]);

		if($request->check_inForm=="0"||$request->check_inTo=="0"){

			return redirect()->back()->with('danger', 'Please Select Check In Time And Check In TO Time');

		}
		$join=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotels.id','=', $hotel_id)->where('hotels.propcheck','=', 1)->select('hotel_policies.*')->get();

		if(count($join)>0){
			$hotel_policies= hotel_policy::find($join[0]->id);
		}else{
			$hotel_policies=new hotel_policy;
		}
		$hotel_policies->c_text=$request->c_text;
		$hotel_policies->check_inForm=$request->check_inForm;
		$hotel_policies->check_inTo=$request->check_inTo;
		$hotel_policies->accommodate_children=$request->accommodate_children;
		$hotel_policies->allow_pets=$request->allow_pets;
		$hotel_policies->check_OutForm=$request->check_OutForm;
		$hotel_policies->check_OutTo=$request->check_OutTo;
		$hotel_policies->hotel_id=$hotel_id;
		$hotel_policies->save();
		$hotel = hotel::find($hotel_id);
		$hotel->policies =1;
		$hotel->save();

		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Hotel Policies is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('add_hotel_photos/'.$hotel_id);
		}
	}

//add hotel photos
	function add_hotel_photos($hotel_id){
		$hotel=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		return view('hotel/addhotel/add_hotel_photo',compact('hotel','hotel_id'));
	}
	function add_hotel_pic(Request $request,$hotel_id){
		$data="";
		$join=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->select('hotel_pics.*')->get();
		if(count($join)>0){
			$hotel_pics= hotel_pics::find($join[0]->id);
		}
		$image = $request->file('file');
		$imageName = $image->getClientOriginalName();
		$image->move(public_path('hotel_images/' . $join[0]->foldername . '/'),$imageName);
		if($join[0]->main_header==NULL){

			$hotel_pics->main_header=$imageName;
			$hotel_pics->save();
			$hotel_pics_check = hotel::find($hotel_id);
			$hotel_pics_check->photos =1;
			$hotel_pics_check->save(); 
		}
		return response()->json(['success'=>$imageName]);
	}

//add home payments
	function add_hotel_payment($hotel_id){
		$hotel=Hotel::where('id','=',$hotel_id)->where('hotels.propcheck','=', 1)->get();
		return view('hotel/addhotel/add_hotel_payment',compact('hotel','hotel_id'));
	}
	function add_hotel_payemnts_db(Request $request,$hotel_id){
		$norule = [
			'cards' => 'required',
			'city_taxs' => 'required',
			'pchk'=>'required',
		];

		$noms = [

			'cards.required' => 'Please Select Either You Accept Cards At Your Propert Or Not ',
			'city_taxs.required' => 'Please Select GST TAX Is That Include Or Not ',
			'pchk.required' => 'Please Agree With Our Term And Condition ',

		];
		$this->validate($request, $norule, $noms);

		$join=hotel::join('hotel_payments','hotels.id','=','hotel_payments.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->select('hotel_payments.*')->get();

		if(count($join)>0){
			$hotel_payments= hotel_payment::find($join[0]->id);
		}else{
			$hotel_payments=new hotel_payment;
		}
		$hotel_payments->cards=$request->cards;
		$hotel_payments->city_taxs=$request->city_taxs;
		$hotel_payments->pchk=$request->pchk;
		$hotel_payments->hotel_id=$hotel_id;
		$hotel_payments->save();
		$hotel = hotel::find($hotel_id);
		$hotel->payments=1;
		$hotel->save();
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Hotel Payement is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('addrooms/'.$hotel_id)->with('status', 'Thank You For Register Yourself With Us, Its Great Honor for Us,You Will Be verify From Email');
		}
		
	}	

 //update home information
	function updatehotelinfo($hotel_id){
		$id=Auth::user()->id;
		$hotel_info=Hotel::join('city_names','hotels.city','=','city_names.id')->where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->where('hotels.uid','=', $id)->select('hotels.*','city_names.city_name as city','city_names.id as city_id')->get();
		return view('hotel/edithotel/editHotelinfo',compact('hotel_info','hotel_id'));
	}
	function update_hotel_info(Request $request,$hotel_id){


		$this->validate($request, [
			'hotel_name' => 'max:255|required|string',
			'yourRole' => 'required',
			'contact' => 'required|numeric',
			'altcontact' => 'regex:/^[0-9]+$/|nullable',
			'email' => 'required|email',
			'landline' => 'regex:/^[0-9]+$/|nullable',
			'website' => 'max:255',
			'address' => 'max:255',
			'facebookPage' => 'max:255',
			'address_2' => 'max:255',
			'google_map_addrs' => 'nullable',
			'city' => 'required|numeric',
			'lat'=>'required',
			'long'=>'required',
		]);
		$hotel = Hotel::find($hotel_id);
		$hotel->hotel_name = $request->hotel_name;
		$hotel->yourRole = $request->yourRole;
		$hotel->contact = $request->contact;
		$hotel->altcontact = $request->altcontact;
		$hotel->landline = $request->landline;
		$hotel->website = $request->website;
		$hotel->address = $request->address;
		$hotel->email = $request->email;
		$hotel->facebookPage= $request->facebookPage;
		$hotel->google_map_addrs = $request->google_map_addrs;
		$hotel->city = $request->city;
		$hotel->details= $request->details;
		$hotel->hotel_status =0;
		$hotel->lat=$request->lat;
		$hotel->long=$request->long;
		$hotel->uid =  Auth::user()->id;
		$data=Auth::user()->id;
	
		
		return redirect()->back()->with('success', 'Hotel information is Updated Successfully');
	}
	//edit form is same as add the new details 
	function editHotelDetails($hotel_id){
		$id=Auth::user()->id;
		$hotel_info=Hotel::where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->where('hotels.uid','=', $id)->get();
		return view('hotel/edithotel/editHotelDetails',compact('hotel_info','hotel_id'));

	}
	function editHotelFeatures($hotel_id){
        //home basic info
		$id=Auth::user()->id;
		$hotel_info=Hotel::where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->where('hotels.uid','=', $id)->get();
       //internet and parking and spoken language
		$selected_features=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.id','=',$hotel_id)->select('features.*')->get();
       //Facilities that are Popular with Guests,update
		Session::put('hotel_id', $hotel_id);
		$hotel_sel_features = DB::table('hotel_facilities')
		->join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')
		->leftJoin('selected_facilityhotels', function($join){
			$join->on('sub_facilities.id','=','selected_facilityhotels.selected_facility')
			->where('selected_facilityhotels.hotel_id','=', Session::get('hotel_id'));
		})->select('sub_facilities.*','hotel_facilities.*','hotel_facilities.id as main_id','sub_facilities.id as sub_facilities_id','selected_facilityhotels.selected_facility as selected_facility')->where('hotel_facilities.room_show','=', "NO")->orderBy('hotel_facilities.facilities_type')->get();
		if(Session::has('hotel_id')){
			session()->forget('hotel_id');
		}

		return view('hotel/edithotel/editHotelFeatures',compact('hotel_info','hotel_id','selected_features','hotel_sel_features'));

	}

	function editHotelPolicies($hotel_id){
		$id=Auth::user()->id;

		$hotel_policy=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.uid','=', $id)->where('hotel_policies.hotel_id','=',$hotel_id)->select('hotel_policies.*','hotel_policies.check_inTo as chkinto')->get();

		return view('hotel/edithotel/editHotelPolicies',compact('hotel_policy','hotel_id'));
	}
	function editHotelPhoto($hotel_id){
		$id=Auth::user()->id;
		$count_pics=0;
		$hotel_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.id','=',$hotel_id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();
		return view('hotel/edithotel/editHotelPhoto',compact('hotel_pics','hotel_id','count_pics'));
	}
	function picdelete_hotel($removeid,$id){
		$count_pics=0;
		$hotel_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=',$id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();
		$dirpath='hotel_images/'.$hotel_pics[0]->foldername;
		if( File::delete($dirpath.'/'.$removeid)){}
			return view('hotel.edithotelchunks.updatepics_div',compact('hotel_pics','count_pics'));
	}
	function MakeHotelFeatured($Fearured_id,$hotel_id,$hotel_pic_parent_id){
		$count_pics=0; 
		$hotel_pics = hotel_pics::find($hotel_pic_parent_id);
		$hotel_pics->main_header=$Fearured_id;
		$hotel_pics->save();
		$hotel_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=',$hotel_id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();

		
		return view('hotel.edithotelchunks.updatepics_div',compact('hotel_pics','count_pics'));
	}
	function editHotelPayments($hotel_id){
		$payments=hotel::join('hotel_payments','hotels.id','=','hotel_payments.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.id','=', $hotel_id)->select('hotel_payments.*')->get();

		return view('hotel.edithotel.editHotelPayments',compact('payments','hotel_id'));

	}

	//

function view_hotels(){
	
	$id=Auth::user()->id;
	$hotels=Hotel::join('city_names','hotels.city','=','city_names.id')->leftjoin('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 1)->where('hotels.uid','=', $id)->select('hotels.*','city_names.city_name as city','city_names.id as city_id','hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date')->get();

  //return view('hotel/view_hotels',compact('hotels'));

 return view('hotel/view_user_hotels',compact('hotels'));
}


}

