	
	
<?php
	include 'db.php';
	session_start();
	
//echo $_SESSION['playlist_playlist_name'];
//echo $_SESSION['playlist_playlist_id'];
	
	
?>

<style>
   body
   {
    margin:0;
    padding:0;
    background-color:#f1f1f1;
   }
   .box
   {
    width:1270px;
    padding:15px;
    background-color:#fff;
    border:1px solid #ccc;
    border-radius:5px;
    margin-top:50px;
   }
   #page_list li
   {
    padding:3px;
    background-color:#f9f9f9;
    border:1px dotted #ccc; 
    cursor:move;
    margin-top:12px;
   }
   #page_list li.ui-state-highlight
   {
    padding:24px;
    background-color:#ffffcc;
    border:1px dotted #ccc;
    cursor:move;
    margin-top:12px;
   }

      #page_list{

  margin: 0;
  padding: 0;
  list-style-type: none;
}
#page_list li {
  counter-increment: step-counter;
  margin-bottom: 5px;
}
#page_list li::before {
content: counter(step-counter);
    margin-right: 20px;
    font-size: 80%;
    background-color: #f39c12;
    color: white;
    font-weight: bold;
    padding: 4px 9px;
    border-radius: 0px;

}


 
  .list_label{
    font-size: 15px;
  }
  i{
    font-size: 30px;
  }


   

  </style>

<?php 
				// while($row = mysqli_fetch_array($result))
				// 	   {
				// 	    echo '<li id="'.$row["file_file_id"].'">'.$row["file_order"].'</li>';
				// 	   }




  $content = '

<form id="resource_add_form" onsubmit="return validate_resource_form(event);" action="resource_request.php" method="post" enctype="multipart/form-data"  autocomplete="off">

				<div class="row">
					<div class="col-xs-12">
						<div class="box box-success">
							<div class="box-header">
						
							</div>
							<!-- /.box-header -->
							<div class="box-body">

									<b class="list_label">	Resource Type:</b>
									<select class="form-control"  onchange="mediaChange()" name="resource_type" id="resource_type">
													<option>Image</option>
													<option>Video</option>
									</select>

									<br>
									<b class="list_label">	Select: </b>
									<input type="file"  accept="image/png, image/jpeg"  class="form-control" name="file" id="file" />
									
									<br>
									<b class="list_label">	Runtime in Seconds: </b> 
									<input type="number" value="30" class="form-control" name="runtime" id="runtime"  />

									
								
							</div>
							<!-- /.box-body -->

							<p id="error" style="color:red;float:left"   ></p>
							<br>

							<div class="box-footer">
						
							<button type="submit" class="btn btn-success" name="sbt" value="Submit"  >Submit</button>
						
							</div>


						</div>
						<!-- /.box -->
					</div>
				</div>
</form>				
			';


 include('master.php');
?>


	

<script>

function mediaChange() {

    var resource_type = document.getElementById("resource_type").value;
    var file = document.getElementById("file");

    if (resource_type == "Video") {
        file.setAttribute("accept", "video/mp4");
        runtime.setAttribute("readonly", "true");
        runtime.value = 0;
    }
    if (resource_type == "Image") {
        file.setAttribute("accept", "image/png, image/jpeg, image/jpg");
        runtime.removeAttribute("readonly");
        runtime.value = 30;
    }
}

function validate_resource_form() {
	
	errorMessage = document.getElementById('error');
	errorMessage.innerHTML="";
	ele = document.getElementById('file');
	
	console.log('coming inside paylist validation'+ele.value.length);

	if (ele.value.length==0){
		
		 errorMessage.innerHTML="*Please select a file";
		 return false;		
	}
	else{
		return true;
		
	}

	return false;

}

function hideError(){
	console.log('hide error');
  document.getElementById("error").innerHTML="";
}



</script>
