<?php

session_start();

    require"function.php";
    require"config.php";

    $name = htmlspecialchars(trim($_POST['name']));
    $article = htmlspecialchars(trim($_POST['article']));
    $email = $_SESSION['email'];
    $new_url = 'articles.php';

if (strlen($name) <= 1) {
    $_SESSION['check'] = "Введите корректное имя";
    redirect($new_url);
} elseif (strlen($article) < 50) {
        $_SESSION['check'] = "Мин. длинна комментария 50 символов";
        redirect($new_url);
} else {
        $escapedName = $mysql->real_escape_string($name);
        $escapedArticle = $mysql->real_escape_string($article);
        $escapedEmail = $mysql->real_escape_string($email);
        $mysql->query("INSERT INTO `articles` (`id`, `name`, `email`, `article`,`date`) 
        VALUES (NULL, '$escapedName', '$escapedEmail', '$escapedArticle', CURRENT_TIMESTAMP)");

        $_SESSION['check'] = "Запись успешно сохранена!";
        redirect($new_url);
}
