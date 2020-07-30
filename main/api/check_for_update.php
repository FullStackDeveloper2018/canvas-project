<?php 

session_start();
include '../db.php';

if ((!isset($_GET['device_uuid'])) ){
	echo '404 Not Found';
	return;
}


$device_uuid = $_GET['device_uuid'];

$sql_user_check = "SELECT * from sig_devices left join sig_groups 
on group_group_id = device_group_id 
and group_user_id = device_user_id
where device_uuid='$device_uuid' ";
$result_device=mysqli_query($con,$sql_user_check);


if (mysqli_num_rows($result_device)==0){  // device not found
	echo 'ACC_NOT_FOUND';
	return;
}
else{                              // user exists

	if (mysqli_num_rows($result_device)>1){  // duplicate accounts
		echo 'DUP_ACC_ERR.';
		return;
	}

	$result_device=mysqli_fetch_array($result_device);
	$device_update = $result_device['group_update_tracking_md5'];
	
	echo $device_update;

}