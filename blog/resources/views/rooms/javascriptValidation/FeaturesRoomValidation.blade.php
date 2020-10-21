<script type="text/javascript">
  
  $(document).ready(function() {

   $('#upload').validate({
     rules: {
      "select_facilitie[]": {
       required: true
     }
  },
  messages: {
   "select_facilitie[]":{
    required:"Please Select Some Room Amenities,that you offered at Room"
  }

},
errorPlacement: function(error, element) {
            //Custom position: second name
           if (element.attr("name") == "select_facilitie[]" ) {
              $("#fac_error").text($(error).html());
            }// Default position: if no match is met (other fields)
            else {
             error.append($('.errors'));
           }
         },
         success: function(label){ 
          var parentId = $(label).parent().attr("id");
          switch(parentId) {
            case "hotel_name":
            $(label).html("nice name");
            break;
            case "home_price":
            $(label).html("nice date");
            break;                 
          }
        }
      });
});
</script>