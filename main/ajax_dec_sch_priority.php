<?php

session_start();
include ("db.php");



$user_user_id = $_SESSION['user_user_id'];
$sch_sch_id = $_POST['sch_sch_id'];
$sch_group_id = $_POST['sch_group_id'];




$sql="select * from sig_schedules WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id' order by sch_priority asc";
//echo $sql;
$query = mysqli_query($con,$sql);

$cnt = 0;
while ($res=mysqli_fetch_assoc($query)) {
		$cnt = $cnt + 1;
		$sch_id = $res['sch_sch_id'];
		$sql="update sig_schedules set sch_priority=$cnt WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id'  and sch_sch_id = '$sch_id'  ";
//		echo $sql;
		mysqli_query($con,$sql);
}






$sql="select * from sig_schedules WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id' order by sch_priority asc";
echo $sql;
$query = mysqli_query($con,$sql);

while ($res=mysqli_fetch_assoc($query)) {
	$cur_sch_id=$res['sch_sch_id'];

	if ($sch_sch_id == $cur_sch_id){
		
		
		$sql="update sig_schedules set sch_priority=sch_priority+1
		WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id'  and sch_sch_id = '$cur_sch_id'  ";
//		echo $sql;
		mysqli_query($con,$sql);

		$res=mysqli_fetch_assoc($query);
		
		if ($res){			
			$nxt_sch_id=$res['sch_sch_id'];
			$sql="update sig_schedules set sch_priority=sch_priority-1
			WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id'  and sch_sch_id = '$nxt_sch_id'  ";
	//		echo $sql;
			mysqli_query($con,$sql);
		}
		break;		
	}

}






$sql="select * from sig_schedules WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id' order by sch_priority asc";
//echo $sql;
$query = mysqli_query($con,$sql);

$cnt = 0;
while ($res=mysqli_fetch_assoc($query)) {
		$cnt = $cnt + 1;
		$sch_id = $res['sch_sch_id'];
		$sql="update sig_schedules set sch_priority=$cnt WHERE sch_user_id = '$user_user_id' and sch_group_id = '$sch_group_id'  and sch_sch_id = '$sch_id'  ";
//		echo $sql;
		mysqli_query($con,$sql);
}



?>