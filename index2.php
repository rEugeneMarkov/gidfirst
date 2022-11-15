<?php
require"header.php";
?>
        
            <h1>Гостевая книга 2</h1>

            <?php
            //session_start();

            require"config.php";

            $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
            while ($row = $result -> fetch_assoc()) {
                //$a = renderTemplate('temp_comment.php', ['row' => $row]);
                //echo '$a';
                require"temp_comment.php";
            }
            $log = $_SESSION['is_logined'];
            $name = "";
            if (strlen($log) > 0) {
                if (isset($_POST['comment'])) {
                    $check = " ";
                    $check_ok = "Запись успешно сохранена!";
                    $check_name = "Введите корректное имя";
                    $check_comment = "Мин. длинна комментария 50 символов";
                    $name = htmlspecialchars(trim($_POST['name']));
                    $comment = htmlspecialchars(trim($_POST['comment']));
                    //$new_url = 'index2.php';
                    //require"function.php";

                    if (strlen($name) <= 1) {
                        $check = "Введите корректное имя";
                        //redirect($new_url);
                    } elseif (strlen($comment) < 50) {
                        $check = "Мин. длинна комментария 50 символов";
                        //redirect($new_url);
                    } else {
                        $escapedName = $mysql->real_escape_string($name);
                        $escapedComment = $mysql->real_escape_string($comment);
                        $mysql->query("INSERT INTO `exemple-first` (`id`, `name`, `date`, `comment`) 
                        VALUES (NULL, '$escapedName', CURRENT_TIMESTAMP, '$escapedComment')");

                        $check = "Запись успешно сохранена!";
                        //redirect($new_url);
                    }
                    if ($check == $check_name) {
                        echo '<div class="info alert alert-warning">' . $check_name . '</div>';
                        $check = " ";
                    } elseif ($check == $check_comment) {
                        echo '<div class="info alert alert-warning">' . $check_comment . '</div>';
                        $check = " ";
                    } elseif ($check == $check_ok) {
                        echo '<div class="info alert alert-info">' . $check_ok . '</div>';
                        $check = " ";
                    }
                }
                ?>
                <div id="form">
                    <form action="" method="post">
                    <p><input type="text" value="<?=$name?>" class="form-control"name="name"placeholder="Ваше имя"></p>
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

