<?php
require $_SERVER['DOCUMENT_ROOT'] . "/pages/config.php";
//$check = "";

if (isset($_POST['comment'])) {
    $comment = htmlspecialchars(trim($_POST['comment']));
    $new_url = '/';
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

require $_SERVER['DOCUMENT_ROOT'] . "/templates/header.php";
?>
        
    <h1>Гостевая книга</h1>

    <?php
    $table = "exemple-first";
    require $_SERVER['DOCUMENT_ROOT'] . "/templates/pagination.php";
    $result = get_table_content($table, $art, $kol);
    while ($row = $result -> fetch_assoc()) {
        require $_SERVER['DOCUMENT_ROOT'] . "/templates/temp_content.php";
    }

    if (is_user_logined()) {
        if (isset($_POST['comment'])) {
            echo '<div class="info alert alert-info">' . $check . '</div>';
        }
        $check1 = $check ?? '';
        if ($check1 == "Запись успешно сохранена!") {
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
require $_SERVER['DOCUMENT_ROOT'] . "/templates/footer.php";
?>

