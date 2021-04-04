<?php
//grabs all rows that have a specific category ID
    function get_all_vehicle($sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
            FROM vehicle V 
            LEFT JOIN makes M ON V.make_id = M.ID 
            LEFT JOIN classes C ON V.class_id = C.ID 
            LEFT JOIN types T ON V.type_id = T.ID  
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }
    function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price) {
        global $db;
        $query = 'INSERT INTO vehicle (year, make_id, model, price, type_id, class_id)
              VALUES
                 (:year, :make_id, :model, :price, :type_id, :class_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
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
              WHERE price= :vehiclePrice
              ORDER by price';
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
           WHERE price= :vehiclePrice
            ORDER by price';
    $statement = $db->prepare($query);
    $statement->bind(':vehicleYear', $vehicleYear);
    $statement->execute();
    return $vehicleYear;


}


        function get_vehicles_by_make($make_id, $sort) {
        global $db;
        if ($sort == 'year'){
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        
        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
        FROM vehicle V 
        LEFT JOIN makes M ON V.make_id = M.ID 
        LEFT JOIN classes C ON V.class_id = C.ID 
        LEFT JOIN types T ON V.type_id = T.ID  
        WHERE V.make_id = :make_id 
        ORDER BY ' . $orderby . ' DESC';
        
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

        function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicle WHERE ID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }