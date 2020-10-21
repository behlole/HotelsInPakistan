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
             e.preventDefault(e);

             if(dropzone.getQueuedFiles().length>0){
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

                // location.reload();
                window.location.href = "{{url('restuarnts_finished_listing/'.$restaurant_id)}}"


              }
            }
            tryQueue();

        }else{ //Testing it with alert
          $('#dropzone_error_txt').text("Plese Add Some Files");

        }
      });

            this.on("addedfile", function(event) {
              $('#dropzone_error_txt').text("");
              while (this.files.length > this.options.maxFiles) {
                this.removeFile(this.files[0]);
              }

            });
          }

        };



      </script>