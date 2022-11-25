<?php
    //session_start();
    //require"function.php";
    //require"config.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/pages/function.php";

if (isset($_POST['clear_session'])) {
    $url = '/';
    clear_session($url);
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
} else {
    $email = "";
}
if (strlen($email) > 0) {
    $user = get_user($email);
    $hello = 'Добро пожаловать ' . $user['name'];
    ?>
    <div style="text-align: center;">
        <form method="post">
         <?=$hello?>
        <button name="clear_session" type="submit"class="btn btn-info btn-group">Выйти</button>
        </form> 
    </div>
    <?php
} else {
    if (isset($_POST['email'])) {
        $email = htmlspecialchars(trim($_POST['email']));
        $pass = htmlspecialchars(trim($_POST['pass']));
        $pass = md5($pass);
        $new_url = '/';

        if ($user = get_user_by_email_and_pass($email, $pass)) {
            $_SESSION['email'] = $user['email'] ;
            redirect($new_url);
        } else {
            $_SESSION['email'] = "" ;
            redirect($new_url);
        }
    } else {
        ?>
        <div style="text-align: center;">
            <form action="" method="post">
            <input type="email" name="email" placeholder="Введите email" class="form-group">
            <input type="password" name="pass" placeholder="Введите пароль" class="form-group">
            <button type="submit"class="btn btn-info btn-group">Войти</button>
            </form> 
        </div>
        <?php
    }
}
