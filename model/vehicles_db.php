<?php
//grabs all rows that have a specific category ID
function get_vehicles()
{
    global $db;
    $query = 'SELECT * FROM vehicle
               ';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}
function add_vehicle($types, $makes, $classes, $price)
{
    global $db;
    $query = "INSERT INTO vehicle 
    (makeName, vehicleID,  ) VALUES (:makename, :makeID)";
    $statement = $db->prepare ($query);
    $statement->bindValue ($makesName, ':makeName');
    $statement->bindValue ($makesID, ':makeID');
    $statement->bindValue ($makesName, ':makeName');
    $statement->bindValue ($makesID, ':makeID');
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
           WHERE vehiclePrice= :get_vehicles_by_price 
            ORDER by vehiclePrice';
    $statement = $db->prepare($query);
    $statement->bind(':vehicleYear', $vehicleYear);
    $statement->execute();


}
