 <li 
 @if(Request::is('editCarAgency/*')) class="active"
  @endif>
 	<a href="{{ URL('editCarAgency',$agency_id) }}">Introduction</a>
 </li>
 
 <li @if(Request::is('editAgencyDetails/*'))class="active" @endif>
 	<a href="{{ URL('editAgencyDetails',$agency_id) }}">Edit Details</a>
 </li>