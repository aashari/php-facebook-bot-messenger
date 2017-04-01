<?php

include('../src/PHPFacebookMessenger.php');

$accessToken = 'YOUR_PAGE_ACCESS_TOKEN_HERE';
$verifyToken = 'YOUR_VERIFY_TOKEN_HERE';

$messenger = new PHPFacebookMessenger($accessToken, $verifyToken);
$payloadData = $messenger->listen();


/*
	assume you have a form to sending a message with parameter send_to and message
*/
if(isset($_POST['send_to']) && isset($_POST['message'])){
	$response = $messenger->sendMessage($_POST['send_to'],[
		'text' => $_POST['message']
	]);
}

/*
	if payload data is not null and is array, then there's request data from webhook 
	to your application.
*/
if($payloadData && is_array($payloadData)){
	// you can do something process here
}