<?php 

session_start();
include '../db.php';

if ((!isset($_GET['device_uuid'])) ){
	echo '404 Not Found';
	return;
}


$device_uuid = $_GET['device_uuid'];
$file_name = $_GET['file_name'];

		$attachment_location = '../uploads/'.$file_name;
		if (file_exists($attachment_location)) {

			header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
			header("Cache-Control: public"); // needed for internet explorer
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: Binary");
			header("Content-Length:".filesize($attachment_location));
#			header("Content-Disposition: attachment; filename=file.png");
			readfile($attachment_location);
			die();        
		} else {
#			http_response_code(404);
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");

			die("Error: File not found.");
		} 





?>