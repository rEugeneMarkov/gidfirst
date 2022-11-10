
<?php
session_start();
$_SESSION['is_logined'] = $_SESSION['is_logined'];
require"config.php";
require"function.php";
$email = htmlspecialchars(trim($_POST['email']));
$pass = htmlspecialchars(trim($_POST['pass']));
$pass = md5($pass);
$name = "test";
$new_url = 'index.php';

if (is_user_registered($email, $pass, $name)) {
    $_SESSION['is_logined'] = 'Добро пожаловать' . $name ;
    redirect($new_url);
} else {
    $_SESSION['is_logined'] = "" ;
    redirect($new_url);
}
