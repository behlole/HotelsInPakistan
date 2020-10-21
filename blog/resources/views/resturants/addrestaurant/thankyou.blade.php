	<div class="thank-you-pop">
		<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
		<h1>Thank You!</h1>
		<p>Your submission is received and soon your listing will be live</p>
		<h3 class="cupon-pop" >Your Id: <span id="resturants_id"><?php if (Session::has('resturants_id')) { 
			
             echo Session::get('resturants_id');
			}


			?>
		</span></h3>

		<br>
	</div>
	<p style="text-align: center;margin-top: -20px;"><a href="#" class="btn btn-info btn-xs" role="button">Edit</a>
	 <a href="#" class="btn btn-default btn-xs" role="button">Preview</a></p>