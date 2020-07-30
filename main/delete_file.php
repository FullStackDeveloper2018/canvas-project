<?php
include 'db.php';
session_start();

$file_file_id   = $_POST['file_file_id'];
$user_user_id   = $_SESSION['user_user_id'];
$playlist_playlist_id    = $_SESSION["playlist_playlist_id"];


$sql="select file_file_name from sig_files
where file_user_id     = '$user_user_id'
and   file_playlist_id = '$playlist_playlist_id'
and   file_file_id     = '$file_file_id'
";

$result=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($result);
$file_file_name =  $data['file_file_name'];

unlink('./uploads/'.$file_file_name);


$sql="DELETE FROM sig_files
where file_user_id     = '$user_user_id'
and   file_playlist_id = '$playlist_playlist_id'
and   file_file_id     = '$file_file_id'
";


$query=mysqli_query($con,$sql);


$response = array();
$response['response'] = 'Success';
exit(json_encode($response));


//echo json_encode( 'response':'Success');
//$sql="update sig_playlists set playlist_playlist_name='$playlist_playlist_name'  where playlist_playlist_id = '$playlist_playlist_id' ";
//$query = mysqli_query($con,$sql);
//
//if($query){
//	return;
//}		
//else{
//	echo '<br>Error inserting in to sig_playlist';
//	echo mysqli_error($con);
//	die();
//}




?>