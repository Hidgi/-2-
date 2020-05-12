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

					<h1>Регистрация</h1>

				<form action="register.php" method="post">
                        <div class="form-row">
                          <div class="col-md-10 mb-3">
                            <input type="text" class="form-control" name="login" id="login" placeholder="Логин">
                          </div>
                        </div>
                         <div class="form-row">
                           <div class="col-md-10 mb-3">
                              <input type="password" class="form-control" name="pass" id="pass" placeholder="Пароль">
                           </div>
                         </div>
                         <div class="form-row">
                                                    <div class="col-md-10 mb-3">
                                                       <input type="password" class="form-control" name="conf" id="conf" placeholder="Подтвердите пароль">
                                                    </div>
                                                  </div>
                               <div class="col-auto">
                         						<button type="submit" name="submit" class="btn btn-primary mb-2">
                         							Регистрация
                         						</button>
                         						 <a href="login.php" style="padding-left: 140px">
                         						 Назад
                                                                          </a>
                               </div>


                   </form>

                </body>
   </html>





