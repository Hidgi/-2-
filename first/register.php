<?php
     /**
     * @file
     * Файл регистрации.
     *$login - присваивает переменной значение login. 
     *$pass - присваивает переменной значение pass.
     *$confirm - присваивает переменной значение conf.
     *$query - выбирает из таблицы users login.
     *$result -обрабатывает результат запроса.
     */
     require_once 'database.php';
     $login = $_POST['login'];
     $pass = $_POST['pass'];
     $confirm=$_POST['conf'];
     if ($pass!=$confirm) {
         echo 'Введенные пароли не совпадают!<a href="signup.php"style="padding-left: 140px"><h2><strong>Назад</strong></h2> </a>';
     }
     $query="SELECT login FROM users";
     $result = mysqli_query($link, $query);
     for ($i=0; $i<mysqli_num_rows($result); ++$i){
               $acc = mysqli_fetch_row($result);
               if($login==$acc[0]){
             echo 'Такой логин уже занят!<a href="signup.php"style="padding-left: 140px"><h2><strong>Назад</strong></h2> </a>';
             exit();
             }
     }
      $pass = md5($pass."gfjkhgksd5894");


      $query = ("INSERT INTO `users` (login, password) VALUES('".$login."', '".$pass."')");
      if (mysqli_query($link, $query)) {
        $token=bin2hex(random_bytes(32));
        $query = "UPDATE users SET token = '".$token."' WHERE login = '".$login."';
        $result = mysqli_query($link, $query);
        setcookie('cookie_token', $token);
        setcookie('cookie_create_time', time());
        header("Location: /pig/first/menu.php");
        mysqli_close($link);
        die();
        }
      else {
        echo "Error: " . $query . "<br>" . mysqli_error($link);
        mysqli_close($link);
        die();
      }
?>
