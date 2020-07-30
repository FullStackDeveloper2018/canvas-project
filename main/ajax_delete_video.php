<?php 
session_start();
include 'db.php';

$user_user_id=$_SESSION["user_user_id"];
$file_file_id=$_POST["file_file_id"];
$file_file_path=$_POST["file_file_path"];
unlink($file_file_path);

$sql="DELETE FROM sig_files WHERE file_user_id = '$user_user_id' and file_file_id = '$file_file_id' and file_file_path='$file_file_path' and file_file_type='Video' ";
//echo $sql;
$query=mysqli_query($con,$sql);

if($query){
	echo "Deleted";
}


?>