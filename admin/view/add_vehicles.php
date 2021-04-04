

<?php
// Get the product data
$vehicleID = filter_input(INPUT_POST, 'vehicleID', FILTER_VALIDATE_INT);
$vehicleYear = filter_input(INPUT_POST, 'vehicleYear', FILTER_VALIDATE_INT);
$vehicleModel = filter_input(INPUT_POST, 'vehicleModel', FILTER_SANITIZE_STRING);
$vehiclePrice = filter_input(INPUT_POST, 'vehiclePrice', FILTER_VALIDATE_FLOAT);
$typeName = filter_input(INPUT_POST, 'typeName', FILTER_SANITIZE_STRING);
$className = filter_input(INPUT_POST, 'className', FILTER_SANITIZE_STRING);
$makeName= filter_input(INPUT_POST, 'MakeName', FILTER_SANITIZE_STRING);

// Validate inputs
if ($vehicleID== null || $vehicleID== false ||
$vehicleYear == null || $vehicleYear == false
|| $vehiclePrice == null || $typeName == null || $typeName == false
|| $className == null || $className == false || $makeName == null) {
    $error = "Invalid Vehicle data. Check all fields and try again.";
    include('../view/error.php');
} else {
    require_once ('model/db_connection.php');
}


if(isset($_POST['submit'])) {
    $vehicleYear=$_POST['year'];
    $vehiclePrice=$_POST['price'];
    $typeName=$_POST['Type'];
    $makeName=$_POST['Make'];
    $vehicleModel=$_POST['model'];

}
$vehicleYear= 1;
$vehiclePrice=1;
$typeName=1;
$makeName=1;
$vehicleModel = 1;

// Add the product to the database
// add_vehicle($make_id, $type_id, $class_id, $year, $model, $price);

// Display the Product List page
require('../index.php');

?>
