

<?php
session_start();

  $content = '<div class="row">
                <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">

					<div> <h3 id="devices_title" class="box-title">Devices</h3> </div>


                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="doctors" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Device Name</th>
                        <th>Device Group</th>

                        <th>Device Status</th>
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
            </div>
			';
  include('master.php');
?>




<script>

function OnSelectionChange(ele)
{
//    var element = document.getElementById("combo_device_group");
//    var op = element.options[element.selectedIndex].value;
	
	var op = ele.value;
	
	console.log('Value:');
	console.log(op);
	
	
	if (op != 'Select Device Group') {
		
    $.ajax({
      url:'assign_group_to_device.php',
      type:'post',
      data:'data='+op,
      success:function(msg){
		  console.log(msg);
        window.location.assign("devices.php");
      }

    });
		
		
	}
	
	
}

  $(document).ready(function(){
    $.ajax({
        type: "GET",
        url: "get_devices.php",
        dataType: 'json',
        success: function(data) {
            var response="";
            for(var user in data){

				var cb_val = "";

				var sp_str = data[user].group_list;
				var myarray = sp_str.split(',');

				for(var i = 0; i < myarray.length; i++)
				{
					if (data[user].group_group_name==myarray[i]){
						cb_val+="<option VALUE='"+data[user].device_device_id+"|"+myarray[i]+"' selected>"+myarray[i]+"</option>  "
					}
					else{
						cb_val+="<option VALUE='"+data[user].device_device_id+"|"+myarray[i]+"'>"+myarray[i]+"</option>  "
					}
				}
				
				
                response += "<tr>"+
                "<td>"+data[user].device_name+"</td>"+
//                "<td>"+data[user].group_group_name+"</td>"+

				"<td>"+
				"<select  onchange='OnSelectionChange(this)' class='form-control select2 select2-container' >"+
				"<option>Select Device Group</option>"+
				cb_val+
				"</select>"+								
				"</td>"+

				
				
				
                "<td>"+data[user].device_status+"</td>"+

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



</script>