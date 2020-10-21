@extends('layout.master2')

@section('content')
 @foreach($cars as $car_db)
<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url(./img/carss.jpg);"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
        <h1 class="theme-page-header-title">Welcome To CAR Listing Page</h1>
        <p class="theme-page-header-subtitle">ABC XYZ</p>
      </div>
    </div>
  </div>
</div> 

<div class="theme-page-section theme-page-section-lg" >
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-12 " style="border: 2px solid #509aff;padding: 120px;">
        <div class="theme-payment-page-sections">
          <div class="theme-payment-page-sections-item">
            <h3 class="theme-payment-page-sections-item-title" style="text-align: center;">Enter CAR Details</h3>
          
            <form  action="{{ URL('update_cars_to_db',$car_db->id) }}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
              <div class="tab-pane active">
                        <input type="hidden" name="car_op_id"  value="{{$car_db->caropr_id}}">
                <div class="row">
                  <div class="col-md-12">
                    <div class="theme-payment-page-form-item form-group">
                      <div class="form-group">
                        <label for="sel1">Car Title:</label>
                        <input  type="text" class="form-control" name="car_title" placeholder="Car Title" value="<?php 

                  if($car_db->car_title&&!old('car_title')){

                      echo($car_db->car_title);

                      }
                      else{
                        echo old('car_title');
                      }

                  ?>"">
                        @if ($errors->has('car_title'))
                        <span class="help-block" style="color:red;">
                          <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('car_title') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">

                  <div class="col-md-6">
                    <div class="theme-payment-page-form-item form-group">
                      <div class="form-group">
                       <label for="sel1">Vehicle Type:</label>
                       <select class="form-control" style="border-radius:0px; height:50px;" name="vehicle_type" required>
                         <?php if($car_db->vehicle_type&&!old('vehicle_type')){ ?>
                      <option value="{{ $car_db->vehicle_type }}">{{ $car_db->vehicle_type }}</option>

                    <?php } ?>
                        <?php if(old('vehicle_type')){ ?>
                          <option value="{{ old('vehicle_type') }}">{{ old('vehicle_type') }}</option>

                        <?php } ?>


                        @foreach($vehicle_type as $d)
                        
                         <?php if($car_db->vehicle_type!=$d->vehicle_type){ 
                           if(old('vehicle_type')!=$d->vehicle_type){
                          ?>
                          <option value="{{$d->vehicle_type}}">{{$d->vehicle_type}}</option>
                        <?php }

                      }


                         ?>

                        @endforeach
                      </select>
                       @if ($errors->has('vehicle_type'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('vehicle_type') }}</strong>
            </span>
            @endif
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="theme-payment-page-form-item form-group">
                  <div class="form-group">
                   <label for="sel1">BRANDS:</label>
                   <select class="form-control" style="border-radius:0px; height:50px;" name="brand" required>
                        <?php if($car_db->brand&&!old('brand')){ ?>
                      <option value="{{ $car_db->brand }}">{{ $car_db->brand }}</option>

                    <?php } ?>

                    <?php if(old('brand')){ ?>
                      <option value="{{ old('brand') }}">{{ old('brand') }}</option>

                    <?php } ?>
                    @foreach($brand as $d)
                    <?php if($car_db->brand!=$d->brand_type){ 
                           if(old('brand')!=$d->brand_type){
                          ?>
                      <option value="{{$d->brand_type}}">{{$d->brand_type}}</option>

                    <?php } 

                  }
                  ?>



                    @endforeach


                  </select>
                    @if ($errors->has('brand'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('brand') }}</strong>
            </span>
            @endif

                </div>
              </div>

            </div>
          </div>

          <div class="row">
            <div class="col-md-6">


              <div class="theme-payment-page-form-item form-group">
                <div class="form-group">
                 <label for="sel1">MODEL:</label>
                 <input type="number" class="form-control" min="1900" max="2099" step="1"  name="model" value="<?php 

                  if($car_db->model&&!old('model')){

                      echo($car_db->model);

                      }
                      else{
                        echo old('model');
                      }

                  ?>" />
                 @if ($errors->has('model'))
                 <span class="help-block" style="color:red;">
                  <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('model') }}</strong>
                </span>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="theme-payment-page-form-item form-group">
              <div class="form-group">
               <label for="sel1">YEAR:</label>
               <input type="number" class="form-control" min="1900" max="2099" step="1" name="year" value="<?php 

                  if($car_db->year&&!old('year')){

                      echo($car_db->year);

                      }
                      else{
                        echo old('year');
                      }

                  ?>" >
               @if ($errors->has('year'))
               <span class="help-block" style="color:red;">
                <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('year') }}</strong>
              </span>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">


          <div class="theme-payment-page-form-item form-group">
            <div class="form-group">
             <label for="sel1">PKR Price For One Day:</label>
             <input type="number" class="form-control" min="500" max="50000" step="1" name="car_price" value="<?php 
                  if($car_db->car_price&&!old('car_price')){

                      echo($car_db->car_price);

                      }
                      else{
                        echo old('car_price');
                      }

                  ?>"  />
             @if ($errors->has('car_price'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('car_price') }}</strong>
            </span>
            @endif
          </div>
        </div>
      </div>
        <div class="col-md-4">
          <div class="theme-payment-page-form-item form-group">
            <div class="form-group">
             <label for="sel1">NO OF CARS IN FLEET:</label>
             <input type="number" class="form-control" min="1" max="1000" step="1"  name="no_of_cars" value="<?php 
                  if($car_db->no_of_cars&&!old('no_of_cars')){

                      echo($car_db->no_of_cars);

                      }
                      else{
                        echo old('no_of_cars');
                      }

                  ?>"  " />
             @if ($errors->has('no_of_cars'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('no_of_cars') }}</strong>
            </span>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-4">


        <div class="theme-payment-page-form-item form-group">
          <div class="form-group">
           <label for="sel1">Transmission Type:</label>
           <select class="form-control" style="border-radius:0px; height:50px;" name="transmission_type" required>

           <?php $myArray = array("Auto", "Mannual"); ?>  
           <?php if($car_db->transmission_type&&!old('transmission_type')){ ?>
                      <option value="{{ $car_db->transmission_type }}">{{ $car_db->transmission_type }}</option>

                    <?php } ?>
           <?php if(old('transmission_type')){ ?>
            <option value="{{ old('transmission_type') }}">{{ old('transmission_type') }}</option>

          <?php } ?>
          @foreach($myArray as $d)
        <?php if($car_db->transmission_type!=$d){ 
                           if(old('transmission_type')!=$d){
                          ?>
                           
            <option value="{{$d}}">{{$d}}</option>

          <?php }
          }
           ?>
          @endforeach


          </select>
            @if ($errors->has('transmission_type'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('transmission_type') }}</strong>
            </span>
            @endif
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">


      <div class="theme-payment-page-form-item form-group">
        <div class="form-group">
         <label for="sel1">Fuel:</label>
         <select class="form-control" style="border-radius:0px; height:50px;" name="fuel" required>
           <?php $myArray = array("Petrol", "Diesel" ,"CNG" ,"Hybrid"); ?>  
            <?php if($car_db->fuel&&!old('fuel')){ ?>
                      <option value="{{ $car_db->fuel }}">{{ $car_db->fuel }}</option>

                    <?php } ?>
           <?php if(old('fuel')){ ?>
            <option value="{{ old('fuel') }}">{{ old('fuel') }}</option>

          <?php } ?>
          @foreach($myArray as $d)
         <?php if($car_db->fuel!=$d){ 
                           if(old('fuel')!=$d){
                          ?>
            <option value="{{$d}}">{{$d}}</option>

          <?php } }?>
          @endforeach

        </select>
         @if ($errors->has('fuel'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('fuel') }}</strong>
            </span>
            @endif
      </div>
    </div>
  </div>
  <div class="col-md-4">


    <div class="theme-payment-page-form-item form-group">
      <div class="form-group">
        <label for="sel1">Passengers:</label>
         <input type="number" class="form-control" min="1" max="1000" step="1"  name="passengers" value="{{$car_db->passengers}}" value="<?php 
                  if($car_db->passengers&&!old('passengers')){

                      echo($car_db->passengers);

                      }
                      else{
                        echo old('passengers');
                      }

                  ?>" " />
             @if ($errors->has('passengers'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('passengers') }}</strong>
            </span>
            @endif
       
    </div>
  </div>
</div>
 <div class="col-md-4">


    <div class="theme-payment-page-form-item form-group">
      <div class="form-group">
        <label for="sel1">AC:</label>
        <select class="form-control" style="border-radius:0px; height:50px;" name="ac" required>
           <?php $myArray = array("AC", "NON AC"); ?> 
             <?php if($car_db->ac&&!old('ac')){ ?>
                      <option value="{{ $car_db->ac }}">{{ $car_db->ac }}</option>

                    <?php } ?> 
           <?php if(old('ac')){ ?>
            <option value="{{ old('ac') }}">{{ old('ac') }}</option>

          <?php } ?>
          @foreach($myArray as $d)
          <?php if($car_db->ac!=$d){ 
                           if(old('ac')!=$d){
                          ?>
            <option value="{{$d}}">{{$d}}</option>

          <?php } } ?>
          @endforeach

        </select>
         @if ($errors->has('ac'))
             <span class="help-block" style="color:red;">
              <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('ac') }}</strong>
            </span>
            @endif
       
    </div>
  </div>
</div>

</div>
<div class="row">

 <div class="col-md-12">
  <div class="theme-payment-page-form-item form-group">

   <label for="sel1">Tell Us More About This Car,i.e PickUp Points :</label>
   <textarea class="form-control" rows="5" id="comment" name="details"><?php if(old('details')){
    echo old('details');
   } else{ 
  echo $car_db->details;
 } ?>
 </textarea>
   @if ($errors->has('details'))
   <span class="help-block" style="color:red;">
    <strong style="font-size:12px; font-style: oblique;">{{ $errors->first('details') }}</strong>
  </span>
  @endif

</div>
</div>


</div>



</div>
<br>
<div class="col-md-12">
  <button type="submit" style="width: 100%;height: 5%;" id="save" name="submit" class="theme-search-area-submit _mt-0 _tt-uc theme-search-area-submit-curved">Update CAR Data</button>

</div>

</div>
</form>

</div>
</div>
</div>   

</div>
</div>
</div>
</div>






    @endforeach
@endsection