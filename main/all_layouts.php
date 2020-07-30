
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
    background-color: #307ecc;
    color: #FFF;
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

if (isset($_GET['msg'])) {
	if($_GET['msg'] == "success"){ $msg="Playlist updated successfully."; $type="success";}
	if($_GET['msg'] == "error"){ $msg="Something went wrong please try again."; $type="danger";}
	if($_GET['msg'] == "deleted"){ $msg="Playlist deleted successfully."; $type="success";}
} else {
	$msg="";
	$type="";
}
$alert ='';
 if (!empty($msg)) { 
	$alert.='<div class="alert alert-dismissable alert-'.$type.'"><button data-dismiss="alert" class="close hide_msg" type="button">×</button><p>'.$msg.'</p></div>';
} 
$content = '

<div class="row">'.$alert.'
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-body">
            <div class="table-header" style="margin-top: 20px">
               Web Pages
            </div>

				<table  id="data_table" class="table table-bordered table-hover dataTable" role="grid">
				   <thead id="table_header">
						<tr>
						<th id="table_header">Layout Name</th>         
						<th id="table_header">Action</th>
						</tr>
				   </thead>
				   <tbody>
				   </tbody>
				</table>
				
				<div class="space-4"></div>
				<div class="action-buttons-flat-view sticky-buttons-bg-color-grey">
				   <a class="addNewModel btn btn-success" onClick="window.location=\'layout.php\';"><i class="fa fa-plus"></i> Add Layout</a>
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






function addNewWebpage(){
	
window.location.href = "add_new_webpage.php";

	
	
}


function deletePlaylist(ele){
	

bootbox.confirm({
    title: "<span class='alert-header'>Alert</span>",
	animate: true,
    message: "<span class='alert-body'>Are you sure to delete the playlist?</span>",
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
    }
});


return;
var file_file_id = ele.getAttribute('file_file_id');
        
      $.ajax({
        url:'ajax_delete_web_page.php',
        type:'post',
        data:'file_file_id='+file_file_id,
        success:function(msg){
           window.location.assign("webpages.php");
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
function editPlaylist(id){
    
   if (id != undefined && id != null) {
        window.location = '/main/playlist.php?playlistId=' + id;
    }
}

  $(document).ready(function(){
      

				$(".image_lightbox").colorbox({rel:'image_lightbox'});
	  
	  
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
				"playlist_playlist_id='"+data[user].playlist_playlist_id+"' onclick='editPlaylist("+data[user].playlist_playlist_id+")' value='Edit'  /> "+
				
				
				"<input  type='button' class='btn btn-sm btn-danger' "+
				"data-playlist_id='"+data[user].playlist_playlist_id+"' onclick='deletePlaylist("+data[user].playlist_playlist_id+")' value='Remove'  /> "+

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
  
function deletePlaylist(id){
    var playlist_playlist_id = id;
     var r = confirm("Deleting the playlist will delete the associated schedules as well?");
    if (r == true) {
    
    
      $.ajax({
        url:'delete_playlist.php',
        type:'post',
        data:'playlist_playlist_id='+playlist_playlist_id,
        success:function(msg){
			top.location.href="all_playlists.php?msg=deleted";
        }

      });
  }

}  

  
  
</script>
