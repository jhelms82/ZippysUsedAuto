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


// $smt = $db->prepare('select makeName From make');
// $smt->execute();
// $data = $smt->fetchAll();

?>
<?php


// $smt = $db->prepare('select typeName From type');
// $smt->execute();
// $data = $smt->fetchAll();

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

$sql = "SELECT makeName FROM make";
$stmt = $db->prepare($sql);
$stmt->execute();

$smt = $db->prepare('select className From class');
$smt->execute();
$data = $smt->fetchAll();

?>
<header class="list_row list_header">
    <h1>Vehicle List</h1>
</header>

<?php


$smt = $db->prepare('select className From class');
$smt->execute();
$data = $smt->fetchAll();

?>
<header class="list_row list_header">
    <h1>Vehicle List</h1>
</header>










<?php

$sql = "SELECT makeName FROM make";
$stmt = $db->prepare($sql);
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
$stmt = $db->prepare($sql);
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


    </tr>"

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

    </tr>
<?php endforeach; ?>
</table>



    <?php
    include'view/footer.php';


    ?>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>