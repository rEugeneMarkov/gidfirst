<?php
require"header.php";
//session_start();

$_SESSION['error_username'] = $_SESSION['error_username'];
$_SESSION['error_email'] = $_SESSION['error_email'];
$_SESSION['success'] = $_SESSION['success'];
$_SESSION['name'] = $_SESSION['name'];
$_SESSION['email'] = $_SESSION['email'];
$_SESSION['error_pass'] = $_SESSION['error_pass'];

?>

<div id="wrapper">
    <h1>Регистрация</h1>
        <div id="form">
        <div class="text-success"><?=$_SESSION['success']?></div>

            <form action="check_registration.php" method="post">

            <input type="text" name="name" value="<?=$_SESSION['name']?>" 
            placeholder="Введите имя" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_username']?></div><br>

            <input type="email" name="email" value="<?=$_SESSION['email']?>" 
            placeholder="Введите email" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_email']?></div><br>

            <input type="password" name="pass" placeholder="Введите пароль" class="form-control">
            <div class="text-danger"><?=$_SESSION['error_pass']?></div><br>

            <button type="submit"class="btn btn-info btn-block">Зарегистрироваться</button>
            </form> 

        </div>
</div>


<?php
require"footer.php";