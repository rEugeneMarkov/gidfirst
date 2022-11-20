<?php
require"header.php";
?>
<h1>Список статей</h1>

<?php

//require"config.php";


if (is_user_logined()) {
    require"articles_pagination.php";
    if (isset($_POST['article'])) {
        $email = $_SESSION['email'];
        $check_success = "Запись успешно сохранена!";
        $check_comment = "Мин. длинна статьи 50 символов";
        $article = htmlspecialchars(trim($_POST['article']));

        if (strlen($article) < 50) {
            $check = "Мин. длинна статьи 50 символов";
        } else {
            add_article($user['name'], $article, $email);
            $check = "Запись успешно сохранена!";
        }

        if ($check == $check_comment) {
            echo '<div class="info alert alert-warning">' . $check_comment . '</div>';
            //$check = " ";
        } elseif ($check == $check_success) {
            echo '<div class="info alert alert-info">' . $check_success . '</div>';
            //$check = " ";
        }
    }
    ?>

<div id="form">
    <form action="" method="post">
        <p><textarea type="text" class="form-control" name="article" placeholder="Ваша статья"></textarea></p>
        <p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
    </form>
</div>

    <?php
} else {
    ?>
    <div class="note">
        <p style="color:white;background-color:red;text-align: center;">
            Нужно выполнить вход!
        </p>
    </div>
    <?php
}
?>
<?php
require"footer.php";
