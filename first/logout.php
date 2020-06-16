<?php
/**
     * @file
     * Файл выхода.
     *$token - присваивает переменной cookie.
     *$query - выбирает login из таблицы users, при этом сверяет token.
     *$result - выполняет запрос к базе данных.
     *$user -  получение строки результирующей таблицы в виде массива.
     *$query - обновляет таблицу players.
     *$query- обновляет таблицу users.
      */

	require_once 'database.php';
    if (isset($_COOKIE['cookie_token'])){
       $token=$_COOKIE['cookie_token'];
       $query="SELECT login FROM users WHERE token = '$token'";
       $result=mysqli_query($link, $query);
       $user=mysqli_fetch_row($result);
       $user=$user[0];
       $query="UPDATE players SET time = NULL WHERE login = '$user'";
       $result=mysqli_query($link, $query);
       $query="UPDATE users SET token = NULL WHERE login = '$user'";
       $result=mysqli_query($link, $query);
       mysqli_close($link);
       setcookie('cookie_token', '');
       setcookie('cookie_create_time', '');
       setcookie('cookie_time', '');
       header("Location: index.php");
       die();

?>
