<?php

$mysql_database='true_care';
$mysql_host='127.0.0.1';
$mysql_user='root';
$mysql_password='123';

@mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Connection Failed');
@mysql_select_db($mysql_database) or die('Could not connect to DB');

?>
