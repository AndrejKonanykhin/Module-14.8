<?php
session_start();
if($_SESSION['auth'] === true){
 unset($_SESSION['auth']);
 unset($_SESSION['login']);
 unset($_SESSION['birthday']);
 setcookie('wronguser', $username, time() - 86400);
 session_destroy();
}
header("Location: index.php");
exit;