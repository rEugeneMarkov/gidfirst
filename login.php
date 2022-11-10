
<?php
    //session_start();
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['login'] = $_SESSION['login'];
    $_SESSION['email'] = $_SESSION['email'];
    require"function.php";
?>

    <div style="text-align: center;">

        <form action="check_login.php" method="post">
        
        <input type="email" name="email" placeholder="Введите email" class="form-group">

        <input type="password" name="pass" placeholder="Введите пароль" class="form-group">
        
        <button type="submit"class="btn btn-info btn-group">Войти</button>
        </form> 

    </div>