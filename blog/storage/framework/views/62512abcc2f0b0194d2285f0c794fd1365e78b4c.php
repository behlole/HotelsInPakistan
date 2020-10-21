 <div class="theme-footer" id="mainFooter">
      <div class="container _ph-mob-0">
        
      </div>
      <div class="theme-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="theme-copyright-text">Copyright &copy; 2018
              <a href="https://hotelsinpakistan.pk/">HotelsInPakistan</a>. All rights reserved.
            </p>
          </div>
          <div class="col-md-6">
            <ul class="theme-copyright-social">
              <li>
                <a class="fa fa-facebook" href="https://www.facebook.com/HotelinPakistan"></a>
              </li>
             
              <li>
                <a class="fa fa-twitter" href="https://twitter.com/HotelinPakistan"></a>
              </li>
              <li>
                <a class="fa fa-youtube-play" href="https://www.youtube.com/channel/UCHchhU2si6CMgzDnYT1mhyw
"></a>
              </li>
              <li>
                <a class="fa fa-instagram" href="https://www.instagram.com/hotelsinpakistan"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script  src="<?php echo e(URL::asset('js/jquery.js')); ?>"></script>
    <script  src="<?php echo e(URL::asset('js/moment.js')); ?>"></script>
    <script  src="<?php echo e(URL::asset('js/bootstrap.js')); ?>"></script>
    <script  src="<?php echo e(URL::asset('js/owl-carousel.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/blur-area.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/icheck.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/gmap.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/magnific-popup.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/ion-range-slider.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/sticky-kit.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/smooth-scroll.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/fotorama.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/bs-datepicker.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/typeahead.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/quantity-selector.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/countdown.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/window-scroll-action.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/fitvid.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/youtube-bg.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/custom.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('css/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('js/jquery.validate.js')); ?>"></script>
    <!-- 
     <script src="<?php echo e(URL::asset('js/dropzone.js')); ?>"></script> -->


   
  </body>
<script type="text/javascript">
  function myFunction() {
    var x = document.getElementById("pass1");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
} 
</script>

<script language="javascript" type="text/javascript">
    function submitDetailsForm(str) {
        $('#formId'+str).submit();
       
    }
</script>


<?php echo $__env->yieldContent('javabee'); ?>


</html>