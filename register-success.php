<?php
session_start();
$auth = $_SESSION['auth'] ?? null;
$user = $_SESSION['login'] ?? null;
$birthday = $_SESSION['birthday'] ?? null; 
$reg_date = $_SESSION['reg_date'] ?? null;

// переадресуем на главную страницу через 6 секунд
header( "refresh:6; index.php" );
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>HomeSpa - Успешная регистрация</title>
  </head>
  <body class="register-success">
    <div class="wrapper">
      <header class="ordinary-header">
	  <div class="header-shadow"></div>
        <div class="top-bar">
          <div class="container">
            <div class="flex">
              <div class="schedule">
                <span>Режим работы: без выходных с 10:00 до 20:00</span>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <a id="logo" href="index.php">
            <img alt="logo" src="image/logo.svg" />
          </a>
        </div>
      </header>
      <main>
	  	  <div class="container">
		  	  <h2 class="greeting">
              Поздравляем, Вы успешно зарегистрировались<br>
			  <span>При следующем посещении используйте
			  свои логин и пароль для авторизации</span><br>
			  направляем Вас на главную страницу
            </h2>
			</div>
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
