 @foreach($ListingAd_Left as $left)
      <div class="theme-ad theme-ad-dark">
        <a class="theme-ad-link" href="{{ URL('External_links',$left->ads_url) }}"></a>
        <p class="theme-ad-sign">{{$left->ads_company}}</p>
        <img class="theme-ad-img" src="{{ URL::asset('Ads/'.$left->ads_folder.'/'.$left->ads_pic) }}" alt="Image Alternative text" title="Image Title"/>
      </div>
  @endforeach