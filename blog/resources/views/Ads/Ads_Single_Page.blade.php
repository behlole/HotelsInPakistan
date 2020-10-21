  @foreach($ads as $img)
    <div class="theme-ad">
      <a class="theme-ad-link" href="{{ URL('External_links',$img->ads_url) }}"></a>
      <p class="theme-ad-sign">{{$img->ads_company}}</p>
      <img class="theme-ad-img" src="{{ URL::asset('Ads/'.$img->ads_folder.'/'.$img->ads_pic) }}" alt="Image Alternative text" title="Image Title"/>
    </div>
    @endforeach