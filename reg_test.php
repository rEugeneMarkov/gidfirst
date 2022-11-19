<?php
require"header.php";
?>

    <h1>Регистрация</h1>

    <?php
    require"config.php";
    //session_start();
    $success = "";
    $check = "";
    $new_url = 'registration.php';


    if (isset($_POST['name'])) {
        require"function.php";
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $pass = htmlspecialchars(trim($_POST['pass']));

        if (strlen($name) <= 1) { // проверка имени
            $check = "Введите корректное имя";
            redirect($new_url);
        } elseif (strlen($email) < 7) { //проверка почты
            $check = "Введите корректную почту";
            //$_SESSION['email'] = "";
            redirect($new_url);
        } elseif (is_email_exists($email)) { // проверка почты на наличие в базе
            $check = "Такой пользователь уже зарегистрирован";
            //$_SESSION['email'] = "";
            redirect($new_url);
        } elseif (strlen($pass) < 6) {
            $check = "Минимальная длинна пароля 6 символов";
            redirect($new_url);
        } else {
            $mysql->query("INSERT INTO `users` (`id`, `name`, `pass`, `email`, `date`) 
            VALUES (NULL, '$name', MD5('$pass'), '$email', CURRENT_TIMESTAMP)");
            $check = "";
            $success = "Вы успешно зарегистрировались!";
            redirect($new_url);
        }
        ?>
            <div class="text-success"><?=$success?></div>
            <div class="text-danger"><?=$check?></div>
        <?php
    }
    ?>

        <div id="form">
            <form action="" method="post">
                <p><input type="text" name="name" placeholder="Введите имя" class="form-control"></p>
                <p><input type="email" name="email" placeholder="Введите email" class="form-control"></p>
                <p><input type="password" name="pass" placeholder="Введите пароль" class="form-control"></p>
                <p><input type="submit" class="btn btn-info btn-block" value="Зарегистрироваться"></p>
            </form> 
        </div>
    
        <?php

        require"footer.php";
