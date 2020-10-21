<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\Restaurant\restlist;
use App\Models\Car\cars;
use App\Models\Hotel\Hotel;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Hotel\destination;
use App\Models\Hotel\hotel_review;
use App\city_name;
use DB;
use App\Models\Car\car_review;
use App\Models\Restaurant\restaurant_type_name;
use Illuminate\Support\Facades\Redirect;
class UserController extends Controller
{

	public function index()
	{
		return redirect('/');
	}


//welcome to Hotels In Pakistan
function showHotel()
	{
		return view('profile.hotel.show');
	}
	function addHotel()
	{
		return view('profile.hotel.add');
	}
	
	function showWishlist()
	{
		return view('profile.showWishlist');
	}
	function showBookingReport($status=null)
	{
		if($status==null)
		{
			
			return view('profile.hotel.booking_report');
		}
		else
		{
			return view('profile.hotel.booking_report');
		}
	}
	function showBookingHistory($status=null)
	{
		// dd("hello");
		if($status==null)
		{
			
			return view('profile.hotel.booking_history');
		}
		else
		{
			return view('profile.hotel.booking_history');
		}
	}


	//Space



	function showSpace()
	{
		return view('profile.space.show');
	}
	function addSpace()
	{
		return view('profile.space.add');
	}
	function showAvailability()
	{
		return view('profile.space.availability');
	}
	
	function bookingSpaceReport($status=null)
	{
		if($status==null)
		{
			
			return view('profile.space.booking_report');
		}
		else
		{
			return view('profile.space.booking_report');
		}
	}
	function enquiry()
	{
		return view('profile.enquiry');
	}


















	function welcome(){
//	    dd(bcrypt("$2y$10$bl6BISIPVy6AUhN5WSkjiOND.R3xeJYLCkwwE6gdROxLIan/Ey18O"));
//        dd(bcrypt("behlole"));
		$data=destination::join('city_names','destinations.des_city','=','city_names.id')
		->where('destinations.des_status','=', 1)
		->select('destinations.*','city_names.city_name as city','city_names.id as city_id')->inRandomOrder()
		->get();
      //use for restaurant search
		$restaurant_types=restaurant_type_name::all();

		return view('welcome',compact('data','restaurant_types'));
	}

//welcome To Listing Page
	public function welcome_to_listing(Request $request){
		return view('User/LoggedIn/welcome_to_listing');
	}

	function all_listing_by_users(){

		$id=Auth::user()->id;

		$restlist=restlist::where('uid','=', $id)->count();
		$car_opr=cars::where('uid','=', $id)->count();

		$Hotel=Hotel::where('uid','=', $id)->where('hotels.propcheck','=', 1)->count();
		$home=Hotel::where('uid','=', $id)->where('hotels.propcheck','=', 1)->count();

		return view('User/LoggedIn/all_listing',compact('restlist','Hotel','car_opr','home'));

	}
	public function my_profile(){

		return view('profile/profile');

	}
	public function car_agency_review(Request $request,$id)
	{
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
		$car_review = new car_review;
		$car_review->name = $request->f_name;
		$car_review->phone = $request->phone;
		$car_review->email = $request->email;
		$car_review->rattings = $request->rattings;
		$car_review->coments = $request->comments;
		$car_review->agency_id = $id;
		$car_review->save();
		return redirect()->back()->with('status', 'Review Submitted');
	}

	function add_hotel_review(Request $request,$id) {

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
		$restlist_review = new hotel_review;
		$restlist_review->name = $request->f_name;
		$restlist_review->phone = $request->phone;
		$restlist_review->email = $request->email;
		$restlist_review->rattings = $request->rattings;
		$restlist_review->coments = $request->comments;
		$restlist_review->hotel_id = $id;
		$restlist_review->save();

		return redirect()->back()->with('status', 'Review Submitted');
	}





	public function my_profile_update_password(Request $request){

		$this->validate($request, [

			'pass1' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
			'pass2'=>'required|same:pass1',
		]);

		$user = User::find(Auth::user()->id);
		$user->password =bcrypt($request->pass1);
		$user->save();

		return redirect('/logout');


	}

	function myprofile(){

		return view('accounts/profile');

	}

	public function my_profile_password(){

		return view('profile/my_profile_password');
	}
	public function my_profile_update(Request $request){

		$this->validate($request, [
			'name' => 'required:255',
			'file' => 'required',
			'mobile_no' => 'required',

		]);


		$user = User::find(Auth::user()->id);
		$user->name=$request->name;
		$user->mobile_no=$request->mobile_no;
		$pic = $request->file;
		$data=time();
		$result = \File::makeDirectory('profile_image/' . $data . '/', 0777, true, true);


		$mainpic=time().'.'.$pic->getClientOriginalName();
		$upload_success = $pic->move('profile_image/' . $data . '/', $mainpic);



		$user->main_pic=$mainpic;
		$user->foldername=$data;

		$user->save();
		return redirect()->back()->with('status', 'Profile Updated');

	}

	public function dataAjax(Request $request)

	{

		$data = [];


		if($request->has('q')){

			$search = $request->q;


			$data = DB::table("city_names")

			->select("id","city_name")

			->where('city_name','LIKE',"%$search%")

			->get();

		}


		return response()->json($data);

	}


	function External_links($refererUrl){

	}



}
