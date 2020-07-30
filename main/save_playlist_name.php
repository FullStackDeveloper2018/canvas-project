<?php
include 'db.php';


$playlist_playlist_id   = $_POST['playlist_playlist_id'];
$playlist_playlist_name = $_POST['playlist_playlist_name'];
$user_user_id=$_SESSION["user_user_id"];

//echo $playlist_playlist_id;
//echo $playlist_playlist_name;


$sql="update sig_playlists set playlist_playlist_name='$playlist_playlist_name'  where playlist_playlist_id = '$playlist_playlist_id' and playlist_user_id='$user_user_id' ";
$query = mysqli_query($con,$sql);

if($query){
	return;
}		
else{
	echo '<br>Error inserting in to sig_playlist';
	echo mysqli_error($con);
	die();
}




?>