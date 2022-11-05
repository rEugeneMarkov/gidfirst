<?php
    session_start();

    unset($_SESSION['name']);
    unset($_SESSION['email']);

    function redirect() {
        header('Location: index.php');
        exit;
    }

        $mysql = new mysqli("localhost", "root", "root", "php-first-mySQL");
        $mysql->query("SET NAMES 'utf8'");

        $name = htmlspecialchars(trim($_POST['name']));
        $comment = htmlspecialchars(trim($_POST['comment']));

        if(strlen($name) <= 1) {
            $_SESSION['success'] = "Введите корректное имя";
            redirect();
        }
        else if(strlen($comment) < 50) {
            $_SESSION['success'] = "Мин. длинна комментария 50 символов";
            redirect();
        }else{
        
        $mysql->query("INSERT INTO `exemple-first` (`id`, `name`, `date`, `comment`) VALUES (NULL, '$name', CURRENT_TIMESTAMP, '$comment')");
        $mysql->close();

        $_SESSION["success"] = "Запись успешно сохранена!";
        redirect();
        }
    
        
?>