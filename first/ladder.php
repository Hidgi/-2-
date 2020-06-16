<?php
/**
     * @file
     * Файл таблицы рейтинга.
     *$token - присваивает переменной cookie.
     *$query - выбирает login из таблицы users, при этом сверяет token.
     *$result - выполняет запрос к базе данных.
     *$user -  получение строки результирующей таблицы в виде массива.
     *$rows - получает число рядов в результирующей выборке.
     *$table - создаёт таблицу.
     *for - цикл со счетчиком.
      */

    require_once 'database.php';
    $token=$_COOKIE['cookie_token'];
    $query="SELECT login FROM users WHERE token = '$token'";
    $result=mysqli_query($link, $query);
    $user=mysqli_fetch_row($result);
    $user=$user[0];
    $query="SELECT login, rating, games, wins, loses FROM players ORDER BY rating DESC";
    $result=mysqli_query($link, $query);
    $rows=mysqli_num_rows($result);
    $table='';
?>
<!doctype html>
           <html lang="en">
           <title>TheLadder!</title>
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
                <form method="post" action="menu.php">
                <div align="center"> <br>
                <h1 class="alert alert-primary">
                <th>Рейтинг!</th>
                </h1>
                    <h2>
                    <table border=1>
                        <tr align=center>
                            <td> Место </td>
                            <td> Логин </td>
                            <td> Рейтинг </td>
                            <td> Игры </td>
                            <td> Победы </td>
                            <td> Поражения </td>
                        </tr>
                            <?php
                               $query="SELECT login, rating, games, wins, loses FROM players ORDER BY rating DESC";
                               $result=mysqli_query($link, $query);
                               for ($tr=0; $tr<$rows; $tr++){
                                   $r=mysqli_fetch_row($result);
                                   if ($r[0]==$user){
                                       $table .= '<tr align=center style="color:white;background-color:red;">';
                                   }
                                   else {
                                       $table .= '<tr align=center>';
                                   }
                                   $table .= '<td>'.($tr+1).'</td>';
                                   for ($col=0; $col<5; $col++){
                                       $table .= '<td>'.$r[$col].'</td>';
                                   }
                                   $table .= '</tr>';
                               }
                               echo $table;
                               mysqli_close($link);
                            ?>
                        </tr>
                   </table>
                   </h2>
                <input type="submit" class="btn btn-primary" value="Назад"> <br>
                </div>
                </form>
             </body>
</html>
