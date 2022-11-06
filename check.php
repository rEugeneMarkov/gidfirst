<?php

$_SESSION['check'] = $_SESSION['check'];
$check = "Запись успешно сохранена!";
$check_name = "Введите корректное имя";
$check_comment = "Мин. длинна комментария 50 символов";

if ($_SESSION['check'] == $check_name) {
    echo '<div class="info alert alert-warning">' . $check_name . '</div>';
    $_SESSION['check'] = " ";
} elseif ($_SESSION['check'] == $check_comment) {
    echo '<div class="info alert alert-warning">' . $check_comment . '</div>';
    $_SESSION['check'] = " ";
} elseif ($_SESSION['check'] == $check) {
    echo '<div class="info alert alert-info">' . $check . '</div>';
    $_SESSION['check'] = " ";
}
