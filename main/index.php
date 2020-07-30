<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}


.download_display{
	
	  padding-left: 15%;
	  padding-right: 15%

}


.item_space{
	
	padding: 10%
}

.box-body{
background-color:white;	
}


</style>
<?php
session_start();

  $content = '
                  <div class="box-body">
				  				  

					<div class="row download_display">
					  <div class="column item_space">
						<img src="raspberrypi.png" style="width:100%">
					  </div>
					  <div class="column item_space">
						<img src="windows.png" style="width:80%">
					  </div>
					</div>


				  
				  
                  </div>
                  <!-- /.box-body -->
			';
  include('master.php');
?>

