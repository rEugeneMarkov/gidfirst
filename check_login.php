
<?php
session_start();
require"config.php";
require"function.php";
$_SESSION['is_logined'] = $_SESSION['is_logined'];
$email = htmlspecialchars(trim($_POST['email']));
$pass = htmlspecialchars(trim($_POST['pass']));
$pass = md5($pass);
//$name = $_SESSION['name'];
$new_url = 'index.php';

if (is_user_registered($email, $pass)) {
    $name = $_SESSION['name'];
    $_SESSION['is_logined'] = 'Добро пожаловать ' . $name ;
    redirect($new_url);
} else {
    $_SESSION['is_logined'] = "" ;
    redirect($new_url);
}
