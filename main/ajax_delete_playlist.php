<?php 
session_start();
include 'db.php';
include_once 'database.php';

$playlist_playlist_id=$_POST["playlist_playlist_id"];
$user_user_id = $_SESSION['user_user_id'];




$database = new Database();
$db = $database->getConnection();
$query = "select file_file_path from sig_files join sig_playlists 
on playlist_playlist_id = file_playlist_id 
on playlist_user_id     = file_user_id
where playlist_playlist_id='$playlist_playlist_id' and file_user_id='$user_user_id'  ";

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute();
$num = $stmt->rowCount();

if($num>0){
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);

		if (file_exists($file_file_path)) {
			unlink($file_file_path);
			echo 'File deleted: '.$file_file_path;
		} else {
			echo 'File not found: '.$file_file_path;
		}			
    }
}
else{
	echo 'No items in playlist';
}



$sql="DELETE FROM sig_schedules WHERE sch_playlist_id = '$playlist_playlist_id' and sch_user_id='$user_user_id'";
$query=mysqli_query($con,$sql);

if($query){
	echo "Schedules Deleted";
}



$sql="DELETE FROM sig_files WHERE file_playlist_id = '$playlist_playlist_id' and file_user_id='$user_user_id' ";
$query=mysqli_query($con,$sql);

if($query){
	echo "Files Deleted";
}



$sql="DELETE FROM `sig_playlists` WHERE `playlist_playlist_id` = '$playlist_playlist_id' and playlist_user_id='$user_user_id' ";
$query=mysqli_query($con,$sql);

if($query){
	echo "Playlist Deleted";
}


?>