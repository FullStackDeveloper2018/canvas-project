<link rel="stylesheet" type="text/css" href="time_range.css">

<style type="text/css">


#progress-bar{
	display: none;
	width: 100%;
}

#start_date,#end_date,#starttime,#endtime,#weekday_and_monthdate_label {
vertical-align: middle;
padding-top: 0px;
padding-bottom: 0px;
font-weight: normal
}

#weekday_and_monthdate_label,#dates_label_start_date,#dates_label_end_date,#time-range,#what_to_play,#playlist_items {
font-weight: normal;
font-size:18px
}


#playlist_items {
font-weight: normal;
font-size:15px
}



.dates{
	margin-top: 2px;
}
.btn{
	margin-top: 3px;
}



</style>

<?php 

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


$timings = '';

for ($x = 0; $x <= 23; $x++) {
#    echo "The number is: $x <br>";
	$timings=$timings.'<option value="'.str_pad($x,2,'0',STR_PAD_LEFT).'">'.str_pad($x,2,'0',STR_PAD_LEFT).'</option>';
}

$month = date('m');
$day = date('d');
$year = date('Y');
$year5 = date('Y')+5;

$today = $year . '-' . $month . '-' . $day;
$end_date = $year5 . '-' . $month . '-' . $day;

  $content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 id="new_schedule_title" class="box-title">New Schedule</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                      <div class="box-body">

					<br>

					<label id="weekday_and_monthdate_label">Schema:</label>

					<br>
					<br>

					<div class="row">
						<div class="col-md-12">
							<input type="button" id="weekdays-option" class="btn "  value="Weekdays" onclick="selectWeekdays(this)" />
							<input type="button" id="weekends-option" class="btn "  value="Weekends" onclick="selectWeekends(this)"  />
							<input type="button" id="select-all-option" class="btn "  value="Select All" onclick="selectAll(this)" />
							<input type="button" id="de-select-all-option" class="btn "  value="De Select All" onclick="deSelectAll(this)" />
						</div>	
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<input type="button" class="btn weekdays select-all" onclick="selectDay(this)" id="days" value="Mo" />

							<input type="button" class="btn weekdays select-all" id="days" onclick="selectDay(this)" value="Tu" />

							<input type="button" class="btn weekdays select-all" id="days" onclick="selectDay(this)" value="We" />

							<input type="button" class="btn weekdays select-all" id="days"  onclick="selectDay(this)"  value="Th" />

							<input type="button" class="btn weekdays select-all" id="days" onclick="selectDay(this)"  value="Fr" />

							<input type="button" class="btn weekends select-all" id="days" value="Sa" />

							<input type="button" class="btn weekends select-all" id="days select-all"  onclick="selectDay(this)" value="Su" />


						
						</div>	
					</div>
					<br>
					

					<div class="row">
						<div class="col-md-12">
							
							<input type="button" id="select-all-dates-option" class="btn "  value="Select All" onclick="selectAllDates(this)" />
							<input type="button" id="de-select-all-dates-option" class="btn "  value="De Select All" onclick="deSelectAllDates(this)" />
						</div>	
					</div>
					<br>


					<div class="row">

						<div class="col-md-12">

							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="01" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="02" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="03" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="04" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="05" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="06" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="07" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="08" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="09" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="10" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="11" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="12" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="13" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="14" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="15" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="16" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="17" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="18" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="19" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="20" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="21" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="22" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="23" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="24" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="25" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="26" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="27" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="29" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="30" />
							<input type="button" class="btn dates select-all-dates" onclick="selectDate(this)" id="days" value="31" />
	
						</div>	
					</div>

					<br>
					<hr>
					<br>

					<div class="row">
						<div class="col-md-6">
							<label id="dates_label_start_date">Start Date (Optional):</label>
							<input type="date"
							id="start_date"
							value="'.$today.'"
							name="startdate" 
							class="form-control" 
							title="Enter Start Date">
						</div>
						<div class="col-md-6">
							<label id="dates_label_end_date">End Date (Optional):</label>
							<input type="date"
							id="end_date"
							value="'.$end_date.'"
							name="enddate" 
							class="form-control" 
							title="Enter End Date">
						</div>
					</div>		

					<br>
					<br>

					<div id="time-range">
					    <p>Time (optional): <span class="slider-time" id="time_start" >00:00</span> - <span class="slider-time2" id="time_end">24:00</span>

					    </p>
					    <div class="sliders_step1">
					        <div id="slider-range"></div>
					    </div>
					</div>

					<br>
					<hr>
					<br>

					<label id="what_to_play">What to play: </label>

					<select id="playlist_playlist_name" name="playlist_playlist_name" class="form-control">
					</select>
					
					<p id="show_playlist_not_selected_error" style="color:red"> </p>


					<!-- /.box-body -->
				  <div class="box-footer">
					
					<input type="Button" class="btn btn-primary" value="Submit" onclick="ajax_submit()" />
					
				  </div>

  </div>
  <!-- /.box -->
</div>
</div>';
  include('master.php');
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>





<script type="text/javascript">

  $(document).ready(function(){

    document.getElementById("select-all-option").click();
    document.getElementById("select-all-dates-option").click();

	  
	var select = document.getElementById("playlist_playlist_name");

    $.ajax({
        type: "GET",
        url: "get_user_playlist.php",
		data: { 
			username: "<?php echo $_SESSION['user_user_id']; ?>"
		},
        dataType: 'json',
        success: function(data) {
			console.log('data fetch success' + data);
            var response="";
            for(var user in data){

			var opt = document.createElement("option");        
			opt.text = data[user].playlist_playlist_name;
			opt.value = data[user].playlist_playlist_id;

			select.options.add(opt);

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

/*
    $(document).ready(function(){
    	        $('#new_schedule_title').text("New schedule for \"<?php echo $group_group_name ?>\"");
    	             $("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [15, 1440],
    slide: function (e, ui) {
        var hours1 = Math.floor(ui.values[0] / 60);
        var minutes1 = ui.values[0] - (hours1 * 60);

        if (hours1.length == 1) hours1 = '0' + hours1;
        if (minutes1.length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 12) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1 + " AM";
        }
        if (hours1 == 0) {
            hours1 = 12;
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);

        var hours2 = Math.floor(ui.values[1] / 60);
        var minutes2 = ui.values[1] - (hours2 * 60);

        if (hours2.length == 1) hours2 = '0' + hours2;
        if (minutes2.length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 12) {
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2 + " PM";
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2 + " AM";
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
    	}
	});

    });
*/
  

    $(document).ready(function(){
    	        $('#new_schedule_title').text("New schedule for \"<?php echo $group_group_name ?>\"");
    	             $("#slider-range").slider({
    range: true,
    min: 0,
    max: 1440,
    step: 15,
    values: [15, 1440],
    slide: function (e, ui) {

		h1=ui.values[0]
		h2=ui.values[1]

		console.log(Math.abs(h1-h2));
		if (Math.abs(h1-h2) < 15 )
		{
			$("#slider-range").slider('values',0,h1-15);
			$("#slider-range").slider('values',1,h1+15);
//			$("#slider-range").slider('values',1,h1-15);
			return;
		}
		
		
        var hours1 = Math.floor( h1 / 60);
        var minutes1 = h1 - (hours1 * 60);

        if (hours1.toString().length == 1) hours1 = '0' + hours1;
        if (minutes1.toString().length == 1) minutes1 = '0' + minutes1;
        if (minutes1 == 0) minutes1 = '00';
        if (hours1 >= 50) {
            if (hours1 == 12) {
                hours1 = hours1;
                minutes1 = minutes1 + " PM";
            } else {
                hours1 = hours1 - 12;
                minutes1 = minutes1 + " PM";
            }
        } else {
            hours1 = hours1;
            minutes1 = minutes1;
        }
        if (hours1.toString() == 0) {
            hours1 = '00';
            minutes1 = minutes1;
        }



        $('.slider-time').html(hours1 + ':' + minutes1);

        var hours2 = Math.floor(h2 / 60);
        var minutes2 = h2 - (hours2 * 60);

        if (hours2.toString().length == 1) hours2 = '0' + hours2;
        if (minutes2.toString().length == 1) minutes2 = '0' + minutes2;
        if (minutes2 == 0) minutes2 = '00';
        if (hours2 >= 50) {   // removed block
            if (hours2 == 12) {
                hours2 = hours2;
                minutes2 = minutes2 + " PM";
            } else if (hours2 == 24) {
                hours2 = 11;
                minutes2 = "59 PM";
            } else {
                hours2 = hours2 - 12;
                minutes2 = minutes2;
            }
        } else {
            hours2 = hours2;
            minutes2 = minutes2;
        }

        $('.slider-time2').html(hours2 + ':' + minutes2);
    	}
	});

    });


	let dropAreaSign = document.getElementById('drop-area-sign');
	let progress_bar = document.getElementById('progress-bar');
	let status_label = document.getElementById('status_label');
//	['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
//	  dropAreaSign.addEventListener(eventName, preventDefaults, false)
//	});
	window.circlepositions = [];

	function preventDefaults (e) {
	  e.preventDefault()
	  e.stopPropagation()
	}


	function highlightSign(e) {
	  dropAreaSign.classList.add('highlight')
	}

	function unhighlightSign(e) {
	  dropAreaSign.classList.remove('highlight')
	}

//	dropAreaSign.addEventListener('drop', handleDropSign, false);

	function handleDropSign(e) {
	  let dt = e.dataTransfer;
	  let files = dt.files;

	  handleSignFiles(files)
	}

	function handleSignFiles(files) {
	  ([...files]).forEach(uploadSignFile)
	}

	function uploadSignFile(file, i) { // <- Add `i` parameter

	  progress_bar.style.display="block";
	  status_label.innerText="uploading...";
		
	  var url = 'upload_file.php'
	  var xhr = new XMLHttpRequest()
	  var formData = new FormData()
	  xhr.open('POST', url, true)

	  // Add following event listener
	  xhr.upload.addEventListener("progress", function(e) {
	    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
	  })

	  xhr.addEventListener('readystatechange', function(e) {
	    if (xhr.readyState == 4 && xhr.status == 200) {
	  
	           if((response.status)){
	             updateProgress(i, 0);
	         }
	         else{
	             alert('Something Went Wrong');
	         }
	    }
	    else if (xhr.readyState == 4 && xhr.status != 200) {
	      // Error. Inform the user
	      alert('Document Failed to upload.');
	    }
	  });

	  	formData.append('file', file);
	    xhr.send(formData);

	}


	let uploadProgress = [];

	let progressBar = document.getElementById('progress-bar');

	function initializeProgress(numFiles) {
	  progressBar.value = 0;
	  uploadProgress = [];

	  for(let i = numFiles; i > 0; i--) {
	    uploadProgress.push(0);
	  }
	}

	function updateProgress(fileNumber, percent) {
	  uploadProgress[fileNumber] = percent;
	  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length;
	  progressBar.value = total;
	  	status_label.innerText="Uploading "+total+"%";
	  if(progressBar.value==100){
	  	status_label.innerText="Uploaded 100%";
	  }
	}


	// Schema: Week days selection code 
	
	function selectWeekdays(item){

		var elements = document.getElementsByClassName("weekdays");
		item.classList.add("btn-primary");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.add("btn-primary");
    			elements[i].classList.add("day-active");
			}
		var elements = document.getElementsByClassName("weekends");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.remove("btn-primary");
    			elements[i].classList.remove("day-active");
			}	
		//OTHER OPTION CLOSING	
		var weekends_option=document.getElementById("weekends-option");
		var select_all_option=document.getElementById("select-all-option");
		
		weekends_option.classList.remove("btn-primary");
		select_all_option.classList.remove("btn-primary");		

	}
	function selectWeekends(item){

		var elements = document.getElementsByClassName("weekends");
		item.classList.add("btn-primary");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.add("btn-primary");
    			elements[i].classList.add("day-active");
			}

		var elements = document.getElementsByClassName("weekdays");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.remove("btn-primary");
    			elements[i].classList.remove("day-active");
			}	
		//OTHER OPTION CLOSING	
		var weekdays_option=document.getElementById("weekdays-option");
		var select_all_option=document.getElementById("select-all-option");
		
		weekdays_option.classList.remove("btn-primary");
		select_all_option.classList.remove("btn-primary");	

	}
	function selectAll(item){

		var elements = document.getElementsByClassName("select-all");
		item.classList.add("btn-primary");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.add("btn-primary");
    			elements[i].classList.add("day-active");
			}
			
		//OTHER OPTION CLOSE	
		var weekdays_option=document.getElementById("weekdays-option");
		var weekends_option=document.getElementById("weekends-option");
		weekdays_option.classList.remove("btn-primary");
		weekends_option.classList.remove("btn-primary");
			

	}
	function deSelectAll(item){

		var elements = document.getElementsByClassName("select-all");
		item.classList.add("btn-primary");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.remove("btn-primary");
    			elements[i].classList.remove("day-active");
		}
		var weekends_option = document.getElementById("weekends-option");	
		weekends_option.classList.remove("btn-primary");

		var weekdays_option = document.getElementById("weekdays-option");	
		weekdays_option.classList.remove("btn-primary");

		var select_all_option = document.getElementById("select-all-option");	
		select_all_option.classList.remove("btn-primary");

		var de_select_all_option = document.getElementById("de-select-all-option");	
		de_select_all_option.classList.remove("btn-primary");


	}

	function selectAllDates(item){

		var elements = document.getElementsByClassName("select-all-dates");
		item.classList.add("btn-primary");
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.add("btn-primary");
    			elements[i].classList.add("date-active");
			}
			

	}
	function deSelectAllDates(item){

		var elements = document.getElementsByClassName("select-all-dates");
		
		for (var i = 0, len = elements.length; i < len; i++) {
    			elements[i].classList.remove("btn-primary");
    			elements[i].classList.remove("date-active");
		}
		var select_all_dates_option = document.getElementById("select-all-dates-option");	
		select_all_dates_option.classList.remove("btn-primary");
		
	}

	function selectDay(item){
		if (item.classList.contains("day-active")){
			item.classList.remove("day-active");
			item.classList.remove("btn-primary");

		}
		else{
			item.classList.add("btn-primary");
			item.classList.add("day-active");
		}
		var weekends_option = document.getElementById("weekends-option");	
		weekends_option.classList.remove("btn-primary");

		var weekdays_option = document.getElementById("weekdays-option");	
		weekdays_option.classList.remove("btn-primary");

		var select_all_option = document.getElementById("select-all-option");	
		select_all_option.classList.remove("btn-primary");

		var de_select_all_option = document.getElementById("de-select-all-option");	
		de_select_all_option.classList.remove("btn-primary");


	}
	function selectDate(item){
		if (item.classList.contains("date-active")){
			item.classList.remove("date-active");
			item.classList.remove("btn-primary");

		}
		else{
			item.classList.add("btn-primary");
			item.classList.add("date-active");
		}
		var select_all_dates_option = document.getElementById("select-all-dates-option");	
		select_all_dates_option.classList.remove("btn-primary");

	}


	function ajax_submit(){

		//GET ACTIVE DAYS
		var day_active = document.getElementsByClassName("day-active");
		var selected_days=''

		for (var i = 0, len = day_active.length; i < len; i++) {
    			
    			selected_days=selected_days+','+day_active[i].value;

			}
			
		selected_days = selected_days.replace(/^,|,$/g,'');
//		selected_days=JSON.stringify(selected_days);

		//GET ACTIVE DATES
		var date_active = document.getElementsByClassName("date-active");
		var selected_dates=[];	

		for (var i = 0, len = date_active.length; i < len; i++) {
    			
    			selected_dates=selected_dates+','+date_active[i].value;

			}
		selected_dates = selected_dates.replace(/^,|,$/g,'');

		//GET START DATE AND END DATE
		var start_date=document.getElementById("start_date").value;
		var end_date=document.getElementById("end_date").value;

		//GET TIME 
		var time_start=document.getElementById("time_start").innerText;
		var time_end=document.getElementById("time_end").innerText;		
		


		//GET MEDIA TYPE
//		var media_type=document.getElementById("media_type").value;		

		//GET MEDIA FILE
//		var media_file=document.getElementById("media_file").value;;
		

		var playlist_playlist_id = document.getElementById("playlist_playlist_name").value;

		if (playlist_playlist_id.length==0){
			 document.getElementById("show_playlist_not_selected_error").style.display="block";
			document.getElementById("show_playlist_not_selected_error").innerHTML="Please select playlist. Manage playlist <a href='playlist.php'>here</a> ";
			document.getElementById("playlist_playlist_name").style.border="1px solid red"; 
			return;
		}
		

		$.ajax({
			url:'ajax_save_new_schedule.php',
			type:'post',
			data:'selected_days='+selected_days+'&selected_dates='+selected_dates+'&start_date='+start_date+'&end_date='+end_date+'&time_start='+time_start+'&time_end='+time_end
				+'&playlist_playlist_id='+playlist_playlist_id+'&group_group_id='+<?php echo $_SESSION["group_group_id"]; ?>,
			success:function(msg){
				if(msg=="SAVED"){
				 window.location.assign("group_schedules.php");	
				 //alert("Record Saved. Redirect where ever you want.. ");
				}
				else{
					console.log('Error:')
					console.log(msg);
//					alert(msg);
					
				}

			}
		})
	}

							
	
</script>