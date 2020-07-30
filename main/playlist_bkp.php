<?php
	include 'db.php';
	session_start();
	
	$_SESSION['playlist_playlist_name'] = '';

	if(!isset($_SESSION["playlist_playlist_id"])){
		$_SESSION["playlist_playlist_id"]='';
	}
	else{
		echo 'Playlist id defined:'.$_SESSION["playlist_playlist_id"];
	}
	
	
	
	
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


  #doctors th{
    background-color: steelblue;
	color:white	;
    font-size: 15px;
padding: 5px
	
   }

  
#doctors{
background-color: white; color:black;
    border:1px dotted steelblue;	
	word-wrap: break-word; word-break: break-all; white-space: normal;	
   }
   

#serial_card {
    content: counter(step-counter);
    margin-right: 20px;
    font-size: 80%;
    background-color: #f39c12;
    color: white;
    font-weight: bold;
    padding: 4px 9px;
    border-radius: 0px;
}



  </style>

<?php 
				// while($row = mysqli_fetch_array($result))
				// 	   {
				// 	    echo '<li id="'.$row["file_file_id"].'">'.$row["file_order"].'</li>';
				// 	   }




  $content = '


				<div class="row">
					<div class="col-xs-12">
						<div class="box box-success">
							<div class="box-header">
								<h3 id="new_playlist_title" class="box-title"> <b>Playlist Name:</b></h3>
								</br>
								</br>
								<h3 id="new_schedule_title" class="box-title">  
								<input type="text"  placeholder="Enter Name" style="display:inline" class="form-control" name="playlist_playlist_name" id="playlist_playlist_name"  onkeyup="hideError()" autocomplete="off"/>
								</h3>
								
								<br>
								<p id="error" style="color:red;float:left"   ></p>
								<br>
								<input type="button" class=" btn btn-success" value="Add Item to Playlist" style="float:right" onclick="verify_submit();" />
								<input type="button" class=" btn btn-info"    value="Save & Return"  style="float:right; margin-right:5px" onclick="save_playlist_name();" />

							</div>
							<!-- /.box-header -->
							<div class="box-body">
							<div class="table-responsived" style="overflow: auto">
								<table id="doctors" name ="doctors" class="table  table-hover doctors">
									<thead>
										<tr>
											<th>Sl.</th>
											<th>Name</th>
											<th>Resource Type</th>
											<th>Runtime</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
				</div>
			';


 include('master.php');
?>

<head>
	<meta name="viewport" content="width=device-width,initial-scale=0.95">
</head>

	

<script>

function save_playlist_name(){

	var playlist_playlist_name = document.getElementById('playlist_playlist_name').value;

	
    $.ajax({
        type: "POST",
        url: "save_playlist_name.php",
		data: { 
			'playlist_playlist_name':playlist_playlist_name,
			'playlist_playlist_id': "<?php echo $_SESSION['playlist_playlist_id']; ?>"
		},
//        dataType: 'json',
        success: function(data) {
			window.location.href = "all_playlist.php";
        },
    error: function(xhr, textStatus, error) {
		console.log('Error Starts...');
        console.log(xhr.responseText);
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);
		console.log('Error Ends...');
		alert('Error saving playlist name');
    }
    });
	

	
	
	
	
	
}


function isInt(value) {
    return !isNaN(value) && (function(x) {
        return (x | 0) === x;
    })(parseFloat(value))
}


function verify_submit() {
	
	ele = document.getElementById('playlist_playlist_name');
	
	console.log('coming inside paylist validation'+ele.value.length);

	if (ele.value.length==0){
		
	 errorMessage = document.getElementById('error');
	 errorMessage.innerHTML="*Playlist name can't be empty";
//	 event.preventDefault();
	 return false;
		
		
	}
	else{
		

			var skip_playlist_name_check = false;
		
			if ("<?php echo $_SESSION['playlist_playlist_id']; ?>".length ==0){
				console.log('playlist id is empty');
			}		
			else{
				skip_playlist_name_check=true;
			}
			
			var playlist_playlist_name = document.getElementById('playlist_playlist_name').value;

			$.ajax({
				url: "check_playlist_name.php",
				method: "POST",
				data: {
					'playlist_playlist_name': playlist_playlist_name
				},
				success: function(data) {

					if (data == '0' | skip_playlist_name_check) {
						console.log('Playlist name check ok.');
						errorMessage = document.getElementById('error');
						errorMessage.innerHTML = '';
						
							
						$.ajax({
							type: "POST",
							url: "set_session_vars.php",
							data: {
								"playlist_playlist_name": playlist_playlist_name,
								"playlist_playlist_id": "<?php echo $_SESSION['playlist_playlist_id']; ?>"
							},
							dataType: 'json',
							success: function(data) {
								if (data['response']=='Success'){
									console.log('Set Success');
									window.location.href = "resource.php";						
								}else{
									console.log('Set Fail');
									alert('Error :'+data['response']);
								}					
							},
								error: function(xhr, textStatus, error) {
									console.log('Error Starts...');
									console.log(xhr.responseText);
									console.log(xhr.statusText);
									console.log(textStatus);
									console.log(error);
									console.log('Error Ends...');
								}



						});
						
						
						
						
					} else if (isInt(data)) {
						console.log('Playlist name already exists.');
						console.log(data);
						errorMessage = document.getElementById('error');
						errorMessage.innerHTML = 'Playlist name already exists. Choose a different name.';						
					} else {
						console.log('Playlist check error.');
						errorMessage = document.getElementById('error');
						errorMessage.innerHTML = data + Number.isInteger('1');
					}


				}


			});
		
		
	}
	
	
	
	return false;

}

function hideError(){
	console.log('hide error');
  document.getElementById("error").innerHTML="";
}

function delete_file(val){
		
	var r = confirm("Are you sure to delete this Device Group?");
	if (r == true) {

		$.ajax({
			type: "POST",
			url: "delete_file.php",
			data: {
				"file_file_id": val,
			},
			dataType: 'json',
			success: function(data) {
				console.log('Delete Success');
				window.location = "playlist.php";
			},
			error: function(xhr, textStatus, error) {
				console.log('Error Starts...');
				console.log(xhr.responseText);
				console.log(xhr.statusText);
				console.log(textStatus);
				console.log(error);
				console.log('Error Ends...');
			}
			
		});



	}
	
}


  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "get_playlist_resources.php",
		data: { 
		},
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
			console.log(JSON.stringify(data));
            var response="";
			var playlist_playlist_name='';
            for(var user in data){
				
				var fname   =  data[user].file_file_name;
				var frestype=  data[user].file_resource_type;
				var fruntime=  data[user].file_runtime;
				var ffileid =  data[user].file_file_id;
				var forder  =  data[user].file_order;
				
				var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
				if (isMobile) {
					response += "<tr>"+
					"<td> <a class='serial_card' id='serial_card'  >"+forder+"</a> </td>"+
					"<td>"+ '..' +fname.substr( fname.length-10   )   +"</td>"+
					"<td>"+frestype+"</td>"+
					"<td>"+fruntime+"</td>"+				
					"<td> <a class='btn btn-danger btn-sm' onclick='delete_file("+ffileid+")'><i class='fa fa-trash-o'></i></a>   </td>"+
					"</tr>";
				}
				else{
					response += "<tr>"+
					"<td> <a class='serial_card' id='serial_card'  >"+forder+"</a> </td>"+
					"<td>"+  fname +"</td>"+
					"<td>"+frestype+"</td>"+
					"<td>"+fruntime+"</td>"+				
					"<td> <a class='btn btn-danger btn-sm' onclick='delete_file("+ffileid+")'><i class='fa fa-trash-o'></i></a>   </td>"+
					"</tr>";
				}
			
				playlist_playlist_name= data[user].playlist_playlist_name;
			
            }

			ele = document.getElementById('playlist_playlist_name');
			ele.value = 	playlist_playlist_name;
			
            $(response).appendTo($("#doctors"));
        },
    error: function(xhr, textStatus, error) {
		console.log('Error Starts...');
        console.log(xhr.responseText);
        console.log(xhr.statusText);
        console.log(textStatus);
        console.log(error);
		console.log('Error Ends...');
    }
    });
	console.log('end of ajax');
  });
</script>
