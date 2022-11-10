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
<div style="text-align: center;">

        <form method="post">
        <button name="clear_session" type="submit"class="btn btn-info btn-group">Выйти</button>
        </form> 
</div>
<?php
session_start();
if (isset($_POST['clear_session'])) {
    $_SESSION['is_logined'] = "";
        $new_url = 'index.php';
        //redirect($new_url);
}

    $_SESSION['is_logined'] = $_SESSION['is_logined'];
    $log = $_SESSION['is_logined'];
if (strlen($log) > 0) {
    ?>
    <div> <?=$_SESSION['is_logined']?></div>
    <?php
} else {
    require"login.php";
}
?>
    <a href="index.php">Главная</a> |
    <a href="articles.php">Статьи</a> |
    <a href="registration.php">Регистрация</a> |
</header> 
    
    
