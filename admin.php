<?php
require('model/db_connection.php');
include('model/makes_db.php');
include('model/classes_db.php');
include ('model/types_db.php');
include ('model/vehicle_make_db.php');
include ('model/vehicles_db.php');
$vehicleID =  filter_input (INPUT_POST, 'vehicleID');
$classID = filter_input (INPUT_POST, 'classID');
$types = filter_input (INPUT_POST, 'typeID');


?>
<?php


$smt = $db->prepare('select makeName From make');
$smt->execute();
$data = $smt->fetchAll();

?>
<?php


$smt = $db->prepare('select typeName From type');
$smt->execute();
$data = $smt->fetchAll();

?>
<?php


$smt = $db->prepare('select className From class');
$smt->execute();
$data = $smt->fetchAll();

?>
<header class="list_row list_header">
    <h1>Vehicle List</h1>
</header>




<?php
$pdo = new PDO('mysql:host=localhost;dbname=zippyusedautos', 'root', 'sesame');
$sql = "SELECT makeName FROM make";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) { ?>
    <select name="makeName">
        <option>View All Makes</option>
        <?php foreach ($results as $row) { ?>

            <option value="<?php echo $row['makeName']; ?>"><?php echo $row['makeName']; ?></option>
        <?php } ?>
    </select>
<?php } ?><br><br>

<?php

$sql = "SELECT typeName FROM type";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($stmt->rowCount() > 0) { ?>
    <select name="modelName">
        <option>View All Types</option>
        <?php foreach ($results as $row) { ?>

            <option value="<?php echo $row['typeName']; ?>"><?php echo $row['typeName']; ?></option>
        <?php } ?>
    </select>
<?php } ?><br><br>


<select name="className" id="className">
    <option>View All Classes</option>
    <?php foreach ($data as $row): ?>
        <option><?=$row["className"]?></option>
    <?php endforeach ?>
</select>






    <?php
    $query = $db->prepare("SELECT * FROM vehicle ORDER BY vehiclePrice");
    $query->execute();
    $result = $query->fetchall();


    ?>



    <?php

    echo
    "<table border='2' class='table-primary'>
    <tr>
    <th>Year</th>
    <th>Make</th>
    <th>Model</th>
    <th>Type</th>
    <th>Class</th>
    <th>Price</th>
    <th>Delete</th>

    </tr>"
    ;
?>




<?php $vehicles = get_vehicles ();

foreach ($vehicles as $vehicle) : ?>
    <tr>
        <td><?php echo $vehicle['vehicleYear']; ?></td>
        <td><?php echo $vehicle['makeName']; ?></td>
        <td><?php echo $vehicle['vehicleModel']; ?></td>
        <td><?php echo $vehicle['typeName']; ?></td>
        <td><?php echo $vehicle['className']; ?></td>


        <td class="right"><?php echo $vehicle['vehiclePrice']; ?></td>
        <td><form action="view/delete.php" method="post">
                <input type="hidden" name="vehicleID"
                       value="<?php echo $vehicle['vehicleID']; ?>">
                <input type="hidden" name="vehicleID"
                       value="<?php echo $vehicle['vehicleID']; ?>">
                <input  type="submit" value="Delete">
            </form></td>
    </tr>
<?php endforeach; ?>
    </table>




<p><a href="view/admin_vehicle.php">Click Here To Add Vehicle</a></p>
<p><a href="view/admin_make.php">View/Edit Makes</a></p>
<p><a href="view/admin_type.php">View/Edit Types</a></p>
<p><a href="view/admin_class.php">View/Edit Classes</a></p> ?>

<?php
include'view/footer.php';


?>