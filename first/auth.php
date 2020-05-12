<?php
     require_once 'database.php';
	 $login = $_POST['login'];
     $pass = $_POST['password'];

     $pass = md5($pass."gfjkhgksd5894");

     $mysql=new mysqli('localhost','root','','database');

     $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` ='$pass'");
     $user = $result->fetch_assoc();
     if(count($user) == 0) {
     echo 'Такой пользователь не найден<a href="login.php"style="padding-left: 140px"><h2><strong>Назад</strong></h2> </a>';
     exit();
     }
     else {

                    $token=bin2hex(random_bytes(32));
                    $query = "UPDATE users SET token = '$token' WHERE login = '$login'";
                    $result = mysqli_query($link, $query);
                    setcookie('cookie_token', $token);
                    setcookie('cookie_create_time', time());
                    mysqli_close($link);
                    header("Location: menu.php");
     }

     $mysql->close();

?>