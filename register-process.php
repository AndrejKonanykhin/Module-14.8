<?php
// получим данные из формы регистрации
$reg_username = $_POST['login'] ?? null;
$reg_password = $_POST['password'] ?? null;
$reg_date_of_birth = $_POST['date_of_birth'] ?? null;

// прочитаем файл с пользователями
function getUsersList() {
$usersDB = __DIR__ . '/usersDB.json';
$json = file_get_contents($usersDB);
$arr = json_decode($json, true);
return $arr;
}
// создадим массив существующих пользователей
$users_array = getUsersList();

// создадим функцию проверки, есть ли в списке пользователь с таким же логином
function existsUser($login, $arr) {
	if (array_key_exists($login, $arr)) {
		// если пользователь с таким логином существует, вернем false
		return false;
	} else {
		// если логин уникальный, вернем true
		return true;
	}
}

// сгруппируем полученные данные от нового пользователя
$n = count($users_array);
function getUserData($n, $password, $date_of_birth) {
	return $newUserData = ['id' => $n + 1, 'password' => sha1($password), 'birthday' => $date_of_birth ];
}
$userdata = getUserData ($n, $reg_password, $reg_date_of_birth);

// создадим нового пользователя с полученными данными
function createNewUser($login, $data) {
	return $newUser = [$login => $data];
}
$reguser = createNewUser ($reg_username, $userdata);

// создадим новый массив с зарегистрированным пользователем
function addUser($arr, $user) {
	return $arr = array_merge($arr,  $user);
} 
$new_users_array = addUser($users_array, $reguser);

// если проверка логина не пройдена
if (existsUser($reg_username, $users_array) == false) {
	setcookie('isuser', $reg_username);
	header("Location: register.php");
}

// если проверка на уникальность логина пройдена сохраним список с пользователями
$usersDB = __DIR__ . '/usersDB.json';
if (existsUser($reg_username, $users_array) == true) {
	$usersJSON = json_encode($new_users_array, JSON_UNESCAPED_UNICODE);
	file_put_contents($usersDB, $usersJSON);
	// стартуем сессию с новым пользователем и запишем его логин в сессию
	// также запишем дату рождения
	session_start();
	$_SESSION['auth'] = true;
	$_SESSION['login'] = $reg_username;
	$_SESSION['birthday'] = $reg_date_of_birth;
	// сначала преобразуем время в строку
	$time_reg = (string)time();
	// создадим куку на сутки, чтобы показывать акцию новым пользователя
	setcookie('discount', $time_reg, time() + 86400);
	// удалим куку после ошибки регистрации, если она была
	setcookie('isuser', $reg_username, time() - 14400);
	// и перенаправим на страницу успешной регистрации
	header("Location: register-success.php");
}