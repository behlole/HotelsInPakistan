<?php
namespace App\Http\Controllers\Home;
use App\Models\Hotel\Hotel;
use App\Models\Hotel\features_list;
use App\Models\Hotel\selected_facilityhome;
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
class HomeListingController extends Controller
{
// 	public function __construct()
// {
//         $this->middleware('auth');
// }

	function view_all_home(){
		$hotels=Hotel::join('city_names','hotels.city','=','city_names.id')->leftjoin('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.uid','=', Auth::user()->id)->select('hotels.*','city_names.city_name as city','city_names.id as city_id','hotel_pics.main_header as main_header','hotel_pics.foldername as foldername')->get();

		return view('home/ClientPannel/view_all_homes',compact('hotels'));
	}
//to Show page of home listing form
	function home_listing(){

		return view('home/addhome/addhome');
	}
//to add new home 
	function add_home_listing(Request $request){
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
			'home_price' => 'required|numeric',
			'lat'=>'required',
			'long'=>'required',
		]);
		$home = new Hotel;
		$home->hotel_name = $request->hotel_name;
		$home->yourRole = $request->yourRole;
		$home->contact = $request->contact;
		$home->altcontact = $request->altcontact;
		$home->landline = $request->landline;
		$home->website = $request->website;
		$home->address = $request->address;
		$home->email = $request->email;
		$home->facebookPage= $request->facebookPage;
		$home->google_map_addrs = $request->google_map_addrs;
		$home->city = $request->city;
		$home->details= $request->details;
		$home->hotel_status =0;
		$home->home_price =$request->home_price;
		$home->lat=$request->lat;
		$home->long=$request->long;
		$home->propcheck=2;
		$home->uid =  Auth::user()->id;
		$home->save();
		$data=time();
		
        $result = \File::makeDirectory('home_images/' . $data . '/', 0777, true, true);

		
		$imageUpload = new hotel_pics;
		$imageUpload->foldername = $data;
		$imageUpload->hotel_id = $home->id;
		$imageUpload->save();
		
		return redirect('add_home_details/'.$home->id);
	}
//add new home details
	function add_home_details($home_id){

		$homes=Hotel::where('id','=',$home_id)->where('hotels.propcheck','=', 2)->get();
		return view('home/addhome/add_home_details',compact('homes','home_id'));
	}
	function add_home_details_db(Request $request,$home_id){
		$this->validate($request, [
			'editor1' => 'required',
		]);
		$home = hotel::find($home_id);
		$home->details =$request->editor1;
		$home->save(); 
		if($request->form_check=="add"){
			return redirect('add_home_features/'.$home_id);
		}
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Home Details is Updated Successfully');
		}
	}
//home features

	function add_home_features($home_id){
		$homes=Hotel::where('id','=',$home_id)->where('hotels.propcheck','=', 2)->get();
		return view('home/addhome/add_home_features',compact('homes','home_id'));
	}
	function add_home_features_db(Request $request,$home_id){



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
			DB::table('selected_facilityhomes')->where('selected_facilityhomes.home_id','=', $home_id)->delete();

			foreach ($request->select_facilitie as $select) {
				$select_facilitie=new selected_facilityhome;
				$select_facilitie->selected_facility=$select;
				$select_facilitie->home_id=$home_id;
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
		$join=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->select('features.*')->get();

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
		$feat->hotel_id=$home_id;
		$feat->save();
		$hotel = hotel::find($home_id);
		$hotel->features =1;
		$hotel->save(); 
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Home Features is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('add_home_poloicies/'.$home_id);
		}
	}

//add home policy
	function add_home_poloicies($home_id){

		$homes=Hotel::where('id','=',$home_id)->where('hotels.propcheck','=', 2)->get();
		return view('home/addhome/add_home_poloicies',compact('homes','home_id'));
	}
	function add_home_policies_db(Request $request,$home_id){
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
		$join=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotels.id','=', $home_id)->where('hotels.propcheck','=', 2)->select('hotel_policies.*')->get();

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
		$hotel_policies->hotel_id=$home_id;
		$hotel_policies->save();
		$hotel = hotel::find($home_id);
		$hotel->policies =1;
		$hotel->save();

		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Home Policies is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('add_home_photos/'.$home_id);
		}
	}

//add home photos
	function add_home_photos($home_id){
		$homes=Hotel::where('id','=',$home_id)->where('hotels.propcheck','=', 2)->get();
		return view('home/addhome/add_home_photo',compact('homes','home_id'));
	}
	function add_home_pic(Request $request,$home_id){
		$data="";
		$join=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->select('hotel_pics.*','hotels.photos as photocheck')->get();
		if(count($join)>0){
			$hotel_pics= hotel_pics::find($join[0]->id);
		}
		$image = $request->file('file');
		$imageName = $image->getClientOriginalName();
		$image->move(public_path('home_images/' . $join[0]->foldername . '/'),$imageName);
		if($join[0]->main_header==NULL){

			$hotel_pics->main_header=$imageName;
			$hotel_pics->save();
			$home_pic_check = hotel::find($home_id);
			$home_pic_check->photos =1;
			$home_pic_check->save(); 
		}
		if($join[0]->photocheck==NULL){
			$home_pic_check = hotel::find($home_id);
			$home_pic_check->photos =1;
			$home_pic_check->save(); 

		}
		return response()->json(['success'=>$imageName]);
	}

//add home payments
	function add_home_payment($home_id){
		$homes=Hotel::where('id','=',$home_id)->where('hotels.propcheck','=', 2)->get();
		return view('home/addhome/add_home_payment',compact('homes','home_id'));
	}
	function add_home_payemnts_db(Request $request,$hotel_id){
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

		$join=hotel::join('hotel_payments','hotels.id','=','hotel_payments.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=', $hotel_id)->select('hotel_payments.*')->get();

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
			return redirect()->back()->with('success', 'Home Payement is Updated Successfully');
		}
		if($request->form_check=="add"){
			return redirect('view_all_home')->with('status', 'Thank You For Register Yourself With Us, Its Great Honor for Us,You Will Be verify From Email');
		}
		
	}	

 //update home information
	function editHomeinfo($home_id){
		$id=Auth::user()->id;
		$home_info=Hotel::join('city_names','hotels.city','=','city_names.id')->where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->where('hotels.uid','=', $id)->select('hotels.*','city_names.city_name as city','city_names.id as city_id')->get();
		return view('home/edithome/editHomeinfo',compact('home_info','home_id'));
	}
	function update_home_info(Request $request,$home_id){
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
			'street' => 'max:255',
			'city' => 'required|numeric',
			'home_price' => 'required|numeric',
			'lat'=>'required',
			'long'=>'required',
		]);
		$home = Hotel::find($home_id);
		$home->hotel_name = $request->hotel_name;
		$home->yourRole = $request->yourRole;
		$home->contact = $request->contact;
		$home->altcontact = $request->altcontact;
		$home->landline = $request->landline;
		$home->website = $request->website;
		$home->address = $request->address;
		$home->email = $request->email;
		$home->facebookPage= $request->facebookPage;
		$home->google_map_addrs = $request->google_map_addrs;
		$home->city = $request->city;
		$home->details= $request->details;
		$home->hotel_status =0;
		$home->home_price =$request->home_price;
		$home->lat=$request->lat;
		$home->long=$request->long;
		$home->uid =  Auth::user()->id;
		$data=Auth::user()->id;
		$home->save();
		return redirect()->back()->with('success', 'Home information is Updated Successfully');
	}
	//edit form is same as add the new details 
	function editHomeDetails($home_id){
		$id=Auth::user()->id;
		$home_info=Hotel::where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->where('hotels.uid','=', $id)->get();
		return view('home/edithome/editHomeDetails',compact('home_info','home_id'));

	}
	function editHomeFeatures($home_id){
        //home basic info
		$id=Auth::user()->id;
		$home_info=Hotel::where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->where('hotels.uid','=', $id)->get();
       //internet and parking and spoken language
		$selected_features=hotel::join('features','hotels.id','=','features.hotel_id')->where('hotels.id','=',$home_id)->select('features.*')->get();
       //Facilities that are Popular with Guests,update
		Session::put('home_id', $home_id);
		$home_sel_features = DB::table('hotel_facilities')
		->join('sub_facilities','hotel_facilities.id','=','sub_facilities.parent_id')
		->leftJoin('selected_facilityhomes', function($join){
			$join->on('sub_facilities.id','=','selected_facilityhomes.selected_facility')
			->where('selected_facilityhomes.home_id','=', Session::get('home_id'));
		})->select('sub_facilities.*','hotel_facilities.*','hotel_facilities.id as main_id','sub_facilities.id as sub_facilities_id','selected_facilityhomes.selected_facility as selected_facility')->where('hotel_facilities.room_show','=', "NO")->orderBy('hotel_facilities.facilities_type')->get();
		if(Session::has('home_id')){
			session()->forget('home_id');
		}

		return view('home/edithome/editHomeFeatures',compact('home_info','home_id','selected_features','home_sel_features'));

	}

	function editHomePolicies($home_id){
		$id=Auth::user()->id;

		$hotel_policy=hotel::join('hotel_policies','hotels.id','=','hotel_policies.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.uid','=', $id)->where('hotel_policies.hotel_id','=',$home_id)->select('hotel_policies.*','hotel_policies.check_inTo as chkinto')->get();

		return view('home/edithome/editHomePolicies',compact('hotel_policy','home_id'));
	}
	function editHomePhoto($home_id){
		$id=Auth::user()->id;
		$count_pics=0;
		$home_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.id','=',$home_id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();
		return view('home/edithome/editHomePhoto',compact('home_pics','home_id','count_pics'));
	}
	function picdelete_home($removeid,$id){
		$count_pics=0;
		$home_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=',$id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();
		$dirpath='home_images/'.$home_pics[0]->foldername;
		if( File::delete($dirpath.'/'.$removeid)){}
			return view('home.edithomechunks.updatepics_div',compact('home_pics','count_pics'));
	}
	function MakeHomeFeatured($Fearured_id,$home_id,$hotel_pic_parent_id){
		$count_pics=0; 
		$hotel_pics = hotel_pics::find($hotel_pic_parent_id);
		$hotel_pics->main_header=$Fearured_id;
		$hotel_pics->save();
		$home_pics=hotel::join('hotel_pics','hotels.id','=','hotel_pics.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=',$home_id)->select('hotels.*', 'hotel_pics.foldername', 'hotel_pics.main_header','hotels.created_at as creation_date','hotel_pics.id as hotel_pic_parent_id')->get();

		
		return view('home.edithomechunks.updatepics_div',compact('home_pics','count_pics'));
	}
	function editHomePayments($home_id){
		$payments=hotel::join('hotel_payments','hotels.id','=','hotel_payments.hotel_id')->where('hotels.propcheck','=', 2)->where('hotels.id','=', $home_id)->select('hotel_payments.*')->get();

		return view('home.edithome.editHomePayments',compact('payments','home_id'));

	}
	function CompleteHomeListing($home_id){

		$homes=Hotel::find($home_id);
		
		if($homes->details==NULL){
			return redirect('add_home_details/'.$home->id);
		}
		else if(!$homes->features){
			return redirect('add_home_features/'.$home_id);
		}
		else if(!$homes->policies){
			return redirect('add_home_poloicies/'.$home_id);

		}
		else if(!$homes->photos){
			return redirect('add_home_photos/'.$home_id);

		}
		else if(!$homes->payments){
          return redirect('add_home_payment/'.$home_id);
		}
		else{

		}
		//return view('home/addhome/add_home_poloicies',compact('homes','home_id'));

	}

}

