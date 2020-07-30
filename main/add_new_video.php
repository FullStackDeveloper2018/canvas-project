
<style>

.help-block {
	padding-left: 5px;
    color:red !important;
}


.breadcrumbs {
//    position: relative;
//    border-bottom: 1px solid #e5e5e5;
    background-color: #f5f5f5;
    min-height: 30px;
    line-height: 30px;
//    padding: 0 12px 0 0;
    display: block;
padding: 0;
}

.breadcrumb .home-icon {
    margin-left: 4px;
    margin-right: 2px;
//    margin-bottom: 40px;
    font-size: 20px;
    position: relative;
    top: -1px;
}

//.form-actions {
//    background-color: lightgrey;
//    border-top: 1px solid grey;
//    margin-top: 20px;
//    margin-bottom: 20px;
//    padding: 19px 20px 20px;
//    padding: 5px 5px 5px;
//}




</style>

<?php
session_start();



$content = '


<div class="breadcrumbs" id="breadcrumbs">
   <ul class="breadcrumb">
      <li><i style="color:#3c8dbc" class="fa fa-lg fa-home icon-home home-icon"></i> <a href="#main/dashboard">Home</a></li>
      <li data-crumb="Media&nbsp;" class=""><a href="#main/url">Media</a></li>
      <li data-crumb="#main/url" class=""><a href="#main/url">Video</a></li>
      <li data-crumb="#main/url/" class="active">New</li>
   </ul>
   <!-- .breadcrumb -->
</div>
<div class="col-xs-12">
   <div id="form_container">
      <form class="form-horizontal" role="form" onsubmit="event.preventDefault();" >

	  
            <div class="form-group field-url">
               <label class="col-sm-2 control-label" for="video_selection">Select Video</label>
               <div class="col-sm-10">
                  <span data-editor="">
					<input type="file"  accept="video/mp4"  class="form-control" name="selected_video" id="selected_video" />
				  </span>				        
                  <p class="help-block" id="video_selection_error"><small></small></p>
               </div>
            </div>
	  

			
            <div class="form-group field-name">			
               <label class="col-sm-2 control-label" for="video_name">Name</label>				      
               <div class="col-sm-10">
                  <span data-editor=""><input id="video_name" class="form-control" name="video_name" type="text"></span>
                  <p class="help-block" id="video_name_error"><small></small></p>
               </div>
            </div>
			
			
			
            <div class="form-group field-description">
               <label class="col-sm-2 control-label" for="video_description">Description</label>				      
               <div class="col-sm-10">
                  <span data-editor=""><input id="video_description" class="form-control" name="description" type="text"></span>				        
                  <p class="help-block"><small></small></p>
               </div>
            </div>
			
			
			
			
            <div class="form-group field-tags">
               <label class="col-sm-2 control-label" for="video_tags_group">Tags</label>
               <div class="col-sm-10">
                           <span class="tag_box" style="position: relative; display: inline-block;">
							  <input id="video_tag_ids" type="text" name="video_tag_ids" placeholder="Tags" class="form-control video_tags_group" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                           </span>
                  <p class="help-block"><small></small></p>
               </div>
            </div>





      <div class="form-horizontal">
         <div class="form-actions">
            <div id="edit-form-actions-buttons">
               <button type="submit" id="submit_form" class="submit-model btn btn-success btn-sm">Save</button>
               <button class="cancel-model btn btn-primary btn-sm" onClick="window.location=\'videos.php\';"   >Cancel</button>
            </div>
         </div>
      </div>

	  
      </form>
	  
   </div>

</div>	



';
  include('master.php');
?>

	
	
<script >



document.querySelector("#selected_video").onchange = function(){
	document.querySelector("#video_name").value = this.files[0].name;
}


function submit_add_new_video() {

var video_name = document.getElementById("video_name").value;
var video_description = document.getElementById("video_description").value;
var video_tag_ids = document.getElementById("video_tag_ids").value;

var formData = new FormData();
formData.append('video_name', video_name);
formData.append('video_description', video_description);
formData.append('video_tag_ids', video_tag_ids);
formData.append('selected_video', document.querySelector('#selected_video').files[0]);

						$.ajax({
							type: "POST",
							url: "ajax_save_new_video.php",
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        data: formData ,
							
//							data: {
//								"video_name": video_name,
//								"video_description": video_description,
//								"video_tag_ids": video_tag_ids
//							},
//							dataType: 'json',
							success: function(data) {
								console.log(data);
								window.location.href = "videos.php";
							},
								error: function(xhr, textStatus, error) {
									console.log('Error Starts...');
									console.log(xhr.responseText);
									console.log(xhr.statusText);
									console.log(textStatus);
									console.log(error);
									console.log('Error Ends...');
								}



						});

}

function validURL(str) {
  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
    '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
    '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
    '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
  return !!pattern.test(str);
}




document.getElementById("submit_form").addEventListener("click", function () {

document.getElementById("video_name_error").innerHTML = '';
//document.getElementById("web_page_link_error").innerHTML = '';


var video_name = document.getElementById("video_name").value;


if (video_name==''){

document.getElementById("video_name_error").innerHTML = 'Name cannot be null';
return;
}

submit_add_new_video();




});


</script>
