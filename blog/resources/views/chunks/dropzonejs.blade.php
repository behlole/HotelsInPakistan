<script type="text/javascript">


    Dropzone.options.dropzone =
    {
        maxFilesize: 12,
        maxFiles: 10,
        parallelUploads: 10,
        autoProcessQueue: false,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time+file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 5000,

        init: function (e) {
         
            var dropzone = this;
            // Tell Dropzone to process all queued files.
            $('#btn_upload').click(function(e){
                e.preventDefault();

                function tryQueue(){
                    var numQueued=dropzone.getQueuedFiles().length;
                    var numFiles=numQueued+dropzone.getUploadingFiles().length;
                    if(numQueued>0){
                      dropzone.processQueue();

                  }
                  if(numFiles>0){
                      setTimeout(tryQueue,1000);
                  }

                  else {


                    $( document ).ready(function() {   
                        $("#pictures" ).removeClass( "active" );
                        $("#complete").addClass("tab-pane active");
                        $("#picturesli" ).removeClass("active");
                        $("#picturesli").addClass("disabled");
                        $("#picturesfinished").removeAttr("data-toggle");

                        $("#finishedli" ).removeClass("disabled"); 
                        $("#finishedli").addClass("active");

                        $('#finished').attr( 'data-toggle', 'tab' );

                        $("#finished").find('a[data-toggle="tab"]').click();

                    });

                    $.ajax({

                        url: "{{url('destroy_res_session_function')}}/"+$('#resturants_id').text(),
                       type: "get",


                       success: function(data) {

                        alert($('#resturants_id').text());

                     }
                     


                 });

                }
            }
            tryQueue();
        });

            this.on("addedfile", function(event) {
                  
                while (this.files.length > this.options.maxFiles) {
                    this.removeFile(this.files[0]);
                }

            });
             

            file.previewElement.addEventListener("click", function() {
                dropzone.removeFile(file);
            });
        // Event to send your custom data to your server

    }

};



</script>