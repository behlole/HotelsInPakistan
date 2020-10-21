<script type="text/javascript">
 $(document).ready(function(){

  $("#upload").validate(
  {
    ignore: [],
    debug: false,
    rules: { 

      editor1:{
       required: function() 
       {
         CKEDITOR.instances.editor1.updateElement();
       },

       minlength:120
     }
   },
   messages:
   {

    editor1:{
      required:"Please Enter Restuarnts Details,Round about 200,300 Words",
      minlength:"Please enter 120 characters"
    }
  },
  errorPlacement: function(error, element) {
            //Custom position: first name
            if (element.attr("name") == "editor1" ) {
              $("#editor1_errors").text($(error).html());
            }
          }
        });
});
</script>