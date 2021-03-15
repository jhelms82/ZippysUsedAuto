<?php
include 'db_connection.php';



function get_types()
{
    global $db;
    $query = 'SELECT * FROM type
               ';
    $statement = $db->prepare($query);
    $statement->execute();
    $types= $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_types_by_name($typeID) {
    if(!$typeID) {
        return "All Types";
    }
    global $db;
    $query = "SELECT * FROM type
    WHERE typeID = :type_id";
    $statement = $db->prepare ($query);
    $statement->bindValue ($typeID, ':type_id');
    $statement->execute ();
    $types = $statement->fetch();
    $statement->closeCursor ();
    $typeName = $types['typesName'];
    return $typeName;
}

function add_types($typesName, $typesID)
{
    global $db;
    $query = "INSERT INTO type 
    (typesName, typesID) VALUES (:typesName, :typesID)";
    $statement = $db->prepare ($query);
    $statement->bindValue ($typesName, ':typeName');
    $statement->bindValue ($typesID, ':typesID');
    $statement->execute ();
    $statement->closeCursor ();
}

function delete_types($typesID) {
    global $db;
    $query = "DELETE FROM type
    WHERE typesID = : typesID";
    $statement = $db->prepare ($query);
    $statement->bindValue (":typesID", $typesID);
    $statement->execute ();
    $statement->closeCursor ();
}