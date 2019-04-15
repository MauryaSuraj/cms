<?php
//Database connection file
//fOR MORE SERCURING LET'S CONVERT THE CONNECTION DETAILS TO UPPER CASE AND STORE IT IN ARRAY CALLED $DB
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";
//to make constant
foreach ($db as $key => $value) {
	define(strtoupper($key),$value);
}
// $connection = mysqli_connect('localhost','root','','cms');
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
if (!$connection) {
	echo "Connecting To server";
}
?>