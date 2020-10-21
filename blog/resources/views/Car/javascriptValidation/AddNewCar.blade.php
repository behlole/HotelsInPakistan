

<script type="text/javascript">
  $(document).ready(function() {

    $.validator.addMethod('filesize', function(value, element, param) {

     return this.optional(element) || (element.files[0].size <= param) 

   },'Please Should be less then 1 MB'); 



    $('#upload').validate({
     rules: {
       car_title: {
         required: true,
         loginRegex: true,
       },
       vehicle_type: {
         required: true
       },
       bags:{
        required: true
      },
      model:{
        required: true,
        number: true,
      },
      brand:{
       required: true 
     },
     car_price:{
      required:true,
      number:true
    },
    no_of_cars:{
      required:true
    },
    transmission_type:{
      required:true
    },
    fuel:{
      required:true
    },
    ac:{
      required:true
    },
    logo: {
      required: true,
      filesize:  1048576
      
    },
    c_text: {
      required: true,
      minlength: 20,
      maxlength: 120
    },
    passengers:{
      required:true,
      number:true
    }

  },
  onfocusout: function(element) {
    $(element).valid();
  },
  messages: {
    car_title:{
     required:"Please Enter Car Title"
   },
   vehicle_type:{
    required:"Please Select Vehicle type"
  },
  logo:{
    required:"Please Upload Logo of Your Agency"

  },
  transmission_type:{
   required:"Please Select Transmission type"
 },
 brand:{
   required:"Please Select Vehicle type"
 },
 model:{
  required:"Please Enter Model Year"
},
bags:{
  required:"Please Enter Bags Number"
},
no_of_cars:{
  required:"Please Enter No Of Cars"
},
car_price:{
  required:"Please Enter Car Price For One Day"
},
fuel:{
  required:"Please Select Car Fuel Type"
},
ac:{
  required:"Please Select AC Type"
},
c_text:{
 required:"Enter your Pick Up Points"

},
passengers:{
  required:"Please Enter Passengers Number"
}


},
errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "car_title" ) {
              $("#car_title").text($(error).html());
            }
            else if (element.attr("name") == "vehicle_type" ) {
              $("#vehicle_type").text($(error).html());
            }
            else if (element.attr("name") == "logo" ) {
              $("#logo").text($(error).html());
            }
            else if (element.attr("name") == "brand" ) {
              $("#brand").text($(error).html());
            }
            else if (element.attr("name") == "model" ) {
              $("#model").text($(error).html());
            }
            else if (element.attr("name") == "bags" ) {
              $("#bags").text($(error).html());
            }
            else if (element.attr("name") == "car_price" ) {
              $("#car_price").text($(error).html());
            }
            else if (element.attr("name") == "no_of_cars" ) {
              $("#no_of_cars").text($(error).html());
            }
            else if (element.attr("name") == "fuel" ) {
              $("#fuel").text($(error).html());
            }
            else if (element.attr("name") == "transmission_type" ) {
              $("#transmission_type").text($(error).html());
            }
            else if (element.attr("name") == "fuel" ) {
              $("#fuel").text($(error).html());
            }
            else if (element.attr("name") == "ac" ) {
              $("#ac").text($(error).html());
            }
            else if (element.attr("name") == "c_text" ) {
              $("#c_text").text($(error).html());
            }
            else if (element.attr("name") == "passengers" ) {
              $("#passengers").text($(error).html());
            }
            
            // Default position: if no match is met (other fields)
            else {
             error.append($('.errors'));
           }
         },
         success: function(label){ 
          var parentId = $(label).parent().attr("id");
          switch(parentId) {
            case "caropr_name":
            $(label).html("nice name");
            break;

          }
        }



      });
  });
</script>