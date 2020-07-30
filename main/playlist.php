<?php
session_start();
if(empty($_SESSION["user_user_id"])){
   header('location: login.php'); 
}else{
    include_once 'database.php';
    $database = new Database();
    $db = $database->getConnection();
    $user_user_id = $_SESSION['user_user_id'];
    $doctors_arr=array(); 
    $query = "select * from sig_files where file_user_id='$user_user_id' order by file_file_id desc";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $num = $stmt->rowCount();
    if($num>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $doctor_item=array(
                "file_file_id" => $file_file_id,
                "file_file_name" => $file_file_name,
                "file_file_path" => $file_file_path,
                "file_file_type" => $file_file_type
            );
            array_push($doctors_arr, $doctor_item);
		}
    }
}
if (isset($_GET['msg'])) {
	if($_GET['msg'] == "success"){ $msg="Playlist added successfully."; $type="success";}
	if($_GET['msg'] == "error"){ $msg="Something went wrong please try again."; $type="danger";}
} else {
	$msg="";
	$type="";
}
if (isset($_GET['playlistId'])) {
	$playlistId = $_GET['playlistId'];
	$formtype = "edit";
	$play_list_id = $playlistId;
} else {
    $playlistId = "";
    $formtype = "add";
	$play_list_id = $playlistId;
}
$playlist_playlist_name = '';
$description = '';
$playlist_ordered = '';
$seleted_plalist = '';
if(!empty($playlistId)){
    $query = "select * from sig_playlists where playlist_playlist_id=".$playlistId;
   $stmt = $db->prepare($query);
    $stmt->execute();
    $playlist_data = $stmt->fetch();
    
    if(!empty($playlist_data)){
        $playlist_playlist_name = $playlist_data['playlist_playlist_name'];
        $description = $playlist_data['description'];
        $playlist_ordered = json_decode($playlist_data['playlist_ordered'],true);
        
    }
}
if(!empty($playlist_ordered)){
	foreach($playlist_ordered as $play){
		$file_id = $play['file_id'];
		$file_name = $play['file_name'];
		$runtime = $play['runtime'];
		$query = "select file_file_type,file_file_path from  sig_files where file_file_id=".$file_id;
		$stmt = $db->prepare($query);
		$stmt->execute();
		$sig_files = $stmt->fetch();
		$file_file_type = $sig_files['file_file_type'];
		$file_file_path = $sig_files['file_file_path'];
			if($file_file_type == "Image"){
					$icon = '<i class="fa fa-image"></i>';
					$imgPreview = '<a href="#" data-name="'.$file_name.'" data-path="'.$file_file_path.'" data-value="'.$file_file_type.'" class="source cboxElement btn btn-link image myBtn" title="'.$file_name.'"><i class="fa fa-search-plus bigger-160"></i></a>';
				}else if($file_file_type == "Video"){
					$icon = '<i class="fa fa-video-camera"></i>';
				$imgPreview = '<a href="#" data-name="'.$file_name.'" data-path="'.$file_file_path.'" data-value="'.$file_file_type.'" class="source cboxElement btn btn-link image myBtn" title="'.$file_name.'"><i class="fa fa-search-plus bigger-160"></i></a>';
				}else if($file_file_type == "Webpage"){
					$icon = '<i class="fa fa-rss-square"></i>';
					$imgPreview = '';
				}
   $seleted_plalist.=  '<li class="message-item ui-draggable ui-draggable-handle" style="position: relative; left: 0px; top: 0px; width:434px!important; height: 67px;">
		                	<input type="hidden" name="file_id[]" value="'.$file_id.'">
		                	<input type="hidden" name="file_name[]" value="'.$file_name.'">
		                	<input type="hidden" value="'.$file_file_type.'" class="media_type"><label class="inline checkbox-container">
		                	<input type="checkbox" class="ace"><span class="lbl"></span></label>
			                <span class="inline">'.$icon.'</span><a class="title inline">'.$file_name.'</a>
			                <label class="spinner-container inline pull-right"><input class="duration-spinner input-mini runtime_cal" onchange="calculateTime()" onkeyup="calculateTime()" name="runtime[]" value="'.$runtime.'" type="number" min="0"></label>	
			                <label class="toolbar inline pull-right">'.$imgPreview.'
			                <a class="remove btn btn-link"><i class="fa fa-remove icon-remove bigger-160 " onclick="editremoveLI(this)"></i></a>
			                <a class="add btn btn-link"><i class="fa fa-arrow-right bigger-160"></i></a>
			                </label>
			            </li>';
 } }
?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="../dist/css/playLists.css" rel="stylesheet">
<style>
.play_description {
    max-width: 90% !important;
    float: right;
}
.sidebar, .sidebar:before {
    width: 100%;
    background-color: #1e282c;
}

@media screen and (max-width: 480px) {
  
#selected li {
    max-width: 288px !important;
}
}

@media (min-width: 768px)
.navbar-nav>li>a {
    padding-top: 3px;
    padding-bottom: 15px;
}
input[type=text]{
    width:100% !important;
}
.alert-dismissable .close, .alert-dismissible .close {
    position: relative;
    top: 13px !important;
    right: -21px;
}
.dataTables_filter {
   float: right;
   text-align: right;
}
input[type='number'] {
    -moz-appearance:textfield;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: block;
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
.dataTables_wrapper .row:last-child {    background-color: #F5F5F5 !important;}.pagination > li > a, .pagination > li > span {    position: relative;    float: left;    padding: 2px 12px !important;    margin-left: -1px;    line-height: 1.42857143;    color: #337ab7;    text-decoration: none;    background-color: #fff;    border: 1px solid #ddd;        border-top-color: rgb(221, 221, 221);        border-right-color: rgb(221, 221, 221);        border-bottom-color: rgb(221, 221, 221);        border-left-color: rgb(221, 221, 221);    height: 28px;}.fa.fa-chevron-left {    padding-top: 5px;}.fa.fa-chevron-right {    padding-top: 5px;}
.box-body {    height:701px !important; }

/*----14-6-2020--*/
label.inline {
    margin-bottom: 0;
    line-height: inherit;
    margin-top: 7px;
}
.inline {
    margin-top: 10px !important;
}

.table {
    padding: 0px !important;
}
.playlist_name {
    max-width: 90% !important;
    float: right;
}

.table-2 {
    padding: 0px !important;
    margin: 0px !important;
}
.btn-success {
    background-color: #00a65a !important;
    border-color: #008d4c !important;
    margin-bottom: 20px;
}
.button-1 {
    background-color: #f5f5f5;
}
.col-md-12.row {
    padding: 10px 0 10px 0 !important;
    margin: 0 !important;
}
.col-md-4.botton-1 {
    margin-bottom: 20px;
}

.widget-box{
    
    border-bottom:0px !important;
}
.left-sec {
    padding-top: 7px !important;
    float: right;
    padding-right: 5px;
}

.btn-cancel {
    width: 100%;
}

.btn-success {
    width: 100%;
}

.col-md-2.btn-green {

    padding-right: 0px;

}

#selected {
    border: 1px #8080804a solid;
    border-top-color: rgba(128, 128, 128, 0.29);
    border-top-style: solid;
    border-top-width: 1px;
    background: #fff;
    border-top: 0px !important;
}

#selected li {
	    width: 434px!important;
}
.tree::before{
    
    Border:none !important;
}
.hidden-xs {
    display: unset !important;
}

</style>

<?php
session_start();
$li_html = "";
$countmedia = 0;
if(!empty($doctors_arr)){
	foreach($doctors_arr as $files){
	$icon = "";
		if(!empty($files['file_file_type'])){
				if($files['file_file_type'] == "Image"){
					$icon = '<i class="fa fa-image"></i>';
					$imgPreview = '<a href="#" data-name="'.$files["file_file_name"].'" data-path="'.$files["file_file_path"].'" data-value="'.$files['file_file_type'].'" class="source cboxElement btn btn-link image myBtn" title="'.$files["file_file_name"].'"><i class="fa fa-search-plus bigger-160"></i></a>';
				}else if($files['file_file_type'] == "Video"){
					$icon = '<i class="fa fa-video-camera"></i>';
				$imgPreview = '<a href="#" data-name="'.$files["file_file_name"].'" data-path="'.$files["file_file_path"].'" data-value="'.$files['file_file_type'].'" class="source cboxElement btn btn-link image myBtn" title="'.$files["file_file_name"].'"><i class="fa fa-search-plus bigger-160"></i></a>';
				}else if($files['file_file_type'] == "Webpage"){
					$icon = '<i class="fa fa-rss-square"></i>';
					$imgPreview = '';
				}
				
			}
			$li_html.= '<li class="message-item draggable">
			<input type="hidden" name="file_id[]" value="'.$files["file_file_id"].'" ><input type="hidden" name="file_name[]" value="'.$files["file_file_name"].'" ><input type="hidden"  value="'.$files["file_file_type"].'" class="media_type"><label class="inline checkbox-container"><input type="checkbox" class="ace"><span class="lbl"></span></label>
			<span class="inline">'.$icon.'</span><a class="title inline">'.$files["file_file_name"].'</a>
			<label class="spinner-container inline pull-right"><input class="duration-spinner input-mini" name="value" type="text"></label>	<label class="toolbar inline pull-right">'.$imgPreview.'<a class="remove btn btn-link"><i class="fa fa-remove icon-remove bigger-160 "></i></a>
			<a class="add btn btn-link"><i class="fa fa-arrow-right bigger-160"></i></a>
			</label>
			</li>';
			$countmedia++;
		}
}$alert ='';
 if (!empty($msg)) { 
	$alert.='<div class="alert alert-dismissable alert-'.$type.'"><button data-dismiss="alert" class="close hide_msg" type="button">×</button><p>'.$msg.'</p></div>';
} 
$content = '<div id="playlist_container" class="form-horizontal">'.$alert.'	
	<div class="form-group playlist-folder window-resize">        
		
		<div id="folder-tree" class="col-sm-12 col-xs-12 workspace-reload">				
				<div class="col-md-12 row button-1">	
				
				<div class="col-md-2 btn-green">						
						<input type="submit" name="saveplaylist" class="btn btn-success sub_playlist pull-right" value="Save">
					</div>	
					 
					<div class="col-md-2 btn-2" >						
						<input  class="btn btn-cancel pull-left" onclick="window.history.go(-1); return false;" value="Cancel">
					</div>
					
								
				</div>		
			
				<div class="col-md-12 row">					
					<div class="col-md-12 table">						
						<label>Name</label>						
							<input type="text" name="playlist_name" class="playlist_name" value="'.$playlist_playlist_name.'">						
							<span id="playlist-err" style="color:red;"></span>					
						</div>					
						<div class="col-md-12 table-2">						
							<label>Description</label>						
							<input type="text" name="description" class="play_description" value="'.$description.'">		
						</div>				
					</div>
		</div>	
	</div>
</div>

<div id="playlist_container" class="form-horizontal">    
    
<div class="form-group playlist-folder window-resize">	
      
<div id="folder-tree" class="col-sm-3  col-xs-12 workspace-reload">            
<div class="widget-box folder-tree-view">                
<style>.draggable { width: 100%;  } .dragged_ul li{ z-index: 99 ; } .ui-draggable, .ui-droppable { background-position: top; } </style>
                <div class="widget-header header-color-green2">                    
				<span>Resources</span>                
				</div>                
				<div class="widget-body">                    
				 <div class="widget-main padding-8">                        
			 	<div id="folderTree" class="tree tree-unselectable tree-folder-select" role="tree">                            
				<li class="tree-branch hide" data-template="treebranch" role="treeitem" aria-expanded="false">                                
				<i class="icon-caret ace-icon tree-plus"></i>&nbsp;				                                
				<div class="tree-branch-header">                                    
				<span class="tree-branch-name">													
				<i class="icon-folder ace-icon fa fa-folder light-orange"></i>													
				<span class="tree-label"></span>					                                   
				</span>				                                
				</div>                                
				<ul class="tree-branch-children" role="group"></ul>                                
				<div class="tree-loader hidden" role="alert">                                    
				<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>                                
				</div>                            
				</li>                            
				<li class="tree-item hide" data-template="treeitem" role="treeitem">				                                
				<span class="tree-item-name">									
				<span class="tree-label"></span>                                
				</span>			                            
				</li>                            
				<li class="tree-branch tree-open folder_filter" data-media_type="Image" data-template="treebranch" role="treeitem" aria-expanded="true" id="0" aria-labelledby="0-label" workspace_id="0" folder_id="0" haschildren="false">				                                
				<div class="tree-branch-header">                                    
				<span class="tree-branch-name">										
				<span class="tree-label " id="0-label"  >Images</span>                                   
				</span>				                                
				</div>                                
				<ul class="tree-branch-children" role="group"></ul>                                
				<div class="tree-loader hidden" role="alert">                                    
				<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>                                
				</div>                            
				</li>                            
				<li class="tree-branch folder_filter" data-media_type="Video" data-template="treebranch" role="treeitem" aria-expanded="false" id="-3" aria-labelledby="-3-label" folder_id="-3" haschildren="false">			                                
				<div class="tree-branch-header">	                                    
				<span class="tree-branch-name">                                    
				<span class="tree-label " id="-3-label" >Videos</span>	                                    
				</span>	                                
				</div>                                
				<ul class="tree-branch-children" role="group"></ul>                               
				<div class="tree-loader hidden" role="alert">                                    
				<div class="tree-loading">                                        
				<i class="ace-icon fa fa-refresh fa-spin blue"></i>                                    
				</div>                                
				</div>                            
				</li>							
				<li class="tree-branch folder_filter" data-template="treebranch" data-media_type="Webpage" role="treeitem" aria-expanded="false" id="-3" aria-labelledby="-3-label" folder_id="-3" haschildren="false">			                                
				<div class="tree-branch-header">	                                    
				<span class="tree-branch-name">                                    
				<span class="tree-label" id="-3-label" >Webpages</span>	                                    
				</span>	                                
				</div>                                
				<ul class="tree-branch-children" role="group"></ul>                                
				<div class="tree-loader hidden" role="alert">                                    
				<div class="tree-loading">                                        
				<i class="ace-icon fa fa-refresh fa-spin blue"></i>                                    
				</div>                                
				</div>                            
				</li>                        
				</div>                    
				</div>                
				</div>            
				</div>        
				</div>        
				<div class="col-sm-4 col-xs-12 available-widget list">            
				<div class="widget-box">                
				<div class="widget-header">	                    
				<label class="inline">						
				<span class="lbl"></span>                    
				</label>                    
				<label class="inline title">Root Folder</label>                
				</div>                <div class="widget-body">                    
				<div class="widget-toolbox">                        
				<form action="javascript: " class="form-search" style="padding-left:4px; padding-top:5px; ">                            
				<span class="list-count hidden-sm">'.$countmedia.' media</span>                            
				<span class="input-icon" style="padding-left:0px;">                            
				<input type="text" placeholder="Search ..." class="col-xs-12 nav-search-input ui-autocomplete-input" id="myInput" onkeyup="filterData()" autocomplete="off"> 
				<i class="icon-search nav-search-icon"></i>                            
				</span>	                        
				</form>                    
				</div>                    
				<ul id="available" class="multiselect-sortable list-unstyled ui-sortable dragged_ul filter_li"> '.$li_html.'                    
				</ul>                
				</div>            
				</div>        
				</div>        
				<div class="col-sm-5 col-xs-12 selected-widget list">            
				<div class="widget-box">                
				<div class="widget-header">																				
				<label class="inline"> <input type="checkbox" class="ace">																						
				<span class="lbl"></span>																				
				</label>																				
				<label class="inline title">Playlist</label>	
				
				<span class="left-sec">                                
				Total duration (hh:mm:ss)&nbsp; <b class="calTime"> 00:00:00 </b>                                  
				<p class="playlist-duration-extra" style="font-size: 10px; line-height:23px;"> </p>                            
				</span>                        
			
				</div>                
							
				<form action="save_playlist.php" method="POST" class="playlistForm">	
				<input type="hidden" name="action_type" value="'.$formtype.'">
				<input type="hidden" name="play_list_id" value="'.$play_list_id.'">
				<input type="hidden" name="playlist_name" class="play_name" value="'.$playlist_playlist_name.'">
				<input type="hidden" name="description" class="play_desc" value="'.$description.'">
				<ul id="selected" class="multiselect-sortable list-unstyled ui-sortable dragged_div">'.$seleted_plalist.'</ul>	
				</form>            
				</div>        
				</div>        
				<div style="display:none">            
				<div id="inline_folder_playlist"></div>        
				</div>    
				</div>
</div>';
/* 
$content = '
<div class="row">
   <div class="col-xs-12">
      <div class="box box-primary">
         <div class="box-body">
            <div class="table-header" style="margin-top: 20px">
               Web Pages
            </div>
				<table  id="data_table" class="table table-bordered table-hover dataTable" role="grid">
				   <thead id="table_header">
					  <tr>
						 <th id="table_header">Name</th>
						 <th id="table_header">Webpage Link</th>
						 <th id="table_header">Actions</th>
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


'; */
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
