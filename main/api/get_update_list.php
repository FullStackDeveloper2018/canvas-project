<?php 

session_start();
include '../db.php';

if ((!isset($_GET['device_uuid'])) ){
	echo '404 Not Found';
	return;
}


$device_uuid = $_GET['device_uuid'];



//Schdules
$sql = "select sch.* from sig_schedules sch,sig_groups,sig_devices where sch_group_id=group_group_id and device_group_id = group_group_id and device_uuid='$device_uuid' ";
$query=mysqli_query($con,$sql);
if (mysqli_num_rows($query)==0){  // schedule not found
	echo 'SCH_NOT_FOUND';
	return;
}
else{
	$sch = array();
	while($r = mysqli_fetch_assoc($query)) {		
		$sch[] = $r;
	}
}


//playlist
$sql = "select distinct ply.* from sig_schedules sch,sig_groups,sig_devices,sig_playlists ply
		where sch_group_id=group_group_id and device_group_id = group_group_id 
		and sch_playlist_id=playlist_playlist_id
		and device_uuid='$device_uuid' ";
	

$query=mysqli_query($con,$sql);
if (mysqli_num_rows($query)==0){  // schedule not found
	echo 'NOT_PLY_FOUND';
	return;
}
else{
	$ply = array();
	while($r = mysqli_fetch_assoc($query)) {		
		$ply[] = $r;
	}
}


//files
$sql = "select distinct fls.* from sig_schedules sch,sig_groups,sig_devices,sig_playlists ply, sig_files fls
		where sch_group_id=group_group_id and device_group_id = group_group_id 
		and sch_playlist_id=playlist_playlist_id
		and playlist_playlist_id = file_playlist_id
		and device_uuid='$device_uuid' ";
$query=mysqli_query($con,$sql);


if (mysqli_num_rows($query)==0){  // schedule not found
	echo 'NOT_FLS_FOUND';
	return;
}
else{
	$fls = array();
	while($r = mysqli_fetch_assoc($query)) {		
		$fls[] = $r;
	}
}



$res_array = array ("schedules"=>$sch,"playlists"=>$ply,"files"=>$fls);

echo json_encode($res_array);
?>