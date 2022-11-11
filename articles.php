<?php
require"header.php";
?>
<h1>Список статей</h1>

<?php
//session_start();

require"config.php";


$log = $_SESSION['is_logined'];
if (strlen($log) > 0) {
    $result = $mysql->query("SELECT * FROM `articles` ORDER BY `id` DESC");
    while ($row = $result -> fetch_assoc()) {
        ?>
    <div class="note">
        <p>
            <span class="date"><?= $row['date']?></span>
            <span class="name"><?= $row['name']?></span>
        </p>
        <p>
            <?= $row['article']?>
        </p>
    </div>
        <?php
    }
    include"article_post.php";
} else {
    ?>
    <div class="note">
        <p>
            Нужно выполнить вход!
        </p>
    </div>
    <?php
}
?>
<?php
require"footer.php";
