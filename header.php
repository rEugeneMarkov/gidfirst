<!DOCTYPE html>
<html lang="ru">
    <head>
    <meta charset="utf-8">  
        <title>Гостевая книга</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <div id="wrapper">
<header>
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require"config.php";
    require"login.php";
?>
    <a href="index.php">Главная</a> |
    <a href="articles.php">Статьи</a> |
    <a href="registration.php">Регистрация</a> |
</header> 
    
    
