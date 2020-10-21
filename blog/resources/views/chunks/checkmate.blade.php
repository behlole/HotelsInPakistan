
		<?php
		$data=room_pics::where('room_id','=', $id)->get();

		$dirpath='roomiamges/'.$data[0]->foldername;


		$pic = $request->images_main;
		$Check=0;
		if($pic){

			File::delete($dirpath.'/'.$data[0]->main_header);



			$mainpic=time().'.'.$pic->getClientOriginalName();
			$upload_success = $pic->move('roomiamges/' . $data[0]->foldername . '/' , $mainpic);
			$data[0]->main_header=$mainpic;
			$Check=1;

		}


		$files = $request->images;

		$uploadcount = 0;
		if($files){
			foreach($files as $file) {
				$rules = array('file' => 'required|mimes:jpeg,jpg,png'); 

				$validator = \Validator::make(array('file'=> $file), $rules);
				if($validator->passes()){

					$filename = $file->getClientOriginalName();


					$upload_success = $file->move('roomiamges/' . $data[0]->foldername . '/', $filename);
					$uploadcount ++;
				}
			}
		}

		if($uploadcount>0||$Check==1){


			$data[0]->save();
			return redirect()->back()->with('status', 'Rooms Pictures Are Udated');

		}
		else{
			return redirect()->back()->with('danger', 'Please Add Some Pictures');
		}
