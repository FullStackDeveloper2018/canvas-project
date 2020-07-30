<?php

try{
	
	
	session_start();
	foreach($_POST as $key => $value)
	{

		$_SESSION[$key] = $value;
		
	}	
	
	$response = array();
	$response['response'] = 'Success';
	exit(json_encode($response));
} catch (Exception $e) {
	$response = array();
	$response['response'] = $e->getMessage();
	exit(json_encode($response));
}



?>