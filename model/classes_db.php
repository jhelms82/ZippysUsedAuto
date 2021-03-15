<?php
include 'db_connection.php';



function get_classes()
{
    global $db;
    $query = 'SELECT * FROM class
               ';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes= $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}


function get_classes_by_name($classID) {
    if(!$classID) {
        return "All Types";
    }
    global $db;
    $query = "SELECT * FROM class
    WHERE classID = :class_id";
    $statement = $db->prepare ($query);
    $statement->bindValue ($classID, ':class_id');
    $statement->execute ();
    $class = $statement->fetch();
    $statement->closeCursor ();
    $className = $class['classsName'];
    return $className;
}

function add_class($className, $classID)
{
    global $db;
    $query = "INSERT INTO class 
    (className, classID) VALUES (:className, :class_id)";
    $statement = $db->prepare ($query);
    $statement->bindValue ($className, ':className');
    $statement->bindValue ($classID, ':class_id');
    $statement->execute ();
    $statement->closeCursor ();
}

function delete_class($classID) {
    global $db;
    $query = "DELETE FROM class
    WHERE classID = : class_id";
    $statement = $db->prepare ($query);
    $statement->bindValue (":class_id", $classID);
    $statement->execute ();
    $statement->closeCursor ();
}
