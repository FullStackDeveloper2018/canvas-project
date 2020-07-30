<?php 

session_start();
include '../db.php';

if ((!isset($_GET['email'])) || (!isset($_GET['password'])) || (!isset($_GET['device_uuid'])) || (!isset($_GET['device_name'])) ){
	echo '404 Not Found';
	return;
}


$email = $_GET['email'];
$password = $_GET['password'];
$device_uuid = $_GET['device_uuid'];
$device_name = $_GET['device_name'];


$email=mysqli_real_escape_string($con,$email);
$password=mysqli_real_escape_string($con,$password);
$device_uuid=mysqli_real_escape_string($con,$device_uuid);
$device_name=mysqli_real_escape_string($con,$device_name);

$sql_user_check = "SELECT * from sig_users where user_email='$email' and user_password='$password' ";
$result_login=mysqli_query($con,$sql_user_check);


if (mysqli_num_rows($result_login)==0){  // user not exists
	echo 'ACC_NOT_FOUND';
	return;
}
else{                              // user exists

	if (mysqli_num_rows($result_login)>1){  // duplicate accounts
		echo 'DUP_ACC_ERR.';
		return;
	}

	$result_login=mysqli_fetch_array($result_login);
	$user_id = $result_login['user_user_id'];
	
	$sql = "delete from sig_devices where device_uuid='$device_uuid' ";
	mysqli_query($con,$sql);

	$sql_devices = "SELECT * from sig_users su join sig_devices sd on su.user_user_id=sd.device_user_id where user_email='$email' and user_password='$password' and device_uuid='$device_uuid' ";

	$result_devices=mysqli_query($con,$sql_devices);

	if (mysqli_num_rows($result_devices)==0){      //Device not found then insert a new device		

						$sql_insert = " insert into sig_devices (
										device_user_id    ,
										device_group_id   ,
										device_name       ,
										device_status     ,
										device_enabled    ,
										device_uuid       )
										values(
										$user_id,
										null,
										'$device_name',
										'running',
										'enabled',
										'$device_uuid'
										)";

						$query_insert=mysqli_query($con, $sql_insert);
						if ($query_insert) {
							echo "Success";
							return;
						}
						else{
							echo "DEV_ADD_NET_FAILED";
							return;
						}
	}
	else{
		
						if (mysqli_num_rows($result_devices)>1){
							echo 'DUP_DEV_ERR';
							return;
						}
						
						$sql_update = "update sig_devices set device_name='$device_name' where device_uuid='$device_uuid' ";
						
						$query_update=mysqli_query($con, $sql_update);
						if ($query_update) {
							echo "Success";
							return;
						}
						else{
							echo "DEV_UPD_NET_FAILED";
							return;
						}
	}

	
}





?>