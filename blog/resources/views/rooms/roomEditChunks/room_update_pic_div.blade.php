@foreach($room_pics as $pic)
<input type="hidden" id="room_pic_id" value="{{$pic->id}}">
 <?php
 $dir_path = 'roomiamges/'.$pic->foldername;
   $extensions_array = array('jpg','png','jpeg');
   $var="";
   $name="";
   if(is_dir($dir_path))
   {
    $files = scandir($dir_path);
    for($i = 0; $i < count($files); $i++)
    {
      if($files[$i] !='.' && $files[$i] !='..')
      {
        $file = pathinfo($files[$i]);
        $extension = $file['extension'];
        if(in_array($extension, $extensions_array))
        {
         $count_pics++;
          if($pic->main_header!=$files[$i]){
            $var=$dir_path.'/'.$files[$i];
            $name=$files[$i];
            ?>
            <div class="col-md-3 " >
              <div class="theme-item-page-facilities-item">
                <img src="{{ URL::asset($var) }}" class="theme-search-results-item-img" alt="" style="width: 100%;
               border-radius: 10px;
               -webkit-transition: all .3s ease-in-out;
               transition: all .3s ease-in-out;height: 150px;">
               <p class="theme-item-page-facilities-item-body">
                
                <p style="" id="{{$name}}" class="btn btn-danger  btn-xs clickme">Remove this Image</p>
                  <p style="" id="{{$name}}" class="btn btn-primary  btn-xs clickmefeatured">MAKE FEATURED</p>
              
              </p>
            </div>
          </div>
          <?php    
        }else{
            $var=$dir_path.'/'.$files[$i];
            $name=$files[$i];
          ?>
           <div class="col-md-3 " >
              <div class="theme-item-page-facilities-item">
                <img src="{{ URL::asset($var) }}" class="theme-search-results-item-img" alt="" style="width: 100%;
               border-radius: 10px;
               -webkit-transition: all .3s ease-in-out;
               transition: all .3s ease-in-out;height: 150px;">
               <p class="theme-item-page-facilities-item-body">
                  <p style="" id="{{$name}}" class="btn btn-danger  btn-xs clickme">Remove this Image</p>
                <p style="" id="{{$name}}" class="btn btn-primary  btn-xs">Main Image</p>
           
              
              
              </p>
            </div>
          </div>
        <?php }
      }

    }
  }
}
?>

@endforeach
<input type="hidden"  id="pic_count" value="{{$count_pics}}">