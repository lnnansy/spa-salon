<?php
unset($_COOKIE['login']);
setcookie('login', '', -1, '/');
unset($_COOKIE['password']);
setcookie('password', '', -1, '/');
header('Location:/index.php');
$_SESSION['auth'] = false;
session_destroy();
?>