<?php
require"config.php";
//$check = "";

if (isset($_POST['comment'])) {
    $comment = htmlspecialchars(trim($_POST['comment']));
    $new_url = 'index.php';
    if (strlen($comment) < 50) {
        $check = "Мин. длинна комментария 50 символов";
        //redirect($new_url);
    } else {
        $email = $_SESSION['email'] ?? '';
        $user = get_user($email);
        add_comment($user['name'], $comment);
        $check = "Запись успешно сохранена!";
        redirect($new_url);
    }
}

require"header.php";
?>
        
    <h1>Гостевая книга</h1>

    <?php

    $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
    while ($row = $result -> fetch_assoc()) {
        require"temp_comment.php";
    }

    if (is_user_logined()) {
        if (isset($_POST['comment'])) {
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

