<?php 
session_start();
include 'db.php';

$user_user_id=$_SESSION["user_user_id"];

$layout = array();
$sql="SELECT * FROM sig_files WHERE file_user_id = '$user_user_id' AND file_file_type='Image' ";
//echo $sql;
$query=mysqli_query($con,$sql);


$images = array();
while ($res=mysqli_fetch_assoc($query)) {
	 
array_push($images,$res); 

}

array_push($layout, $images);

echo  json_encode($layout);


?>