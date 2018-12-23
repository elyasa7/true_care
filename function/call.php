
<?php

$to_dial = $_GET["phone"];


function sendResponse() {

    $response = 
		'<Response>' .
		'<Dial>' . $_GET["phone"] . '</Dial>' .
		'</Response>';
	echo $response;
 }

header ("Content-type: text/xml; charset=utf-8");
echo sendResponse();

 ?>
