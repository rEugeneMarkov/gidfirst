
<?php

session_start();

    require"function.php";

    require"config.php";

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['pass']));
    $result = $mysql->query("SELECT `email` FROM `users` WHERE `email` = $email");

    check_email();

    $_SESSION['test'] = $result;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

if (strlen($name) <= 1) { // проверка имени
    $_SESSION['error_username'] = "Введите корректное имя";
    $_SESSION['name'] = "";
    $_SESSION['success'] = "";
    $_SESSION['error_email'] = "";
    $_SESSION['error_pass'] = "";
    redirectreg();
} elseif (strlen($email) < 7 || strpos($email, "@") == false) { //проверка почты
        $_SESSION['error_email'] = "Введите корректную почту";
        $_SESSION['email'] = "";
        $_SESSION['success'] = "";
        $_SESSION['error_username'] = "";
        $_SESSION['error_pass'] = "";
        redirectreg();
} elseif ($check_email == "error") { // проверка почты на наличие в базе
        $_SESSION['error_email'] = "Такой пользователь уже зарегистрирован";
        $_SESSION['email'] = "";
        $_SESSION['success'] = "";
        $_SESSION['error_username'] = "";
        $_SESSION['error_pass'] = "";
        redirectreg();
} elseif (strlen($pass) < 6) {
        $_SESSION['error_pass'] = "Минимальная длинна пароля 6 символов";
        $_SESSION['success'] = "";
        $_SESSION['error_username'] = "";
        $_SESSION['error_email'] = "";
        redirectreg();
} else {
        $mysql->query("INSERT INTO `users` (`id`, `name`, `pass`, `email`, `date`) 
        VALUES (NULL, '$name', MD5('$pass'), '$email', CURRENT_TIMESTAMP)");

        $_SESSION['success'] = "Вы успешно зарегистрировались!";
        $_SESSION['error_username'] = "";
        $_SESSION['error_email'] = "";
        $_SESSION['error_pass'] = "";
        $_SESSION['name'] = "";
        $_SESSION['email'] = "";
        redirectreg();
}
