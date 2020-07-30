<?php 

session_start();
include 'db.php';

$selected_days=$_POST['selected_days'];				
$selected_dates=$_POST['selected_dates'];
$start_date=$_POST['start_date'];		
$end_date=$_POST['end_date'];
$time_start=$_POST['time_start'];		
$time_end=$_POST['time_end'];
$user_user_id=$_SESSION["user_user_id"];
$playlist_playlist_id=$_POST['playlist_playlist_id'];
$group_group_id=$_POST['group_group_id'];


$sql="INSERT INTO sig_schedules ( 
sch_user_id        ,
sch_group_id       ,
sch_priority      ,
sch_playlist_id    ,
sch_weekday        ,
sch_month_date     ,
sch_start_date     ,
sch_end_date       ,
sch_start_time     ,
sch_end_time       
 )
select  
'$user_user_id',
'$group_group_id',
IF(MAX(sch_priority) IS NULL, 0, MAX(sch_priority))+1,
$playlist_playlist_id,
'$selected_days',
'$selected_dates',
'$start_date',
'$end_date', 
'$time_start',
'$time_end'
from sig_schedules where sch_user_id='$user_user_id' and sch_group_id = '$group_group_id' ";


$query=mysqli_query($con, $sql);
if ($query) {
	# code...
	echo "SAVED";
}
else{
	echo "Something Went Wrong";
}

?>