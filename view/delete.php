<?php
//including the database connection file
include("../model/db_connection.php");


//getting id of the data from url
$vehicleID = filter_input (INPUT_POST, "vehicleID", FILTER_VALIDATE_INT);

//deleting the row from table
if ($vehicleID != false) {
$query = "DELETE FROM vehicle WHERE vehicleID=:vehicleID";
$statement = $db->prepare($query);
$statement->bindValue (":vehicleID", $vehicleID);
$success = $statement->execute ();
$statement->closeCursor ();
}

//redirecting to the display page
include("../admin.php");
?>