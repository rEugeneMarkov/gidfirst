<?php
require"header.php";
?>
        
    <h1>Гостевая книга</h1>

    <?php

    require"config.php";
    $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
    while ($row = $result -> fetch_assoc()) {
        require"temp_comment.php";
    }

    $email = $_SESSION['is_logined'];
    $user = get_user($email);

    if (strlen($email) > 0) {
        if (isset($_POST['comment'])) {
            $comment = htmlspecialchars(trim($_POST['comment']));
            if (strlen($comment) < 50) {
                $check = "Мин. длинна комментария 50 символов";
            } else {
                add_comment($user['name'], $comment);
                $check = "Запись успешно сохранена! Обновите страницу.";
            }
            echo '<div class="info alert alert-info">' . $check . '</div>';
        }
        ?>
        <div id="form">
            <form action="" method="post">
                <p><textarea type="text" class="form-control" name="comment" placeholder="Ваш отзыв"></textarea></p>
                <p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
            </form>
        </div>
        <?php
    }
    ?>
            
<?php
require"footer.php";
?>

