<link rel="stylesheet" href="{{asset('libs\flags\css\flag-icon.min.css')}}">
<script src="{{asset('libs\lazy-load\intersection-observer.js')}}"></script>
<script async="" src="{{asset('libs\lazy-load\lazyload.min.js')}}"></script>
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
<script src=".{{asset('libs\lodash.min.js')}}"></script>
<script src="{{asset('libs\jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('libs\vue\vue.js')}}"></script>
<script src="{{asset('libs\bootstrap\js\bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs\bootbox\bootbox.min.js')}}"></script>
<script src="{{asset('module\media\js\browser.js?_ver=1.7.0')}}"></script>
<script src="{{asset('libs\carousel-2\owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('libs\daterange\moment.min.js"')}}"></script>
<script type="text/javascript" src="{{asset('libs\daterange\daterangepicker.min.js')}}"></script>
<script src="{{asset('libs\select2\js\select2.min.js')}}"></script>
<script src="{{asset('js\functions.js?_ver=1.7.0')}}"></script>
<script src="{{asset('js\home.js?_ver=1.7.0')}}"></script>
<script src="{{asset('module\user\js\user.js?_ver=1.7.0')}}"></script>
