
<?php

session_start();

    require"function.php";

    require"config.php";

    $name = $mysql->real_escape_string(htmlspecialchars(trim($_POST['name'])));
    //$name = htmlspecialchars(trim($_POST['name']));
    $email = $mysql->real_escape_string(htmlspecialchars(trim($_POST['email'])));
    //$email = htmlspecialchars(trim($_POST['email']));
    $pass = $mysql->real_escape_string(htmlspecialchars(trim($_POST['pass'])));
    //$pass = htmlspecialchars(trim($_POST['pass']));
    //$result = $mysql->query("SELECT `email` FROM `users`");

    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    $_SESSION['error_username'] = "";
    $_SESSION['error_email'] = "";
    $_SESSION['error_pass'] = "";
    $_SESSION['success'] = "";

    $new_url = 'registration.php';

if (strlen($name) <= 1) { // проверка имени
    $_SESSION['error_username'] = "Введите корректное имя";
    redirect($new_url);
} elseif (strlen($email) < 7) { //проверка почты
        $_SESSION['error_email'] = "Введите корректную почту";
        $_SESSION['email'] = "";
        redirect($new_url);
} elseif (is_email_exists($email)) { // проверка почты на наличие в базе
        $_SESSION['error_email'] = "Такой пользователь уже зарегистрирован";
        $_SESSION['email'] = "";
        redirect($new_url);
} elseif (strlen($pass) < 6) {
        $_SESSION['error_pass'] = "Минимальная длинна пароля 6 символов";
        redirect($new_url);
} else {
        $mysql->query("INSERT INTO `users` (`id`, `name`, `pass`, `email`, `date`) 
        VALUES (NULL, '$name', MD5('$pass'), '$email', CURRENT_TIMESTAMP)");

        $_SESSION['success'] = "Вы успешно зарегистрировались!";
        redirect($new_url);
}
