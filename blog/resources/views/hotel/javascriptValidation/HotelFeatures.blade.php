<script type="text/javascript">
  $(".js-example-tags").select2({
    tags: true,
    tokenSeparators: [',', ' ']
  });
  $('#pchk').change(function(){

    if($("#pchk").is(":checked")){
      $('#save').prop('disabled',false);
    }
    else{
     $('#save').prop('disabled',true);
   }
 });
  $('input[name=netcheck]').click(function(){
   if(this.value=="Free"||this.value=="Paid"){
    $('#net_options').show();
    $('#net_options1').show();
    $('#net_options_payement').hide();

    if(this.value=="Paid"){
      $('#net_options_payement').show();
    }
  }
  else{
   $('#net_options').hide();
   $('#net_options1').hide();
   $('#net_options_payement').hide();
 }
});
  $('input[name=parkcheck]').click(function(){
   if(this.value=="Free"||this.value=="Paid"){
    $('#park_options').show();
    $('#parking_options_payement').hide();
    if(this.value=="Paid"){
      $('#parking_options_payement').show();
    }
  }
  else{
    $('#park_options').hide();
    $('#parking_options_payement').hide();
  }
});
  $(document).ready(function() {

   $('#upload').validate({
     rules: {
       "lang[]":{ 
        required:true
      },
      "select_facilitie[]": {
       required: true
     },
     netcheck:{
      required:true
    },
    netcheckopt:{
      required: function(element) {

        if($('input[type=radio][name=netcheck]:checked').val() == "Free"||$('input[type=radio][name=netcheck]:checked').val() == "Paid"){
          return true;
        }
        if($('input[type=radio][name=netcheck]:checked').val() == "No"){
          return false;
        } 
      }
    },
    range:{
      required: function(element) {

        if($('input[type=radio][name=netcheck]:checked').val() == "Free"||$('input[type=radio][name=netcheck]:checked').val() == "Paid"){
          return true;
        }
        if($('input[type=radio][name=netcheck]:checked').val() == "No"){
          return false;
        } 
      }
    },
    net_options_payement:{
      required: function(element) {

        if($('input[type=radio][name=netcheck]:checked').val() == "Free"||$('input[type=radio][name=netcheck]:checked').val() == "No"){
          return false;
        }
        if($('input[type=radio][name=netcheck]:checked').val() == "Paid"){
          return true;
        } 
      }

    },
    parkcheck:{
      required:true
    },
    reservation:{
      required:function(element) {

        if($('input[type=radio][name=parkcheck]:checked').val() == "Free"||$('input[type=radio][name=parkcheck]:checked').val() == "Paid"){
          return true;
        }
        if($('input[type=radio][name=parkcheck]:checked').val() == "No"){
          return false;
        } 
      }
    },
    nature:{
      required:function(element) {

        if($('input[type=radio][name=parkcheck]:checked').val() == "Free"||$('input[type=radio][name=parkcheck]:checked').val() == "Paid"){
          return true;
        }
        if($('input[type=radio][name=parkcheck]:checked').val() == "No"){
          return false;
        } 
      }
    },
    site:{
      required:function(element) {

        if($('input[type=radio][name=parkcheck]:checked').val() == "Free"||$('input[type=radio][name=parkcheck]:checked').val() == "Paid"){
          return true;
        }
        if($('input[type=radio][name=parkcheck]:checked').val() == "No"){
          return false;
        } 
      }
    },
    perdaypark:{
      required:function(element) {

        if($('input[type=radio][name=parkcheck]:checked').val() == "Free"||$('input[type=radio][name=parkcheck]:checked').val() == "No"){
          return false;
        }
        if($('input[type=radio][name=parkcheck]:checked').val() == "Paid"){
          return true;
        } 
      }
    }
  },
  messages: {
    "lang[]":{
     required:"Please Select At least one or two Langauges"
   },
   "select_facilitie[]":{
    required:"Please Select At Features,that you offered at Hotel"
  },
  netcheck:{
    required:"Please Select Internet Options"
  },
  netcheckopt:{
    required:"Please Select sub Internet Options"
  },
  range:{
    required:"Please Select Internet Range Option"
  },
  net_options_payement:{
    required:"Please Enter Internet Charges"
  },
  parkcheck:{
    required:"Please Select Parking Options"

  },
  reservation:{
    required:"Please Select Parking Reservation,Needeed Or Not"
  },
  nature:{
    required:"Please Select Parking is Public or it is Private"
  },
  site:{
    required:"Please Add Parking Site,either On Site or Off Site"
  },
  perdaypark:{
    required:"Please Add Parking Charges"
  }


},
errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "lang[]" ) {
              $("#lang_error").text($(error).html());
            }
            //Custom position: second name
            else if (element.attr("name") == "select_facilitie[]" ) {
              $("#fac_error").text($(error).html());
            }
            else if (element.attr("name") == "netcheck" ) {
              $("#internet_error").text($(error).html());
            }
            else if (element.attr("name") == "netcheckopt" ) {
              $("#internet_error_2").text($(error).html());
            }
            else if (element.attr("name") == "range" ) {
              $("#internet_error_3").text($(error).html());
            }
            else if (element.attr("name") == "net_options_payement" ) {
              $("#internet_error_4").text($(error).html());
            }
            else if (element.attr("name") == "parkcheck" ) {
              $("#parking_error").text($(error).html());
            }
            else if (element.attr("name") == "reservation" ) {
              $("#parking_reservation").text($(error).html());
            }
            else if (element.attr("name") == "nature" ) {
              $("#parking_nature").text($(error).html());
            }
            else if (element.attr("name") == "site" ) {
              $("#parking_site_error").text($(error).html());
            }
            else if (element.attr("name") == "perdaypark" ) {
              $("#per_day_parking").text($(error).html());
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
            case "home_price":
            $(label).html("nice date");
            break;                 
          }
        }
      });
});
</script>