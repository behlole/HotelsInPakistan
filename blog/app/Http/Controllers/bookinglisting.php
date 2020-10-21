<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\booking;
use Session;
use Illuminate\Support\Facades\Auth;
class bookinglisting extends Controller
{
    //

    	function booking_me(Request $request){

             

		$uid;

		if (!Auth::user()){

			$this->validate($request, [
				'first_name' => 'required:255',
				'last_name' => 'required',
				'email' => 'required|string|email|max:255|unique:users',
				'phno' => 'required',
				'pass1' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
				'pass2'=>'required|same:pass1',     
				'street_1' => 'required:255',
				'street_2' => 'required',
				'postal_code' => 'required',
				'city_name' => 'required',
				'country' => 'required',
				'card_security' => 'required:255',
				'card_year' => 'required',
				'card_month' => 'required',
				'card_number' => 'required',
				'card_name' => 'required',


			]);


		}else{
			$this->validate($request, [

				'street_1' => 'required:255',
				'street_2' => 'required',
				'postal_code' => 'required',
				'city_name' => 'required',
				'country' => 'required',
				'card_security' => 'required:255',
				'card_year' => 'required',
				'card_month' => 'required',
				'card_number' => 'required',
				'card_name' => 'required',
			]);

		} 
		if (!Auth::user()){  
			$user=  User::create([
				'name' => $request->first_name,
				'email' =>  $request->email,
				'password' => bcrypt($request->pass1),
				'phone' => $request->phno,
			]);
			$uid= $user->id;
		}else{
			$uid=Auth::user()->id;
		}

		$booking= new booking;

		$booking->check_in=Session::get('check_in');
		$booking->check_out=Session::get('check_out');
		$booking->total_price=($request->days*$request->price_single);
		$booking->street_line_1=$request->street_line_1;
		$booking->street_line_2=$request->street_line_2;
		$booking->country=$request->country;
		$booking->postal=$request->postal_code;
		$booking->city=$request->city_name;

		if($request->booking_check=="home"){
			$booking->home_id=$request->booking_check_id;

		}
		
		$booking->user_id=$uid;

		if($booking->save()){

			session()->forget('check_in');
			session()->forget('check_out');
			session()->forget('pagecheck');

		}

   return redirect('/my_booking');


	}
}
