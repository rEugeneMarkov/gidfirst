<?php
require"header.php";
?>
        
            <h1>Гостевая книга</h1>

            <?php
            //session_start();

            require"config.php";

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
            $log = $_SESSION['is_logined'];
            if (strlen($log) > 0) {
                include"post.php";
            }
            ?>
            
<?php
require"footer.php";
?>

