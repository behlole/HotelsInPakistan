<script type="text/javascript">
  $(document).ready(function() {
    $.validator.addMethod("facebookurl", function(value, element) {
      return this.optional(element) || /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/.test(value);
    }, "Must be a Proper facebook page,invalid facebook page");

    $.validator.addMethod("loginRegex", function(value, element) {
      return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Name must contain only letters, numbers, or dashes.");

    $.validator.addMethod('validUrl', function(value, element) {
      var url = $.validator.methods.url.bind(this);
      return url(value, element) || url('http://' + value, element);
    }, 'Please enter a valid URL');

    $('#upload').validate({
     rules: {
       room_type: {
         required: true
       },
        custom_name: {
         loginRegex: true
       },
       no_of_rooms:{ 
        required:true,
        number: true,
        min:1,
        max:1000
      },
      room_size:{
        required:true,
        number:true,
        min:1,
        max:5000
      },
      room_price_night:{
        required: true,
        number: true,
        min: 100,
        max:1000000
      },
      discount_opts:{
        required:function(element) {

          if($('#extra_bed_options').val() == "0"){
            return false;
          }
          if($('#extra_bed_options').val() == "1"){
            return true;
          } 
        }
      },
      discount_cond:{
        required:function(element) {

          if($('#extra_bed_options').val() == "0"){
            return false;
          }
          if($('#extra_bed_options').val() == "1"){
            return true;
          } 
        }

      },
      discount:{
        required:function(element) {

          if($('#extra_bed_options').val() == "0"){
            return false;
          }
          if($('#extra_bed_options').val() == "1"){
            return true;
          } 
        },
        number:true

      },
      option_number_1:{
        required:function(element) {
          if($('#room_bed_count_option_1').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_1').val() == "NO"){
            return false;
          } 
        },
      },
      option_name_1:{
        required:function(element) {
          if($('#room_bed_count_option_1').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_1').val() == "NO"){
            return false;
          } 
        },
      },
       option_name_2:{
        required:function(element) {
          if($('#room_bed_count_option_2').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_2').val() == "NO"){
            return false;
          } 
        },
      },
       option_number_2:{
        required:function(element) {
          if($('#room_bed_count_option_2').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_2').val() == "NO"){
            return false;
          } 
        },
      },
       option_name_3:{
        required:function(element) {
          if($('#room_bed_count_option_3').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_3').val() == "NO"){
            return false;
          } 
        },
      },
       option_number_3:{
        required:function(element) {
          if($('#room_bed_count_option_3').val() == "YES"){
            return true;
          }
          if($('#room_bed_count_option_3').val() == "NO"){
            return false;
          } 
        },
      }
      
    },
    onfocusout: function(element) {
      $(element).valid();
    },
    messages: {
      room_type:{
       required:"Please Select Room Type"
     },
     no_of_rooms:{
      number: "Must Be A Number",
      min:"Must be Valid",
      max:"Invalid Room Number"
    },
    room_size:{
     required:"Please Enter Room Size",
      number:"Must Be Number",
      min:"Invalid Number",
      max:"Invalid Number"
    },
    room_price_night:{
     required:"Please Enter Room Price",
     number:"Should be number",
     minlength:"Invalid number",
     maxlength:"Invalid Number"
   },
   discount_opts:{
    required:"Please Select Discount Option"
  },
  discount_cond:{
    required:"Please Enter Discount Conditions"
  },
  discount:{
    required:"Please Enter Discount Amount",
    number:"Please Enter Only Numbers"
  },
  option_name_1:{
    required:"Please Select Bed Size"
  },
  option_number_1:{
   required:"Please Select no of Bed"
  },
  option_name_2:{
    required:"Please Select Bed Size"
  },
  option_number_2:{
   required:"Please Select no of Bed"
  },
   option_name_3:{
    required:"Please Select Bed Size"
  },
  option_number_3:{
   required:"Please Select no of Bed"
  }

},
errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "room_type" ) {
              $("#roomtype_error").text($(error).html());
            }
            else if (element.attr("name") == "no_of_rooms" ) {
              $("#no_of_rooms").text($(error).html());
            }
            else if (element.attr("name") == "custom_name" ) {
              $("#custom_name").text($(error).html());
            }
            else if (element.attr("name") == "room_size" ) {
              $("#room_size").text($(error).html());
            }
            else if (element.attr("name") == "room_price_night" ) {
              $("#room_price_night").text($(error).html());
            }
            else if (element.attr("name") == "discount_opts" ) {
              $("#discount_opts").text($(error).html());
            }
            else if (element.attr("name") == "discount_cond" ) {
              $("#discount_cond_error").text($(error).html());
            }
            else if (element.attr("name") == "discount" ) {
              $("#discount_amount_error").text($(error).html());
            }
             else if (element.attr("name") == "discount" ) {
              $("#discount_amount_error").text($(error).html());
            }
             else if (element.attr("name") == "option_name_1" ) {
              $("#option_name_1").text($(error).html());
            }
            else if (element.attr("name") == "option_number_1" ) {
              $("#option_number_1").text($(error).html());
            }
             else if (element.attr("name") == "option_name_2" ) {
              $("#option_name_2").text($(error).html());
            }
             else if (element.attr("name") == "option_number_2" ) {
              $("#option_number_2").text($(error).html());
            }
            else if (element.attr("name") == "option_name_3" ) {
              $("#option_name_3").text($(error).html());
            }
             else if (element.attr("name") == "option_number_3" ) {
              $("#option_number_3").text($(error).html());
            }

            
            // Default position: if no match is met (other fields)
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

          }
        }



      });
  });
</script>