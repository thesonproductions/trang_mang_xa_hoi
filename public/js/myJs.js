Dropzone.autoDiscover = false;

$(document).ready(function () {
     $('.post-bar').click(function () {
          $('#postFile').css('display','block');
          $('.post-bar').css('display','none');
     })
     $('#close').click(function () {
          $('#content').val('');
          $('.dz-image-preview').empty();
          $('#postFile').css('display','none');
          $('.post-bar').css('display','block');
     })

     var myDropZone = new Dropzone("#postFile",{
          url: "Home/uploadFile",
          method: "POST",
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
               cache: false,
               data: {content: content},
               success: function (response) {
                    setTimeout(function () {
                         window.location = "Home";
                    },1000)
               }
          })

     });
     jQuery(".post-comt-box textarea").on("keydown", function(event) {
	      if (event.keyCode === 13) {
	           var id = this.id
               var split_id = id.split('_');
		       var comment = jQuery(this).val();
               var data = {comment: comment, userId: split_id[1],postId: split_id[2]};
		       $.ajax({
                    url: "Home/comment",
                    type: "POST",
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                         if (response.status === 0){
                              alert('An error occurred during the process, please try again');
                         }
                    }
               })
		       var parent = jQuery(".showmore").parent("li");
		       var comment_HTML = '	<li><div class="comet-avatar"><img src="public/images/resources/comet-1.jpg" alt=""></div><div class="we-comment"><div class="coment-head"><h5><a href="time-line.html" title="">Jason borne</a></h5><span>1 year ago</span><a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a></div><p>'+comment+'</p></div></li>';
		       $(comment_HTML).insertBefore(parent);
		       jQuery(this).val('');
	      }
     });
     $('.more').click(function () {
          var id = this.id;
          var arr = id.split('_');
          var row = Number($('#rowMore').val());
          row = row + 5;
          var data = {row: row, postId: arr[1]};
          $('#rowMore').val(row);

          $.ajax({
               url: 'Home/readMore',
               type: "POST",
               data: data,
               beforeSend: function () {
                    $('#'+id).html("Loading...");
               },
               success: function (response) {
                    setTimeout(function () {
                         var parent = jQuery(".showmore").parent("li");
                         $(response).insertBefore(parent);
                         $('#'+id).text("more comments");
                    },800);
               }
          })
     })
})