 <div class="theme-search-results-item-rating-stars" style="color: rgb(51, 122, 183);">
                      <?php
                      if($d->ratings_average!=0){
                        if($d->ratings_average>=1&&$d->ratings_average<1){
                          ?>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <?php  

                        }
                        ?>
                        <?php
                        if($d->ratings_average>=1&&$d->ratings_average<2){
                          ?>
                          <i class="fa fa-star"></i>
                          <?php if($d->ratings_average<1.5){ ?>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                          <?php }
                          if($d->ratings_average>=1.5){ ?>
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
                        if($d->ratings_average>=2&&$d->ratings_average<3){
                          ?>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <?php if($d->ratings_average<2.5){ ?>

                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                             <i class="fa fa-star-o"></i>
                             <i class="fa fa-star-o"></i>
                           <?php }
                           if($d->ratings_average>=2.5){ ?>
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
                        if($d->ratings_average>=3&&$d->ratings_average<4){
                          ?>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <?php if($d->ratings_average<3.5){ ?>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                          <?php }
                          if($d->ratings_average>=3.5){  ?>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                          <?php } ?>
                          <?php
                        }
                        ?>    
                        <?php
                        if($d->ratings_average>=4&&$d->ratings_average<=5){
                          ?>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <?php if($d->ratings_average<4.5){ ?>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                          <?php }
                          if($d->ratings_average>=4.5){ ?>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                          <?php } ?>
                          <?php
                        }
                        ?>
                        <?php if($d->total_reviews!=0){
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