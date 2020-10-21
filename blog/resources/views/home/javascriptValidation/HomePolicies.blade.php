<script type="text/javascript">
  $(document).ready(function() {
   jQuery.validator.addMethod("notEqualToGroup", function (value, element, options) {
    // get all the elements passed here with the same class
    var elems = $(element).parents('#formpolicy').find(options[0]);
    // the value of the current element
    var valueToCompare = value;
    // count
    var matchesFound = 0;
    // loop each element and compare its value with the current value
    // and increase the count every time we find one
    jQuery.each(elems, function () {
      thisVal = $(this).val();
      if (thisVal == valueToCompare) {
        matchesFound++;
      }
    });
    // count should be either 0 or 1 max
    if (this.optional(element) || matchesFound <= 1) {
        //elems.removeClass('error');
        return true;
      } else {
        //elems.addClass('error');
      }
    },"Check in time and Check Out Are Same, Please Change");

   jQuery.validator.addMethod("notEqualToGroup2nd", function (value, element, options) {
    // get all the elements passed here with the same class
    var elems = $(element).parents('#formpolicy').find(options[0]);
    // the value of the current element
    var valueToCompare = value;
    // count
    var matchesFound = 0;
    // loop each element and compare its value with the current value
    // and increase the count every time we find one
    jQuery.each(elems, function () {
      thisVal = $(this).val();
      if (thisVal == valueToCompare) {
        matchesFound++;
      }
    });
    // count should be either 0 or 1 max
    if (this.optional(element) || matchesFound <= 1) {
        //elems.removeClass('error');
        return true;
      } else {
        //elems.addClass('error');
      }
    },"Check Out From and Check Out To are same ,Please Change");
   $("#formpolicy").validate({
     rules: {
       c_text: {
        required: true,
        minlength: 20,
        maxlength: 120
      },
      check_inForm:{
        required:true,
        notEqualToGroup: ['.time_check']
      },
      accommodate_children:{
        required: true
      },
      allow_pets:{
        required:true
      },
      check_inTo:{
       required:true,
       notEqualToGroup: ['.time_check']
     },
     check_OutForm:{
      notEqualToGroup2nd: ['.time_check_2nd']
    },
    check_OutTo:{
     notEqualToGroup2nd: ['.time_check_2nd']
   }

 },
 messages: {
  c_text:{
   required:"Enter your Cancellation Poloicy 3-20 character"

 },
 accommodate_children:{
  required:"Please Check Either You Provide Extra Beds Or Not"
},
allow_pets:{
 required:"Please Check Either You Allow Pets Or Not"
},
check_inForm:{
  required:"Select Check-In-From Time"
},
check_inTo:{
 required:"Select Check-In-To Time"
}


},
errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "c_text" ) {
              $("#c_text_error").text($(error).html());
            }
            else if (element.attr("name") == "accommodate_children" ) {
              $("#extra_bed").text($(error).html());
            }
            else if (element.attr("name") == "allow_pets" ) {
              $("#allow_pets").text($(error).html());
            }
            else if (element.attr("name") == "check_inForm" ) {
              $("#check_in_select").text($(error).html());
            }
            else if (element.attr("name") == "check_inTo" ) {
              $("#check_in_to").text($(error).html());
            }
            else if (element.attr("name") == "check_OutForm" ) {
              $("#check_OutForm").text($(error).html());
            }
            else if (element.attr("name") == "check_OutTo" ) {
              $("#check_OutTo").text($(error).html());
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