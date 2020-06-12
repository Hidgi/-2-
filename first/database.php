<?php

$host = "localhost";
$user = "hidgi";
$pass = "1234";
$db = "playground";
$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
	}
?>

