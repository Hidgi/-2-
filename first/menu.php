<?php
   require_once 'database.php';
   $token=$_COOKIE['cookie_token'];
   $query="SELECT login FROM users WHERE token = '$token'";
   $result=mysqli_query($link, $query);
   $user=mysqli_fetch_row($result);
   $user=$user[0];
   $create_time=$_COOKIE['cookie_create_time'];
   $re_time=time()-$create_time;
   if ($re_time > 3600) {
        $token=bin2hex(random_bytes(32));
        $query="UPDATE users SET id = '$id' WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        setcookie('cookie_create_time', time());
        setcookie('cookie_token', $token);
   }
   $query="SELECT status FROM games WHERE user1='$user' OR user2='$user'";
   $result=mysqli_query($link, $query);
   $status=mysqli_fetch_row($result);
   if ($status[0]==1 OR $status[0]==2) {
        $query="UPDATE games SET status = 4 WHERE user1 = '$user'";
        $result=mysqli_query($link, $query);
        $query="UPDATE games SET status = 3 WHERE user2 = '$user'";
        $result=mysqli_query($link, $query);
        $query="SELECT games FROM players WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        $games=mysqli_fetch_row($result);
        $games=$games[0];
        $query="SELECT wins FROM players WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        $wins=mysqli_fetch_row($result);
        $wins=$wins[0];
        if ($games!=0){
             if ($wins!=0){
                $winrate=round(($wins[0]/$games[0])*100);
                $coef=$winrate;
             }
             else {
                $coef=50;
             }
        }
        else {
             $coef=100;
        }
        $query="UPDATE players SET rating = rating - '$coef' WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        $query="UPDATE players SET games = games + 1 WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        $query="UPDATE players SET loses = loses + 1 WHERE login = '$user'";
        $result=mysqli_query($link, $query);
   }
   else {
        $query="DELETE FROM games WHERE user1 = '$user' OR user2 = '$user'";
        $result=mysqli_query($link, $query);
   }
   $query="SELECT login FROM players";
   $result=mysqli_query($link, $query);
   for ($i=0; $i<mysqli_num_rows($result); ++$i){
       $acc = mysqli_fetch_row($result);
       if($user==$acc[0]){
           goto exist;
       }
   }
   $query = "INSERT INTO players (login) VALUE ('$user')";
   $result=mysqli_query($link, $query);
exist:
   $query = "UPDATE players SET time = NULL WHERE login = '$user'";
   $result=mysqli_query($link, $query);
   mysqli_close($link);
   setcookie('cookie_time', 0);
?>
<!doctype html>

           <html lang="en">
             <title> Меню! </title>
             <head>
               <meta charset="utf-8">
               <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
               <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
             </head>
                 <style>
                 body {
                    position: absolute;
                    top: 30%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                 }
                 </style>
             <body>
                <form method="post" action="wait.php">
                <div1>
                <a href="ladder.php"> Посмотреть рейтинг! </a>
                </div1>
                <div align="center">
                <br>
                <h1>
                <?php
                     print "Привет, $user!";
                ?>
                </h1> <br>
                <input type="submit" class="btn btn-primary" value="Играть!"> <br>
                <br> <a href="index.php"> Выйти... </a>
                </div>
                </form>
              </body>
           </html>

