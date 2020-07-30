<?php 
session_start();
include 'db.php';

$user_user_id=$_SESSION["user_user_id"];
$file_file_id=$_POST["file_file_id"];
$file_web_page_link=$_POST["file_web_page_link"];

$sql="DELETE FROM sig_files WHERE file_user_id = '$user_user_id' and file_file_id = '$file_file_id' and file_web_page_link='$file_web_page_link' and file_file_type='Webpage' ";
//echo $sql;
$query=mysqli_query($con,$sql);

if($query){
	echo "Deleted";
}


?>