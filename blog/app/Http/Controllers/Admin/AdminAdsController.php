<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads\ListingAd;
use File;
class AdminAdsController extends Controller
{
    //


	function Hotel_Ads()
	{
		$data=ListingAd::where('hotel','=', 1)
		->get();
		$page_name="All Hotel Ads";
		$page_id="hotel";
		return view('Admin/Ads/listing_ads',compact('data','page_name','page_id'));

	}
	function Home_Ads()
	{
		$data=ListingAd::where('home','=', 1)
		->get();
		$page_name="All Home Ads";
		$page_id="home";
		return view('Admin/Ads/listing_ads',compact('data','page_name','page_id'));

	}
	function Restaurant_Ads()
	{
		$data=ListingAd::where('restaurant','=', 1)
		->get();
		$page_name="All Restaurant Ads";
		$page_id="restaurant";
		return view('Admin/Ads/listing_ads',compact('data','page_name','page_id'));

	}
	function Car_Ads()
	{
		$data=ListingAd::where('car','=', 1)
		->get();
		$page_name="All Cars Ads";
		$page_id="car";
		return view('Admin/Ads/listing_ads',compact('data','page_name','page_id'));

	}

	
	public function add_ads_db(Request $request)
	{

		$this->validate($request, [
			'ads_name' => 'required',
			'ads_company' => 'required',
			'ads_url' => ['max:255', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/','required'],
			'ad_page' => 'required',
			'allign' => 'required'


		]);

		$ListingAd = new ListingAd;
		$ListingAd->ads_name = $request->ads_name;
		$ListingAd->ads_company =$request->ads_company;
		$ListingAd->ads_url =$request->ads_url;
		$ListingAd->allign =$request->allign;
		if($request->page_request=="hotel"){
			$ListingAd->hotel =1;
		}
		if($request->page_request=="home"){
			$ListingAd->home =1;

		}
		if($request->page_request=="restaurant"){

			$ListingAd->restaurant =1;
		}
		if($request->page_request=="car"){

			$ListingAd->car =1;
		}


		
		if($request->ad_page==1){
			$ListingAd->all =1;
			$ListingAd->result =1;
			$ListingAd->single =1;
			$ListingAd->inlisting =0;
		}
		if($request->ad_page==2){
			$ListingAd->all =0;
			$ListingAd->single =1;
			$ListingAd->result =0;
			$ListingAd->inlisting =0;
		}if($request->ad_page==3){
			$ListingAd->all =0;
			$ListingAd->single =0;
			$ListingAd->result =1;
			$ListingAd->inlisting =0;
		}
		if($request->ad_page==4){
			$ListingAd->all =0;
			$ListingAd->single =0;
			$ListingAd->result =0;
			$ListingAd->inlisting =1;

		}
		$data = ListingAd::all()->count();
		$data=$data+1;
		$pic = $request->ad_image;
		$data=$data.time();
		$result = \File::makeDirectory('Ads/' . $data . '/', 0777, true, true);
		$str = preg_replace('/\s+/', '', $pic->getClientOriginalName());
		$mainpic=time().'.'.$str;
		$upload_success = $pic->move('Ads/' . $data . '/', $mainpic);
		$ListingAd->ads_pic=$mainpic;
		$ListingAd->ads_folder=$data;
		$ListingAd->save();
		return redirect()->back()->with('status_ok', 'Ads Uploded');

	}

	function Update_ads($ads_id){
		$data=ListingAd::where('id','=', $ads_id)
		->get();

		return view('Admin/Ads/Update_ads',compact('data'));

	}

	function update_ads_db(Request $request){
		

		$this->validate($request, [
			'ads_name' => 'required',
			'ads_company' => 'required',
			'ads_url' => ['max:255', 'regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/','required'],
			'ad_page' => 'required',
			'allign' => 'required'


		]);

		$ListingAd = ListingAd::find($request->ad_id);
		if($ListingAd){
			$ListingAd->ads_name = $request->ads_name;
			$ListingAd->ads_company =$request->ads_company;
			$ListingAd->ads_url =$request->ads_url;
			$ListingAd->allign =$request->allign;

			if($request->ad_page==1){
				$ListingAd->all =1;
				$ListingAd->result =1;
				$ListingAd->single =1;
				$ListingAd->inlisting =0;
			}
			if($request->ad_page==2){
				$ListingAd->all =0;
				$ListingAd->single =1;
				$ListingAd->result =0;
				$ListingAd->inlisting =0;
			}if($request->ad_page==3){
				$ListingAd->all =0;
				$ListingAd->single =0;
				$ListingAd->result =1;
				$ListingAd->inlisting =0;
			}
			if($request->ad_page==4){
				$ListingAd->all =0;
				$ListingAd->single =0;
				$ListingAd->result =0;
				$ListingAd->inlisting =1;

			}
			if($request->ad_image){

				$pic = $request->ad_image;
				$str = preg_replace('/\s+/', '', $pic->getClientOriginalName());
				$mainpic=time().'.'.$str;
				$upload_success = $pic->move('Ads/' . $ListingAd->ads_folder . '/', $mainpic);
				$ListingAd->ads_pic=$mainpic;
			}
			$ListingAd->save();
			return redirect()->back()->with('status_ok', 'Ads Updated');

	}//find end
}//


function perform_multiple_ads(Request $request){
	$this->validate($request, [
		'check_list' => 'required',
		'PerformThis' => 'required'

	]);

	foreach ($request->check_list as $key => $value) {
		$ListingAd = ListingAd::find($value);
		if($request->PerformThis==1){
			$ListingAd->allign =$request->allign;
			if($request->ad_page==1){
				$ListingAd->all =1;
				$ListingAd->result =1;
				$ListingAd->single =1;
				$ListingAd->inlisting =0;
			}
			if($request->ad_page==2){
				$ListingAd->all =0;
				$ListingAd->single =1;
				$ListingAd->result =0;
				$ListingAd->inlisting =0;
			}if($request->ad_page==3){
				$ListingAd->all =0;
				$ListingAd->single =0;
				$ListingAd->result =1;
				$ListingAd->inlisting =0;
			}
			if($request->ad_page==4){
				$ListingAd->all =0;
				$ListingAd->single =0;
				$ListingAd->result =0;
				$ListingAd->inlisting =1;

			}
        $ListingAd->save();
		}
		if($request->PerformThis==2){
			if($request->answer=="mkr@11204"){
				$dirpath='Ads/'.$ListingAd->ads_folder;
				File::deleteDirectory($dirpath);
				$ListingAd->delete();
			}

		}if($request->PerformThis==3){
			$ListingAd->ads_status=$request->ads_status;
			$ListingAd->save();
		}

		
	}
	return redirect()->back()->with('status_ok', ' Multiple Opertion Performed');
}
}
