<?php 
	// connect to database
	

	$con=mysqli_connect('localhost', 'maddevel_maddeve', ';-_h03oA9bM&', 'maddevel_main');

		if(!$con)
				echo "Error ! ".mysqli_error();
		

        else
        
		$db=mysqli_select_db($con,"pyloop_sig_db");
		if(!$db)
				echo "Error !!! ";
			


	
?>