<?php

function redirect()
{
    header('Location: index.php');
    exit;
}

function redirectreg()
{
    header('Location: registration.php');
    exit;
}

function check_email()
{
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['email'] == $email) {
                $check_email = "error";
            } else {
                $check_email = "";
            }
        }
    } else {
        $check_email = "";
    }
}
