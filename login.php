
<?php
    session_start();
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['login'] = $_SESSION['login'];
    $_SESSION['email'] = $_SESSION['email'];
    $_SESSION['is_logined'] = $_SESSION['is_logined'];
    require"function.php";
    //session_variable();

if (isset($_POST['clear_session'])) {
    clear_session();
}

    $log = $_SESSION['is_logined'];
if (strlen($log) > 0) {
    ?>
    <div style="text-align: center;">
        <form method="post">
         <?=$_SESSION['is_logined']?>
        <button name="clear_session" type="submit"class="btn btn-info btn-group">Выйти</button>
        </form> 
    </div>
    <?php
} else {
    ?>
        <div style="text-align: center;">

        <form action="check_login.php" method="post">

        <input type="email" name="email" placeholder="Введите email" class="form-group">

        <input type="password" name="pass" placeholder="Введите пароль" class="form-group">

        <button type="submit"class="btn btn-info btn-group">Войти</button>

        </form> 

</div>
    <?php
}