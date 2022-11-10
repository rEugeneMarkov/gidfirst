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

function is_user_registered(string $email, string $pass, string $name): bool
{
    global $mysql;
    $escapedEmail = $mysql->real_escape_string($email);
    $escapedPass = $mysql->real_escape_string($pass);
    $result = $mysql->query("SELECT * FROM `users` 
    WHERE email = '" . $escapedEmail . "' AND pass = '" . $escapedPass . "'");
    //$row = $result->fetch_assoc();
    //$name = $row['name'];

    return $result->num_rows > 0;
}
