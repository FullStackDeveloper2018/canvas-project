<?php
session_start();
include 'db.php';


	$playlist_playlist_name=$_POST["playlist_playlist_name"];
	$playlist_playlist_name=str_replace("'", "", $playlist_playlist_name);
	$user_user_id=$_SESSION["user_user_id"];
	
	$sql="select count(1) as count from sig_playlists where playlist_playlist_name='$playlist_playlist_name' and playlist_user_id='$user_user_id' ";
//	echo $sql;
	
	$query = mysqli_query($con,$sql);
	
	if($query){

		$count = mysqli_fetch_object($query)->count;
		echo $count;

	}
	else{
		echo 'Error: '.mysqli_error($con);
	}
		
 

?>