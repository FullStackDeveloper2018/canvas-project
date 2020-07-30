
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




</style>

<?php
session_start();



$content = '

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">

                <div>
                    <h3 id="schedule_title" class="box-title">Images</h3> </div>

					<input type="button" class="btn btn-primary" onclick="newPlaylist()" value="Add New Image"  style="float:right;" />


            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="data_table" class="table table-bordered table-hover dataTable" role="grid">
                    <thead id="table_header">
                        <tr>
											
						
                            <th id="table_header">Name</th>
                            <th id="table_header">Type</th>
                            <th id="table_header">Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
				


				
				
				
				
				
				
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>

';
  include('master.php');
?>

	
	
<script type="text/javascript">

function format_table() {
    $('#data_table').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  }


function newPlaylist(){
							
						$.ajax({
							type: "POST",
							url: "set_session_vars.php",
							data: {
								"playlist_playlist_id": ""
							},
							dataType: 'json',
							success: function(data) {
								if (data['response']=='Success'){
									console.log('Set Success');
									window.location.href = "playlist.php";
								}else{
									console.log('Set Fail');
									alert('Error :'+data['response']);
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
						
						
}


  function hideNameError(){
    document.getElementById("name_error").innerText="";
  }   

function deletePlaylist(item){
    var playlist_playlist_id=item.getAttribute("playlist_playlist_id");

     var r = confirm("Deleting the playlist will delete the associated schedules as well?");
    if (r == true) {
    
    
      $.ajax({
        url:'ajax_delete_playlist.php',
        type:'post',
        data:'playlist_playlist_id='+playlist_playlist_id,
        success:function(msg){
			console.log(msg);
           window.location.assign("all_playlist.php");
        }

      });
  }

}  




  $(document).ready(function(){

	  
    $.ajax({
        type: "GET",
        url: "get_images.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
				
				
                response += "<tr>"+
                "<td>"+data[user].file_file_name+"</td>"+
                "<td>"+data[user].file_file_type+"</td>"+
               

				"<td>";
				if(data[user].file_file_type === "Image"){
				response += "<img class='image_lightbox myBtn' data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" src="+data[user].file_file_path+" style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'>";
				}else{
					response += "<video poster='uploads/video-poster/video_poster.jpg' data-name="+data[user].file_file_name+" data-value="+data[user].file_file_type+" class='image_lightbox myBtn' style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'><source src="+data[user].file_file_path+" type='video/mp4'></video>";
				}
				
				response += "</td><td> "+
				"<input   method='post' type='button' class='btn btn-sm btn-info' "+
				"file_file_name='"+data[user].file_file_name+"' onclick='editPlaylist(this)' value='Edit'  /> "+
				
				
				"<input  type='button' class='btn btn-sm btn-danger' "+
				"playlist_playlist_id='"+data[user].playlist_playlist_id+"' onclick='deletePlaylist(this)' value='Remove'  /> "+

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

	


