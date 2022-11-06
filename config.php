<?php

    $mysql = new mysqli("localhost", "root", "root", "php-first-mySQL");
    $mysql->query("SET NAMES 'utf8'");
    
    $result = $mysql->query("SELECT * FROM `exemple-first` ORDER BY `id` DESC");

?>
