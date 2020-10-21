@if (count($errors) > 0 || session('success'))
  <div class="row">
            <div class="col-md-12">
              @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
              <p class="" style="color: red;">
                {{ $error }}<br>
              </p>
              @endforeach
              @endif
              @if (session('success'))
              <p class="" style="color: green;">
                {{ session('success') }}
              </p>
              @endif
            </div>
          </div>
            @endif
@foreach($payments as $p)
  <form  action="{{url('add_hotel_payemnts_db/'.$hotel_id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="Payment" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="form_check" value="edit">

    <div class="theme-payment-page-sections-item">
    <br>
    <span class="errors_txs" style="color: red;" id="card_error"><br></span>
    <h3 class="theme-payment-page-sections-item-title">Can you Charge Credit Cards at the Property?</h3>
 
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
          <div class="form-group">
           <label class="radio-inline">
              <input type="radio" name="cards" data-error="#card_error"  <?php if($p->cards=="YES"){ 

                  echo "checked";

                }
                if(old('cards')=="YES"){ 

                  echo "checked";

                }


                  ?> value="YES">YES
            </label>
            <label class="radio-inline">
              <input type="radio" name="cards" data-error="#card_error" <?php if($p->cards=="NO"){ 

                  echo "checked";

                }
                if(old('cards')=="NO"){ 

                  echo "checked";

                }


                  ?> value="NO">NO
            </label>
           
           <div class="help-block with-errors"></div>
         </div>
     </div>
   </div>
 </div>
</div>
  <div class="theme-payment-page-sections-item">
    <span class="errors_txs" style="color: red;" id="gen_sales_tax"><br></span>
    <h3 class="theme-payment-page-sections-item-title">General Sales Tax?</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
          <div class="form-group">
           <label class="radio-inline">
              <input type="radio" name="city_taxs" data-error="#gen_sales_tax"   <?php if($p->city_taxs=="YES"){ 

                  echo "checked";

                }
                if(old('city_taxs')=="YES"){ 

                  echo "checked";

                }


                  ?> value="YES">GST APPLIES
            </label>
            <label class="radio-inline">
              <input type="radio" name="city_taxs" data-error="#gen_sales_tax" <?php if($p->city_taxs=="NO"){ 

                  echo "checked";

                }
                if(old('city_taxs')=="NO"){ 

                  echo "checked";

                }


                  ?> value="NO">NO GST TAX
            </label>
           
           <div class="help-block with-errors"></div>
         </div>
     </div>
   </div>
 </div>
</div>
 <div class="theme-payment-page-sections-item">
    
    <h3 class="theme-payment-page-sections-item-title">To complete your registration, please tick the boxes below:</h3>
   <div class="theme-payment-page-form">
    <div class="row" data-gutter="20">
      <div class="col-md-12">
        <span class="errors_txs" style="color: red;" id="pchk"><br></span>
          <div class="form-group">
             <label class="checkbox-inline">
            <input type="checkbox" name="pchk" data-error="#pchk" value="1" <?php if($p->pchk=="1"){ 

                  echo "checked";

                }
                if(old('pchk')=="1"){ 

                  echo "checked";

                }


                  ?> >
            <h5 class="theme-sidebar-section-features-list-title">I have read  <a class="" href="#">Term and Conditions </a> And  <a class="" href="#">Policy </a> and i accept them </h5>
          </label>
           
           
           <div class="help-block with-errors"></div>
         </div>
     </div>
   </div>
 </div>
</div>
 
<div class="theme-payment-page-sections-item">
    <button  type="submit" class="btn _tt-uc btn-primary-inverse btn-lg btn-block" name="submit" class="btn btn-success">Save Data And Move To Next Step</button>
   </div>
</form>
@endforeach