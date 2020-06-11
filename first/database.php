<?php
echo "123";
$host="localhost"
$user="hidgi"
$pas="1234"
$db="playground"
$link = new mysqli($host, $user, $pas);
if (!$link->connect_error) {
	die("Connection failed: " . $link->connect_error());
}
$link->query("use ".$db);
if ($link->query("use ".$db) === TRUE) {
  echo "success";
} else {
  echo "Error: " . $link->error;
}
?>

