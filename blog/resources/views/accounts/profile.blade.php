@extends('layout.master2')

@section('content')
 <div class="theme-hero-area theme-hero-area-half">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg" style="background-image:url(./img/1500x800.png);"></div>
        <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
        <div class="theme-hero-area-inner-shadow"></div>
      </div>
      <div class="theme-hero-area-body">
        <div class="container">
          <div class="theme-page-header theme-page-header-lg theme-page-header-abs">
            <h1 class="theme-page-header-title">Welcome To Listing Page</h1>
            <p class="theme-page-header-subtitle">Explore Free Listing,Select Categories From Following You Want on our Website</p>
          </div>

        </div>
      </div>
    </div>
  <div class="theme-page-section theme-page-section-lg">
      <div class="container">
        <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
          <div class="col-md-12 " style="border: 2px solid #509aff;padding: 40px;">
            <div class="theme-payment-page-sections">
              <div class="theme-payment-page-sections-item">
                 @if (session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
     </div>
 @endif
                  <h3 class="theme-payment-page-sections-item-title"">What is Lorem Ipsum?</h3>
                    <p class="theme-page-header-subtitle">
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <br>
                  <div class="col-md-2">
                    
                    <a href="{{ URL('/view_hotels') }}" class="theme-search-area-submit _mt-0 theme-search-area-submit-no-border theme-search-area-submit-curved" style="background-color: #509aff">Hotel</a>
                  </div>
                   <div class="col-md-2">
                    <a href="{{ URL('/view_resturants') }}"" class="theme-search-area-submit _mt-0 theme-search-area-submit-no-border theme-search-area-submit-curved" style="background-color: #509aff">Restaurants</a>
                  </div>
                



        
      </div>   

</div>
</div>
</div>
</div>
<br><br><br>

            
     

 
  
@endsection