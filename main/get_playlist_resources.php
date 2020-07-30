<?php

session_start(); 
include_once 'database.php';

$database = new Database();
$db = $database->getConnection();

$user_user_id    =    $_SESSION['user_user_id'];
$playlist_playlist_id =    $_SESSION['playlist_playlist_id'];


$query = "select * from sig_playlists left outer join sig_files
on playlist_playlist_id = file_playlist_id
where playlist_user_id='$user_user_id' and playlist_playlist_id = '$playlist_playlist_id' order by file_order asc";

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute();
 
//$stmt = $doctor->read();
$num = $stmt->rowCount();
// check if more than 0 record found
if($num>0){
 
    // doctors array
    $doctors_arr=array();
    $doctors_arr["doctors"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $doctor_item=array(
            "file_file_name" => $file_file_name,
            "file_resource_type" => $file_resource_type,
			"file_runtime" => $file_runtime,
			"playlist_playlist_name" => $playlist_playlist_name,
			"file_order" => $file_order,
			"file_file_id" => $file_file_id
			
			
//            "email" => $email,
//            "password" => $password,
//            "phone" => $phone,
//            "gender" => $gender,
//            "specialist" => $specialist,
//            "created" => $created
        );
        array_push($doctors_arr["doctors"], $doctor_item);
    }
 

    echo json_encode($doctors_arr["doctors"]);
}
else{
    echo json_encode(array());
}
?>