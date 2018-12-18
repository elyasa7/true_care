<?php
/**
 * User: ilyas
 * Date: 22/12/2018
 * Time: 23:59
 */

include('../connection.php');
include('get_status_details.php');

$agent_id = $_POST["agent_id"];
$status_id = $_POST["status_id"];

$query = "SELECT * FROM agent WHERE id = '$agent_id'";
$update_query = "UPDATE agent SET agent_status='$status_id' WHERE id='$agent_id'";

$update_execute = mysql_query($update_query);

echo get_item($agent_id);
?>