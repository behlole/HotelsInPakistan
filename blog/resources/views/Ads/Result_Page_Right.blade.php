<div class="col-md-2-5 ">
  @foreach($ListingAd_Right as $right)

   <div class="theme-ad theme-ad-dark">
    <a class="theme-ad-link" href="{{$right->ads_url}}" target="_blank"></a>
    <p class="theme-ad-sign">{{$right->ads_company}}</p>
    <img class="theme-ad-img" src="{{ URL::asset('Ads/'.$right->ads_folder.'/'.$right->ads_pic) }}" alt="Image Alternative text" title="Image Title"/>
  </div>
  @endforeach

</div>