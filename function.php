<?php

function session_variable()
{
    session_start();
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['login'] = $_SESSION['login'];
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['is_logined'] = $_SESSION['is_logined'];
}

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
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];


    return $result->num_rows > 0;
}


function clear_session()
{
    $_SESSION = array();
    header('Location: index.php');
    exit;
}
