<?php

$mysql_database='your_database';
$mysql_host='your_host or 127.0.0.1';
$mysql_user='db_username';
$mysql_password='db_pass';

@mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Connection Failed');
@mysql_select_db($mysql_database) or die('Could not connect to DB');

?>
