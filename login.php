<?php
session_start();
$auth = $_SESSION['auth'] ?? null;
$user = $_SESSION['login'] ?? null;
if($auth) {
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>HomeSpa - Авторизация</title>
  </head>
  <body class="log-in">
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
			  <?php
			  if (!$auth) { ?>
                <a href="register.php">Регистрация</a>
			  <?php } ?>
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
              Чтобы попасть в закрытый клуб<br>релакса и наслаждений<span>зарегистрируйтесь или авторизуйтесь</span>
            </h2>
			</div>
			<?php 
// выведем сообщение об ошибке, если логин или пароль неверные
if (isset($_COOKIE['wronguser'])) { 
?>
<div class="error">
<p>Неправильный логин или пароль</p>
</div>
<?php } ?>
        <form action="login-process.php" method="post">
          <input required name="login" type="text" placeholder="Логин" />
          <input required name="password" type="password" placeholder="Пароль" />
          <input class="submit" name="submit" type="submit" value="Войти" />
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
