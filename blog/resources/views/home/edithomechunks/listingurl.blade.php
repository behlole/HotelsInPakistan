 <li 
 @if(Request::is('editHomeinfo/*')) class="active"
  @endif>
 	<a href="{{ URL('editHomeinfo',$home_id) }}">Introduction</a>
 </li>
 <li 
 @if(Request::is('editHomeDetails/*'))class="active" @endif>
 	<a href="{{ URL('editHomeDetails',$home_id) }}">Details</a>
 </li>
 <li @if(Request::is('editHomeFeatures/*'))class="active" @endif>
 	<a href="{{ URL('editHomeFeatures',$home_id) }}">Features</a>
 </li>
 <li @if(Request::is('editHomePolicies/*'))class="active" @endif>
 	<a href="{{ URL('editHomePolicies',$home_id) }}">Policies</a>
 </li>
 <li @if(Request::is('editHomePhoto/*'))class="active" @endif>
 	<a href="{{ URL('editHomePhoto',$home_id) }}">Photo</a>
 </li>
 <li @if(Request::is('editHomePayments/*'))class="active"
  @endif>
 	<a href="{{ URL('editHomePayments',$home_id) }}">Payment</a>
 </li>