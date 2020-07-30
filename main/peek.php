<?php
$url='https://www.google.com';
$curl_init = curl_init("https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url=http://www.google.com&screenshot=true");
 curl_setopt($curl_init, CURLOPT_RETURNTRANSFER, true);
 $response = curl_exec($curl_init);
 curl_close($curl_init);
 //call Google PageSpeed Insights API
 //decode json data
 $googlepsdata = json_decode($response, true);
 //screenshot data
 $snap = $googlepsdata[‘screenshot’][‘data’];
 $snap = str_replace([‘_’, ‘-’], [‘/’, ‘+’], $snap);
echo "<img src=\"data:image/jpeg;base64,".$snap."\" />";