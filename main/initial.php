<?php
session_start();
date_default_timezone_set("Asia/Bangkok");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (!isset($_SESSION['ENV'])) {
    require 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $_SESSION['ENV'] = $_ENV;
}
