<?php

session_start();
include ("db.php");

$group_group_name=$_POST["group_group_name"];
$user_user_id=$_SESSION["user_user_id"];

$sql="select * from sig_groups where group_group_name='$group_group_name' and group_user_id='$user_user_id' ";
$query = mysqli_query($con,$sql);

$count = mysqli_num_rows($query);
if ($count==0){

	$query="insert into sig_groups (group_user_id,group_group_name) values ($user_user_id, '$group_group_name')";

	$result=mysqli_query($con,$query);
	if($result){
		echo "SAVED";
	}
}
else{
	echo "ALREADY_EXIST";
}

?>