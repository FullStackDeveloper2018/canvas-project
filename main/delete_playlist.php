<?php 
session_start();
include 'db.php';
include_once 'database.php';

$playlist_playlist_id=$_POST["playlist_playlist_id"];
$user_user_id = $_SESSION['user_user_id'];

$database = new Database();
$db = $database->getConnection();
$sql="DELETE FROM sig_playlists WHERE playlist_playlist_id = '$playlist_playlist_id' ";
$query=mysqli_query($con,$sql);
if($query){
	echo "Schedules Deleted";
}




?>