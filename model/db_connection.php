<?php
global $db;
$dsn = 'mysql:host=g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tcbvo63ef7tkc7sw';
$username = 'root';
$password = 'sesame';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = 'Database Error: ';
    $error = $e->getMessage();
    include('view/error.php');
    exit();
}


