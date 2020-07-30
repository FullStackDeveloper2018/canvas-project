<?php

session_start(); 
include_once 'database.php';

$database = new Database();
$db = $database->getConnection();
$user_user_id = $_SESSION['user_user_id'];
 

$query = "select * from sig_playlists where playlist_user_id='$user_user_id' order by playlist_playlist_id desc";
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
            "playlist_playlist_id" => $playlist_playlist_id,
            "playlist_playlist_name" => $playlist_playlist_name
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