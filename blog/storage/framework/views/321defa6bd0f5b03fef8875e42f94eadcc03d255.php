<link rel="stylesheet" href="<?php echo e(asset('libs\flags\css\flag-icon.min.css')); ?>">
<script src="<?php echo e(asset('libs\lazy-load\intersection-observer.js')); ?>"></script>
<script async="" src="<?php echo e(asset('libs\lazy-load\lazyload.min.js')); ?>"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function(event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);
</script>
<script src=".<?php echo e(asset('libs\lodash.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs\jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs\vue\vue.js')); ?>"></script>
<script src="<?php echo e(asset('libs\bootstrap\js\bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs\bootbox\bootbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('module\media\js\browser.js?_ver=1.7.0')); ?>"></script>
<script src="<?php echo e(asset('libs\carousel-2\owl.carousel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('libs\daterange\moment.min.js"')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('libs\daterange\daterangepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs\select2\js\select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('js\functions.js?_ver=1.7.0')); ?>"></script>
<script src="<?php echo e(asset('js\home.js?_ver=1.7.0')); ?>"></script>
<script src="<?php echo e(asset('module\user\js\user.js?_ver=1.7.0')); ?>"></script>
