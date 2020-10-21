

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

$.validator.addMethod('filesize', function(value, element, param) {

     return this.optional(element) || (element.files[0].size <= param) 

   },'Please Should be less then 1 MB'); 



   $('#upload').validate({
     rules: {
       caropr_name: {
         required: true,
          loginRegex: true,
       },
       email: {
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
      altcontact:{
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
      facebookPage:{
        facebookurl:true
      },
       logo: {
              filesize:  1048576
      
    }

    },
     onfocusout: function(element) {
        $(element).valid();
    },
    messages: {
      caropr_name:{
       required:"Please Enter Rental Operator Name"
     },
     email:{
      required:"Please Enter Email Address"
     },
     logo:{
        required:"Please Upload Logo of Your Agency"

     },
     
     
    website:{
      url:"Please Enter Correct Url"
    },
    altcontact:{
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
      }

  },
  errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "caropr_name" ) {
              $("#caropr_name").text($(error).html());
            }
             else if (element.attr("name") == "yourRole" ) {
              $("#home_type").text($(error).html());
            }
            else if (element.attr("name") == "logo" ) {
              $("#logo").text($(error).html());
            }
             else if (element.attr("name") == "contact" ) {
              $("#contact_number").text($(error).html());
            }
             else if (element.attr("name") == "landline" ) {
              $("#landline_number").text($(error).html());
            }
             else if (element.attr("name") == "email" ) {
              $("#home_email").text($(error).html());
            }
             else if (element.attr("name") == "website" ) {
              $("#website").text($(error).html());
            }
            else if (element.attr("name") == "city" ) {
              $("#city_error").text($(error).html());
            }
            else if (element.attr("name") == "altcontact" ) {
              $("#contact_number_secondary").text($(error).html());
            }
            else if (element.attr("name") == "facebookPage" ) {
              $("#fb").text($(error).html());
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