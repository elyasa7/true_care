// Send an SMS using Twilio's REST API and PHP
<?php

require_once "twilio-php/Twilio/autoload.php";

use Twilio\Rest\Client;

$sid = "ACa995d7b14b830d8c2760844ffdfa1aa2"; // Your Account SID from www.twilio.com/console
$token = "b14e50acb7df2a06aedf7cb2eb6d5472"; // Your Auth Token from www.twilio.com/console

$twilio = new Client($sid, $token);

$account = $twilio->api->accounts($sid)->fetch();

print $account;
$message = $twilio->messages
	->create("+905313435178", // to
		array(
			"body" => "All in the game, yo",
			"from" => "+1 209 850 7617"
		)
	);

print($message->sid);