<?php
//grabs all rows that have a specific category ID
function get_vehicles()
{
    global $db;
    $query = 'SELECT * FROM vehicle ORDER BY vehiclePrice
               ';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
function add_vehicle($vehicleID, $typeName, $makeName, $className, $vehiclePrice, $vehicleModel)
{
    global $db;
    $query = "INSERT INTO vehicle 
    (makeName, vehicleID, typeName, className, vehiclePrice, vehiclePrice ) VALUES (:makeName, :vehicleID, :typeName, :className, :vehiclePrice, :vehiclePrice )";
    $statement = $db->prepare ($query);
    $statement->bindValue ($makeName, ':makeName');
    $statement->bindValue ($vehicleID, ':vehicleID');
    $statement->bindValue ($typeName, ':typeName');
    $statement->bindValue ($className, ':className');
    $statement->bindValue ($vehiclePrice, ':vehiclePrice');
    $statement->bindValue ($vehicleModel, ':vehiclePrice');
    $statement->execute ();
    $statement->closeCursor ();
}


//function get_vehicle_name($vehiclesID){
//    global $db;
//        $query = "SELECT * FROM vehicle
//      WHERE vehiclesID = :vehiclesID";
//    $statment = $db->prepare ($query);
//    $statment->bindValue ($vehiclesID, ':vehiclesID');
//    $statment->execute ();
//    $vehicles = $statment->fetch ();
//    $vehiclesName = $vehicles['vehiclesName'];
//    return $vehiclesName;
//}
function get_vehicles_by_price($vehiclesPrice)
{

    global $db;
    $query = 'SELECT * FROM vehicle
              WHERE vehiclePrice= :vehiclePrice
              ORDER by vehiclePrice';
    $statement = $db->prepare($query);
    $statement->bindValue (':vehiclePrice', $vehiclesPrice);
    $statement->execute();
    $vehicles = $statement->fetch();
    $statement->closeCursor();
    return $vehicles;

}

function get_vehicles_by_year($vehicleYear) {
    global $db;
    $query='SELECT * FROM vehicle
           WHERE vehiclePrice= :vehiclePrice
            ORDER by vehiclePrice';
    $statement = $db->prepare($query);
    $statement->bind(':vehicleYear', $vehicleYear);
    $statement->execute();
    return $vehicleYear;


}
