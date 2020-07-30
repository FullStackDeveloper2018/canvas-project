
<style>

.dataTables_filter {
   float: right;
   text-align: right;
}


#data_table{
background-color: white; color:black;
    border:1px dotted steelblue;	
	word-wrap: break-word; word-break: break-all; white-space: normal;	
   }

#data_table tbody td {
  vertical-align: middle;
}



.table-header {
    background-color: #6d6b69;
    font-weight: bold;
}

.table-header {
//    background-color: #307ecc;
    background-color: lightgrey;
    color: black;
    line-height: 38px;
    padding-left: 12px;
    margin-bottom: 1px;
}
.dataTables_info, .table-header {
    font-size: 14px;
}

.dataTables_wrapper .row:first-child, .dataTables_wrapper .row:last-child {
    padding-top: 12px;
    padding-bottom: 12px;
    background-color: #eff3f8;
}

.dataTables_wrapper .row {
    margin: 0;
}



.dataTables_wrapper .row:first-child, .dataTables_wrapper .row:last-child {
    background-color: #f1efed;
}


.dataTables_wrapper>.row>.col-sm-12 {
    width: 100%;
    padding: 0;
}


   .paginate_button 
    {
        min-width: 500px; !important
    }


.space-4, .vspace-4, .vspace-lg-4, .vspace-md-4, .vspace-sm-4, .vspace-xs-4 {
    max-height: 1px;
    min-height: 1px;
    overflow: hidden;
    margin: 12px 0;
    margin: 4px 0 3px;
}	




.button_margin
{
margin-right: 5px;
}

.modal-header .alert-header {
    color: #292529 !important;
//    font-weight: 400;
    font-size: 26px;
}

.modal-footer {
    padding-top: 12px;
    padding-bottom: 14px;
    border-top-color: #e4e9ee;
    box-shadow: none;
    background-color: #eff3f8;
}

.modal-footer {
    padding: 19px 20px 20px;
    margin-top: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
	

.modal-footer .btn-primary {
    border: 1px solid #393939 !important;
    background-color: #fff !important;
    color: #393939 !important;
    outline: none;
    min-width: 140px;
}


.modal-footer .btn-danger, .modal-footer .btn-success {
//    border: 1px solid #F26F26 !important;
//    background-color: #F26F26 !important;
//    border: 1px solid grey !important;
    background-color: #3c8dbc !important;
    min-width: 140px;
}

.alert-body {
    font-size: 22px;
}

.action-buttons-flat-view, .show-form-media-buttons-sticky {
    position: fixed;
    bottom: 0px;
//padding-right: 505px;
    padding-top: 5px;
    padding-bottom: 5px;
    background: #dbdee4;
    width: 100%;
    padding-left: 8px;
}

.dataTables_wrapper .row:last-child {    background-color: #F5F5F5 !important;}.pagination > li > a, .pagination > li > span {    position: relative;    float: left;    padding: 2px 12px !important;    margin-left: -1px;    line-height: 1.42857143;    color: #337ab7;    text-decoration: none;    background-color: #fff;    border: 1px solid #ddd;        border-top-color: rgb(221, 221, 221);        border-right-color: rgb(221, 221, 221);        border-bottom-color: rgb(221, 221, 221);        border-left-color: rgb(221, 221, 221);    height: 28px;}.fa.fa-chevron-left {    padding-top: 5px;}.fa.fa-chevron-right {    padding-top: 5px;}
.box-body {    height:701px !important; }
</style>

<?php
session_start();



$content = '

<div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-body">
            <div class="table-header" style="margin-top: 20px">
               Videos
            </div>

				<table  id="data_table" class="table table-bordered table-hover dataTable" role="grid">
				   <thead id="table_header">
					  <tr>
						 <th id="table_header">Name</th>
						 <th id="table_header">Preview</th>
						 <th id="table_header">Actions</th>
					  </tr>
				   </thead>
				   <tbody>
				   </tbody>
				</table>
				
				<div class="space-4"></div>
				<div class="action-buttons-flat-view sticky-buttons-bg-color-grey">
				   <a class="addNewModel btn btn-success" onClick="window.location=\'add_new_video.php\';"><i class="fa fa-plus"></i> Add Video</a>
				</div>

         </div>
         <!-- /.box-body -->
      </div>
      <!-- /.box -->
   </div>
</div>


';
  include('master.php');
?>

<meta name="viewport" content="width=device-width,initial-scale=0.75">
	
	
<style>
table.dataTable {
    margin-top: 0px !important;
    margin-bottom: 0px !important;
}
</style>	
	
<script type="text/javascript">




function delete_video(ele){
	

bootbox.confirm({
    title: "<span class='alert-header'>Alert</span>",
	animate: true,
    message: "<span class='alert-body'>Are you sure to delete the video?</span>",
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
			var file_file_path = ele.getAttribute('file_file_path');
			

			$.ajax({
				url:'ajax_delete_video.php',
				type:'post',
				data:'file_file_id='+file_file_id+'&file_file_path='+file_file_path,
				success:function(msg){
					console.log(msg);
					window.location.assign("videos.php");
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

	  
    $.ajax({
        type: "GET",
        url: "get_videos.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
				
				
                response += "<tr>"+
                "<td>"+data[user].file_file_name+"</td>"+
               

				"<td>";
				if(data[user].file_file_type === "Image"){
				response += "<img class='image_lightbox myBtn'  data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" src="+data[user].file_file_path+" style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'>";
				}else{
					response += "<video poster='uploads/default_thumbs/video_thumb.jpg' data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" class='image_lightbox myBtn' style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'><source src="+data[user].file_file_path+" type='video/mp4'></video>";
				}
				
				response += "</td><td> "+
//				"<input   method='post' type='button' class='btn btn-sm btn-info' "+
//				"file_file_name='"+data[user].file_file_name+"' onclick='editPlaylist(this)' value='Edit'  /> "+
				
				
				"<input  type='button' class='btn btn-sm btn-danger' "+
				"playlist_playlist_id='"+data[user].playlist_playlist_id+"' file_file_path="+data[user].file_file_path+" file_file_id="+data[user].file_file_id+" onclick='delete_video(this)' value='Remove'  /> "+

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
  

</script>
	
	
	
	
	
<style>

.modal {
  display: none; 
  position: fixed; 
  z-index: 999999; 
  padding-top: 100px; 
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.4); 
}

.modal-content {
 background-color: #fefefe;
    margin: auto;
    padding: 13px;
    border: 1px solid #888;
    width: 628px;
}

.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    margin-top: -21px;
    color: #000;
    border-radius: 50%;
    background: white;
    width: 31px;
    height: 31px;
    margin-left: 589px;
    border: 2px solid grey;
    text-align: center;
	opacity: 1 !important;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.pop-img{
    display: block;
    max-width: 600px;
    max-height: 600px;
    width: auto;
    height: auto;
}


@media only screen and (max-width:600px) {

.modal-content {
    width: 90%;
}
.close {
    margin-top: -10px;
    margin-left: 286px;
	cursor: pointer;
}
.pop-img {
    width: 100%;
}


}


</style>

<div id="myModal" class="modal">

  <!-- Modal content -->
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
		var img_path = jQuery(this).attr('src');
		var img_html = "<img src="+img_path+" class='pop-img'>";
		jQuery('#media_src').html(img_html);
		
	}else{
		var video_path = jQuery(this).find('Source:first').attr('src');;
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
