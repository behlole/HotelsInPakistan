
        


     @include('chunks.nav')
  <nav class="navbar navbar-default navbar-inverse navbar-theme navbar-theme-abs navbar-theme-transparent navbar-theme-border" id="main-nav">
      
    
        @include('chunks.navi')
    </nav>


        @yield('content')


        
        @include('chunks.footer')

           @include('chunks.js')
        @yield('java')
    
