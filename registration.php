<?php
require"header.php";
session_start();
$_SESSION['error_username'] = $_SESSION['error_username'];
$_SESSION['error_email'] = $_SESSION['error_email'];
$_SESSION['error_subject'] = $_SESSION['error_subject'];
$_SESSION['message'] = $_SESSION['message'];
$_SESSION['error_message'] = $_SESSION['error_message'];
$_SESSION['success'] = $_SESSION['success'];
?>

<div id="wrapper">
    <h1>Регистрация</h1>
        <div id="form">
        <div class="text-success"><?=$_SESSION['success']?></div>
            <form action="check_registration.php" method="post">

            <input type="text" name="name" placeholder="Введите имя" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_username']?></div><br>

            <input type="email" name="email" placeholder="Введите email" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_email']?></div><br>

            <input type="text" name="pass" placeholder="Введите пароль" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_subject']?></div><br>

            <button type="submit"class="btn btn-info btn-block">Зарегистрироваться</button>
            </form> 
        </div>
</div>


<?php
require"footer.php";
