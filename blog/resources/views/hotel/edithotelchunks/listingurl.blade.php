 <li 
 @if(Request::is('updatehotelinfo/*')) class="active"
  @endif>
 	<a href="{{ URL('updatehotelinfo',$hotel_id) }}">Introduction</a>
 </li>
 <li 
 @if(Request::is('editHomeDetails/*'))class="active" @endif>
 	<a href="{{ URL('editHotelDetails',$hotel_id) }}">Details</a>
 </li>
 <li @if(Request::is('editHotelFeatures/*'))class="active" @endif>
 	<a href="{{ URL('editHotelFeatures',$hotel_id) }}">Features</a>
 </li>
 <li @if(Request::is('editHotelPolicies/*'))class="active" @endif>
 	<a href="{{ URL('editHotelPolicies',$hotel_id) }}">Policies</a>
 </li>
 <li @if(Request::is('editHotelPhoto/*'))class="active" @endif>
 	<a href="{{ URL('editHotelPhoto',$hotel_id) }}">Photo</a>
 </li>
 <li @if(Request::is('editHotelPayments/*'))class="active"
  @endif>
 	<a href="{{ URL('editHotelPayments',$hotel_id) }}">Payment</a>
 </li>