<div class="theme-payment-page-sections-item" style="background-color: white;padding: 20px;">

         <div class="theme-payment-page-form">
          <div class="row" data-gutter="20">
           <form action="{{url('resturant_review/'.$d->id)}}" method="post" class="form-submit labels-uppercase MultiFile-intercepted" id="upload" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="col-md-12" >
             @if (session('status_err'))
             <div class="alert alert-danger">
              {{ session('status_err') }}
            </div>
            @endif
            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="comment-form">
              <h3>Leave a Review</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Name*" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile No" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" id="email2" name="email" placeholder="Your Email*" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="select-filters">
                      <select name="rattings" class="form-control"  id="sort-price">
                        <option value="" selected="">Rating</option>
                        <option value="1">1 *</option>
                        <option value="2">2 **</option>
                        <option value="3">3 ***</option>
                        <option value="4">4 ****</option>
                        <option value="5">5 *****(Excelent)</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" id="message" name="comments" placeholder="Your Comment*" rows="5"></textarea>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <input type="text" class="form-control" id="verify_booking2" name="verify" placeholder="Are you human? 5 + 1 =">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                   <p>*Your Mobile No And Email Will Not Be Share with Anyone</p>
                 </div>
               </div>
               <div class="col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn">Submit Review</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>