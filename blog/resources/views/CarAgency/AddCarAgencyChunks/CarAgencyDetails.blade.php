<form  action="{{ URL('add_deatils_car_agency_db',$car_operator_id) }}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
  <br><br>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="add">

   <div class="theme-payment-page-sections-item">
    @foreach($car_opr_data as $d)
   <h3 class="theme-payment-page-sections-item-title">Tell Us More About The {{$d->caropr_name}}</h3>
   <p  style="color: grey;">Please Describe Your Property in  200-300 Words</p>
   <span class="errors_txs" style="color: red;" id="editor1_errors"></span>
      <p id="details" style="display: none;">{{$d->details}}
      </p>
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
    
      <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" id="save" name="submit" class="btn btn-success" ="">Save Data And Move To Next Step</button>
   
  </div>
</form>

