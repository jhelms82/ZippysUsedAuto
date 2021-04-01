<?php
require('model/db_connection.php');
include('model/makes_db.php');
include('model/classes_db.php');
include ('model/types_db.php');
include ('model/vehicle_make_db.php');
include ('model/vehicles_db.php');









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