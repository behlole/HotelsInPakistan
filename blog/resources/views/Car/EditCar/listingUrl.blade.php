 <li 
 @if(Request::is('car_update/*')) class="active"
  @endif>
 	<a href="{{ URL('car_update',$car_id) }}">Introduction</a>
 </li>
 
 <li @if(Request::is('editCarPics/*'))class="active" @endif>
 	<a href="{{ URL('editCarPics',$car_id) }}">Edit Picture</a>
 </li>