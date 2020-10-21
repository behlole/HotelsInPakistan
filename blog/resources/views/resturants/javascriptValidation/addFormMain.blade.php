

<script type="text/javascript">
  $(document).ready(function() {
    $.validator.addMethod("facebookurl", function(value, element) {
        return this.optional(element) || /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/.test(value);
    }, "Must be a Proper facebook page,invalid facebook page");

    $.validator.addMethod("loginRegex", function(value, element) {
        return this.optional(element) || /^[a-z0-9\-\s]+$/i.test(value);
    }, "Username must contain only letters, numbers, or dashes.");

$.validator.addMethod('validUrl', function(value, element) {
    var url = $.validator.methods.url.bind(this);
    return url(value, element) || url('http://' + value, element);
  }, 'Please enter a valid URL');

   $('#upload').validate({
     rules: {
       restaurant_name: {
         required: true,
          loginRegex: true,
       },
        "restaurant_type[]":{ 
        required:true
      },
       restaurant_email: {
         required: true,
         email: true
       },
      city:{ 
        required:true
      },
      home_type:{
        required: true
      },
      contact:{
        required: true,
         number: true,
          minlength: 7,
          maxlength:11
          
      },
      alt_contact:{
          number: true,
          minlength: 7,
          maxlength:11
      },
     website:{
       validUrl: true 
      },
      landline:{
         number:true,
          minlength: 7,
          maxlength:11
      },
      fb_page:{
        facebookurl:true
      }

    },
     onfocusout: function(element) {
        $(element).valid();
    },
    messages: {
      restaurant_name:{
       required:"Please Enter Restaurant Name"
     },
     restaurant_email:{
      required:"Please Enter Email Address"
     },
     
     
    website:{
      url:"Please Enter Correct Url"
    },
    alt_contact:{
        number:"Should be number",
        minlength:"Invalid number",
        maxlength:"Invalid Number"
      },
      contact:{
        required:"Please Enter Contact number",
        minlength:"Invalid number",
        maxlength:"Invalid Number"
      },
      home_type:{
        required:"Please Select Home Type"
      },
      city:{
        required:"Please Select City"
      },
      landline:{
        number:"Invalid landline number",
        minlength:"Invalid number",
        maxlength:"Invalid Number"
      },
       "restaurant_type[]":{
    required:"Please Select Restaurant Type"
  }

  },
  errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "restaurant_name" ) {
              $("#res_name").text($(error).html());
            }
             else if (element.attr("name") == "yourRole" ) {
              $("#home_type").text($(error).html());
            }
             else if (element.attr("name") == "contact" ) {
              $("#contact_number").text($(error).html());
            }
             else if (element.attr("name") == "landline" ) {
              $("#landline_number").text($(error).html());
            }
             else if (element.attr("name") == "restaurant_email" ) {
              $("#restaurant_email").text($(error).html());
            }
             else if (element.attr("name") == "website" ) {
              $("#website").text($(error).html());
            }
            else if (element.attr("name") == "city" ) {
              $("#city_error").text($(error).html());
            }
            else if (element.attr("name") == "alt_contact" ) {
              $("#contact_number_secondary").text($(error).html());
            }
            else if (element.attr("name") == "fb_page" ) {
              $("#fb").text($(error).html());
            }
             else if (element.attr("name") == "restaurant_type[]" ) {
              $("#restaurant_type").text($(error).html());
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