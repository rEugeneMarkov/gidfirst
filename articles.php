<?php
require"header.php";
?>
<h1>Список статей</h1>

<?php
//session_start();

require"config.php";


$email = $_SESSION['email'];
if (strlen($email) > 0) {
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
        <p style="color:white;background-color:red;text-align: center;">
            Нужно выполнить вход!
        </p>
    </div>
    <?php
}
?>
<?php
require"footer.php";
