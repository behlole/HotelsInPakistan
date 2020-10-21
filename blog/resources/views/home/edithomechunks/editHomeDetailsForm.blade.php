<form  action="{{ URL('add_home_details_db',$home_id) }}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <br><br>
  @if (session('success'))
 <div class="alert alert-success">
  {{ session('success') }}
</div>
@endif
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="edit">
  <div class="theme-payment-page-sections-item">
    @foreach($home_info as $d)
   <h3 class="theme-payment-page-sections-item-title">Tell Us More About The {{$d->hotel_name}}({{$d->yourRole}})</h3>
   <p  style="color: grey;">Please Describe Your Property in  200-300 Words</p>
      <p id="details" style="display: none;">{{$d->details}}
      </p>
      <span class="errors_txs" style="color: red;" id="editor1_errors"></span>
       @break;
  @endforeach
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
        <textarea name="editor1" id="editor1"></textarea>
      </div>
       @if ($errors->has('editor1'))
          <span class="help-block" style="color:red;">
            <strong>{{ $errors->first('editor1') }}</strong>
          </span>
          @endif
        </div>
</div>
</div>
<div class="theme-payment-page-sections-item">
  <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Update Data And Move To Next Step</button>
</div>
</form>

