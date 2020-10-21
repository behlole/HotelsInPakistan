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
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CarAgencyListing extends Controller
{
    //

	public function new_agency_listing()
	{
		return view('CarAgency/AddCarAgency/AddCarAgency');
    	# code...
	}
	function new_agency_listing_db(Request $request){

		$this->validate($request, [
			'caropr_name' => 'max:255|required',
			'contact' => 'required|numeric',
			'altcontact' => 'regex:/^[0-9]+$/|nullable',
			'email' => 'required|email',
			'landline' => 'regex:/^[0-9]+$/|nullable',
			'website' => 'max:255|nullable',
			'address' => 'required|max:255',
			'facebookPage' => 'nullable',
			'city' => 'required',
			'logo' => 'required|mimes:jpeg,jpg,png',


		]);

		$car_opr =  new car_opr;
		$car_opr->caropr_name = $request->caropr_name;
		$car_opr->contact = $request->contact;
		$car_opr->altcontact = $request->altcontact;
		$car_opr->email = $request->email;
		$car_opr->landline = $request->landline;
		$car_opr->website = $request->website;
		$car_opr->address = $request->address;
		$car_opr->facebookPage = $request->facebookPage;
		$car_opr->city = $request->city;
		$car_opr->lat=$request->lat;
		$car_opr->longitude=$request->long;
		$car_opr->uid = Auth::user()->id;
		$car_opr->car_opr_status =0;
		
		$pic = $request->logo;
		$data=time();
		$result = \File::makeDirectory('caropr_image/' . $data . '/', 0777, true, true);
		$mainpic=time().'.'.$pic->getClientOriginalName();
		$upload_success = $pic->move('caropr_image/' . $data . '/', $mainpic);
		$car_opr->uploadHeaderPhoto=$mainpic;
		$car_opr->car_opr_folder =$data;
		$car_opr->save();

		return redirect('car_opr_details/'.$car_opr->id);
	}

	function car_opr_details($car_operator_id){

		$car_opr_data=car_opr::where('id','=',$car_operator_id)->get();

		return view('CarAgency/AddCarAgency/AgencyDetails',compact('car_opr_data','car_operator_id'));
	}

	function add_deatils_car_agency_db(Request $request,$car_operator_id){
		$Property =  car_opr::find($car_operator_id);
		$Property->details=$request->editor1;
		
		$Property->save();
		if($request->form_check=="edit"){
			return redirect()->back()->with('success', 'Car Agency is Updated Successfully');

		}
		if($request->form_check=="add"){
			return redirect('add_cars_loop/'.$car_operator_id);
		}
		
	}

	function add_cars_loop($car_operator_id){

		$cars=car_opr::join('cars','car_oprs.id','=','cars.car_opr_id')->where('car_oprs.id','=', $car_operator_id)->select('cars.*')->get();
		$vehicle_type=vehicle_type::all();
		$brand=brand::all();

		return view('Car/AddCar/AddCarForm', compact('cars','car_operator_id','vehicle_type','brand'));

	}	

	function new_car_listing_db(Request $request,$car_operator_id){

		$this->validate($request, [
			'car_title' => 'required',
			'vehicle_type' => 'required',
			'brand' => 'required',
			'model' => 'required|regex:/^[0-9]+$/',
			'no_of_cars' => 'required',
			'transmission_type' => 'required',
			'fuel' => 'required',
			'passengers' => 'required',
			'ac' => 'required',
			'car_price' => 'required',
			'c_text' => 'required|max:255',
			'bags' => 'required',
			'logo' => 'required|mimes:jpeg,jpg,png'
		]);
		$cars =  new cars;
		$cars->car_title = $request->car_title;
		$cars->vehicle_type = $request->vehicle_type;
		$cars->brand = $request->brand;
		$cars->model = $request->model;
		$cars->no_of_cars = $request->no_of_cars;
		$cars->transmission_type = $request->transmission_type;
		$cars->passengers = $request->passengers;
		$cars->ac = $request->ac;
		$cars->fuel = $request->fuel;
		$cars->details = $request->c_text;
		$cars->car_price = $request->car_price;
		$cars->bags = $request->bags;
		$cars->car_opr_id = $car_operator_id;
		$cars->uid = Auth::user()->id;
		$cars->car_status =0;
		$data=Auth::user()->id;
		$pic = $request->logo;
		$data=time();
		$result = \File::makeDirectory('cars_image/' . $data . '/', 0777, true, true);
		$mainpic=time().'.'.$pic->getClientOriginalName();
		$upload_success = $pic->move('cars_image/' . $data . '/', $mainpic);
		$cars->car_pic=$mainpic;
		$cars->car_folder=$data;
		$cars->save();
		return redirect('add_cars_picture/'.$cars->id)->with('status', 'Succefully Done,Please Wait For Email Approval');



	}

	function add_cars_picture($car_id){

		$car_data =  cars::find($car_id)->get();
		$car_operator_id=$car_data[0]->car_opr_id;
		return view('Car/AddCar/AddCarPics', compact('car_data','car_id','car_operator_id'));

	}
	function add_cars_pictures_db(Request $request,$car_id){
		$data="";
		$car=cars::find($car_id);

		$image = $request->file('file');
		$imageName = $image->getClientOriginalName();
		$image->move(public_path('cars_image/' . $car->car_folder . '/'),$imageName);
		
		$car->car_pic_check=1;
		$car->save();
		return response()->json(['success'=>$imageName]);
	}


//car loop form to add another cars

	function car_loop_form($car_operator_id){

		$car_data=cars::join('brands','cars.brand','=','brands.id')
			->join('vehicle_types','cars.vehicle_type','=','vehicle_types.id')
			->join('car_oprs','cars.car_opr_id','=','car_oprs.id')
			->where('car_oprs.id','=', $car_operator_id)->select('cars.*','vehicle_types.vehicle_type as vehicle_type_name','brands.brand_type as brand_type_name')->get();

		return view('Car/AddCar/AddCarLoop', compact('car_data','car_operator_id'));



	}

  //request of car upate 

	function car_update($car_id){
		$car_data =  cars::where('id','=',$car_id)->get();
		$vehicle_type=vehicle_type::all();
		$brand=brand::all();
		return view('Car/EditCar/EditCar', compact('car_data','car_id','vehicle_type','brand'));
	}

	function car_update_db(Request $request,$car_id){

		$this->validate($request, [
			'car_title' => 'required',
			'vehicle_type' => 'required',
			'brand' => 'required',
			'model' => 'required|regex:/^[0-9]+$/',
			'no_of_cars' => 'required',
			'transmission_type' => 'required',
			'fuel' => 'required',
			'passengers' => 'required',
			'ac' => 'required',
			'car_price' => 'required',
			'c_text' => 'required|max:255',
			'bags' => 'required',
		]);
		$cars =  cars::find($car_id);
		$cars->car_title = $request->car_title;
		$cars->vehicle_type = $request->vehicle_type;
		$cars->brand = $request->brand;
		$cars->model = $request->model;
		$cars->no_of_cars = $request->no_of_cars;
		$cars->transmission_type = $request->transmission_type;
		$cars->passengers = $request->passengers;
		$cars->ac = $request->ac;
		$cars->fuel = $request->fuel;
		$cars->details = $request->c_text;
		$cars->car_price = $request->car_price;
		$cars->bags = $request->bags;
		

		$cars->car_status =0;
		if($request->logo){
			$pic = $request->logo;
			$mainpic=time().'.'.$pic->getClientOriginalName();
			$upload_success = $pic->move('cars_image/' . $cars->car_folder . '/', $mainpic);
			$cars->car_pic=$mainpic;
		}
		$cars->save();

		return redirect()->back()->with('success', 'Car Data Updated Succefully');

	}

	function editCarPics($car_id){
		$count_pics=0;
		$car_data =  cars::where('id','=',$car_id)->get();
		return view('Car/EditCar/EditCarPics', compact('car_data','car_id','count_pics'));

	}

	function picdelete_cars($removeid,$car_id){
		$count_pics=0;
		$car_data =  cars::where('id','=',$car_id)->get();
		$dirpath='cars_image/'.$car_data[0]->car_folder;
		if( File::delete($dirpath.'/'.$removeid)){}
			return view('Car.EditCarChunks.UpdateDiv',compact('car_data','count_pics','car_id'));
	}


	public function view_cars()
	{
		$id=Auth::user()->id;

		$cars=car_opr::join('city_names','car_oprs.city','=','city_names.id')->select('car_oprs.*','city_names.city_name as city')->where('car_oprs.uid','=',$id)->get();

		return view('Car.UserDashBoard.view_all_cars',compact('cars'));
	}



	function editCarAgency($agency_id){
		$car_opr =  car_opr::join('city_names','car_oprs.city','=','city_names.id')
		->where('car_oprs.id','=',$agency_id)->select('car_oprs.*','city_names.id as city')->get();

		return view('CarAgency/EditCarAgency/EditCarAgency', compact('car_opr','agency_id'));


	}

	function Car_Agency_Update(Request $request,$agency_id){

		
		$this->validate($request, [
			'caropr_name' => 'max:255|required',
			'contact' => 'required|numeric',
			'altcontact' => 'regex:/^[0-9]+$/|nullable',
			'email' => 'required|email',
			'landline' => 'regex:/^[0-9]+$/|nullable',
			'website' => 'max:255|nullable',
			'address' => 'required|max:255',
			'facebookPage' => 'nullable',
			'city' => 'required',
			'logo' => 'mimes:jpeg,jpg,png',


		]);

		$car_opr = car_opr::find($agency_id);
		$car_opr->caropr_name = $request->caropr_name;
		$car_opr->contact = $request->contact;
		$car_opr->altcontact = $request->altcontact;
		$car_opr->email = $request->email;
		$car_opr->landline = $request->landline;
		$car_opr->website = $request->website;
		$car_opr->address = $request->address;
		$car_opr->facebookPage = $request->facebookPage;
		$car_opr->city = $request->city;
		$car_opr->lat=$request->lat;
		$car_opr->longitude=$request->long;
		$car_opr->uid = Auth::user()->id;
		$car_opr->car_opr_status =0;
		
		$pic = $request->logo;
		

		if($request->logo){
			$pic = $request->logo;
			$mainpic=time().'.'.$pic->getClientOriginalName();
			$upload_success = $pic->move('caropr_image/' . $car_opr->car_opr_folder . '/', $mainpic);
			$car_opr->uploadHeaderPhoto=$mainpic;
		}
		$car_opr->save();

		return redirect()->back()->with('success', 'Agency Updated Succefully');


	}

	function editAgencyDetails($agency_id){

		$car_opr = car_opr::where('id','=', $agency_id)->get();
		return view('CarAgency/EditCarAgency/EditCarDetails', compact('car_opr','agency_id'));

	}

}
