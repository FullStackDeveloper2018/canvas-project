
<?php
session_start();



$content = '

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">

                <div>
                    <h3 id="schedule_title" class="box-title">All Playlists</h3> </div>

					<input type="button" class="btn btn-primary" onclick="newPlaylist()" value="Create New Playlist"  style="float:right;" />


            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <table id="doctors" class="table table-bordered table-hover">
                    <thead id="table_header">
                        <tr>
                            <th id="table_header">Playlist Name</th>
         
                            <th id="table_header">Action</th>
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
</div>';
  include('master.php');
?>
<!-- page script -->
<script type="text/javascript">


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
        url: "get_playlist.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].playlist_playlist_name+"</td>"+
               

				"<td> "+
//				"<a href='edit_playlist.php?id="+data[user].playlist_playlist_id+" ' class='btn btm-sm btn-info' >Edit</a> "+

				"<input   method='post' type='button' class='btn btn-sm btn-info' "+
				"playlist_playlist_id='"+data[user].playlist_playlist_id+"' onclick='editPlaylist(this)' value='Edit'  /> "+
				
				
				"<input  type='button' class='btn btn-sm btn-danger' "+
				"playlist_playlist_id='"+data[user].playlist_playlist_id+"' onclick='deletePlaylist(this)' value='Remove'  /> "+

				"</td>"+

                "</tr>";
            }
            $(response).appendTo($("#doctors"));
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


  function editPlaylist(item){

    var playlist_playlist_id=item.getAttribute("playlist_playlist_id");

    $.ajax({
      url:'ajax_edit_playlist.php',
      type:'post',
	  
		type: "POST",
		url: "set_session_vars.php",
		data: {
			"playlist_playlist_id": playlist_playlist_id,
		},
		dataType: 'json',
		success:function(msg){
		console.log(msg);
		window.location.assign("playlist.php");
      }

    });

  }

</script>

