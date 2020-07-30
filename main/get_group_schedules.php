<?php

session_start(); 
include_once 'database.php';
include 'encode_weekday.php';

$database = new Database();
$db = $database->getConnection();
$user_user_id =  $_SESSION['user_user_id'];
$group_group_id = $_SESSION['group_group_id'];

$query = "select * from sig_schedules join sig_playlists 
on sch_playlist_id=playlist_playlist_id and sch_user_id=playlist_user_id 
where sch_user_id='$user_user_id' and sch_group_id='$group_group_id' order by sch_priority asc";
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
		$sch_weekday=encode_weekday($sch_weekday,$sch_month_date);

        $doctor_item=array(


			"sch_user_id" => $sch_user_id,
			"sch_group_id" => $sch_group_id,
			"sch_sch_id" => $sch_sch_id,
            "sch_priority" => $sch_priority,
			"playlist_playlist_name" => $playlist_playlist_name,
			"sch_running" => $sch_weekday.'</br>'.$sch_start_time.'-'.$sch_end_time,
			
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