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
