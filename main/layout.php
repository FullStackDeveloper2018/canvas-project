<?php
$content = file_get_contents('layout.html');
include('master.php');
?>

<meta name="viewport" content="width=device-width,initial-scale=0.75">
	
	
<style>
table.dataTable {
    margin-top: 0px !important;
    margin-bottom: 0px !important;
}
.general-nav {

    right: 18px;
}
.canvas-container {
   /*margin-left: 70px !important;*/
}

@media only screen and (max-width: 480px) {

#fullScreen {
    margin-left: -235px !important;
    width: 785px !important;
    height: 1081px !important;}
    
 .sidebar-heading {
    padding: 56px 20px 10px;
}

.icon-list {
    width: 100%;
}
.general-nav {
    right: 0px;
}
.insert-item-types {
    padding: 6px 7px 20px;
}
.canvas-container {
    margin-left: 0px !important;
}
.general-nav {
    max-width: 127px !important;
}
.form-actions.layout-form-actions.bottom-btns {
    width: 375px;
    position: absolute;
    right: 57px;
}

#screen-editor {
    height: 443px;

}
}
@media only screen and (max-width: 767px) {

.insert-item-types {
    padding: 6px 16px 20px;
}
.icon-list {
    width: 88%;
}
.general-nav {
    width: 184px !important;
}
#screen-editor {
    height: 442px;
}
#screen-editor {
    height: 442px;
}
.canvas-container {
    margin-left: 0px !important;
    width: 323px;
}
#fullScreen {
    margin-left: -233px !important;
    width: 779px !important;
}
.sidebar-close {
    padding: 30px 19px 10px;
}

/*------@media only screen and (min-width: 992px) {

.general-nav {
    width: 203px !important;
}

.canvas-container {
    margin-left: 0px !important;
}


#fullScreen {
    margin-left: -384px !important;
    width: 1276px !important;
}

}*/



</style>
<script type="text/javascript">
$(document).ready(function(){

	  
    $.ajax({
        type: "GET",
        url: "get_images.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
				
				if(data[user].file_file_type === "Image"){
				    var newOption = new Option(data[user].file_file_name, data[user].file_file_path, false, false);
                    $('.images-option').append(newOption).trigger('change');
				//response += "<img class='image_lightbox myBtn'  data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" src="+data[user].file_file_path+" style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'>";
				}
            }
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
	console.log('end of ajax');
  });
  
  //lightbox image zoom
 




/* 

function delete_web_page(ele){
	

bootbox.confirm({
    title: "<span class='alert-header'>Alert</span>",
	animate: true,
    message: "<span class='alert-body'>Are you sure to delete the webpage?</span>",
    buttons: {

       confirm: {
            label: 'Delete',
            className: "btn  btn-danger button_margin",
        },
        cancel: {
            label: 'Cancel',
            className: "btn btn-primary pull-right"
        }
    },
    callback: function (result) {
        console.log('This was logged in the callback: ' + result);
		
		if (result==true){
			var file_file_id = ele.getAttribute('file_file_id');
			var file_web_page_link = ele.getAttribute('file_web_page_link');

			$.ajax({
				url:'ajax_delete_web_page.php',
				type:'post',
				data:'file_file_id='+file_file_id+'&file_web_page_link='+file_web_page_link,
				success:function(msg){
					window.location.assign("webpages.php");
				}

			});
		}		
		
		
		
		
    }
});



	
}


function format_table() {
    $('#data_table').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
  language: {
    paginate: {
      next: '<i class="fa fa-chevron-right">',
      previous: '<i class="fa fa-chevron-left">'  
    },

	
  },



    })
  }


  $(document).ready(function(){

				$(".image_lightbox").colorbox({rel:'image_lightbox'});
	  
	  
    $.ajax({
        type: "GET",
        url: "get_webpages.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
				
				
                response += "<tr>"+
                "<td>"+data[user].file_file_name+"</td>"+
                "<td>"+data[user].file_web_page_link+"</td>"+

//				"<td>";
//				if(data[user].file_file_type === "Image"){
//				response += "<img class='image_lightbox myBtn' data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" src="+data[user].file_file_path+" style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'>";
//				}else{
//					response += "<video poster='uploads/video-poster/video_poster.jpg' data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" class='image_lightbox myBtn' style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'><source src="+data[user].file_file_path+" type='video/mp4'></video>";
//				}
//				
//				response += "</td>"+
				"<td> "+
//				"<input   method='post' type='button' class='btn btn-sm btn-info' "+
//				"file_file_name='"+data[user].file_file_name+"' onclick='editPlaylist(this)' value='Edit'  /> "+
				
				
				"<input type='button' class='btn btn-sm btn-danger' "+
				"file_file_id='"+data[user].file_file_id+"' file_web_page_link="+data[user].file_web_page_link+" onclick='delete_web_page(this)' value='Remove'  /> "+

				"</td>"+

                "</tr>";
            }
            $(response).appendTo($("#data_table"));
			
			format_table();
			
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
	console.log('end of ajax');
  });

  
  //lightbox image zoom
  
*/
</script> 
<!--
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>  
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>

function filterData() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("available");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
<script>

$( ".folder_filter" ).click(function( event ) {
  event.preventDefault();
  var type = $(this).data('media_type');
  $('#folderTree').find(".folder_filter").removeClass('tree-selected');
  $(this).addClass('tree-selected');
  
  $('.draggable .media_type').each(function(){
   var value = $(this).val();
   if(value == type){
       $(this).parent("li").show();
   }else{
       $(this).parent("li").hide();
   }
});
  
});
$( ".sub_playlist" ).click(function( event ) {
  event.preventDefault();

var playlist_name = $(".playlist_name").val();

var num = $(".dragged_div").find("li").length;
if(num>0){
    if(playlist_name == ""){
        $('#playlist-err').text('Please enter name.');
         return false;
    }else{
        $('.playlistForm').submit();
        $('#playlist-err').text('');
    }
   
}else{
    $('#playlist-err').text('');
     return false;
}
return false;
});

function editremoveLI(elem){
$(elem).closest('li').remove();
calculateTime();
}
function removeLI(elem){
$(elem).closest('li').parent('li').remove();
calculateTime();
}

  $(function () {
calculateTime();      
  $("ul, li").disableSelection();
  $(".draggable ").draggable({
    connectToSortable: ".dragged_div",
    helper: "clone",
    revert: "invalid"
});
    $(".dragged_div ").sortable({
    revert: true,
    stop: function(event, ui) {
	 
        if (ui.item.hasClass("draggable")) {
            // This is a new item
			 var $canvasElement = ui.item.clone()
			 	$canvasElement.find(".remove ").html('<i class="fa fa-remove icon-remove bigger-160 " onclick="removeLI(this)"></i>');
			 	$canvasElement.removeClass("draggable");
				var type = $canvasElement.find(".media_type").val();
			    if(type == "Video"){
			        $canvasElement.find(".spinner-container ").html('<input class="duration-spinner input-mini" name="runtime[]" value="0" type="number" min="0" readonly>');
			    }else{
				    $canvasElement.find(".spinner-container ").html('<input class="duration-spinner input-mini runtime_cal" onchange="calculateTime()" onkeyup="calculateTime()" name="runtime[]" value="5" type="number" min="0">');
			    }
            ui.item.removeClass("draggable");
           ui.item.html($canvasElement);
           $canvasElement.css({
                    left: '-12px',
                    top: '-12px'
                });
            calculateTime();
        }
    }
});

}); 
$(".playlist_name").bind("keyup change", function(e) {
     var name = $('.playlist_name').val();
    $('.play_name').val(name);
});
$(".play_description").bind("keyup change", function(e) {
     var description = $('.play_description').val();
     $('.play_desc').val(description);
});
function calculateTime(){
  
 var sum = 0;
$('.dragged_div .runtime_cal').each(function(){
    sum += parseFloat($(this).val());
});
   given_seconds = sum; 
  
            dateObj = new Date(given_seconds * 1000); 
            hours = dateObj.getUTCHours(); 
            minutes = dateObj.getUTCMinutes(); 
            seconds = dateObj.getSeconds(); 
  
            timeString = hours.toString().padStart(2, '0') 
                + ':' + minutes.toString().padStart(2, '0') 
                + ':' + seconds.toString().padStart(2, '0'); 
    $('.calTime').html(timeString);
}
  </script>
  
<div id="myModal" class="modal">

  
  <div class="modal-content">
    <span class="close">&times;</span>
	<div id="media_src"></div>
    <p id="img_title"></p>
  </div>
</div>

<script>
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];

jQuery(document).on('click', '.myBtn', function() {
	var img_name = jQuery(this).attr('data-name');
	jQuery('#img_title').html(img_name);
	if(jQuery(this).attr('data-value') === "Image"){
		var img_path = jQuery(this).attr('data-path');
		var img_html = "<img src="+img_path+" class='pop-img'>";
		jQuery('#media_src').html(img_html);
		
	}else{
		var video_path = jQuery(this).find('Source:first').attr('data-path');
		var video_html = "<video src="+video_path+" class='pop-img' autoplay controls></video>";
		jQuery('#media_src').html(video_html);
	}
	
	modal.style.display = "block";
});


span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

$(document).keydown(function(event) { 
  if (event.keyCode == 27) { 
    modal.style.display = "none";
  }
});
  
</script>
-->