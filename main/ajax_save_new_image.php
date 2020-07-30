<?php 
session_start();
include 'db.php';

$user_user_id         = $_SESSION["user_user_id"];
$image_name           = $_POST["image_name"];
$image_description    = $_POST["image_description"];
$image_tag_ids        = $_POST["image_tag_ids"];

echo $_FILES["selected_image"]["tmp_name"];
echo $_FILES["selected_image"]["name"];

$d = new DateTime();
$filename= $user_user_id.'_'.$d->format("ymdHisu").'_'.basename($_FILES["selected_image"]["name"]);
echo 'FILENAME:'.$filename;	

$target_file = "uploads/" . $filename;
 if (move_uploaded_file($_FILES["selected_image"]["tmp_name"], $target_file)) {			
} else {
	echo "Sorry, there was an error uploading your file.";
}


$sql=" insert into sig_files(file_user_id,
file_file_type,
file_file_name,
file_file_description,
file_file_tag_id,
file_file_path)
values (
'$user_user_id',
'Image',
'$image_name',
'$image_description',
'$image_tag_ids',
'$target_file') ";

echo $sql;
$query = mysqli_query($con,$sql);




?>
	
	