<?php

namespace App\Models\Ads;

use Illuminate\Database\Eloquent\Model;

class ListingAd extends Model
{
	public static function Ads_For_Result_Page_Right($page_check) {
		$allign = array("all", "Right");
		
		$ListingAd=ListingAd::where($page_check,'=', 1)
		->whereIn('allign',$allign)
		->where('ads_status','=',1)
		->where('result','=',1)
		->select('ads_folder','ads_url','ads_pic','ads_company')->inRandomOrder()
		->take(2)
		->get();
		return $ListingAd;
	}
	public static function Ads_For_Result_Page_Left($page_check) {
		$allign = array("Left");
		$ListingAd=ListingAd::where($page_check,'=', 1)
		->whereIn('allign',$allign)
		->where('ads_status','=',1)
		->where('result','=',1)
		->select('ads_folder','ads_url','ads_pic','ads_company')->inRandomOrder()
		->take(1)
		->get();
		return $ListingAd;
	}
	public static function Ads_in_listing($page_check) {
	
		$ListingAd=ListingAd::where($page_check,'=', 1)
		->where('ads_status','=',1)
		->where('inlisting','=',1)
		->select('ads_folder','ads_url','ads_pic','ads_company')->inRandomOrder()
		->take(5)
		->get();
		return $ListingAd;
	}

   public static function single_page_ads($page_check) {
	
		$ListingAd=ListingAd::where($page_check,'=', 1)
		->where('ads_status','=',1)
		->where('single','=',1)
		->select('ads_folder','ads_url','ads_pic','ads_company')->inRandomOrder()
		->take(1)
		->get();
		return $ListingAd;
	}

	
	
}
