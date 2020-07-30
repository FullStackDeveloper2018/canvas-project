<style>

#doctors{
background-color: white; color:black;
    border:1px dotted grey;	
	word-wrap: break-word; word-break: break-all; white-space: normal;
   }
   

  #doctors th{
    background-color: #00c0ef;
	color:white	;
	}


  
.my-small-btn {
    width:0px;
    padding:0px;
}  


td i {
    text-align:center;
}

</style>

<?php
//    white-space: wrap!important;	

session_start();
if(isset($_SESSION["group_group_id"]) && isset($_SESSION["group_group_name"] )  ){
  $group_group_id=$_SESSION["group_group_id"];
  $group_group_name=$_SESSION["group_group_name"];

}
else{
  http_response_code(404);
  include("404error.php");
  die;
}

  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">

					<div> <h3 id="schedule_title" class="box-title">Schedules for Group</h3> </div>

					<div align="right">   
					<input 
					group_group_id="'.$group_group_id.'"
					group_group_name="'.$group_group_name.'"
					aligtype="right" 
					type="button" 
					class="btn btn-success" 
					onclick=\'addSchedule(this)\' 
					value="New Schedule"></input> 

					</div>


                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
					<div class="table-responsived table-hover" style="overflow: auto">
                    <table id="doctors" name ="doctors" class="table tab table-hover doctors">
                      <thead>
                      <tr>
                        <th>Playing</th>
                        <th>Priority</th>
                        <th>Running</th>
                        <th>Control</th>
                      </tr>
                      </thead>
                      <tbody>
                      </tbody>
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


<script>

function deleteSchedule(item){
    var sch_user_id=item.getAttribute("sch_user_id");
    var sch_group_id=item.getAttribute("sch_group_id");
    var sch_sch_id=item.getAttribute("sch_sch_id");
	console.log('Entering delete group');

     var r = confirm("Are you sure to delete this Device Group?");
    if (r == true) {
    
    
      $.ajax({
        url:'ajax_delete_group_schedules.php',
        type:'post',
        data:'sch_user_id='+sch_user_id+'&sch_group_id='+sch_group_id+'&sch_sch_id='+sch_sch_id,
        success:function(msg){
			console.log(msg);
           window.location.assign("group_schedules.php");
        }

      });
  }

}  


</script>


<script>

function inc_sch_priority(val){
		$.ajax({
			url:'ajax_inc_sch_priority.php',
			type:'post',
			data:'sch_sch_id='+val+'&sch_group_id='+<?php echo $_SESSION['group_group_id']; ?>,
			success:function(msg){
						console.log(msg);
			window.location.assign("group_schedules.php");
		}

      });
}


function dec_sch_priority(val){
		$.ajax({
			url:'ajax_dec_sch_priority.php',
			type:'post',
			data:'sch_sch_id='+val+'&sch_group_id='+<?php echo $_SESSION['group_group_id']; ?>,
			success:function(msg){
			//			console.log(msg);
			window.location.assign("group_schedules.php");
		}

      });
}


  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "get_group_schedules.php",
		data: { 
			username: "<?php echo $_SESSION['user_user_id']; ?>",
			group_group_id: "<?php echo $_SESSION['group_group_id']; ?>"
		},
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){
                response += "<tr>"+
                "<td>"+data[user].playlist_playlist_name+"</td>"+
                "<td>"+data[user].sch_priority+"  "+
				"<a class='btn' sch_sch_id='"+data[user].sch_sch_id+"' onclick='inc_sch_priority("+data[user].sch_sch_id+")'><i class='fa fa-arrow-up'></i></a>  "+
				"<a class='btn' sch_sch_id='"+data[user].sch_sch_id+"' onclick='dec_sch_priority("+data[user].sch_sch_id+")'><i class='fa fa-arrow-down'></i></a>  "+
				"</td>"+				
                "<td>"+data[user].sch_running+"</td>"+
                "<td>"+

				"<input  type='button' class='btn btn-sm btn-danger' "+
				"sch_user_id='"+data[user].sch_user_id+"' sch_group_id='"+data[user].sch_group_id+"' sch_sch_id='"+data[user].sch_sch_id+"' onclick='deleteSchedule(this)' value='Remove'  /></td> "+



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



    $(document).ready(function(){
                $('#schedule_title').text("<?php echo $group_group_name ?> Schedules")

        
    });




  function addSchedule(item){

    var group_group_id=item.getAttribute("group_group_id");
    var group_group_name=item.getAttribute("group_group_name");

    $.ajax({
      url:'ajax_edit_schedule.php',
      type:'post',
      data:'group_group_id='+group_group_id+'&group_group_name='+group_group_name,
      success:function(msg){
        window.location.assign("add_new_schedule.php");
      }

    });

  }

</script>