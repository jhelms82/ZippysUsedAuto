<?php
include 'db_connection.php';



function get_vehicle_make()
{
    global $db;
    $query = 'SELECT * FROM make
               ';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes= $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}


function get_make_by_name($makeID) {
    if(!$makeID) {
        return "All Types";
    }
    global $db;
    $query = "SELECT * FROM make
    WHERE makeID = :make_id";
    $statement = $db->prepare ($query);
    $statement->bindValue ($makeID, ':make_id');
    $statement->execute ();
    $makes= $statement->fetch();
    $statement->closeCursor ();
    $makeName = $makes['makeName'];
    return $makeName;
}

function add_make($makeName, $makeID)
{
    global $db;
    $query = "INSERT INTO make 
    (makeName, makeID) VALUES (:makename, :makeID)";
    $statement = $db->prepare ($query);
    $statement->bindValue ($makeName, ':makeName');
    $statement->bindValue ($makeID, ':makeID');
    $statement->execute ();
    $statement->closeCursor ();
}

function delete_make($makeID) {
    global $db;
    $query = "DELETE FROM make
    WHERE makeID = : makeID";
    $statement = $db->prepare ($query);
    $statement->bindValue (":makeID", $makeID);
    $statement->execute ();
    $statement->closeCursor ();
}