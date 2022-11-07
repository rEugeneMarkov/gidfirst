<?php
require"header.php";
?>
        <div id="wrapper">
            <h1>Гостевая книга</h1>

            <?php
            session_start();

            require"config.php";
            //require_once"test.php";

            $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
            while ($row = $result -> fetch_assoc()) {
                ?>
                <div class="note">
                    <p>
                        <span class="date"><?= $row['date']?></span>
                        <span class="name"><?= $row['name']?></span>
                    </p>
                    <p>
                        <?= $row['comment']?>
                    </p>
                </div>
                <?php
            }

            require"check.php";

            ?>
            <div id="form">
                <form action="check_post.php" method="post">
                    <p><input type="text" class="form-control" name="name" placeholder="Ваше имя"></p>
                    <p><textarea type="text" class="form-control" name="comment" placeholder="Ваш отзыв"></textarea></p>
                    <p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
                </form>
            </div>
        </div>
<?php
require"footer.php";
?>

