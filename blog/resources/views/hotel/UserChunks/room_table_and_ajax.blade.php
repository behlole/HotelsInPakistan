 <?php $i=0;$room_id=""; ?>
      @foreach ($hotel_room as $room)
      <tr>
        <td class="theme-item-page-rooms-table-type">
          <h5 class="theme-item-page-rooms-table-type-title">{{$room->roomname}}</h5>
          <img class="theme-item-page-rooms-table-type-img" src="{{ URL::asset('roomiamges/'.$room->foldername.'/'.$room->main_header) }}" alt="Image Alternative text" title="Image Title"/>
          <?php 
          $dir_path = 'roomiamges/'.$room->foldername;
          $extensions_array = array('jpg','png','jpeg');
          $data_room_images="";
          $checked=0;
          if(is_dir($dir_path))
          {
            $files = scandir($dir_path);

            for($i = 0; $i < count($files); $i++)
            {
              $filemax=count($files);
              if($files[$i] !='.' && $files[$i] !='..')
              {
                $file = pathinfo($files[$i]);
                $extension = $file['extension'];

                if(in_array($extension, $extensions_array))
                {
                  $var=$dir_path.'/'.$files[$i];
                  $data_room_images=$data_room_images.URL::asset($var).",";
                }
              }
            }
            $data_room_images=rtrim($data_room_images,',');
          }
          ?>
          <a id="maxi" class="btn _tt-uc _ls-0 _mt-30 _p-15 room_pictures btn-primary btn-white" data-items="{{$data_room_images}}">
            <i class="btn-icon fa fa-camera"></i>Show Photos
          </a>
        </td>
        <td>
          <ul class="theme-item-page-rooms-table-guests-count">
            <?php if($room->total_people>1){ ?>
              <li>
                <i class="fa fa-male"></i>
              </li>
              <li style="font-size: 12px;">{{$room->total_people}} Guest Space</li>
            <?php } else { ?>
             <li>
              <i class="fa fa-male"></i>
            </li>
            <li style="font-size: 12px;">Only For One Person</li>


          <?php }  ?>
        </ul>
      </td>
      <td>
        <ul class="theme-item-page-rooms-table-options-list">
          <li>{{$room->smookin_policy}}</li>
          <li>No Of Room {{$room->no_of_rooms}}
          </li>
        </ul>
        <ul class="theme-item-page-rooms-table-type-feature-list">
          <li>
            <i class="fa fa-arrows-h theme-item-page-rooms-table-type-feature-list-icon"></i>{{$room->room_size}} {{$room->room_unit}}
          </li>
        </ul>
        <ul class="theme-item-page-rooms-table-type-feature-list">
          @foreach ($amenities_array[$loop->iteration-1] as $am)
          <?php if($am->parent_id==$room->id){   ?>
            <li>
              <i class="{{$am->sub_icon}} theme-item-page-rooms-table-type-feature-list-icon"></i>
              {{$am->room_ammenty}}
            </li>
          <?php } ?>
        @endforeach
        </ul>
      </td>
      <td class="theme-item-page-rooms-table-price">
        <div>
          <div class="theme-item-page-rooms-table-price-night">
            <p class="theme-item-page-rooms-table-price-sign">PKR </p>
            <p class="theme-item-page-rooms-table-price-night-amount">{{$room->room_price_night}}</p>
            <p class="theme-item-page-rooms-table-price-sign">Per Night </p>
          </div>
          <div class="theme-item-page-rooms-table-price-total">
            <p class="theme-item-page-rooms-table-price-sign">Left Rooms
              <br/>{{$room->no_of_rooms}}/{{$room->no_of_rooms}}
            </p>

          </div>
        </div>
      </td>
      <td>
      <!--   <a class="btn btn-primary-inverse btn-block" href="{{ URL('booking_room',$room->id) }}">Book now</a> -->
        <p class="theme-item-page-rooms-table-booking-note">No booking or
          <br/>credit card fees!
        </p>
      </td>
    </tr>
    @endforeach