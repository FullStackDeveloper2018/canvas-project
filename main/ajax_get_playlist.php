<?php

session_start();
include ("db.php");

$playlist_playlist_id=$_POST["playlist_playlist_id"];
$user_user_id = $_SESSION['user_user_id'];


$sql="select * from sig_playlists where playlist_playlist_id='$playlist_playlist_id' and playlist_user_id='$user_user_id'   ";
$query = mysqli_query($con,$sql);

$playlist=array();
while ($res=mysqli_fetch_assoc($query)) {

	array_push($playlist,$res );

}

$sql="select * from sig_files where file_playlist_id='$playlist_playlist_id' and file_user_id='$user_user_id' ";
$query = mysqli_query($con,$sql);


$files = array();
while ($res=mysqli_fetch_assoc($query)) {
	 
array_push($files,$res); 

}

array_push($playlist, $files);

echo  json_encode($playlist);



?>