
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
      <li data-crumb="#main/url" class=""><a href="#main/url">Web Pages</a></li>
      <li data-crumb="#main/url/" class="active">New</li>
   </ul>
   <!-- .breadcrumb -->
</div>
<div class="col-xs-12">
   <div id="form_container">
      <form class="form-horizontal" role="form" onsubmit="event.preventDefault();" >

            <div class="form-group field-name">			
               <label class="col-sm-2 control-label" for="web_page_name">Name</label>				      
               <div class="col-sm-10">
                  <span data-editor=""><input id="web_page_name" class="form-control" name="name" type="text"></span>
                  <p class="help-block" id="web_page_name_error"><small></small></p>
               </div>
            </div>
			
			
			
            <div class="form-group field-description">
               <label class="col-sm-2 control-label" for="web_page_description">Description</label>				      
               <div class="col-sm-10">
                  <span data-editor=""><input id="web_page_description" class="form-control" name="description" type="text"></span>				        
                  <p class="help-block"><small></small></p>
               </div>
            </div>
			
			
            <div class="form-group field-url">
               <label class="col-sm-2 control-label" for="web_page_link">Web Page Link</label>
               <div class="col-sm-10">
                  <span data-editor=""><input id="web_page_link" class="form-control" name="url" type="text"></span>				        
                  <p class="help-block" id="web_page_link_error"><small></small></p>
               </div>
            </div>
			
			
            <div class="form-group field-tags">
               <label class="col-sm-2 control-label" for="web_page_tab">Tags</label>
               <div class="col-sm-10">
                           <span class="tag_box" style="position: relative; display: inline-block;">
							  <input id="web_page_tag_ids" type="text" name="web_page_tag_ids" placeholder="Tags" class="form-control web_page_tab" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                           </span>
                  <p class="help-block"><small></small></p>
               </div>
            </div>





      <div class="form-horizontal">
         <div class="form-actions">
            <div id="edit-form-actions-buttons">
               <button type="submit" id="submit_form" class="submit-model btn btn-success btn-sm">Save</button>
               <button class="cancel-model btn btn-primary btn-sm" onClick="window.location=\'webpages.php\';"   >Cancel</button>
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


function submit_add_new_webpage() {

var web_page_name = document.getElementById("web_page_name").value;
var web_page_description = document.getElementById("web_page_description").value;
var web_page_link = document.getElementById("web_page_link").value;
var web_page_tag_ids = document.getElementById("web_page_tag_ids").value;


						$.ajax({
							type: "POST",
							url: "ajax_add_new_webpage.php",
							data: {
								"web_page_name": web_page_name,
								"web_page_description": web_page_description,
								"web_page_link": web_page_link,
								"web_page_tag_ids": web_page_tag_ids
							},
//							dataType: 'json',
							success: function(data) {
								console.log(data);
								window.location.href = "webpages.php";
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

document.getElementById("web_page_name_error").innerHTML = '';
document.getElementById("web_page_link_error").innerHTML = '';


var web_page_name = document.getElementById("web_page_name").value;


if (web_page_name==''){

document.getElementById("web_page_name_error").innerHTML = 'Name cannot be null';
return;
}


var web_page_link = document.getElementById("web_page_link").value;

if ( validURL(web_page_link)==false  ){
document.getElementById("web_page_link_error").innerHTML = 'Invalid web page link. Please verify.';
return;
}



submit_add_new_webpage();










});


</script>
