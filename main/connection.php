<?php
$db_host = $_SESSION['ENV']['DB_HOST'];
$db_user = $_SESSION['ENV']['DB_USERNAME'];
$db_password = $_SESSION['ENV']['DB_PASSWORD'];
$db_name = $_SESSION['ENV']['DB_NAME'];
try {
    $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec('SET NAMES utf8');
} catch (PDOException $e) {
    echo $e->getMessage();
}
