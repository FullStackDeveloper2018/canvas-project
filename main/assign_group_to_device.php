<?php 
include 'db.php';
session_start(); 

$data=$_POST["data"];
$device_device_id=explode("|",$data)[0];
$group_group_name=explode("|",$data)[1];
$user_user_id = $_SESSION['user_user_id'];

$sql="update `sig_devices` set device_group_id
=(select group_group_id from sig_groups where group_group_name='$group_group_name' and group_user_id='$user_user_id' ) 
WHERE device_device_id = '$device_device_id' and device_user_id='$user_user_id' ";

echo $sql;
$query=mysqli_query($con,$sql);

if($query){
	echo 'Success';
	}
else{
	echo 'device group update failed';
}

?>