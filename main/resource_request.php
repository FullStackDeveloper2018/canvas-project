<?php
session_start();
include 'db.php';

$user_user_id=$_SESSION["user_user_id"];
$playlist_playlist_id=$_SESSION["playlist_playlist_id"];

$playlist_playlist_name=$_SESSION["playlist_playlist_name"];  
$playlist_playlist_name=str_replace("'", "", $playlist_playlist_name);


if(isset($_SESSION["playlist_playlist_id"]) && strlen($_SESSION["playlist_playlist_id"])>0   ) {	
	echo 'Playlist is set';
	$playlist_playlist_id = $_SESSION["playlist_playlist_id"];

	$sql="update sig_playlists set playlist_playlist_name='$playlist_playlist_name'  where playlist_playlist_id = '$playlist_playlist_id' and playlist_user_id='$user_user_id' ";
	$query = mysqli_query($con,$sql);

	if($query){
		print('Success');
	}		
	else{
		echo '<br>Error inserting in to sig_playlist';
		echo mysqli_error($con);
		die();
	}
	
}
else{
	$sql="INSERT INTO `sig_playlists` (`playlist_user_id`, `playlist_playlist_name`) VALUES ($user_user_id, '$playlist_playlist_name'); ";
	$query = mysqli_query($con,$sql);

	if($query){
		$playlist_playlist_id = $con->insert_id;
	}		
	else{
		echo '<br>Error inserting in to sig_playlist';
		echo mysqli_error($con);
		die();
	}
	
}	
$_SESSION["playlist_playlist_id"]=$playlist_playlist_id;
$d = new DateTime();
$filename= $user_user_id.'_'.$playlist_playlist_id.'_'.$d->format("YmdHis").'_'.basename($_FILES["file"]["name"]);
echo 'FILENAME:'.$filename;	

$resource_type = $_POST['resource_type'];
echo $_FILES["file"]["tmp_name"];
echo $_FILES["file"]["name"];
$runtime = $_POST['runtime'];

$target_file = "uploads/" . $filename;
 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {			
} else {
	echo "Sorry, there was an error uploading your file.";
}

$sql="select ifnull(max(file_order),0)+1 as max_order from sig_files where 
file_user_id = '$user_user_id' and
file_playlist_id='$playlist_playlist_id'";

$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
$order =  $data['max_order'];
		
$sql="INSERT INTO `sig_files` ( 
`file_playlist_id`,`file_user_id`,`file_file_name`, `file_file_path`, `file_resource_type`, `file_runtime`, `file_order`) 
VALUES ( $playlist_playlist_id,$user_user_id,'$filename', '$target_file', '$resource_type', '$runtime', '$order'); ";


$query = mysqli_query($con,$sql);

header('Location: playlist.php');







	
?>