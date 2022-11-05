<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">  
		<title>Гостевая книга</title>
		<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Гостевая книга</h1>

            <?php
            session_start();
            
            require(config.php);

            while($row = $result->fetch_assoc()){
                ?>
                <div class="note">
                <p>
                <span class="date"><?= $row['date']?></span>
                <span class="name"><?= $row['name']?></span>
                </p>
                <p><?= $row['comment']?></p>
                </div>
                <?php
            }
            $mysql->close();
            $check = "Запись успешно сохранена!";
                if ($_SESSION['check']==true and $_SESSION['check']<>$check){
                    echo '<div class="info alert alert-warning">'.$_SESSION['check'].'</div>';
                    unset($_SESSION['check']);
                }else if($_SESSION['check']==true){
                    echo '<div class="info alert alert-info">'.$_SESSION['check'].'</div>';
                    unset($_SESSION['check']);
                }
            ?>
			<div id="form">
				<form action="check_post.php" method="post">
					<p><input type="text" class="form-control" name="name" placeholder="Ваше имя"></p>
					<p><textarea type="text" class="form-control" name="comment" placeholder="Ваш отзыв"></textarea></p>
					<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
				</form>
			</div>
		</div>
	</body>
</html>

