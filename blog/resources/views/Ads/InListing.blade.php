<?php if($adloop===4&&$inlistingAds){
if($inlistingAds[0]){
 ?>

<div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
	<div class="row" data-gutter="10">
		<div class="col-md-12 ">
			<div class="theme-search-results-item-img-wrap">
				<img class="theme-search-results-item-img" style="height:170px;" src="{{ URL::asset('Ads/'.$inlistingAds[0]->ads_folder.'/'.$inlistingAds[0]->ads_pic) }}" alt="Image Alternative text" title="Image Title">
			</div>
		</div>
	</div>
</div>
<?php } } ?>

<?php if($adloop===8&&$inlistingAds&&count($inlistingAds)>1){
if($inlistingAds[1]){
 ?>

<div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
	<div class="row" data-gutter="10">
		<div class="col-md-12 ">
			<div class="theme-search-results-item-img-wrap">
				<img class="theme-search-results-item-img" style="height:170px;" src="{{ URL::asset('Ads/'.$inlistingAds[1]->ads_folder.'/'.$inlistingAds[1]->ads_pic) }}" alt="Image Alternative text" title="Image Title">
			</div>
		</div>
	</div>
</div>
<?php } } ?>

<?php if($adloop===12&&$inlistingAds&&count($inlistingAds)>2){
if($inlistingAds[2]){
 ?>

<div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
	<div class="row" data-gutter="10">
		<div class="col-md-12 ">
			<div class="theme-search-results-item-img-wrap">
				<img class="theme-search-results-item-img" style="height:170px;" src="{{ URL::asset('Ads/'.$inlistingAds[2]->ads_folder.'/'.$inlistingAds[2]->ads_pic) }}" alt="Image Alternative text" title="Image Title">
			</div>
		</div>
	</div>
</div>
<?php } } ?>

<?php if($adloop===16&&$inlistingAds&&count($inlistingAds)>3){
if($inlistingAds[3]){
 ?>

<div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
	<div class="row" data-gutter="10">
		<div class="col-md-12 ">
			<div class="theme-search-results-item-img-wrap">
				<img class="theme-search-results-item-img" style="height:170px;" src="{{ URL::asset('Ads/'.$inlistingAds[3]->ads_folder.'/'.$inlistingAds[3]->ads_pic) }}" alt="Image Alternative text" title="Image Title">
			</div>
		</div>
	</div>
</div>
<?php } } ?>

<?php if($adloop===20&&$inlistingAds&&count($inlistingAds)>4){
if($inlistingAds[4]){
 ?>

<div class="theme-search-results-item _mb-10 _b-n theme-search-results-item-rounded theme-search-results-item-">
	<div class="row" data-gutter="10">
		<div class="col-md-12 ">
			<div class="theme-search-results-item-img-wrap">
				<img class="theme-search-results-item-img" style="height:170px;" src="{{ URL::asset('Ads/'.$inlistingAds[4]->ads_folder.'/'.$inlistingAds[4]->ads_pic) }}" alt="Image Alternative text" title="Image Title">
			</div>
		</div>
	</div>
</div>
<?php } } ?>