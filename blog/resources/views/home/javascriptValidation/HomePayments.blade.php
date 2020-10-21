<script type="text/javascript">
  $(document).ready(function() {
   $("#Payment").validate({
     rules: {
       cards: {
        required: true
      },
      city_taxs:{
        required:true
      },
      pchk:{
         required:true
      }

 },
 messages: {
  cards:{
   required:"Please Tell Us Either You Accept Credit Cards Or Not"
 },
 city_taxs:{
  required:"Please Check General Sales Tax"
},
pchk:{
 required:"Please Accept Terms And Conditions"
}
},
errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "cards" ) {
              $("#card_error").text($(error).html());
            }
            else if (element.attr("name") == "city_taxs" ) {
              $("#gen_sales_tax").text($(error).html());
            }
            else if (element.attr("name") == "pchk" ) {
              $("#pchk").text($(error).html());
            }
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