<?php 
session_start();
include 'db.php';

$group_group_id=$_POST["group_group_id"];
$user_user_id=$_SESSION["user_user_id"];
$sql="DELETE FROM sig_groups WHERE group_group_id = '$group_group_id' and group_user_id = '$user_user_id' ";
//echo $sql;
$query=mysqli_query($con,$sql);

if($query){
	echo "Deleted";
}


?>