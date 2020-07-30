<?php 
session_start();
include 'db.php';

$user_user_id         = $_SESSION["user_user_id"];
$web_page_name        = $_POST["web_page_name"];
$web_page_description = $_POST["web_page_description"];
$web_page_link        = $_POST["web_page_link"];
$web_page_tag_ids        = $_POST["web_page_tag_ids"];





$sql=" insert into sig_files(file_user_id,file_file_type,file_file_name,file_file_description,file_web_page_link,file_file_tag_id)
values ('$user_user_id','Webpage','$web_page_name','$web_page_description','$web_page_link','$web_page_tag_ids') ";
echo $sql;
$query = mysqli_query($con,$sql);




?>
	
	