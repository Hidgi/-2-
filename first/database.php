<?php
	/**
     * @file
     * Файл базы данных.
     *$host - присваивает переменной хост базы данных.
     *$user - присваивает переменной логин базы данных.
     *$pass - присваивает переменной пароль базы данных.
     *$db - присваивает переменной базу данных, где хранятся таблицы.
     *$link - присваивет переменной значение для прохода в базу данных.
        */


$host = "localhost";
$user = "hidgi";
$pass = "1234";
$db = "playground";
$link = mysqli_connect($host, $user, $pass, $db);
if (!$link) {
	die("Connection failed: " . mysqli_connect_error());
	}
?>

