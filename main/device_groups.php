

<?php
session_start();
if(isset($_SESSION["group_group_id"])){
  unset($_SESSION["group_group_id"]);
  unset($_SESSION["group_group_name"]);
}


  $content = '
  
			   
			  <div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				
				
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Enter Device Group Name</h4>
					</div>
					<div class="modal-body">
					  <input type="text" id="device_group_name" placeholder="Device Group Name" class="form-control" onkeyup="hideError()" />
					  <br>
						<input type="button" id="save_device_name" value="Save" class="btn btn-info" onclick="add_device_group()" />
					  <br>
					  <p id="show_error" style="color:red"> </p>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
			  </div>
			  
			

  
				<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Device Groups</h3>

					<div align="right">   
					<input 
					aligtype="right" 
					type="button" 
					class="btn btn-primary" 
					data-toggle="modal" data-target="#myModal"					
					value="Create New Device Group"></input> 
					</div>


                  </div>
                  <!-- /.box-header -->



                  <div class="box-body">


                    <table id="doctors" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Device Group Name</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            </div>';
		
		
  include('master.php');
?>
<!-- page script -->

<script>



function deleteGroup(item){
    var group_group_id=item.getAttribute("group_group_id");
	console.log('Entering delete group');

     var r = confirm("Are you sure to delete this Device Group?");
    if (r == true) {
    
    
      $.ajax({
        url:'ajax_delete_device_group.php',
        type:'post',
        data:'group_group_id='+group_group_id,
        success:function(msg){
           window.location.assign("device_groups.php");
        }

      });
  }

}


</script>




<script>
  $(document).ready(function(){

    $.ajax({
        type: "GET",
        url: "get_device_groups.php",
		data: { 
			username: "<?php echo $_SESSION['user_user_id']; ?>"
		},
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].group_group_name+"</td>"+
                "<td> <input type='button' class='btn btn-sm btn-primary'  group_group_id="+data[user].group_group_id+" group_group_name='"+data[user].group_group_name+"'  onclick='editRecord(this)' value='Set Schedule for this Group'  /> "+

				"<input  type='button' class='btn btn-sm btn-danger' "+
				"group_group_id='"+data[user].group_group_id+"' onclick='deleteGroup(this)' value='Remove'  /></td> "+



                "</tr>";
            }
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


  function editRecord(item){

    var group_group_id=item.getAttribute("group_group_id");
    var group_group_name=item.getAttribute("group_group_name");

    $.ajax({
      url:'ajax_edit_schedule.php',
      type:'post',
      data:'group_group_id='+group_group_id+'&group_group_name='+group_group_name,
      success:function(msg){
        window.location.assign("group_schedules.php");
      }

    });

  }
  function add_device_group(){

    var group_group_name=document.getElementById("device_group_name").value;
	
	$.ajax({
      url:'add_device_group.php',
      type:'post',
      data:'group_group_name='+group_group_name,
      success:function(msg){
		if (msg=="SAVED"){  
			window.location.assign("device_groups.php");
		}
		else if(msg=="ALREADY_EXIST"){
			 document.getElementById("show_error").style.display="block";
			document.getElementById("show_error").innerText="Device Group Name already exist. Please enter unique name";
		}
			
      }

    });

  }
  function hideError(){
	  document.getElementById("show_error").style.display="none";
  }
</script>