
<?php

require_once '../twilio-php/Twilio/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'your_twilio_account_sid';
$auth_token = 'your_twilio_auth_token';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_ACCOUNT_SID"]

// A Twilio number you own with Voice capabilities
$twilio_number = "+1234567890";

// Where to make a voice call (your cell phone?)
$to_number = "+0987654321"; # Admin phone number
//$agent_number = $_POST["phone_to_call"]; # Phone to be connected
$agent_number = str_replace(' ', '', $_POST["phone_to_call"]); # Phone to be connected

$url = 'https://open.tm/call.php?phone=' . $agent_number;

$client = new Client($account_sid, $auth_token);
$client->account->calls->create(
	$to_number,
	$twilio_number,
	array(
		"url" => "https://yourdomain.com/call.php?phone=$agent_number"
	)
);

?>
