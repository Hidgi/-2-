 <html>
  <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
          body {
                 position: fixed;
                  top: 50%;
                  left: 50%;
                  margin-top: -250px;
                  margin-left: -145px;
                }
        </style>
  </head>
  <body>
                <h1>Авторизация</h1>
   <form action="auth.php" method="post">
        <div class="form-row">
          <div class="col-md-10 mb-3">
            <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
          </div>
        </div>
         <div class="form-row">
           <div class="col-md-10 mb-3">
             <input type="password" class="form-control" name="password" id="pass" placeholder="Пароль">
           </div>
         </div>

         <input type="submit" class="btn btn-primary" value="Принять">
         <a href="signup.php" style="padding-left: 140px">
            Зарегистрироваться
         </a>
   </form>

  </body>
 </html>