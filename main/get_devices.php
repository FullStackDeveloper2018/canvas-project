<?php

session_start(); 
include_once 'database.php';

$database = new Database();
$db = $database->getConnection();
$user_user_id = $_SESSION['user_user_id'];


$query = "select device_device_id,device_name,group_group_name,
(select GROUP_CONCAT( group_group_name ) from sig_groups where group_user_id='$user_user_id' ) as group_list
 from sig_devices left join sig_groups 
 on device_group_id=group_group_id 
 and device_user_id=group_user_id
 where device_user_id='$user_user_id' order by device_device_id asc";
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
		
		if ($group_list==NULL){
			$group_list='';
		}
		if ($group_group_name==NULL){
			$group_group_name='';
		}
		
		
        $doctor_item=array(
            "device_device_id" => $device_device_id,
            "device_name" => $device_name,
            "group_group_name" => $group_group_name,
			"device_status" => "Running",
			"group_list" => $group_list
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