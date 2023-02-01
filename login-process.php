<?php
$username = $_POST['login'] ?? null;
$password = sha1($_POST['password']) ?? null;

// получим данные зарегистрированных пользователей из хранилища паролей
function getUsersList() {
$usersDB = __DIR__ . '/usersDB.json';
$json = file_get_contents($usersDB);
$arr = json_decode($json, true);
return $arr;
}

$users_array = getUsersList();

// сверим полученные из формы данные с данными из хранилища
function checkPassword($login, $password, $arr) {
	if (array_key_exists($login, $arr)) {
		if ($arr[$login]['password'] === $password) {
			return true;
	}
	} else {
		return false;
	}
}

if ($username !== null || $password !== null ) {
    // Если пароль из базы совпадает с паролем из формы
    if (checkPassword($username, $password, $users_array) == true) {
         // Стартуем сессию:;
        session_start();
		// Пишем в сессию информацию о том, что мы авторизовались:
        $_SESSION['auth'] = true; 
        
        // Пишем в сессию логин и день рождения пользователя, а также сегодняшнюю дату и время
        $_SESSION['birthday'] = $users_array[$username]['birthday']; 
        $_SESSION['login'] = $username; 

    }
}

    
$auth = $_SESSION['auth'] ?? null;

// если авторизованы
if ($auth) {
	// удалим куку после ошибки авторизации, если она была
	setcookie('wronguser', $username, time() - 86400);
	// и переадресуем на главную страницу сайта
	header("Location: index.php");
} else {
	// иначе создадим куку об ошибке и вернем обратно к форме логин-пароль
	setcookie('wronguser', $username);
	header("Location: login.php");
}
?>


