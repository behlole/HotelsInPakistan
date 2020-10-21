@extends('layout.master2')
@section('customcss')
@include('layout.homecss')
@endsection

@section('content')
<div class="theme-page-section theme-page-section-lg">
  <div class="container">
    <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
      <div class="col-md-8" >
        <ul class="nav nav-tabs">          
          @include('CarAgency.EditCarAgency.listingUrl')
        </ul>
        <div class="tab-content">
          <div id="home" class="tab-pane fade in active">
            <div class="theme-payment-page-sections">
            @include('CarAgency.EditCarAgencyChunks.EditCarAgencyForm')
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 ">
        <div class="sticky-col">
          @include('CarAgency.AddCarAgencyChunks.RightSideBar')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('javabee')

<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>
@include('chunks.previuosButtonBreak')
@include('CarAgency.javascriptValidation.edit')
@include('chunks.googlejs')
@endsection

