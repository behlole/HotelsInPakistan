<div class="theme-hero-area front">
      <div class="theme-hero-area-bg-wrap">

       
         @foreach(App\destination::des_image_find(Session::get('des_session')) as $img) 
        <div class="theme-hero-area-bg" style="background-image:url({{'destination/'.$img->ads_folder.'/'.$img->des_pic}});" id="hero-banner"></div>
            @endforeach
        <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
      </div>
        
      <div class="theme-hero-area-body">
        <div class="container">
          <div class="row _pv-100">
            <div class="col-md-10 col-md-offset-1">
              <div class="theme-search-area _mob-h theme-search-area-stacked">
                <div class="theme-search-area-header _mb-30 _ta-c _c-w">
                  <h1 class="theme-search-area-title theme-search-area-title-sm">Found {{count($data)}} Top Destinations and Hotels in  {{App\city_name::city_name_find(Session::get('des_session'))}}</h1>
                  <p class="theme-search-area-subtitle">Discover More</p>
                </div>
              </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>