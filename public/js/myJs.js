Dropzone.autoDiscover = false;

$(document).ready(function () {
     $('.post-bar').click(function () {
          $('#postFile').css('display','block');
          $('.post-bar').css('display','none');
     })
     $('#close').click(function () {
          $('.dz-image-preview').empty();
          $('#postFile').css('display','none');
          $('.post-bar').css('display','block');
     })

     var myDropZone = new Dropzone("#postFile",{
          dictDefaultMessage: "Bạn có thể kéo ảnh hoặc click để chọn",
          maxFiles: 1,
          autoProcessQueue: false,
          init: function() {
               this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                         this.removeFile(this.files[0]);
                    }
               });
               this.on('complete', function(file) {
                    var f = file.xhr.response;
                    console.log(file.xhr);


               });
          },
          addRemoveLinks: true,
     })
     $('#postFile').on('submit',function(e) {
          e.preventDefault()
          myDropZone.processQueue();
          var content = $('#content').val();
          $.ajax({
               url: 'Home/uploadFile',
               type: 'POST',
               dataType: 'JSON',
               data: {content: content},
               success: function (response) {
                    alert(123);

               }
          })
     });
})