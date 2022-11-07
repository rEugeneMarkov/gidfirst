<?php

session_start();

    require"function.php";

    require"config.php";

    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $pass = htmlspecialchars(trim($_POST['pass']));

if (strlen($name) <= 1) {
    $_SESSION['error_username'] = "Введите корректное имя";
    redirectreg();
} elseif (strlen($email) < 5) {
        $_SESSION['error_email'] = "Введите корректную почту";
        redirectreg();
} else {
        $mysql->query("INSERT INTO `users` (`id`, `name`, `pass`, `email`, `date`) VALUES (NULL, '$name', '$pass', '$email', CURRENT_TIMESTAMP)");

        $_SESSION['success'] = "Вы успешно зарегистрировались!";
        redirectreg();
}
