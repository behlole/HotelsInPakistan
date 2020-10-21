
<script type="text/javascript">
        valueget();
        function valueget(){
    if($('#pic_count').val()==0){
       
        $('#dropzone_div').hide();
    }else{
        $('#dropzone_div').show();
    }
    $('#count_show').text(10-$('#pic_count').val());
}


   $(document).on("click", ".clickme", function(){
    $remove_item=$(this).attr('id');
    $resid=$('#resid').val();
    var r = confirm("Are You Sure To delete this File");
    if (r == true) {
     $.ajax({
      url: "{{url('picdelete_room')}}/"+$(this).attr('id') + '/' +  $resid,
      type: "GET",
      success: function(data) {
        $("#laodmepics").empty();
          $("#laodmepics").html(data);
           valueget();
        }
      });
   }
 });
   $(document).on("click", ".clickmefeatured", function(){
    $remove_item=$(this).attr('id');
    $resid=$('#resid').val();
    var r = confirm("Are You Sure To Make it Featured Image");
    if (r == true) {
     $.ajax({
      url: "{{url('makefeatured')}}/"+$(this).attr('id') + '/' +  $resid,
      type: "GET",
      success: function(data) {
        $("#laodmepics").empty();
          $("#laodmepics").html(data);
           valueget();
        }
      });
   }
 });
</script>