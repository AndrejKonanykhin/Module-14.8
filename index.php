<?php
session_start();
$auth = $_SESSION['auth'] ?? null;
$user = $_SESSION['login'] ?? null;
$birthday = $_SESSION['birthday'] ?? null;
$reg_date = $_COOKIE['discount'] ?? null;

// посчитаем, сколько времени осталось до конца действия скидки
$is_discount = ((int)$reg_date + 86400) - time();

// если на авторизован, направим на страницу входа
if (!$auth) {
	header("Location: login.php"); // иначе покажем основной контент
} else { ?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>HomeSpa - Главная страница</title>
  </head>
  <body class="main-page">
  <!-- запишем время регистрации нового пользователя в unix формате для js таймера -->
  <span id="time" style="display:none"><?php echo $reg_date; ?></span>
    <div class="wrapper">
      <header class="primary-header">
        <div class="header-shadow"></div>
        <div class="container">
          <div class="login">
            <form class="out" method="post" action="getout.php">
			 <input name="submit" type="submit" value="Выйти">
			 </form>
          </div>
          <a id="logo" href="#">
            <img alt="logo" src="image/logo.svg" />
          </a>
          <nav class="nav">
            <ul class="nav-list">
              <li><a href="#" class="active">Главная</a></li>
              <li><a href="#">О нас</a></li>
              <li>
                <a href="#">Услуги</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Массаж</a></li>
                  <li><a href="#">Обертывания</a></li>
                  <li><a href="#">Маникюр</a></li>
                  <li><a href="#">Педикюр</a></li>
                  <li><a href="#">Хамам</a></li>
                </ul>
              </li>
              <li><a href="#">Цены</a></li>
              <li>
                <a href="#">Инфо</a>
                <ul class="dropdown-menu">
                  <li><a href="#">Акции</a></li>
                  <li><a href="#">Сертификаты</a></li>
                  <li><a href="#">Блог</a></li>
                </ul>
              </li>
              <li><a href="#">Контакты</a></li>
            </ul>
          </nav>
          <div class="header-middle-position">
            <h2><?php echo $user ?>, добро пожаловать<br><span>в наш спа-центр</span></h2>
            <h3>Дайте себе время для расслабления</h3>
            <a href="#">Записаться сейчас</a>
          </div>
        </div>
      </header>
      <main class="main">
        <div class="container">
          <section class="center-content">
            <h2 class="greeting">
              Мы рады приветствовать Вас<span>в центре массажной терапии и релакса</span>
            </h2>
            <hr />
            <p class="center-description-p">
              Погрузившись в атмосферу уюта, тишины и гармонии, вы забудете обо
              всех своих проблемах и тревогах. Комфортная и изысканная
              обстановка SPA-центра, легкая, еле уловимая музыка, отсутствие
              всяких посторонних звуков — ничто не помешает вам расслабиться и
              получать удовольствие.
            </p>
            <div class="inner-section">
              <div class="div-1">
                <img alt="" src="image/about.png" />
              </div>
              <div class="div-1">
                <h3 class="right-description-h3">Мы верим в нашу миссию</h3>
                <p class="right-description-p">
                  HomeSpa — это ваш помощник в преображении и уходе за своим
                  здоровьем и внешностью. Нашим клиентам доступен обширный
                  спектр услуг и технологий с учётом последних тенденций и
                  методик в мире красоты
                </p>
                <h3 class="right-description-h3">Наши преимущества:</h3>
                <ul class="benefits benefits-right">
                  <li>
                    <h4>Работаем До последнего клиента, 7 дней в неделю</h4>
                  </li>
                  <li>
                    <h4>
                      Наши сотрудники являются дипломированными специалистами,
                      прошедшими жёсткий отбор
                    </h4>
                  </li>
                  <li>
                    <h4>
                      По необходимости, оказываем услуги с выездом по указанному
                      адресу
                    </h4>
                  </li>
                  <li>
                    <h4>
                      Косметология, лечебные массажи, коррекция фигуры, SPA,
                      уникальные программы по снижению веса
                    </h4>
                  </li>
                  <li>
                    <h4>
                      Мы используем только безопасные, профессиональные и
                      высокоэффективные продукты из натурального сырья
                    </h4>
                  </li>
                  <li>
                    <h4>
                      Для каждого клиента разрабатывается индивидуальный
                      комплекс процедур и программа лечения БЕСПЛАТНО
                    </h4>
                  </li>
                  <li>
                    <h4>
                      Диагностика ряда заболеваний и рекомендации специалистов
                      БЕСПЛАТНО
                    </h4>
                  </li>
                </ul>
                <p class="right-description-p">
                  Именно благодаря этим качествам, наши гости высоко ценят нас и
                  доверяют нам
                </p>
              </div>
            </div>
            <div>
              <a class="btn-center" href="#">Записаться сейчас</a>
            </div>
          </section>
          <section class="center-content">
            <h2 class="greeting">
              Акции<span>скидки и специальные предложения</span>
            </h2>
            <hr />
            <p class="center-description-p">
              Мы с радостью готовы предложить вам целый ряд специальных
              предложений. Благодаря которым, вы сможете насладиться
              гостеприимством нашего центра, не отказывая себе в других
              удовольствиях.
            </p>
            <?php include ('birthday.php') ?>
            <div class="inner-section">
              <div class="div-1">
                <h3 class="inner-section-h3">-20%</h3>
                <img
                  alt="Скидка 20% в день рождения"
                  src="image/promo-for-happy-birthday.jpg"
                />
                <p>
                  Дарим скидку 20% на все услуги в ваш день рождения, а также 2
                  дня до или после
                </p>
              </div>
              <div class="div-1">
                <h3 class="inner-section-h3">-15%</h3>
                <img
                  alt="Скидка 15% на курс массажа"
                  src="image/promo-for-massage.jpg"
                />
                <p>
                  Скидка 15% при покупке абсолютно любого курса массажа на 5 и
                  более сеансов
                </p>
              </div>
              <div class="div-1">
                <h3 class="inner-section-h3">-10%</h3>
                <img
                  alt="Скидка 10% для пар"
                  src="image/promo-for-couples.jpg"
                />
                <p>
                  Скидка 10% на все услуги нашего центра для пар при посещении в
                  будни
                </p>
              </div>
			</div>
			<?php
			// выведем сообщение об индивидуальной акции
			if (isset($_COOKIE['discount']) && $is_birthday === false) { ?>
			<div class="personal">
			<h3>В качестве благодарности за регистрацию мы дарим вам, <?php echo $user ?>, скидку 5% на все услуги спа-центра. 
			Но вам стоит поторопиться — до конца действия персональной акции осталось лишь:</h3>
				<div class="date">
				<div class="hours"><?php echo date('H', $is_discount); ?></div>:
				<div class="minutes"><?php echo date('i', $is_discount); ?></div>:
				<div class="seconds"><?php echo date('s', $is_discount); ?></div>
				</div>
				<p class="center-description-p">Или посмотрите все доступные акции по ссылке ниже</p>
            </div>
			<?php } ?>
            <div>
              <a class="btn-center" href="#">Все акции</a>
            </div>
          </section>
          <section class="center-content">
            <h2 class="greeting">
              Наши сертификаты<span>Порадуйте близких идеальным подарком</span>
            </h2>
            <hr />
            <p class="center-description-p">
              Если вы никак не можете придумать, что же подарить любимому
              человеку на праздник, мы предлагаем идеальное решение данной
              проблемы. У вас есть возможность выбора среди наших подарочных
              сертификатов по цене от 1 000 рублей.
            </p>
            <div class="inner-section">
              <div class="div-1">
                <h3 class="left-description-h3">Прекрасный подарок</h3>
                <p class="left-description-p">
                  Дарите то, что хочется, выбирайте из того, что необходимо.
                  Подарочные сертификаты очень популярны среди наших гостей,
                  особенно среди мужчин, ведь доставить удовольствие любимой —
                  это счастье для мужчины.
                </p>
                <ul class="benefits benefits-left">
                  <li>
                    <h4>Подарочный сертификат на сумму: от 1 000 рублей</h4>
                  </li>
                  <li>
                    <h4>Подарочный сертификат на процедуру: от 1 000 рублей</h4>
                  </li>
                  <li>
                    <h4>
                      Подарочный сертификат на курс процедур: от 4 000 рублей
                    </h4>
                  </li>
                </ul>
              </div>
              <div class="div-1">
                <img alt="" src="image/sertificate.png" />
              </div>
            </div>
            <div>
              <a class="btn-center" href="#">Купить сертификат</a>
            </div>
          </section>
        </div>
      </main>
      <footer class="footer">
        <div class="container">
          <div class="inner-footer">
            <div class="about">
              <h3>О нас</h3>
              <p>
                Обладая достаточным опытом организации работы, мы постарались
                создать место, в котором представлен весь спектр салонных услуг,
                но с более продуманным СПА направлением. Гость может получить не
                только моральное удовольствие от финального результата любой
                услуги, но и хорошо провести время.
              </p>
            </div>
            <div class="blog">
              <h3>Блог</h3>
              <p><a href="#">Рукавица Кессе</a><br />19.01.2023</p>
              <p><a href="#">Мыло "Бельди"</a><br />20.01.2023</p>
              <p>
                <a href="#">Антицеллюлитное спа обёртывание "Шоколад"</a
                ><br />21.01.2023
              </p>
            </div>
            <div class="contact">
              <h3>Контакты</h3>
              <p></p>
            </div>
            <div class="letter">
              <h3>Подписка</h3>
              <p></p>
            </div>
          </div>
        </div>
        <div class="sub-footer">
          <div class="container">
            <p>Copyright © <?php echo date('Y') ?> HomeSpa. Все права защищены.</p>
          </div>
        </div>
      </footer>
    </div>
	<!-- Если закомментировать строку <script> время до окончания акции будет отображаться статически 
	по php скрипту и меняться только при перезагрузке страницы -->
	<script src="timer.js"></script>
  </body>
</html>
<?php } ?>