<?php
global $db;
$dsn = 'mysql:host=u3r5w4ayhxzdrw87.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=gurqqa0i6t3k65lv';
$username = 'coga0zjtdlnyra0t';
$password = 'a1sa845pdz74nzt8';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = 'Database Error: ';
    $error = $e->getMessage();
    include('view/error.php');
    exit();
}


