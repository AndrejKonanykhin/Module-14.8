<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>HomeSpa - Регистрация</title>
  </head>
  <body class="register">
    <div class="wrapper">
      <header class="ordinary-header">
	  <div class="header-shadow"></div>
        <div class="top-bar">
          <div class="container">
            <div class="flex">
              <div class="schedule">
                <span>Режим работы: без выходных с 10:00 до 20:00</span>
              </div>
			  <div class="login">				  
			  <a href="login.php">Вход</a>
			  </div>
            </div>
          </div>
        </div>
        <div class="container">
          <a id="logo" href="#">
            <img alt="logo" src="image/logo.svg" />
          </a>
        </div>
      </header>
      <main>
	  	  <div class="container">
		  	  <h2 class="greeting">
              Чтобы стать членом клуба<span>зарегистрируйтесь</span>
            </h2>
			</div>
<?php 
// выведем сообщение об ошибке, если логин уже занят
if (isset($_COOKIE['isuser'])) { 
?>
<div class="error">
<p>Пользователь <?php echo $_COOKIE["isuser"]; ?> уже существует, придумайте другой логин</p>
</div>
<?php } ?>
        <form action="register-process.php" method="post">
          <input required name="login" type="text" placeholder="Логин" />
          <input required name="password" type="password" placeholder="Пароль" />
          <input required name="date_of_birth" type="date" />
          <input class="submit" name="submit" type="submit" value="Зарегистрироваться" />
        </form>
      </main>
	   <footer class="footer">
        <div class="sub-footer">
          <div class="container">
            <p>Copyright © <?php echo date('Y') ?> HomeSpa. Все права защищены.</p>
          </div>
        </div>
      </footer>
    </div>
  </body>
</html>
