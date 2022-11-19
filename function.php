<?php

function redirect($new_url)
{
    header('Location: ' . $new_url);
    exit;
}

function is_email_exists(string $email): bool
{
    global $mysql;
    $escapedEmail = $mysql->real_escape_string($email);
    $result = $mysql->query(
        "SELECT `email` FROM `users` WHERE email = '" . $escapedEmail . "'"
    );

    return $result->num_rows > 0;
}

function is_user_registered(string $email, string $pass): bool
{
    global $mysql;
    $escapedEmail = $mysql->real_escape_string($email);
    $escapedPass = $mysql->real_escape_string($pass);
    $result = $mysql->query("SELECT * FROM `users` 
    WHERE email = '" . $escapedEmail . "' AND pass = '" . $escapedPass . "'");
    $row = $result->fetch_assoc();

    return $result->num_rows > 0;
}

function is_user_logined(): bool
{
    $email = $_SESSION['email'];
    return strlen($email) > 0;
}

function get_user($email)
{
    global $mysql;
    $escapedEmail = $mysql->real_escape_string($email);
    $result = $mysql->query("SELECT * FROM `users` WHERE email = '" . $escapedEmail . "'");
    $user = $result->fetch_assoc();
    return $user;
}

function get_user_by_email_and_pass($email, $pass)
{
    global $mysql;
    $escapedEmail = $mysql->real_escape_string($email);
    $result = $mysql->query("SELECT * FROM `users` WHERE email = '" . $escapedEmail . "'");
    $user = $result->fetch_assoc();
    return $user;
}

function add_comment($name, $comment)
{
    $escapedName = $mysql->real_escape_string($name);
    $escapedComment = $mysql->real_escape_string($comment);
    $mysql->query("INSERT INTO `exemple-first` (`id`, `name`, `date`, `comment`) 
    VALUES (NULL, '$escapedName', CURRENT_TIMESTAMP, '$escapedComment')");
    $check = "Запись успешно сохранена!";
    return $check;
}

function get_comments()
{
    global $mysql;
    $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
    return $result;
}

function clear_session()
{
    $_SESSION = [
        'email' => "",
    ];
    header('Location: index.php');
    exit;
}
