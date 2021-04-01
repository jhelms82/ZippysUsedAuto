<?php
//local development server connection
// $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
//$username = 'root';
//$password = 'sesame';

// Heroku connection
$dsn = 'mysql:host=g84t6zfpijzwx08q.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=tcbvo63ef7tkc7sw';
$username = 'tcbvo63ef7tkc7sw';
$password = 'ijfdttxcn0ffz3q8';


$db = new PDO($dsn, $username, $password);




try {
    //local development server connection
    //if using a $password, add it as 3rd parameter
//    $db = new PDO($dsn, $username, $password);

    // Heroku connection
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error = "Database Error: ";
    $error .= $e->getMessage();
    include('../view/error.php');
    exit();
}





