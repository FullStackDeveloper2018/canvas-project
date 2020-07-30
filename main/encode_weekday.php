<?php

function encode_weekday($selected_days,$selected_month_dates) {




$tmp = trim($selected_days);
$tmp1 = trim($selected_month_dates);

$weekdate="";
if ($tmp1 == "01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 29, 30, 31"){
$weekdate="(0-31)";
}
else
{
$weekdate="(Specific Dates)";
}
 
 
 
	

	if ($tmp=="Mo, Tu, We, Th, Fr, Sa, Su"){
		return 'Mo-Su '.$weekdate;
	}
	elseif ($tmp=="Mo, Tu, We, Th, Fr"){
		return 'Mo-Fr'.$weekdate;
	}
	elseif ($tmp=="Sa, Su"){
		return 'Sa-Su'.$weekdate;
	}
	else{
		return $tmp;
	}
}

?>