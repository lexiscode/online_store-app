<?php

$pdo = new \PDO('mysql:host=online_shop_mariadb;dbname=web_shop', 'root', 'root');
$sql = file_get_contents(__DIR__ . '/import.sql');
$pdo->exec($sql);

echo 'Database created!';
