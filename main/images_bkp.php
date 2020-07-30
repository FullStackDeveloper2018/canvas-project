
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

				$(".image_lightbox").colorbox({rel:'image_lightbox'});
	  
	  
    $.ajax({
        type: "GET",
        url: "get_files.php",
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
				
				
                response += "<tr>"+
                "<td>"+data[user].file_file_name+"</td>"+
                "<td>"+data[user].file_file_type+"</td>"+
               

				"<td><img class='image_lightbox' src="+data[user].file_file_path+" style='cursor:zoom-in;width:120px;height:67.5px; border: 1.5px solid lightgrey;padding:3px'></td>"+
				
				
				"<td> "+
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

	


