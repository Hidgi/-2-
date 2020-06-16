�<?php
	/**
     * @file
     * Файл регистрации.
     *$login - присваивает переменной значение login.
     *$pass - присваивает переменной значение pass.
     *$result -обрабатывает результат запроса, где из таблицы users берёт переменные login и password, а после сравнивает с введёнными в предоставленные поля.
     *$user - извлекает результирующий ряд в виде ассоциативного массива.
     *else - блок "иначе".
     *$query - обновляет таблицу users, загружая token и login.
          */

     require_once 'database.php';
     $login = $_POST['login'];
     $pass = $_POST['pass'];

     $pass = md5($pass."gfjkhgksd5894");


     $result = $link->query("SELECT * FROM `users` WHERE `login` = '".$login."' AND `password` ='".$pass."'");
     $user = $result->fetch_assoc();
     if(count($user) == 0) {
     echo 'Такой пользователь не найден<a href="login.php"style="padding-left: 140px"><h2><strong>Назад</strong></h2> </a>';
     exit();
     }
     else {

                    $token=bin2hex(random_bytes(32));
                    $query = "UPDATE users SET token = '".$token."' WHERE login = '".$login."'";
                    $result = mysqli_query($link, $query);
                    setcookie('cookie_token', $token);
                    setcookie('cookie_create_time', time());
                    mysqli_close($link);
                    header("Location: /pig/first/menu.php");
     }

     $link->close();

?>
