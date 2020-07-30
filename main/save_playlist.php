<?php
session_start();

    include_once 'database.php';
    $database = new Database();
    $db = $database->getConnection();
    $user_user_id = $_SESSION['user_user_id'];
    if(isset($_POST)){
        $playlist_array = array();
            $i=1;
			foreach($_POST['file_id'] as $key=>$val)
			{
				$playlist_array[] = array(
					"file_id"=>$val,
					"file_name"=>$_POST['file_name'][$key],
					"runtime"=>$_POST['runtime'][$key],
					"order"=> $i
				);
				 $i++;
			}
		if(!empty($playlist_array)){
		   if($_POST['action_type'] == "add"){
		       
		       $query	=	"INSERT INTO `sig_playlists`(`playlist_user_id`, `playlist_playlist_name`,`description`,`playlist_ordered`) VALUES ('".$user_user_id."','".$_POST['playlist_name']."','".$_POST['description']."','".json_encode($playlist_array)."')";
        
                $stmt = $db->prepare($query);
                $res = $stmt->execute();
                
                if($res=="1"){
                    header('location: playlist.php?msg=success'); 
                }else{
                     header('location: playlist.php?msg=error'); 
                }
		   }else{
		      
                $query	= "UPDATE sig_playlists SET playlist_playlist_name= '".$_POST['playlist_name']."',description= '".$_POST['description']."',playlist_ordered= '".json_encode($playlist_array)."'  WHERE playlist_playlist_id=".$_POST['play_list_id'];
                $stmt = $db->prepare($query);
                $res = $stmt->execute();
                if($res=="1"){
                    header('location: all_playlists.php?msg=success'); 
                }else{
                     header('location: all_playlists.php?msg=error'); 
                }
		   }
		 
		
         
		}
	   
		
    }

?>