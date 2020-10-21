<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2019 <a href="http://mobileinpakistan.com/">MobileInPakistan</a>.</strong> All rights
  reserved.
</footer>

<script src="{{ URL::asset('adminfiles/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('adminfiles/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('adminfiles/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ URL::asset('adminfiles/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('adminfiles/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('adminfiles/dist/js/demo.js') }}"></script>
<script src="{{ URL::asset('css/select2.min.js') }}"></script>
<script src="{{ URL::asset('css/select2.min.js') }}"></script>

</body>
@yield('javabee')
</html>


