<?php
$str_review="";
if($d->ratings_average>=1&&$d->ratings_average<=2){
	$str_review="Mediocre";

}
if($d->ratings_average>=2&&$d->ratings_average<=3){
	$str_review="Okay";

}
if($d->ratings_average>=3&&$d->ratings_average<=4){
	$str_review="Good";

}
if($d->ratings_average>=4&&$d->ratings_average<=5){
	$str_review="Excellent";

}

if($str_review!=""){


?>

<p class="theme-search-results-item-hotel-rating-title">
	<b>{{$str_review}}</b>&nbsp;({{$d->total_reviews}}&nbsp; reviews)
</p>
<?php } else { ?>
	<p class="theme-search-results-item-hotel-rating-title">
	<b>No Reviews</b>
</p>

	<?php } ?>