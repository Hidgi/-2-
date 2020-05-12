<?php
require_once 'database.php';
$token=$_COOKIE['cookie_token'];
$query="SELECT login FROM users WHERE token = '$token'";
$result=mysqli_query($link, $query);
$user=mysqli_fetch_row($result);
$user=$user[0];
$query="SELECT user2 FROM games ORDER BY id DESC LIMIT 1";
$result=mysqli_query($link, $query);
$user2=mysqli_fetch_row($result);
$query="SELECT user1 FROM games ORDER BY id DESC LIMIT 1";
$result=mysqli_query($link, $query);
$user1 = mysqli_fetch_row($result);
if ($user1[0]==NULL){
    goto first;
}
if($user==$user1[0]){
    if ($user2[0]!=NULL){
        $query = "UPDATE players SET time = 0 WHERE login = '$user'";
        $result=mysqli_query($link, $query);
        header("Location: game.php");
        die();
    }
    goto exist;
}
if ($user2[0]==NULL){
     $query="UPDATE games SET user2 = '$user' ORDER BY id DESC LIMIT 1";
     $result=mysqli_query($link, $query);
     $query = "UPDATE players SET time = 0 WHERE login = '$user'";
     $result=mysqli_query($link, $query);
     header("Location: game.php");
     die();
}
else {
first:
    $query="INSERT INTO games (user1) VALUE ('$user')";
    $result=mysqli_query($link, $query);
}
exist:
$time=time();
$time_on_site=time()-$_COOKIE['cookie_time'];
setcookie('cookie_time', $time);
$query = "UPDATE players SET time = $time_on_site WHERE login = '$user'";
$result=mysqli_query($link, $query);
mysqli_close($link);
?>

 <!doctype html>
           <html lang="en">
           <title>Ожидание...</title>
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
               <meta http-equiv="Refresh" content="5"/>
               <form method="post" action="menu.php">
               <div align = "center">
               <h1>Ожидание...</h1> <br>
               <input type="submit" class="btn btn-primary" value="Отмена">
               </div>
             </body>
           </html>


