<?php

session_start();

function redirect()
{
    header('Location: index.php');
    exit;
}

    require"config.php";

    $name = htmlspecialchars(trim($_POST['name']));
    $comment = htmlspecialchars(trim($_POST['comment']));

if (strlen($name) <= 1) {
    $_SESSION['check'] = "Введите корректное имя";
    redirect();
} elseif (strlen($comment) < 50) {
        $_SESSION['check'] = "Мин. длинна комментария 50 символов";
        redirect();
} else {
        $mysql->query("INSERT INTO `exemple-first` (`id`, `name`, `date`, `comment`) VALUES (NULL, '$name', CURRENT_TIMESTAMP, '$comment') ") ;
        $mysql->close();
        $_SESSION["check"] = "Запись успешно сохранена!";
        redirect();
}
