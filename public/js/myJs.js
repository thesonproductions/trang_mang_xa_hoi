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
     function DoPrevent(e) {
          e.preventDefault();
          e.stopPropagation();
     }
     var myDropZone = new Dropzone("#postFile",{
          url: "Home/uploadFile",
          method: 'POST',
          dictDefaultMessage: "Bạn có thể kéo ảnh hoặc click để chọn",
          maxFiles: 1,
          autoProcessQueue: false,
          init: function() {

               $('#upload').on('click',function(e) {

                    if (myDropZone.getQueuedFiles().length > 0) {
                         e.preventDefault();
                         myDropZone.processQueue();
                         setTimeout(function () {
                              window.location = "Home";
                         },1000)
                    } else {
                         $("#postFile").submit();
                    }
               });

               this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                         this.removeFile(this.files[0]);
                    }
               });
               this.on('complete', function(file) {
                    var f = file.xhr.response;
                    console.log(file.xhr);
               });
               this.on("sendingmultiple", function() {
               });
               this.on("successmultiple", function(files, response) {
               });
               this.on("errormultiple", function(files, response) {
               });
          },

          addRemoveLinks: true,
     })
     //




     jQuery(".post-comt-box textarea").on("keydown", function(event) {
	      if (event.keyCode === 13) {
	           var detailUser = $('#userDetail').val();
	           var arr = detailUser.split('/');
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
		       var comment_HTML = '	<li><div class="comet-avatar"><div class="border-avatar"><img src="public/images/avatar/'+arr[0]+'" alt=""></div></div><div class="we-comment"><div class="coment-head"><h5><a href="profile/index/'+arr[1]+'" title="">'+arr[3]+'</a></h5><span>'+arr[2]+'</span><a class="we-reply reply-button" style="cursor: pointer;" title="Reply"><i class="fa fa-reply"></i></a></div><p>'+comment+'</p></div></li>';
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
                         $("#pre"+arr[1]).prepend(response);
                         $("#"+id).text("more comments");
                    },800);
               }
          })
     });
})