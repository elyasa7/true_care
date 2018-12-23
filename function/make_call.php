<?php
require_once '../twilio-php/Twilio/autoload.php';
use Twilio\Rest\Client;
// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACa995d7b14b830d8c2760844ffdfa1aa2';
$auth_token = 'b14e50acb7df2a06aedf7cb2eb6d5472';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]
// A Twilio number you own with Voice capabilities
$twilio_number = "+12098507617";
// Where to make a voice call (your cell phone?)
$to_number = "+905313435178"; # Admin phone number
//$agent_number = $_POST["phone_to_call"]; # Phone to be connected
$agent_number = str_replace(' ', '', $_POST["phone_to_call"]); # Phone to be connected
$url = 'https://open.tm/call.php?phone=' . $agent_number;
$client = new Client($account_sid, $auth_token);
$client->account->calls->create(
	$to_number,
	$twilio_number,
	array(
		//"url" => "http://demo.twilio.com/docs/voice.xml"
		"url" => "https://open.tm/call.php?phone=$agent_number"
	)
);
?>
