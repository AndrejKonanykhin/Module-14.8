<?php
$user = $_SESSION['login'] ?? null;
// дата из базы данных записана в сессию
$birthday = $_SESSION['birthday'] ?? null;
// оставим от даты рождения только месяцы и дни, добавим текущий год и соберем строку обратно
$newBD = explode("-", $birthday);
$newBD[0] = date('Y');
$current_BD = implode("-", $newBD);
// переведем полученную дату в unix формат
$time = strtotime($current_BD);
// посчитаем разницу от текущей даты до даты дня рождения
$diff = $time - time();
// подсчитаем дни
if ($diff < 0) {
	$days_left = ceil(($diff + 31556926)/86400); // прибавим количество секунд в году и разделим на количество секунд в дне и округлим
}
if ($diff >= 0) {
	$days_left = ceil($diff/86400); // разделим на количество секунд в дне и округлим
}

// добавим склонение для дней, получив последний символ выводимого числа
$last_char = mb_substr((string)$days_left, -1, 1);
if ($last_char == 2 || $last_char == 3 || $last_char == 4) {
	$days_description = 'дня';
} elseif ($last_char == 1) {
	$days_description = 'день';
} else {
	$days_description = 'дней';
}

if ($days_left <= 2 && $days_left >= 1) {
	$is_birthday = true;
	echo "<div class=\"birthday\">
	<h3>{$user}, до вашего дня рождения осталось всего лишь</h3>
	<div class=\"count\">{$days_left}</div>
	<style>.count::after {content: '{$days_description}'}</style>
	<p class=\"center-description-p\">И вы уже можете воспользоваться скидкой 20% по случаю дня рождения</p>
	</div>";
}
if ($days_left >= 363 && $days_left <= 364) {
	$is_birthday = true;
	echo "<div class=\"birthday\">
	<h3>{$user}, ваш день рождения только что прошел, а до следующего осталось</h3>
	<div class=\"count\">{$days_left}</div>
	<style>.count::after {content: '{$days_description}'}</style>
	<p class=\"center-description-p\">но вы еще можете воспользоваться скидкой 20% по случаю дня рождения</p>
	</div>";
}
if ($days_left <= 366 && $days_left >= 365) {
	$is_birthday = true;
	echo "<div class=\"birthday\">
	<h3 class=\"congratulation\">{$user}, поздравляем с днем рождения и дарим скидку 20% на все услуги нашего спа-центра!</h3>
	<h3></h3>
	</div>";
}
if ($days_left <= 362) {
	$is_birthday = false;
	echo "<div class=\"birthday\">
	<h3>{$user}, до вашего дня рождения осталось</h3>
	<div class=\"count\">{$days_left}</div>
	<style>.count::after {content: '{$days_description}'}</style>
	<p class=\"center-description-p\">Вы пока не можете воспользоваться скидкой по случаю дня рождения, посмотрите другие спецпредложения</p>
	</div>";
}