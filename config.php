<?php

$mysql = new mysqli("mysql", "root", "root", "php-first-mySQL");
$mysql->query("SET NAMES'utf8'");

require"function.php";
session_start();
