<div class="theme-reviews-list">
  @foreach($hotel_reviews as $rv)
  <article class="theme-reviews-item">
    <div class="row" data-gutter="10">
      <div class="col-md-3 ">
        <div class="theme-reviews-item-info">

          <p class="theme-reviews-item-date">Reviewed:{{\Carbon\Carbon::parse($rv->created_at)->format('d F Y')}}</p>
          <p class="theme-reviews-item-author" style="font-size:16px; ">{{$rv->name}}</p>
        </div>
      </div>
      <div class="col-md-9 ">
        <div class="theme-reviews-rating">
          <div class="theme-reviews-rating-header"style="color: rgb(51, 122, 183);">
            <?php
            $str_review="";
            if($rv->rattings>=1&&$rv->rattings<=2){
              $str_review="Mediocre";

            }
            if($rv->rattings>=2&&$rv->rattings<=3){
              $str_review="Okay";

            }
            if($rv->rattings>=3&&$rv->rattings<=4){
              $str_review="Good";

            }
            if($rv->rattings>=4&&$rv->rattings<=5){
              $str_review="Excellent";

            }

            if($str_review!=""){
              ?>
              <span class="theme-reviews-rating-num" style="font-size:14px; "><b>{{$rv->rattings}}/5</b></span>
              <span class="theme-reviews-rating-title" style="font-weight: bolder;"><b>{{$str_review}}</b></span>
            
            <?php } ?>
            <br>
            <?php

            if($rv->rattings!=0){
              if($rv->rattings>=1&&$rv->rattings<1){
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
              <?php }
              if($rv->rattings>=1&&$rv->rattings<2){ ?>
                <i class="fa fa-star"></i>
                <?php if($rv->rattings<1.5){ ?>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php }
                if($rv->rattings>=1.5){ ?>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php } ?>
                <?php
              }
              ?>
              <?php
              if($rv->rattings>=2&&$rv->rattings<3){
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <?php if($rv->rattings<2.5){ ?>

                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php }
                if($rv->rattings>=2.5){ ?>
                  <i class="fa fa-star"></i>

                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php } ?>
                <?php
              }
              ?>     
              <?php
              if($rv->rattings>=3&&$rv->rattings<4){
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <?php if($rv->rattings<3.5){ ?>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php }
                if($rv->rattings>=3.5){  ?>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php } ?>
                <?php
              }
              ?>    
              <?php
              if($rv->rattings>=4&&$rv->rattings<=5){
                ?>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <?php if($rv->rattings<4.5){ ?>
                  <i class="fa fa-star-half-o"></i>
                  <i class="fa fa-star-o"></i>
                <?php }
                if($rv->rattings>=4.5){ ?>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                <?php } ?>
                <?php
              }
              ?>
              <?php if($rv->rattings!=0){
                ?>
                <span class="review-no"></span>
              <?php } } else { ?>
               <i class="fa fa-star-o"></i>
               <i class="fa fa-star-o"></i>
               <i class="fa fa-star-o"></i>
               <i class="fa fa-star-o"></i>
               <i class="fa fa-star-o"></i>
               <?php
             }
             ?>

           </div>
         </div>
         <div class="theme-reviews-item-body">
          <p class="theme-reviews-item-text">{{$rv->coments}}</p>
        </div>
      </div>
    </div>
  </article>
  @endforeach
  <div class="row">
    <div class="col-md-9 col-md-offset-3">
      <a class="theme-reviews-more" href="#">&#x2b; More Reviews</a>
    </div>
  </div>
</div>