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
            
                $mysql = new mysqli("localhost", "root", "root", "php-first-mySQL");
                $mysql->query("SET NAMES 'utf8'");
                    $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");
                    while($row = $result->fetch_assoc()){
                              echo '<div class="note">';
                              echo '<p>';
                                echo '<span class="date">'.$row['date'].' '.'</span>';
                                echo '<span class="name">'.$row['name'].'</span>'.'<br>';
                              echo '</p>';
                              echo '<p>'.$row['comment'].'</p>';	
                              echo '</div>';
                    }
                    $mysql->close();
                    $success = "Запись успешно сохранена!";
                    if ($_SESSION['success']==true and $_SESSION['success']<>$success){
                    echo '<div class="info alert alert-warning">'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
                }else if($_SESSION['success']==true){
                    echo '<div class="info alert alert-info">'.$_SESSION['success'].'</div>';
                    unset($_SESSION['success']);
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

